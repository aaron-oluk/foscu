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
        Schema::table('logos', function (Blueprint $table) {
            // Rename existing columns
            $table->renameColumn('organisation', 'partner_name');
            $table->renameColumn('picture', 'image');
            
            // Add new columns
            $table->string('website_url', 500)->nullable()->after('partner_name');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('image');
            $table->integer('display_order')->default(0)->after('status');
            
            // Drop the upload_date column as we have timestamps
            $table->dropColumn('upload_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logos', function (Blueprint $table) {
            // Reverse the changes
            $table->renameColumn('partner_name', 'organisation');
            $table->renameColumn('image', 'picture');
            $table->dropColumn(['website_url', 'status', 'display_order']);
            $table->date('upload_date')->after('picture');
        });
    }
};
