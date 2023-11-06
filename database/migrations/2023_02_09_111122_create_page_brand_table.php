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
      Schema::create('page_brand', function (Blueprint $table) {
         $table->unsignedInteger('page_id');
         $table->unsignedInteger('brand_id');
         $table->integer('position')->default(0);

         //$table->foreign('page_id')->references('id')->on('pages');
         //$table->foreign('brand_id')->references('id')->on('brands');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('page_brand');
   }
};