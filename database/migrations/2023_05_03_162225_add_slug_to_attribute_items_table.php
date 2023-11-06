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
        Schema::table('attribute_items', function (Blueprint $table) {
            $table->string('slug')->comment('UID для значения атрибута');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attribute_items', function (Blueprint $table) {
            $table->dropIfExists('slug');
        });
    }
};
