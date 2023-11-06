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
      Schema::table('menu_categories', function (Blueprint $table) {
         $table->unsignedInteger('image')->nullable()->comment('Иконка категории меню при необходимости');

         //$table->foreign('image')->references('id')->on('gallery');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('menu_categories', function (Blueprint $table) {
         $table->dropColumn('image');
      });
   }
};