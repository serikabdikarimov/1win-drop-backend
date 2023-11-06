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
        Schema::create('heading_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('page_id')->comment('id страницы');
            $table->unsignedInteger('locale_id')->comment('id языка');
            $table->text('data')->comment('структура меню, то есть содержание страницы');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heading_links');
    }
};
