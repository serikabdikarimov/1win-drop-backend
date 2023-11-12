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
        Schema::table('default_settings', function (Blueprint $table) {
            $table->string('favicon_32')->nullable()->change();
            $table->string('favicon_64')->nullable()->change();
            $table->string('favicon_180')->nullable()->change();
            $table->string('manifest_192')->nullable()->change();
            $table->string('manifest_512')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('default_settings', function (Blueprint $table) {
            //
        });
    }
};
