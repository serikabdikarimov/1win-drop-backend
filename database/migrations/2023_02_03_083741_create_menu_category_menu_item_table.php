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
      Schema::create('menu_category_menu_item', function (Blueprint $table) {
         $table->unsignedInteger('menu_category_id');
         $table->unsignedInteger('menu_item_id');

         //$table->foreign('menu_category_id')->references('id')->on('menu_categories')->onDelete('cascade');
         //$table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('menu_category_menu_item');
   }
};