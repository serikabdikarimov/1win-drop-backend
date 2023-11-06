<div class="card">
    <div class="card-header alert-secondary">
        scss-docs-start root-body-variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('body_font_size') ? 'has-error' : ''}}">
            <label for="body_font_size" class="control-label">{{ 'Body Font Size' }}</label>
            <input class="form-control" name="body_font_size" type="text" id="body_font_size" value="{{ isset($designsetting->body_font_size) ? $designsetting->body_font_size : ''}}" >
            {!! $errors->first('body_font_size', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('body_color') ? 'has-error' : ''}}">
            <label for="body_color" class="control-label">{{ 'Body Color' }}</label>
            <input class="form-control" name="body_color" type="text" id="body_color" value="{{ isset($designsetting->body_color) ? $designsetting->body_color : ''}}" >
            {!! $errors->first('body_color', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('body_line_height') ? 'has-error' : ''}}">
            <label for="body_line_height" class="control-label">{{ 'Body Line Height' }}</label>
            <input class="form-control" name="body_line_height" type="text" id="body_line_height" value="{{ isset($designsetting->body_line_height) ? $designsetting->body_line_height : ''}}" >
            {!! $errors->first('body_line_height', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('body_bg') ? 'has-error' : ''}}">
            <label for="body_bg" class="control-label">{{ 'Body Bg' }}</label>
            <input class="form-control" name="body_bg" type="text" id="body_bg" value="{{ isset($designsetting->body_bg) ? $designsetting->body_bg : ''}}" >
            {!! $errors->first('body_bg', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header alert-secondary">
        scss-docs-start typography-variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
            <label for="text" class="control-label">{{ 'Text' }}</label>
            <input class="form-control" name="text" type="text" id="text" value="{{ isset($designsetting->text) ? $designsetting->text : ''}}" >
            {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_subdued') ? 'has-error' : ''}}">
            <label for="text_subdued" class="control-label">{{ 'Text Subdued' }}</label>
            <input class="form-control" name="text_subdued" type="text" id="text_subdued" value="{{ isset($designsetting->text_subdued) ? $designsetting->text_subdued : ''}}" >
            {!! $errors->first('text_subdued', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_pale') ? 'has-error' : ''}}">
            <label for="text_pale" class="control-label">{{ 'Text Pale' }}</label>
            <input class="form-control" name="text_pale" type="text" id="text_pale" value="{{ isset($designsetting->text_pale) ? $designsetting->text_pale : ''}}" >
            {!! $errors->first('text_pale', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_disabled') ? 'has-error' : ''}}">
            <label for="text_disabled" class="control-label">{{ 'Text Disabled' }}</label>
            <input class="form-control" name="text_disabled" type="text" id="text_disabled" value="{{ isset($designsetting->text_disabled) ? $designsetting->text_disabled : ''}}" >
            {!! $errors->first('text_disabled', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('paragraph_margin_bottom') ? 'has-error' : ''}}">
            <label for="paragraph_margin_bottom" class="control-label">{{ 'Paragraph Margin Bottom' }}</label>
            <input class="form-control" name="paragraph_margin_bottom" type="text" id="paragraph_margin_bottom" value="{{ isset($designsetting->paragraph_margin_bottom) ? $designsetting->paragraph_margin_bottom : ''}}" >
            {!! $errors->first('paragraph_margin_bottom', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header alert-secondary">
        scss-docs-start components-variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('header_background') ? 'has-error' : ''}}">
            <label for="header_background" class="control-label">{{ 'Header Background' }}</label>
            <input class="form-control" name="header_background" type="text" id="header_background" value="{{ isset($designsetting->header_background) ? $designsetting->header_background : ''}}" >
            {!! $errors->first('header_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('header_shadow') ? 'has-error' : ''}}">
            <label for="header_shadow" class="control-label">{{ 'Header Shadow' }}</label>
            <input class="form-control" name="header_shadow" type="text" id="header_shadow" value="{{ isset($designsetting->header_shadow) ? $designsetting->header_shadow : ''}}" >
            {!! $errors->first('header_shadow', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('card_background') ? 'has-error' : ''}}">
            <label for="card_background" class="control-label">{{ 'Card Background' }}</label>
            <input class="form-control" name="card_background" type="text" id="card_background" value="{{ isset($designsetting->card_background) ? $designsetting->card_background : ''}}" >
            {!! $errors->first('card_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('card_border') ? 'has-error' : ''}}">
            <label for="card_border" class="control-label">{{ 'Card Border' }}</label>
            <input class="form-control" name="card_border" type="text" id="card_border" value="{{ isset($designsetting->card_border) ? $designsetting->card_border : ''}}" >
            {!! $errors->first('card_border', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('blockquote_background') ? 'has-error' : ''}}">
            <label for="blockquote_background" class="control-label">{{ 'Blockquote Background' }}</label>
            <input class="form-control" name="blockquote_background" type="text" id="blockquote_background" value="{{ isset($designsetting->blockquote_background) ? $designsetting->blockquote_background : ''}}" >
            {!! $errors->first('blockquote_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('table_border') ? 'has-error' : ''}}">
            <label for="table_border" class="control-label">{{ 'Table Border' }}</label>
            <input class="form-control" name="table_border" type="text" id="table_border" value="{{ isset($designsetting->table_border) ? $designsetting->table_border : ''}}" >
            {!! $errors->first('table_border', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('table_row_background') ? 'has-error' : ''}}">
            <label for="table_row_background" class="control-label">{{ 'Table Row Background' }}</label>
            <input class="form-control" name="table_row_background" type="text" id="table_row_background" value="{{ isset($designsetting->table_row_background) ? $designsetting->table_row_background : ''}}" >
            {!! $errors->first('table_row_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('table_tag_background') ? 'has-error' : ''}}">
            <label for="table_tag_background" class="control-label">{{ 'Table Tag Background' }}</label>
            <input class="form-control" name="table_tag_background" type="text" id="table_tag_background" value="{{ isset($designsetting->table_tag_background) ? $designsetting->table_tag_background : ''}}" >
            {!! $errors->first('table_tag_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('table_tag_text_color') ? 'has-error' : ''}}">
            <label for="table_tag_text_color" class="control-label">{{ 'Table Tag Text Color' }}</label>
            <input class="form-control" name="table_tag_text_color" type="text" id="table_tag_text_color" value="{{ isset($designsetting->table_tag_text_color) ? $designsetting->table_tag_text_color : ''}}" >
            {!! $errors->first('table_tag_text_color', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('social_link_background') ? 'has-error' : ''}}">
            <label for="social_link_background" class="control-label">{{ 'Social Link Background' }}</label>
            <input class="form-control" name="social_link_background" type="text" id="social_link_background" value="{{ isset($designsetting->social_link_background) ? $designsetting->social_link_background : ''}}" >
            {!! $errors->first('social_link_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('social_link_color') ? 'has-error' : ''}}">
            <label for="social_link_color" class="control-label">{{ 'Social Link Color' }}</label>
            <input class="form-control" name="social_link_color" type="text" id="social_link_color" value="{{ isset($designsetting->social_link_color) ? $designsetting->social_link_color : ''}}" >
            {!! $errors->first('social_link_color', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('input_background') ? 'has-error' : ''}}">
            <label for="input_background" class="control-label">{{ 'Input Background' }}</label>
            <input class="form-control" name="input_background" type="text" id="input_background" value="{{ isset($designsetting->input_background) ? $designsetting->input_background : ''}}" >
            {!! $errors->first('input_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('casino_background') ? 'has-error' : ''}}">
            <label for="casino_background" class="control-label">{{ 'Casino Background' }}</label>
            <input class="form-control" name="casino_background" type="text" id="casino_background" value="{{ isset($designsetting->casino_background) ? $designsetting->casino_background : ''}}" >
            {!! $errors->first('casino_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('casino_providers_background') ? 'has-error' : ''}}">
            <label for="casino_providers_background" class="control-label">{{ 'Casino Providers Background' }}</label>
            <input class="form-control" name="casino_providers_background" type="text" id="casino_providers_background" value="{{ isset($designsetting->casino_providers_background) ? $designsetting->casino_providers_background : ''}}" >
            {!! $errors->first('casino_providers_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('rate_star') ? 'has-error' : ''}}">
            <label for="rate_star" class="control-label">{{ 'Rate Star' }}</label>
            <input class="form-control" name="rate_star" type="text" id="rate_star" value="{{ isset($designsetting->rate_star) ? $designsetting->rate_star : ''}}" >
            {!! $errors->first('rate_star', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('rate_star_active') ? 'has-error' : ''}}">
            <label for="rate_star_active" class="control-label">{{ 'Rate Star Active' }}</label>
            <input class="form-control" name="rate_star_active" type="text" id="rate_star_active" value="{{ isset($designsetting->rate_star_active) ? $designsetting->rate_star_active : ''}}" >
            {!! $errors->first('rate_star_active', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('burger_color') ? 'has-error' : ''}}">
            <label for="burger_color" class="control-label">{{ 'Burger Color' }}</label>
            <input class="form-control" name="burger_color" type="text" id="burger_color" value="{{ isset($designsetting->burger_color) ? $designsetting->burger_color : ''}}" >
            {!! $errors->first('burger_color', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('mobile_menu_background') ? 'has-error' : ''}}">
            <label for="mobile_menu_background" class="control-label">{{ 'Mobile Menu Background' }}</label>
            <input class="form-control" name="mobile_menu_background" type="text" id="mobile_menu_background" value="{{ isset($designsetting->mobile_menu_background) ? $designsetting->mobile_menu_background : ''}}" >
            {!! $errors->first('mobile_menu_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('mobile_menu_list_background') ? 'has-error' : ''}}">
            <label for="mobile_menu_list_background" class="control-label">{{ 'Mobile Menu List Background' }}</label>
            <input class="form-control" name="mobile_menu_list_background" type="text" id="mobile_menu_list_background" value="{{ isset($designsetting->mobile_menu_list_background) ? $designsetting->mobile_menu_list_background : ''}}" >
            {!! $errors->first('mobile_menu_list_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('article_table_contents') ? 'has-error' : ''}}">
            <label for="article_table_contents" class="control-label">{{ 'Article Table Contents' }}</label>
            <input class="form-control" name="article_table_contents" type="text" id="article_table_contents" value="{{ isset($designsetting->article_table_contents) ? $designsetting->article_table_contents : ''}}" >
            {!! $errors->first('article_table_contents', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('article_table_contents_summary') ? 'has-error' : ''}}">
            <label for="article_table_contents_summary" class="control-label">{{ 'Article Table Contents Summary' }}</label>
            <input class="form-control" name="article_table_contents_summary" type="text" id="article_table_contents_summary" value="{{ isset($designsetting->article_table_contents_summary) ? $designsetting->article_table_contents_summary : ''}}" >
            {!! $errors->first('article_table_contents_summary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('article_table_contents_li') ? 'has-error' : ''}}">
            <label for="article_table_contents_li" class="control-label">{{ 'Article Table Contents Li' }}</label>
            <input class="form-control" name="article_table_contents_li" type="text" id="article_table_contents_li" value="{{ isset($designsetting->article_table_contents_li) ? $designsetting->article_table_contents_li : ''}}" >
            {!! $errors->first('article_table_contents_li', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('modal_background') ? 'has-error' : ''}}">
            <label for="modal_background" class="control-label">{{ 'Modal Background' }}</label>
            <input class="form-control" name="modal_background" type="text" id="modal_background" value="{{ isset($designsetting->modal_background) ? $designsetting->modal_background : ''}}" >
            {!! $errors->first('modal_background', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('modal_close_button') ? 'has-error' : ''}}">
            <label for="modal_close_button" class="control-label">{{ 'Modal Close Button' }}</label>
            <input class="form-control" name="modal_close_button" type="text" id="modal_close_button" value="{{ isset($designsetting->modal_close_button) ? $designsetting->modal_close_button : ''}}" >
            {!! $errors->first('modal_close_button', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_list_hover') ? 'has-error' : ''}}">
            <label for="action_list_hover" class="control-label">{{ 'Action List Hover' }}</label>
            <input class="form-control" name="action_list_hover" type="text" id="action_list_hover" value="{{ isset($designsetting->action_list_hover) ? $designsetting->action_list_hover : ''}}" >
            {!! $errors->first('action_list_hover', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_list_active') ? 'has-error' : ''}}">
            <label for="action_list_active" class="control-label">{{ 'Action List Active' }}</label>
            <input class="form-control" name="action_list_active" type="text" id="action_list_active" value="{{ isset($designsetting->action_list_active) ? $designsetting->action_list_active : ''}}" >
            {!! $errors->first('action_list_active', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header alert-secondary">
        icon variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
            <label for="icon" class="control-label">{{ 'Icon' }}</label>
            <input class="form-control" name="icon" type="text" id="icon" value="{{ isset($designsetting->icon) ? $designsetting->icon : ''}}" >
            {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('icon_subdued') ? 'has-error' : ''}}">
            <label for="icon_subdued" class="control-label">{{ 'Icon Subdued' }}</label>
            <input class="form-control" name="icon_subdued" type="text" id="icon_subdued" value="{{ isset($designsetting->icon_subdued) ? $designsetting->icon_subdued : ''}}" >
            {!! $errors->first('icon_subdued', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header alert-secondary">
        interactive variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('interactive') ? 'has-error' : ''}}">
            <label for="interactive" class="control-label">{{ 'Interactive' }}</label>
            <input class="form-control" name="interactive" type="text" id="interactive" value="{{ isset($designsetting->interactive) ? $designsetting->interactive : ''}}" >
            {!! $errors->first('interactive', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('interactive_disabled') ? 'has-error' : ''}}">
            <label for="interactive_disabled" class="control-label">{{ 'Interactive Disabled' }}</label>
            <input class="form-control" name="interactive_disabled" type="text" id="interactive_disabled" value="{{ isset($designsetting->interactive_disabled) ? $designsetting->interactive_disabled : ''}}" >
            {!! $errors->first('interactive_disabled', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('interactive_hovered') ? 'has-error' : ''}}">
            <label for="interactive_hovered" class="control-label">{{ 'Interactive Hovered' }}</label>
            <input class="form-control" name="interactive_hovered" type="text" id="interactive_hovered" value="{{ isset($designsetting->interactive_hovered) ? $designsetting->interactive_hovered : ''}}" >
            {!! $errors->first('interactive_hovered', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('interactive_pressed') ? 'has-error' : ''}}">
            <label for="interactive_pressed" class="control-label">{{ 'Interactive Pressed' }}</label>
            <input class="form-control" name="interactive_pressed" type="text" id="interactive_pressed" value="{{ isset($designsetting->interactive_pressed) ? $designsetting->interactive_pressed : ''}}" >
            {!! $errors->first('interactive_pressed', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('focused') ? 'has-error' : ''}}">
            <label for="focused" class="control-label">{{ 'Focused' }}</label>
            <input class="form-control" name="focused" type="text" id="focused" value="{{ isset($designsetting->focused) ? $designsetting->focused : ''}}" >
            {!! $errors->first('focused', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('icon_on_interactive') ? 'has-error' : ''}}">
            <label for="icon_on_interactive" class="control-label">{{ 'Icon On Interactive' }}</label>
            <input class="form-control" name="icon_on_interactive" type="text" id="icon_on_interactive" value="{{ isset($designsetting->icon_on_interactive) ? $designsetting->icon_on_interactive : ''}}" >
            {!! $errors->first('icon_on_interactive', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_on_interactive') ? 'has-error' : ''}}">
            <label for="text_on_interactive" class="control-label">{{ 'Text On Interactive' }}</label>
            <input class="form-control" name="text_on_interactive" type="text" id="text_on_interactive" value="{{ isset($designsetting->text_on_interactive) ? $designsetting->text_on_interactive : ''}}" >
            {!! $errors->first('text_on_interactive', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header alert-secondary">
        surface variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('background') ? 'has-error' : ''}}">
            <label for="background" class="control-label">{{ 'Background' }}</label>
            <input class="form-control" name="background" type="text" id="background" value="{{ isset($designsetting->background) ? $designsetting->background : ''}}" >
            {!! $errors->first('background', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header alert-secondary">
        action primary variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('action_primary') ? 'has-error' : ''}}">
            <label for="action_primary" class="control-label">{{ 'Action Primary' }}</label>
            <input class="form-control" name="action_primary" type="text" id="action_primary" value="{{ isset($designsetting->action_primary) ? $designsetting->action_primary : ''}}" >
            {!! $errors->first('action_primary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_primary_hovered') ? 'has-error' : ''}}">
            <label for="action_primary_hovered" class="control-label">{{ 'Action Primary Hovered' }}</label>
            <input class="form-control" name="action_primary_hovered" type="text" id="action_primary_hovered" value="{{ isset($designsetting->action_primary_hovered) ? $designsetting->action_primary_hovered : ''}}" >
            {!! $errors->first('action_primary_hovered', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_primary_pressed') ? 'has-error' : ''}}">
            <label for="action_primary_pressed" class="control-label">{{ 'Action Primary Pressed' }}</label>
            <input class="form-control" name="action_primary_pressed" type="text" id="action_primary_pressed" value="{{ isset($designsetting->action_primary_pressed) ? $designsetting->action_primary_pressed : ''}}" >
            {!! $errors->first('action_primary_pressed', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_primary_disabled') ? 'has-error' : ''}}">
            <label for="action_primary_disabled" class="control-label">{{ 'Action Primary Disabled' }}</label>
            <input class="form-control" name="action_primary_disabled" type="text" id="action_primary_disabled" value="{{ isset($designsetting->action_primary_disabled) ? $designsetting->action_primary_disabled : ''}}" >
            {!! $errors->first('action_primary_disabled', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('icon_on_primary') ? 'has-error' : ''}}">
            <label for="icon_on_primary" class="control-label">{{ 'Icon On Primary' }}</label>
            <input class="form-control" name="icon_on_primary" type="text" id="icon_on_primary" value="{{ isset($designsetting->icon_on_primary) ? $designsetting->icon_on_primary : ''}}" >
            {!! $errors->first('icon_on_primary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_on_primary') ? 'has-error' : ''}}">
            <label for="text_on_primary" class="control-label">{{ 'Text On Primary' }}</label>
            <input class="form-control" name="text_on_primary" type="text" id="text_on_primary" value="{{ isset($designsetting->text_on_primary) ? $designsetting->text_on_primary : ''}}" >
            {!! $errors->first('text_on_primary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_primary') ? 'has-error' : ''}}">
            <label for="text_primary" class="control-label">{{ 'Text Primary' }}</label>
            <input class="form-control" name="text_primary" type="text" id="text_primary" value="{{ isset($designsetting->text_primary) ? $designsetting->text_primary : ''}}" >
            {!! $errors->first('text_primary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_primary_hovered') ? 'has-error' : ''}}">
            <label for="text_primary_hovered" class="control-label">{{ 'Text Primary Hovered' }}</label>
            <input class="form-control" name="text_primary_hovered" type="text" id="text_primary_hovered" value="{{ isset($designsetting->text_primary_hovered) ? $designsetting->text_primary_hovered : ''}}" >
            {!! $errors->first('text_primary_hovered', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header alert-secondary">
        action secondary variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('action_secondary') ? 'has-error' : ''}}">
            <label for="action_secondary" class="control-label">{{ 'Action Secondary' }}</label>
            <input class="form-control" name="action_secondary" type="text" id="action_secondary" value="{{ isset($designsetting->action_secondary) ? $designsetting->action_secondary : ''}}" >
            {!! $errors->first('action_secondary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_secondary_hovered') ? 'has-error' : ''}}">
            <label for="action_secondary_hovered" class="control-label">{{ 'Action Secondary Hovered' }}</label>
            <input class="form-control" name="action_secondary_hovered" type="text" id="action_secondary_hovered" value="{{ isset($designsetting->action_secondary_hovered) ? $designsetting->action_secondary_hovered : ''}}" >
            {!! $errors->first('action_secondary_hovered', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_secondary_pressed') ? 'has-error' : ''}}">
            <label for="action_secondary_pressed" class="control-label">{{ 'Action Secondary Pressed' }}</label>
            <input class="form-control" name="action_secondary_pressed" type="text" id="action_secondary_pressed" value="{{ isset($designsetting->action_secondary_pressed) ? $designsetting->action_secondary_pressed : ''}}" >
            {!! $errors->first('action_secondary_pressed', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('action_secondary_disabled') ? 'has-error' : ''}}">
            <label for="action_secondary_disabled" class="control-label">{{ 'Action Secondary Disabled' }}</label>
            <input class="form-control" name="action_secondary_disabled" type="text" id="action_secondary_disabled" value="{{ isset($designsetting->action_secondary_disabled) ? $designsetting->action_secondary_disabled : ''}}" >
            {!! $errors->first('action_secondary_disabled', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('icon_on_secondary') ? 'has-error' : ''}}">
            <label for="icon_on_secondary" class="control-label">{{ 'Icon On Secondary' }}</label>
            <input class="form-control" name="icon_on_secondary" type="text" id="icon_on_secondary" value="{{ isset($designsetting->icon_on_secondary) ? $designsetting->icon_on_secondary : ''}}" >
            {!! $errors->first('icon_on_secondary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_on_secondary') ? 'has-error' : ''}}">
            <label for="text_on_secondary" class="control-label">{{ 'Text On Secondary' }}</label>
            <input class="form-control" name="text_on_secondary" type="text" id="text_on_secondary" value="{{ isset($designsetting->text_on_secondary) ? $designsetting->text_on_secondary : ''}}" >
            {!! $errors->first('text_on_secondary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_secondary') ? 'has-error' : ''}}">
            <label for="text_secondary" class="control-label">{{ 'Text Secondary' }}</label>
            <input class="form-control" name="text_secondary" type="text" id="text_secondary" value="{{ isset($designsetting->text_secondary) ? $designsetting->text_secondary : ''}}" >
            {!! $errors->first('text_secondary', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('text_secondary_hovered') ? 'has-error' : ''}}">
            <label for="text_secondary_hovered" class="control-label">{{ 'Text Secondary Hovered' }}</label>
            <input class="form-control" name="text_secondary_hovered" type="text" id="text_secondary_hovered" value="{{ isset($designsetting->text_secondary_hovered) ? $designsetting->text_secondary_hovered : ''}}" >
            {!! $errors->first('text_secondary_hovered', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header alert-secondary">
        border variables
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('border') ? 'has-error' : ''}}">
            <label for="border" class="control-label">{{ 'Border' }}</label>
            <input class="form-control" name="border" type="text" id="border" value="{{ isset($designsetting->border) ? $designsetting->border : ''}}" >
            {!! $errors->first('border', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('border_hovered') ? 'has-error' : ''}}">
            <label for="border_hovered" class="control-label">{{ 'Border Hovered' }}</label>
            <input class="form-control" name="border_hovered" type="text" id="border_hovered" value="{{ isset($designsetting->border_hovered) ? $designsetting->border_hovered : ''}}" >
            {!! $errors->first('border_hovered', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('border_active') ? 'has-error' : ''}}">
            <label for="border_active" class="control-label">{{ 'Border Active' }}</label>
            <input class="form-control" name="border_active" type="text" id="border_active" value="{{ isset($designsetting->border_active) ? $designsetting->border_active : ''}}" >
            {!! $errors->first('border_active', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('border_subdued') ? 'has-error' : ''}}">
            <label for="border_subdued" class="control-label">{{ 'Border Subdued' }}</label>
            <input class="form-control" name="border_subdued" type="text" id="border_subdued" value="{{ isset($designsetting->border_subdued) ? $designsetting->border_subdued : ''}}" >
            {!! $errors->first('border_subdued', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
