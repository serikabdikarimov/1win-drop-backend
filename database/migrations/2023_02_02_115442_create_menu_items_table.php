<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('menu_items', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->string('code')->unique();
         $table->unsignedInteger('locale_id');
         $table->integer('is_active')->nullable();
         $table->timestamps();

         //$table->foreign('name')->references('id')->on('tranlates')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('menu_items');
   }
}