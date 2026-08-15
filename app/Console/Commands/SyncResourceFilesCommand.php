<?php

namespace App\Console\Commands;

use App\Services\ResourceFileSyncService;
use Illuminate\Console\Command;

class SyncResourceFilesCommand extends Command
{
    protected $signature = 'resources:sync';

    protected $description = 'Scan resource directories and save any untracked files to the database';

    public function handle(ResourceFileSyncService $sync): int
    {
        $result = $sync->sync();

        $this->info("Scanned {$result['scanned']} file(s). Added {$result['added']}. Skipped {$result['skipped']}.");

        return self::SUCCESS;
    }
}
