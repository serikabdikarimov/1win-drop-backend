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
      Schema::create('attribute_items', function (Blueprint $table) {
         $table->id();
         $table->string('title')->comment('Наименование значения аттрибута');
         $table->string('attribute_uid')->comment('UID аттрибута');
         $table->unsignedInteger('locale_id')->comment('id домена к которому относится атрибут');
         $table->timestamps();

         //$table->foreign('title')->references('id')->on('translates');
         //$table->foreign('attribute_id')->references('id')->on('attributes');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('attribute_items');
   }
};