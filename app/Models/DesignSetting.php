<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignSetting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'design_settings';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body_font_size',
        'body_color',
        'body_line_height',
        'body_bg',
        'text',
        'text_subdued',
        'text_pale',
        'text_disabled',
        'paragraph_margin_bottom',
        'header_background',
        'header_shadow',
        'card_background',
        'card_border',
        'blockquote_background',
        'table_border',
        'table_row_background',
        'table_tag_background',
        'table_tag_text_color',
        'social_link_background',
        'social_link_color',
        'input_background',
        'casino_background',
        'casino_providers_background',
        'rate_star',
        'rate_star_active',
        'burger_color',
        'mobile_menu_background',
        'mobile_menu_list_background',
        'article_table_contents',
        'article_table_contents_summary',
        'article_table_contents_li',
        'modal_background',
        'modal_close_button',
        'action_list_hover',
        'action_list_active',
        'icon',
        'icon_subdued',
        'interactive',
        'interactive_disabled',
        'interactive_hovered',
        'interactive_pressed',
        'focused',
        'icon_on_interactive',
        'text_on_interactive',
        'background',
        'action_primary',
        'action_primary_hovered',
        'action_primary_pressed',
        'action_primary_disabled',
        'icon_on_primary',
        'text_on_primary',
        'text_primary',
        'text_primary_hovered',
        'action_secondary',
        'action_secondary_hovered',
        'action_secondary_pressed',
        'action_secondary_disabled',
        'icon_on_secondary',
        'text_on_secondary',
        'text_secondary',
        'text_secondary_hovered',
        'border',
        'border_hovered',
        'border_active',
        'border_subdued',
        'logo_title',
        'logo_title_background',
        'play_val',
        'play_link',
        'navigation_link',
        'navigation_link_hover',
        'footer_background',
        'footer_border',
        'locale_id'
    ];
}
