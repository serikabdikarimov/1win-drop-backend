<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->comment('Подзаголовок');
            $table->string('short_description')->nullable()->comment('краткое описание');
            $table->string('text_after_button')->nullable()->comment('Текст под кнопкой обзор');
            $table->string('promocode_text')->nullable()->comment('Текст под промокодом');
            $table->text('rating')->nullable()->comment('Рейтинг');
            $table->unsignedInteger('is_active')->change()->comment('Рейтинг');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('subtitle');
            $table->dropColumn('short_description');
            $table->dropColumn('text_after_button');
            $table->dropColumn('promocode_text');
            $table->dropColumn('rating');
        });
    }
};
