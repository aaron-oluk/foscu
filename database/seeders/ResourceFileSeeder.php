<?php

namespace Database\Seeders;

use App\Services\ResourceFileSyncService;
use Illuminate\Database\Seeder;

class ResourceFileSeeder extends Seeder
{
    public function run(): void
    {
        app(ResourceFileSyncService::class)->sync();
    }
}
