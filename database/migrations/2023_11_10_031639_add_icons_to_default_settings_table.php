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
            $table->unsignedInteger('favicon_32')->nullable();
            $table->unsignedInteger('favicon_64')->nullable();
            $table->unsignedInteger('favicon_180')->nullable();
            $table->unsignedInteger('manifest_192')->nullable();
            $table->unsignedInteger('manifest_512')->nullable();
            $table->text('manifest_name')->nullable();
            $table->text('manifest_short_description')->nullable();
            $table->text('manifest_description')->nullable();
            $table->string('manifest_theme_color')->nullable();
            $table->string('manifest_background_color')->nullable();
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
