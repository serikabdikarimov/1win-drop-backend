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
            $table->string('navigation_link')->nullable();
            $table->string('navigation_link_hover')->nullable();
            $table->string('footer_background')->nullable();
            $table->string('footer_border')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('design_settings', function (Blueprint $table) {
            //
        });
    }
};
