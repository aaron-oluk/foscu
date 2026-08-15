<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\ResourceFile;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function trackDownload(Request $request)
    {
        $filename = $request->query('file');

        if (! is_string($filename) || trim($filename) === '' || str_contains($filename, '..')) {
            abort(404, 'File not found');
        }

        $filePath = $this->resolveFilePath($filename);

        if (! $filePath) {
            abort(404, 'File not found');
        }

        $basename = basename($filePath);
        $record = ResourceFile::query()
            ->where('stored_path', $basename)
            ->orWhere('stored_path', 'like', '%/'.$basename)
            ->orWhere('original_filename', $filename)
            ->orWhere('original_filename', $basename)
            ->first();

        Download::firstOrCreate(
            ['filename' => $basename],
            ['downloads' => 0]
        )->incrementDownloads();

        $downloadAs = $record?->download_name ?? ResourceFile::stripNumberPrefix($basename);

        return response()->download($filePath, $downloadAs);
    }

    private function resolveFilePath(string $filename): ?string
    {
        $candidates = str_contains($filename, '/')
            ? [public_path($filename)]
            : [
                public_path('briefs/'.$filename),
                public_path('briefs/reports/'.$filename),
                public_path('briefs/articles/'.$filename),
                storage_path('app/public/resource-files/'.$filename),
            ];

        $allowedRoots = [
            realpath(public_path('briefs')) ?: public_path('briefs'),
            realpath(storage_path('app/public/resource-files')) ?: storage_path('app/public/resource-files'),
        ];

        foreach ($candidates as $path) {
            if (! is_file($path)) {
                continue;
            }

            $realPath = realpath($path);
            if (! $realPath) {
                continue;
            }

            foreach ($allowedRoots as $root) {
                if (str_starts_with($realPath, rtrim($root, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR)) {
                    return $realPath;
                }
            }
        }

        return null;
    }
}
