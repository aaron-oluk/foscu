<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Backfills columns from 2025_07_08_122313_add_fields_to_events_table and the
     * original create_events_table migration on environments where the "events"
     * table was rebuilt from the legacy SQL dump, which predates both migrations
     * and lacks these columns despite them being recorded as already migrated.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'description')) {
                $table->text('description')->nullable()->after('eventname');
            }
            if (!Schema::hasColumn('events', 'event_time')) {
                $table->time('event_time')->nullable()->after('eventdate');
            }
            if (!Schema::hasColumn('events', 'location')) {
                $table->string('location')->nullable()->after('event_time');
            }
            if (!Schema::hasColumn('events', 'image')) {
                $table->string('image')->nullable()->after('location');
            }
            if (!Schema::hasColumn('events', 'status')) {
                $table->enum('status', ['upcoming', 'ongoing', 'completed'])->default('upcoming')->after('image');
            }
            if (!Schema::hasColumn('events', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    public function down(): void
    {
        // No-op: this migration only backfills columns that earlier migrations
        // already declare, so reversing it would break environments that rely
        // on those columns existing.
    }
};
