<?php

namespace App\Services;

use App\Models\ResourceFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File as FileFacade;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class ResourceFileSyncService
{
    public const LAST_SYNC_CACHE_KEY = 'resource_files_last_sync';

    private const ALLOWED_EXTENSIONS = ['pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'zip', 'jpg', 'jpeg', 'png'];

    private const SKIPPED_EXTENSIONS = ['doc', 'docx'];

    public function directories(): array
    {
        return [
            [
                'path' => public_path('briefs'),
                'disk' => 'public_web',
                'relative_to' => public_path(),
            ],
            [
                'path' => storage_path('app/public/resource-files'),
                'disk' => 'public',
                'relative_to' => storage_path('app/public'),
            ],
        ];
    }

    public function sync(): array
    {
        $added = 0;
        $skipped = 0;
        $scanned = 0;

        foreach ($this->directories() as $directory) {
            if (! is_dir($directory['path'])) {
                continue;
            }

            foreach ($this->filesIn($directory['path']) as $file) {
                $scanned++;
                $extension = strtolower($file->getExtension());

                if (in_array($extension, self::SKIPPED_EXTENSIONS, true) || ! in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
                    $skipped++;
                    continue;
                }

                if ($this->alreadyTracked($file, $directory)) {
                    $this->refreshTrackedName($file, $directory);
                    $skipped++;
                    continue;
                }

                $relativePath = ltrim(str_replace($directory['relative_to'], '', $file->getPathname()), DIRECTORY_SEPARATOR);
                $relativePath = str_replace('\\', '/', $relativePath);

                ResourceFile::create([
                    'title' => ResourceFile::titleFromFilename($file->getFilename()),
                    'original_filename' => ResourceFile::stripNumberPrefix($file->getFilename()),
                    'stored_path' => $relativePath,
                    'disk' => $directory['disk'],
                    'mime_type' => FileFacade::mimeType($file->getPathname()) ?: null,
                    'size' => $file->getSize(),
                    'category' => $this->categoryFromFile($file, $relativePath),
                    'is_public' => true,
                ]);

                $added++;
            }
        }

        Cache::forever(self::LAST_SYNC_CACHE_KEY, now()->toIso8601String());

        return [
            'scanned' => $scanned,
            'added' => $added,
            'skipped' => $skipped,
        ];
    }

    public function lastSyncedAt(): ?string
    {
        return Cache::get(self::LAST_SYNC_CACHE_KEY);
    }

    private function filesIn(string $path): array
    {
        $files = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file instanceof SplFileInfo && $file->isFile() && ! str_starts_with($file->getFilename(), '.')) {
                $files[] = $file;
            }
        }

        return $files;
    }

    private function alreadyTracked(SplFileInfo $file, array $directory): bool
    {
        $basename = $file->getFilename();
        $relativePath = ltrim(str_replace($directory['relative_to'], '', $file->getPathname()), DIRECTORY_SEPARATOR);
        $relativePath = str_replace('\\', '/', $relativePath);

        return ResourceFile::query()
            ->where(function ($query) use ($basename, $relativePath, $directory) {
                $query->where('original_filename', $basename)
                    ->orWhere('stored_path', $relativePath)
                    ->orWhere('stored_path', 'like', '%/'.$basename)
                    ->orWhere('stored_path', $basename)
                    ->orWhere(function ($inner) use ($relativePath, $directory) {
                        $inner->where('disk', $directory['disk'])
                            ->where('stored_path', $relativePath);
                    });
            })
            ->exists();
    }

    private function refreshTrackedName(SplFileInfo $file, array $directory): void
    {
        $basename = $file->getFilename();
        $relativePath = ltrim(str_replace($directory['relative_to'], '', $file->getPathname()), DIRECTORY_SEPARATOR);
        $relativePath = str_replace('\\', '/', $relativePath);
        $cleanFilename = ResourceFile::stripNumberPrefix($basename);

        ResourceFile::query()
            ->where(function ($query) use ($basename, $relativePath, $directory) {
                $query->where('original_filename', $basename)
                    ->orWhere('stored_path', $relativePath)
                    ->orWhere('stored_path', 'like', '%/'.$basename)
                    ->orWhere('stored_path', $basename)
                    ->orWhere(function ($inner) use ($relativePath, $directory) {
                        $inner->where('disk', $directory['disk'])
                            ->where('stored_path', $relativePath);
                    });
            })
            ->get()
            ->each(function (ResourceFile $record) use ($cleanFilename) {
                $updates = [];
                $cleanedOriginal = ResourceFile::stripNumberPrefix($record->original_filename);
                $cleanedTitle = ResourceFile::stripNumberPrefix($record->title);

                if ($record->original_filename !== $cleanedOriginal) {
                    $updates['original_filename'] = $cleanedOriginal !== '' ? $cleanedOriginal : $cleanFilename;
                }

                if ($record->title !== $cleanedTitle) {
                    $updates['title'] = $cleanedTitle;
                }

                if ($updates !== []) {
                    $record->update($updates);
                }
            });
    }

    private function categoryFromFile(SplFileInfo $file, string $relativePath): string
    {
        $haystack = strtolower($relativePath.' '.$file->getFilename());

        if (str_contains($haystack, 'briefs/reports') || str_contains($haystack, '/reports/')) {
            return 'articles';
        }
        if (str_contains($haystack, 'research')) {
            return 'research';
        }
        if (str_contains($haystack, 'policy') || str_contains($haystack, 'position paper')) {
            return 'policy';
        }
        if (str_contains($haystack, 'commentary') || str_contains($haystack, 'paper')) {
            return 'papers';
        }
        if (str_contains($haystack, 'report')) {
            return 'reports';
        }

        return 'other';
    }
}
