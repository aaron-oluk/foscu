<?php

namespace App\Services;

use App\Models\SystemBackup;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class SystemBackupService
{
    private const EXCLUDE_DIRS = [
        '.git',
        'node_modules',
        'vendor',
        'storage/framework',
        'storage/logs',
        'storage/pail',
        'storage/app/private/backups',
    ];

    public function create(?User $user = null, string $type = 'full'): SystemBackup
    {
        $timestamp = now()->format('Y-m-d_His');
        $filename = "foscu-{$type}-backup-{$timestamp}.zip";
        $relativePath = "backups/{$filename}";

        Storage::disk('local')->makeDirectory('backups');

        $backup = SystemBackup::create([
            'filename' => $filename,
            'stored_path' => $relativePath,
            'type' => $type,
            'status' => 'pending',
            'created_by' => $user?->id,
            'notes' => 'Backup in progress',
        ]);

        try {
            $zipPath = Storage::disk('local')->path($relativePath);
            $zip = new ZipArchive();

            if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                throw new \RuntimeException('Could not create backup archive.');
            }

            $sqlDump = $this->dumpDatabase();
            if ($sqlDump) {
                $zip->addFromString('database/foscu.sql', $sqlDump);
            }

            $this->addDirectoryToZip($zip, base_path(), 'app');
            $zip->close();

            $size = file_exists($zipPath) ? filesize($zipPath) : 0;

            $backup->update([
                'status' => 'completed',
                'size' => $size,
                'notes' => $sqlDump
                    ? 'Full backup including database dump and application files.'
                    : 'File backup completed. Database dump was skipped (pg_dump not available or failed).',
                'completed_at' => now(),
            ]);
        } catch (\Throwable $e) {
            $backup->update([
                'status' => 'failed',
                'notes' => 'Backup failed: '.$e->getMessage(),
            ]);

            throw $e;
        }

        return $backup->fresh();
    }

    private function dumpDatabase(): ?string
    {
        $connection = config('database.default');
        $config = config("database.connections.{$connection}");

        if (($config['driver'] ?? null) !== 'pgsql') {
            return null;
        }

        $pgDump = trim((string) shell_exec('command -v pg_dump'));
        if ($pgDump === '') {
            return null;
        }

        $host = escapeshellarg($config['host'] ?? '127.0.0.1');
        $port = escapeshellarg((string) ($config['port'] ?? '5432'));
        $user = escapeshellarg($config['username'] ?? '');
        $database = escapeshellarg($config['database'] ?? '');
        $password = $config['password'] ?? '';

        $command = "PGPASSWORD=".escapeshellarg($password)." {$pgDump} -h {$host} -p {$port} -U {$user} -d {$database} --no-owner --no-acl 2>/dev/null";
        $output = shell_exec($command);

        return is_string($output) && $output !== '' ? $output : null;
    }

    private function addDirectoryToZip(ZipArchive $zip, string $root, string $zipRoot): void
    {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            $fullPath = $file->getPathname();
            $relative = ltrim(str_replace($root, '', $fullPath), DIRECTORY_SEPARATOR);
            $relative = str_replace('\\', '/', $relative);

            if ($this->shouldExclude($relative)) {
                continue;
            }

            $zipPath = $zipRoot.'/'.$relative;

            if ($file->isDir()) {
                $zip->addEmptyDir($zipPath);
                continue;
            }

            if ($file->isFile() && is_readable($fullPath)) {
                $zip->addFile($fullPath, $zipPath);
            }
        }
    }

    private function shouldExclude(string $relative): bool
    {
        foreach (self::EXCLUDE_DIRS as $dir) {
            if ($relative === $dir || str_starts_with($relative, $dir.'/')) {
                return true;
            }
        }

        return false;
    }
}
