<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->text('description')->nullable()->after('eventname');
            $table->time('event_time')->nullable()->after('eventdate');
            $table->string('location')->nullable()->after('event_time');
            $table->string('image')->nullable()->after('location');
            $table->enum('status', ['upcoming', 'ongoing', 'completed'])->default('upcoming')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['description', 'event_time', 'location', 'image', 'status']);
        });
    }
};
