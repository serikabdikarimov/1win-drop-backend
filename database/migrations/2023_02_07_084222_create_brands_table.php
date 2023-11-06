<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('brands', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name')->nullable();
         $table->string('description')->nullable();
         $table->string('url')->comment('Ссылка на сайт партнера');
         $table->unsignedInteger('logo');
         $table->unsignedInteger('locale_id')->comment('id домена к которому относится атрибут');
         $table->enum('is_active', [0, 1])->default(1);
         $table->timestamps();

         //$table->foreign('name')->references('id')->on('translates')->onDelete('cascade');
         //$table->foreign('description')->references('id')->on('translates')->onDelete('cascade');
         //$table->foreign('attr_1')->references('id')->on('translates')->onDelete('cascade');
         //$table->foreign('attr_2')->references('id')->on('translates')->onDelete('cascade');
         //$table->foreign('attr_3')->references('id')->on('translates')->onDelete('cascade');
         //$table->foreign('logo')->references('id')->on('gallery')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('brands');
   }
}