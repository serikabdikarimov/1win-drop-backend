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
        Schema::create('localization', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('название сайта либо языка');
            $table->string('locale_name')->unique()->comment('доменное имя либо skug');
            $table->string('code')->unique()->nullable()->comment('Код региона (языка) для переключателя');
            $table->enum('is_active', [0,1])->default(1)->comment('Cтатус активности домена либо языка');
            $table->unsignedInteger('icon')->nullable()->comment('Иконка переключателя языка');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localization');
    }
};
