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
      Schema::table('pages', function (Blueprint $table) {
         $table->string('meta_keywords')->nullable();
         $table->integer('type')->nullable();
         $table->integer('status')->default(1);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('pages', function (Blueprint $table) {
         $table->dropColumn('meta_keywords');
         $table->dropColumn('type');
         $table->dropColumn('status');
      });
   }
};