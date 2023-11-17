<!doctype html>
<html lang="{{ $domain->code }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if (request()->route() && request()->route()->getName() == 'search')
        <title>{{__('messages.Результаты поиска по запросу')}} «{{ request('search') }}»</title>
    @else
        <title>{{ isset($page->meta_title) ? $page->meta_title : $settings->site_name }}</title>
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (request()->getHost() == env('ADMIN_DOMAIN'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
    <meta name="revisit-after" content="7 days">

    <!-- Favicons -->
    <link rel="icon" href="{{ $settings->favicon_32 != null ? '/storage/'. $domain->locale_name .'/' . $settings->favicon_32 : '' }}" sizes="any" type="image/png">
    <!-- 32×32 -->
    <link rel="icon" href="{{ $settings->favicon_64 != null ? '/storage/'. $domain->locale_name .'/' . $settings->favicon_64 : '' }}" type="image/svg+xml">
    <!-- 64x64 -->
    <link rel="apple-touch-icon" href="{{ $settings->favicon_180 ? '/storage/'. $domain->locale_name .'/' . $settings->favicon_180 : '' }}">
    <!-- 180×180 -->

    <link rel="manifest" href="/manifest.webmanifest">

    <meta name="title" content="{{ isset($page) && $page->meta_title != null ? $page->meta_title : $settings->meta_title }}">
    <meta name="description" content="{{ isset($page) && $page->meta_description != null ? $page->meta_description : $settings->meta_description }}">
    <meta name="keywords" content="{{ isset($page) && $page->meta_keywords != null ? $page->meta_keywords : $settings->meta_keywords }}">
    {{-- og tags --}}
    <meta property="og:title" content="{{ isset($page) && $page->meta_title != null ? $page->meta_title : $settings->meta_title }}">
    <meta property="og:locale" content="{{ $domain->code }}" />
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ isset($page->title) ? $page->title : env('APP_NAME') }}">
    @if(!isset($exception))
    <meta property="og:image" content="https://{{ request()->getHost()}}/storage/uploads/{{ $page->getOgImage != null ? $page->getOgImage->url : '' }}">
    @endif
    <meta property="og:url" content="{{ 'https://' . $domain->locale_name }}{{ $domain->path($domain->id, request()->path()) != null && $domain->path($domain->id, request()->path())->slug != '/' ? '/' . request()->path() : '' }}">
    <meta property="og:description" content="{{ isset($page) && $page->meta_description != null ? $page->meta_description : $settings->meta_description }}">
    {{-- twitter tags --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ isset($page) && $page->meta_title != null ? $page->meta_title : $settings->meta_title }}">
    <meta name="twitter:description" content="{{ isset($page) && $page->meta_description != null ? $page->meta_description : $settings->meta_description }}">
    @if(!isset($exception))
    <meta name="twitter:image" content="https://{{ request()->getHost() }}/storage/uploads/{{ $page->getOgImage != null ? $page->getOgImage->url : '' }}">
    @endif
    <meta name="twitter:url" content="{{ 'https://' . $domain->locale_name }}{{ $domain->path($domain->id, request()->path()) != null && $domain->path($domain->id, request()->path())->slug != '/' ? '/' . request()->path() : '' }}" />
    @if (isset($page) && isset($page->autor_id) && $page->author->page($page->author->id) != null)
    <meta property="article:published_time" content="{{ $page->created_at }}" />
    <meta property="article:modified_time" content="{{ $page->updated_at }}" />
    <meta property="article:publisher" content="https://{{ request()->getHost() }}/{{ $page->author->page($page->author->id)->slug }}" />
    <meta property="article:author" content="https://{{ request()->getHost() }}/{{ $page->author->page($page->author->id)->slug }}" />
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no">
    <!-- This make sence for mobile browsers. It means, that content has been optimized for mobile browsers -->
    <meta name="HandheldFriendly" content="true">

    <!-- Stylesheet -->
    <link href="/static/css/main.min.css?v={{mt_rand(1, 100)}}" rel="stylesheet">
    @if ($design_settings)
    <style>
        :root {
            @if ($design_settings->navigation_link)
                --logo-title: {{ $design_settings->navigation_link }};
            @endif
            @if ($design_settings->navigation_link_hover)
                --logo-title: {{ $design_settings->navigation_link_hover }};
            @endif
            @if ($design_settings->footer_background)
                --logo-title: {{ $design_settings->footer_background }};
            @endif
            @if ($design_settings->footer_border)
                --logo-title: {{ $design_settings->footer_border }};
            @endif

            @if ($design_settings->logo_title)
                --logo-title: {{ $design_settings->logo_title }};
            @endif
            @if ($design_settings->logo_title_background)
                --logo-title-background: {{ $design_settings->logo_title_background }};
            @endif
            @if ($design_settings->body_font_size)
                --body-font-size: {{ $design_settings->body_font_size }};
            @endif
            @if ($design_settings->body_color)
                --body-color: {{ $design_settings->body_color }};
            @endif
            @if ($design_settings->body_line_height)
                --body-line-height: {{ $design_settings->body_line_height }};
            @endif
            @if ($design_settings->body_bg)
                --body-bg: {{ $design_settings->body_bg }};
            @endif
            @if ($design_settings->text)
                --text: {{ $design_settings->text }};
            @endif
            @if ($design_settings->text_subdued)
                --text-subdued: {{ $design_settings->text_subdued }};
            @endif
            @if ($design_settings->text_pale)
                --text-pale: {{ $design_settings->text_pale }};
            @endif
            @if ($design_settings->text_disabled)
                --text-disabled: {{ $design_settings->text_disabled }};
            @endif
            @if ($design_settings->paragraph_margin_bottom)
                --paragraph-margin-bottom: {{ $design_settings->paragraph_margin_bottom }};
            @endif
            @if ($design_settings->header_background)
                --header-background: {{ $design_settings->header_background }};
            @endif
            @if ($design_settings->header_shadow)
                --header-shadow: {{ $design_settings->header_shadow }};
            @endif
            @if ($design_settings->card_background)
                --card-background: {{ $design_settings->card_background }};
            @endif
            @if ($design_settings->card_border)
                --card-border: {{ $design_settings->card_border }};
            @endif
            @if ($design_settings->blockquote_background)
                --blockquote-background: {{ $design_settings->blockquote_background }};
            @endif
            @if ($design_settings->table_border)
                --table-border: {{ $design_settings->table_border }};
            @endif
            @if ($design_settings->table_row_background)
                --table-row-background: {{ $design_settings->table_row_background }};
            @endif
            @if ($design_settings->table_tag_background)
                --table-tag-background: {{ $design_settings->table_tag_background }};
            @endif
            @if ($design_settings->table_tag_text_color)
                --table-tag-text-color: {{ $design_settings->table_tag_text_color }};
            @endif
            @if ($design_settings->social_link_background)
                --social-link-background: {{ $design_settings->social_link_background }};
            @endif
            @if ($design_settings->social_link_color)
                --social-link-color: {{ $design_settings->social_link_color }};
            @endif
            @if ($design_settings->input_background)
                --input-background: {{ $design_settings->input_background }};
            @endif
            @if ($design_settings->casino_background)
                --casino-background: {{ $design_settings->casino_background }};
            @endif
            @if ($design_settings->casino_providers_background)
                --casino-providers-background: {{ $design_settings->casino_providers_background }};
            @endif
            @if ($design_settings->rate_star)
                --rate-star: {{ $design_settings->rate_star }};
            @endif
            @if ($design_settings->rate_star_active)
                --rate-star-active: {{ $design_settings->rate_star_active }};
            @endif
            @if ($design_settings->burger_color)
                --burger-color: {{ $design_settings->burger_color }};
            @endif
            @if ($design_settings->mobile_menu_background)
                --mobile-menu-background: {{ $design_settings->mobile_menu_background }};
            @endif
            @if ($design_settings->mobile_menu_list_background)
                --mobile-menu-list-background: {{ $design_settings->mobile_menu_list_background }};
            @endif
            @if ($design_settings->article_table_contents)
                --article-table-contents: {{ $design_settings->article_table_contents }};
            @endif
            @if ($design_settings->article_table_contents_summary)
                --article-table-contents-summary: {{ $design_settings->article_table_contents_summary }};
            @endif
            @if ($design_settings->article_table_contents_li)
                --article-table-contents-li: {{ $design_settings->article_table_contents_li }};
            @endif
            @if ($design_settings->modal_background)
                --modal-background: {{ $design_settings->modal_background }};
            @endif
            @if ($design_settings->modal_close_button)
                --modal-close-button: {{ $design_settings->modal_close_button }};
            @endif
            @if ($design_settings->action_list_hover)
                --action-list-hover: {{ $design_settings->action_list_hover }};
            @endif
            @if ($design_settings->action_list_active)
                --action-list-active: {{ $design_settings->action_list_active }};
            @endif
            @if ($design_settings->icon)
                --icon: {{ $design_settings->icon }};
            @endif
            @if ($design_settings->icon_subdued)
                --icon-subdued: {{ $design_settings->icon_subdued }};
            @endif
            @if ($design_settings->interactive)
                --interactive: {{ $design_settings->interactive }};
            @endif
            @if ($design_settings->interactive_disabled)
                --interactive-disabled: {{ $design_settings->interactive_disabled }};
            @endif
            @if ($design_settings->interactive_hovered)
                --interactive-hovered: {{ $design_settings->interactive_hovered }};
            @endif
            @if ($design_settings->interactive_pressed)
                --interactive-pressed: {{ $design_settings->interactive_pressed }};
            @endif
            @if ($design_settings->focused)
                --focused: {{ $design_settings->focused }};
            @endif
            @if ($design_settings->icon_on_interactive)
                --icon-on-interactive: {{ $design_settings->icon_on_interactive }};
            @endif
            @if ($design_settings->text_on_interactive)
                --text-on-interactive: {{ $design_settings->text_on_interactive }};
            @endif
            @if ($design_settings->background)
                --background: {{ $design_settings->background }};
            @endif
            @if ($design_settings->action_primary)
                --action-primary: {{ $design_settings->action_primary }};
            @endif
            @if ($design_settings->action_primary_hovered)
                --action-primary-hovered: {{ $design_settings->action_primary_hovered }};
            @endif
            @if ($design_settings->action_primary_pressed)
                --action-primary-pressed: {{ $design_settings->action_primary_pressed }};
            @endif
            @if ($design_settings->action_primary_disabled)
                --action-primary-disabled: {{ $design_settings->action_primary_disabled }};
            @endif
            @if ($design_settings->icon_on_primary)
                --icon-on-primary: {{ $design_settings->icon_on_primary }};
            @endif
            @if ($design_settings->text_on_primary)
                --text-on-primary: {{ $design_settings->text_on_primary }};
            @endif
            @if ($design_settings->text_primary)
                --text-primary: {{ $design_settings->text_primary }};
            @endif
            @if ($design_settings->text_primary_hovered)
                --text-primary-hovered: {{ $design_settings->text_primary_hovered }};
            @endif
            @if ($design_settings->action_secondary)
                --action-secondary: {{ $design_settings->action_secondary }};
            @endif
            @if ($design_settings->action_secondary_hovered)
                --action-secondary-hovered: {{ $design_settings->action_secondary_hovered }};
            @endif
            @if ($design_settings->action_secondary_pressed)
                --action-secondary-pressed: {{ $design_settings->action_secondary_pressed }};
            @endif
            @if ($design_settings->action_secondary_disabled)
                --action-secondary-disabled: {{ $design_settings->action_secondary_disabled }};
            @endif
            @if ($design_settings->icon_on_secondary)
                --icon-on-secondary: {{ $design_settings->icon_on_secondary }};
            @endif
            @if ($design_settings->text_on_secondary)
                --text-on-secondary: {{ $design_settings->text_on_secondary }};
            @endif
            @if ($design_settings->text_secondary)
                --text-secondary: {{ $design_settings->text_secondary }};
            @endif
            @if ($design_settings->text_secondary_hovered)
                --text-secondary-hovered: {{ $design_settings->text_secondary_hovered }};
            @endif
            @if ($design_settings->border)
                --border: {{ $design_settings->border }};
            @endif
            @if ($design_settings->border_hovered)
                --border-hovered: {{ $design_settings->border_hovered }};
            @endif
            @if ($design_settings->border_active)
                --border-active: {{ $design_settings->border_active }};
            @endif
            @if ($design_settings->border_subdued)
                --border-subdued: {{ $design_settings->border_subdued }};
            @endif
        }
    </style>
    @endif
    <!-- Xml -->
    <link href='/sitemap.xml' rel='alternate' title='Sitemap' type='application/rss+xml'/>
    <!-- Canonical -->
    <link rel="canonical" href="{{ 'https://' . $domain->locale_name }}{{ $domain->path($domain->id, request()->path()) != null && $domain->path($domain->id, request()->path())->slug != '/' ? '/' . request()->path() : '' }}"/>
    @foreach ($domains as $domain)
        @if (request()->route() && request()->route()->getName() == 'search')
            <link rel="alternate" href="{{ 'https://' . $domain->locale_name . '/search' }}" hreflang="{{ $domain->code }}" />
        @else
            <link rel="alternate" href="{{ 'https://' . $domain->locale_name }}{{ $domain->path($domain->id, request()->path()) != null && $domain->path($domain->id, request()->path())->slug != '/' ? '/' . request()->path() : '' }}" hreflang="{{ $domain->code }}" />
        @endif
    @endforeach
