<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body_font_size')->nullable();
            $table->string('body_color')->nullable();
            $table->string('body_line_height')->nullable();
            $table->string('body_bg')->nullable();
            $table->string('text')->nullable();
            $table->string('text_subdued')->nullable();
            $table->string('text_pale')->nullable();
            $table->string('text_disabled')->nullable();
            $table->string('paragraph_margin_bottom')->nullable();
            $table->string('header_background')->nullable();
            $table->string('header_shadow')->nullable();
            $table->string('card_background')->nullable();
            $table->string('card_border')->nullable();
            $table->string('blockquote_background')->nullable();
            $table->string('table_border')->nullable();
            $table->string('table_row_background')->nullable();
            $table->string('table_tag_background')->nullable();
            $table->string('table_tag_text_color')->nullable();
            $table->string('social_link_background')->nullable();
            $table->string('social_link_color')->nullable();
            $table->string('input_background')->nullable();
            $table->string('casino_background')->nullable();
            $table->string('casino_providers_background')->nullable();
            $table->string('rate_star')->nullable();
            $table->string('rate_star_active')->nullable();
            $table->string('burger_color')->nullable();
            $table->string('mobile_menu_background')->nullable();
            $table->string('mobile_menu_list_background')->nullable();
            $table->string('article_table_contents')->nullable();
            $table->string('article_table_contents_summary')->nullable();
            $table->string('article_table_contents_li')->nullable();
            $table->string('modal_background')->nullable();
            $table->string('modal_close_button')->nullable();
            $table->string('action_list_hover')->nullable();
            $table->string('action_list_active')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_subdued')->nullable();
            $table->string('interactive')->nullable();
            $table->string('interactive_disabled')->nullable();
            $table->string('interactive_hovered')->nullable();
            $table->string('interactive_pressed')->nullable();
            $table->string('focused')->nullable();
            $table->string('icon_on_interactive')->nullable();
            $table->string('text_on_interactive')->nullable();
            $table->string('background')->nullable();
            $table->string('action_primary')->nullable();
            $table->string('action_primary_hovered')->nullable();
            $table->string('action_primary_pressed')->nullable();
            $table->string('action_primary_disabled')->nullable();
            $table->string('icon_on_primary')->nullable();
            $table->string('text_on_primary')->nullable();
            $table->string('text_primary')->nullable();
            $table->string('text_primary_hovered')->nullable();
            $table->string('action_secondary')->nullable();
            $table->string('action_secondary_hovered')->nullable();
            $table->string('action_secondary_pressed')->nullable();
            $table->string('action_secondary_disabled')->nullable();
            $table->string('icon_on_secondary')->nullable();
            $table->string('text_on_secondary')->nullable();
            $table->string('text_secondary')->nullable();
            $table->string('text_secondary_hovered')->nullable();
            $table->string('border')->nullable();
            $table->string('border_hovered')->nullable();
            $table->string('border_active')->nullable();
            $table->string('border_subdued')->nullable();
            $table->unsignedInteger('locale_id');
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
        Schema::drop('design_settings');
    }
}
