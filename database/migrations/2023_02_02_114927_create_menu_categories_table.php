<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuCategoriesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('menu_categories', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name')->unique()->comment('Название категории меню');
         $table->string('code')->unique()->comment('Мащинное имя');
         $table->enum('is_active', [0, 1])->default(1);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('menu_categories');
   }
}