</head>
<body>
    <!-- App Begin -->
    <div class="app">
        <!-- App Wrapper Begin -->
        <div class="app__wrapper">
            <!-- Header Begin -->
            <header class="header">
                @include('frontend.components.header', ['menu' => $domain->getMenuCategory('osnovnoe_meniu')])
            </header>
            <!--/. Header End -->

            <!-- App Main Begin -->
            <main class="app__main">
                {{--@if(!isset($exception)) {{-- Убираем хлебные урошки на 404 и тд
                    @if (url()->current() != request()->getSchemeAndHttpHost())
                        @include('frontend.components.breadcrumbs')
                    @endif
                @endif --}}
                @yield('content')
            </main>
            <!--/. App Main End -->

            <!-- Footer Begin -->
            <footer class="footer">
                @include('frontend.components.footer', ['menu' => $domain->getMenuCategory('footer')])
            </footer>

            <div class="app__backdrop"></div>
        </div>
        <!--/. App Wrapper End -->

    </div>

    {{--@include('cookie-consent::index')--}}

    <!--/. App End -->

    <!-- CONTENT ENDS HERE -->

    <!-- Main scripts. You can replace it, but I recommend you to leave it here -->
    <script type="module" src="/static/js/main.min.js?v={{mt_rand(1, 100)}}"></script>
    <script src="/static/js/separate-js/scripts.js?v=0.{{mt_rand(1, 100)}}"></script>
    @if($domain->getMenuCategory('header') != null)
    <dialog class="mobile-menu">
        <div class="mobile-menu__wrapper">
            <div class="mobile-menu__menuContainer scrollable scrollable--vertical" data-scrollable="true">
                @if ($domain->getMenuCategory('header') != null)
                <ul class="mobile-menu__menu" data-accordion>
                    @foreach($domain->getMenuCategory('header')->items as $item)
                        <li class="mobile-menu__item">
                            @if ($item->children->count() > 0)
                            <button id="mob-menu-header-1" type="button" class="mobile-menu__toggle" aria-label="{{ $item->name }}" aria-expanded="false" aria-controls="mob-menu-panel-1" data-accordion-trigger>
                                @if ($item->icon)
                                {{dd($item->icon)}}
                                <span class="mobile-menu__prefix">
                                    <span class="icon icon--sizeMedium">
                                        {!! $item->icon !!}
                                    </span>
                                </span>
                                @endif
                                <span class="mobile-menu__title">
                                    {{ $item->name }}
                                </span>

                                <span class="mobile-menu__icon">
                                    <span class="icon icon--sizeMedium">
                                        <svg class="icon__svg" aria-hidden="true">
                                            <use xlink:href="/static/img/general/sprites/accordion-sprite.svg#arrow"></use>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            @else
                                <a href="https://{{ request()->getHost() }}{{ $item->slug == '/' ? '' : '/'}}{{ $item->page_id != null ? $item->page->slug : $item->url }}" class="mobile-menu__toggle">
                                    @if ($item->icon)
                                    <span class="mobile-menu__prefix">
                                        <span class="icon icon--sizeMedium">
                                            {!! $item->icon !!}
                                        </span>
                                    </span>
                                    @endif
                                    <span class="mobile-menu__title">
                                        {{ $item->name }}
                                    </span>
                                </a>
                            @endif
                            @if ($item->children->count() > 0)
                            <div id="mob-menu-panel-1" class="mobile-menu__body" aria-labelledby="mob-menu-header-1" data-accordion-body aria-hidden="true">
                                <ul class="mobile-menu__submenu">
                                    @foreach($item->children as $child)
                                    <li class="mobile-menu__item">
                                        <a href="https://{{ request()->getHost() }}{{ $item->slug == '/' ? '' : '/'}}{{ $child->page_id != null ? $child->page->slug : $child->url }}" class="mobile-menu__link">{{ $child->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </li>

                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </dialog>
    <!--/. Mobile Menu End -->
    @endif
    @if ($domains->count() > 1)
    <!-- Modal Language Begin -->
    <dialog class="modal modal--footerHidden modal--slide" id="modal-lang" aria-hidden="true">
        <div class="modal__dialog" role="dialog" aria-labelledby="modal-lang-header">
            <div class="modal__header">
                <h2 id="modal-lang-header" class="modal__headerTitle"></h2>
                <button type="button" class="modal__closeButton" aria-label="{{ __('messages.Закрыть') }}" data-micromodal-close>
                    <span class="icon icon--sizeMedium icon--applyColor">
                        <svg class="icon__svg" aria-hidden="true">
                            <use xlink:href="/static/img/general/icon-close.svg#icon-close"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal__bodyWrapper">
                <div class="modal__body">
                    <div class="modal__section">
                        <div class="lang-list">
                            <div class="lang-list__wrapper scrollable scrollable--vertical" data-scrollable="true">
                                <div class="actionList">
                                    <ul class="actionList__actions" role="menu" tabindex="-1">
                                        @foreach($domains as $item)
                                        <li role="presentation">
                                            <button type="button" class="actionList__item" role="menuitem">
                                                <span class="actionList__prefix">
                                                    <img src="/storage/uploads/{{ $item->getSettings->getLangIcon != null ? $item->getSettings->getLangIcon->url : '' }}" alt="{{ $item->getSettings->getLangIcon != null ? $item->getSettings->getLangIcon->alt : '' }}" width="24" height="24">
                                                </span>
                                                <span class="actionList__text">{{ $item->locale_name }}</span>
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal__footer">
                <div class="modal__footerContent">
                    <button type="button" class="button button--plain button--fullWidth" aria-label="{{ __('messages.Закрыть') }}" data-micromodal-close>
                        <span class="button__text">{{ __('messages.Закрыть') }}</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal__backdrop" tabindex="-1" data-micromodal-close></div>
    </dialog>
    <!--/. Modal Language End -->
    @endif

    {{-- start ld+json --}}

    @if( isset($page) && $page->type == 2)
   @php
        //$page->getBrandInWiew((int) $page->type_content_id, request()->getHost());
        $brand = $page->brand;
    @endphp
   <div class="brand-sticky" data-brand-sticky="" data-brand-show="false">
        <div class="brand-sticky__imgContainer">
            <picture>
                <img src="/storage/uploads/{{ $brand->getLogo->url }}" width="44" height="44" alt="{{ $brand->getLogo->alt }}" title="{{ $brand->getLogo->title }}" loading="lazy" class="brand-sticky__img">
            </picture>
        </div>
        <div class="brand-sticky__title">{{ $brand->name }}</div>
        <ul class="rate brand-sticky__compactRate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
            <li class="rate__item rate__item--active" role="presentation">
                <svg aria-hidden="true" class="rate__icon">
                    <use xlink:href="static/img/general/sprite.svg#icon-star"></use>
                </svg>
            </li>
            <li class="rate__item" role="presentation">{{ round($brand->rating()) }}</li>
        </ul>
        <ul class="rate brand-sticky__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
            @for($i=1; $i <= 5; $i++)
                <li class="rate__item {{ $i <= round($brand->rating()) ? 'rate__item--active' : '' }}" role="presentation">
                    <svg aria-hidden="true" class="rate__icon">
                        <use xlink:href="static/img/general/sprite.svg#icon-star"></use>
                    </svg>
                </li>
                @endfor

                <li class="rate__item" role="presentation">{{ round($brand->rating()) }}</li>
        </ul>
        <div class="brand-sticky__actions">
            <div class="buttonGroup">
                <div class="buttonGroup__item">
                    <button type="button" @guest data-like-button @endguest class="button button--sizeLarge button--iconOnly button--plain  @auth add_to_favorites @endauth" aria-label="{{__('messages.Добавить в избранные')}}" data-brand-id="{{ $brand->id }}" @auth data-liked="{{ $brand->userFavorite($brand->id) != null ? 'true' : 'false' }}" @endauth>
                        <span class="button__icon">
                        <span class="icon icon--sizeMedium icon--colorSubdued">
                            <svg class="icon__svg" aria-hidden="true"><use xlink:href="static/img/general/sprite.svg#icon-heart"></use></svg>
                        </span>
                        </span>
                    </button>
                </div>
                <div class="buttonGroup__item">
                    <button type="button" class="button button--sizeLarge button--iconOnly button--plain" data-micromodal-trigger="modal-share" aria-label="{{__('messages.Поделиться')}}">
                        <span class="button__icon">
                        <span class="icon icon--sizeMedium icon--colorSubdued">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="static/img/general/sprite.svg#icon-share"></use>
                            </svg>
                        </span>
                        </span>
                    </button>
                </div>
                <div class="buttonGroup__item">
                    <a href="{{ $brand->url }}" class="button button--sizeLarge button--primary" aria-label="{{__('messages.Перейти на сайт')}}">
                        <span class="button__text">{{__('messages.Сайт')}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Share Begin -->
    <dialog class="modal modal--footerHidden modal--slide" id="modal-share" aria-hidden="true">
        <div class="modal__dialog" role="dialog" aria-labelledby="modal-share-header">
            <div class="modal__header">
                <h2 id="modal-share-header" class="modal__headerTitle">{{__('messages.Поделиться')}}</h2>
                <button type="button" class="modal__closeButton" aria-label="{{__('messages.Закрыть модальное окно')}}" data-micromodal-close>
                    <span class="icon icon--sizeMedium icon--applyColor">
                    <svg class="icon__svg" focusable="false" aria-hidden="true">
                        <use xlink:href="static/img/general/icon-close.svg#icon-close"></use>
                    </svg>
                </span>
                </button>
            </div>
            <div class="modal__bodyWrapper">
                <div class="modal__body">
                    <div class="modal__section">
                        <ul class="share">
                            <li class="share__item">
                                <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="share__link" target="_blank" rel="noindex nofollow">
                                    <span class="share__icon">
                                    <span class="icon icon--sizeMedium icon--colorBase">
                                        <svg class="icon__svg" focusable="false" aria-hidden="true">
                                            <use xlink:href="static/img/general/sprite.svg#icon-whatsapp"></use>
                                        </svg>
                                    </span>
                                    </span>
                                    <span class="share__text">Whatsapp</span>
                                </a>
                            </li>
                            <li class="share__item">
                                <a href="https://t.me/share/url?url={{ url()->current() }}" class="share__link" target="_blank" rel="noindex nofollow">
                                    <span class="share__icon">
                                    <span class="icon icon--sizeMedium icon--colorBase">
                                        <svg class="icon__svg" focusable="false" aria-hidden="true">
                                            <use xlink:href="static/img/general/sprite.svg#icon-telegram"></use>
                                        </svg>
                                    </span>
                                    </span>
                                    <span class="share__text">Telegram</span>
                                </a>
                            </li>
                            <li class="share__item">
                                <a href="https://twitter.com/share?text={{ url()->current() }}" class="share__link" target="_blank" rel="noindex nofollow">
                                    <span class="share__icon">
                                    <span class="icon icon--sizeMedium icon--colorBase">
                                        <svg class="icon__svg" focusable="false" aria-hidden="true">
                                            <use xlink:href="static/img/general/sprite.svg#icon-twitter"></use>
                                        </svg>
                                    </span>
                                    </span>
                                    <span class="share__text">Twitter</span>
                                </a>
                            </li>
                            <li class="share__item">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="share__link" target="_blank" rel="noindex nofollow">
                                    <span class="share__icon">
                                    <span class="icon icon--sizeMedium icon--colorBase">
                                        <svg class="icon__svg" focusable="false" aria-hidden="true">
                                            <use xlink:href="static/img/general/sprite.svg#icon-facebook"></use>
                                        </svg>
                                    </span>
                                    </span>
                                    <span class="share__text">Facebook</span>
                                </a>
                            </li>
                            <li class="share__item">
                                <a href="#" class="share__link">
                                    <span class="share__icon">
                                    <span class="icon icon--sizeMedium icon--colorBase">
                                        <svg class="icon__svg" focusable="false" aria-hidden="true">
                                            <use xlink:href="static/img/general/sprite.svg#icon-copy-link"></use>
                                        </svg>
                                    </span>
                                    </span>
                                    <span data-clipboard="true" data-copied-text="{{__('messages.Copied!')}}" data-value="{{ url()->current() }}" class="share__text">{{__('messages.Скопировать ссылку')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal__footer">
                <div class="modal__footerContent">
                    <button type="button" class="button button--plain button--fullWidth" aria-label="{{__('messages.Закрыть модальное окно')}}" data-micromodal-close>
                        <span class="button__text">{{__('messages.Закрыть')}}</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal__backdrop" tabindex="-1" data-micromodal-close></div>
    </dialog>
    @endif
@if(!isset($exception))

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement":
                [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "item":
                            {
                                "@id": "https://{{ request()->getHost() }}",
                                "name": "{{ $settings->site_name }}"
                            }
                    }
                    @if (url('') != url()->current() && \Request::route()->getName() != 'author-page')
                    ,{
                        "@type": "ListItem",
                        "position": 2,
                        "item":
                            {
                                "@id": "https://{{ request()->getHost() }}/{{$page->slug}}",
                                "name": "{{ isset($page) ? $page->title : '' }}"
                            }
                    }
                    @elseif (url('') != url()->current() && \Request::route()->getName() == 'author-page')
                    ,{
                        "@type": "ListItem",
                        "position": 2,
                        "item":
                            {
                                "@id": "https://{{ request()->getHost() }}/{{$page->slug}}",
                                "name": "{{ $author->name }}"
                            }
                    }
                    @endif
                ]
        }
    </script>

    {{-- Article Schema --}}
    @if (isset($page) && $page->autor_id && $page->author->page($page->author->id) != null)
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "headline": "{{ $page->title }}",
            "datePublished": "{{ $page->created_at->format('d-m-Y') }}",
            "dateModified": "{{ $page->updated_at->format('d-m-Y') }}",
            "author":
            [
                {
                    "@type": "Person",
                    "name": "{{ $page->author->name }}",
                    "url": "{{ 'https://' . request()->getHost() . '/' . $page->author->page($page->author->id)->slug }}"
                }
            ],
            "publisher":
            [
                {
                    "@type": "Organization",
                    "name": "{{ $settings->site_name }}",
                    "url": "https://{{ request()->getHost() }}"
                }
            ]
          }
    </script>
    @endif
    {{-- Organization Schema --}}
    @if ($organization != null)
    @php
        $organization = json_decode($organization->data);
    @endphp

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{ $organization->name }}",
            "alternateName": "{{ $organization->alternateName }}",
            "description": "{{ $organization->description }}",
            "url": "{{ 'https://' . $domain->locale_name }}{{ $domain->path($domain->id, request()->path()) != null && $domain->path($domain->id, request()->path())->slug != '/' ? '/' . request()->path() : '' }}",
            "email": "{{ $organization->email }}",
            "legalName": "{{ $organization->legalName }}",
            "logo": "https://{{ request()->getHost() }}/storage/uploads/{{ $settings->getLogo->url }}",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "{{ $organization->address->addressCountry }}",
                "addressLocality": "{{ $organization->address->addressLocality }}",
                "addressRegion": "{{ $organization->address->addressRegion }}",
                "postalCode": "{{ $organization->address->postalCode }}",
                "streetAddress": "{{ $organization->address->streetAddress }}"
            },
            "sameAs": ["{{ $domain->getSocials($domain->id)->twitter }}",
                        "{{ $domain->getSocials($domain->id)->facebook }}",
                        "{{ $domain->getSocials($domain->id)->telegram }}",
                        "{{ $domain->getSocials($domain->id)->youtube }}",
                        "{{ $domain->getSocials($domain->id)->instagram }}"]
        }
    </script>
    @endif
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "{{ $settings->site_name }}",
            "url": "{{ request()->getHost() }}",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://{{ request()->getHost() }}/search?search={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
    @if (isset($page) && $page->getSchema($domain->id, $page->id, 'faqs') != null)
        {!! $page->getSchema($domain->id, $page->id, 'faqs')->data !!}
    @endif
    @if (isset($page) && $page->custom_schema)
        {!! $page->custom_schema !!}
    @endif
@endif
</body>
</html>
