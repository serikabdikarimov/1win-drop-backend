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
      Schema::create('pages', function (Blueprint $table) {
         $table->id();
         $table->string('title');
         $table->unsignedInteger('banner');
         $table->text('content');
         $table->unsignedInteger('brand_id')->nullable()->comment('id контента который будет притягиваться');
         $table->string('meta_title')->nullable();
         $table->string('meta_description')->nullable();
         $table->unsignedInteger('locale_id')->comment('ID домена или языка к которому привязан контент');
         $table->string('slug')->unique();
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
      Schema::dropIfExists('page');
   }
};