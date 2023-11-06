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
        Schema::create('default_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('locale_id');
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('google_client_id')->nullable();
            $table->text('google_client_secret')->nullable();
            $table->text('twitter_client_id')->nullable();
            $table->text('twitter_client_secret')->nullable();
            $table->text('twitter_api_key')->nullable();
            $table->text('facebook_client_id')->nullable();
            $table->text('facebook_client_secret')->nullable();
            $table->text('apple_client_id')->nullable();
            $table->text('apple_client_secret')->nullable();
            $table->text('apple_key_id')->nullable();
            $table->text('apple_team_id')->nullable();
            $table->text('apple_auth_key')->nullable();
            $table->text('apple_client_secret_updated_at')->nullable();
            $table->text('apple_refresh_token_interval_days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_settings');
    }
};
