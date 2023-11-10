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
        Schema::table('design_settings', function (Blueprint $table) {
            $table->string('logo_title')->nullable();
            $table->string('logo_title_background')->nullable();
        });
    }
};
