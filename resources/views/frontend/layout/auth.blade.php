<!doctype html>
<html lang="{{ $domain->code }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if (request()->route()->getName() == 'search')
        <title>{{__('messages.Результаты поиска по запросу')}} «{{ request('search') }}»</title>
    @else
        <title>{{ isset($settings->meta_title) ? $settings->meta_title : $settings->site_name }}</title>
    @endif
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (request()->getHost() == env('ADMIN_DOMAIN') || request()->route()->getName() == 'search')
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
    <meta name="revisit-after" content="7 days">

    <!-- Favicons -->
    <link rel="icon" href="/favicon.ico" sizes="any">
    <!-- 32×32 -->
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
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
    <meta property="og:image" content="{{ request()->getSchemeAndHttpHost()}}/static/img/general/logo.svg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="{{ isset($page) && $page->meta_description != null ? $page->meta_description : $settings->meta_description }}">
    {{-- twitter tags --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ isset($page) && $page->meta_title != null ? $page->meta_title : $settings->meta_title }}">
    <meta name="twitter:description" content="{{ isset($page) && $page->meta_description != null ? $page->meta_description : $settings->meta_description }}">
    <meta name="twitter:image" content="{{ request()->getSchemeAndHttpHost() }}/static/img/general/logo.svg">
    <meta name="twitter:url" content="{{ url()->current() }}" />

    @if (isset($page) && isset($page->autor_id))
    <meta property="article:published_time" content="{{ $page->created_at }}" />
    <meta property="article:modified_time" content="{{ $page->updated_at }}" />
    <meta property="article:publisher" content="{{ request()->getSchemeAndHttpHost() }}/{{ $page->author->page($page->author->id)->slug }}" />
    <meta property="article:author" content="{{ request()->getSchemeAndHttpHost() }}/{{ $page->author->page($page->author->id)->slug }}" />
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no">
    <!-- This make sence for mobile browsers. It means, that content has been optimized for mobile browsers -->
    <meta name="HandheldFriendly" content="true">

    <!-- Stylesheet -->
    <link href="/static/css/main.min.css?v={{mt_rand(1, 100)}}" rel="stylesheet">

    <!-- Xml -->
    <link href='/sitemap.xml' rel='alternate' title='Sitemap' type='application/rss+xml'/>
    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}"/>
    @foreach ($domains as $domain)
        @if (request()->route()->getName() == 'search')
            <link rel="alternate" href="{{ 'https://' . $domain->domain_name . '/search' }}" hreflang="{{ $domain->code }}" />
        @else
            <link rel="alternate" href="{{ 'https://' . $domain->domain_name }}{{ $domain->path($domain->id, request()->path()) != null ? '/' . request()->path() : '' }}" hreflang="{{ $domain->code }}" />
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
                @if(!isset($exception)) {{-- Убираем хлебные урошки на 404 и тд --}}
                    @if (url()->current() != request()->getSchemeAndHttpHost())
                        @include('frontend.components.breadcrumbs')
                    @endif
                @endif
                @yield('content')
            </main>
            <!--/. App Main End -->
            @if(!isset($exception)) {{-- Убираем footer --}}
                <!-- Footer Begin -->
                <footer class="footer">
                    @include('frontend.components.footer', ['menu' => $domain->getMenuCategory('futer')])
                </footer>
            @endif
            <div class="app__backdrop"></div>
        </div>
        <!--/. App Wrapper End -->

    </div>
    <!--/. App End -->
    
    <!-- CONTENT ENDS HERE -->

    <!-- Main scripts. You can replace it, but I recommend you to leave it here -->
    <script type="module" src="/static/js/main.min.js?v={{mt_rand(1, 100)}}"></script>
    <script src="/static/js/separate-js/scripts.js?v=0.{{mt_rand(1, 100)}}"></script>
    <div id="casinoToast" class="toast">
        <div class="toast__icon">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 6a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5a.75.75 0 0 1 .75-.75Z" fill="#6B2DFF" />
                <path d="M11 13a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" fill="#6B2DFF" />
                <path fill-rule="evenodd" d="M11.237 3.177a1.75 1.75 0 0 0-2.474 0l-5.586 5.585a1.75 1.75 0 0 0 0 2.475l5.586 5.586a1.75 1.75 0 0 0 2.474 0l5.586-5.586a1.75 1.75 0 0 0 0-2.475l-5.586-5.585Zm-1.414 1.06a.25.25 0 0 1 .354 0l5.586 5.586a.25.25 0 0 1 0 .354l-5.586 5.585a.25.25 0 0 1-.354 0l-5.586-5.585a.25.25 0 0 1 0-.354l5.586-5.586Z"
                fill="#6B2DFF" />
            </svg>
        </div>
        <div class="toast__text">
            {{__('messages.Чтобы добавить в избранное нужно зарегистрироваться')}}!
        </div>
    </div>
    <dialog class="mobile-menu">
        <div class="mobile-menu__wrapper">
            @auth
                <a href="/profile" class="user-link">
                    <div class="user-link__avatar">
                        @if (auth()->user()->getAvatar != null)
                            <img src="/storage/uploads/{{ auth()->user()->getAvatar->url }}" class="user-link__avatarPic" alt="">
                        @else
                            <svg width="44" height="44" class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-profile.svg#icon-user"></use></svg>
                        @endif
                    </div>
                    <div class="user-link__name">{{ auth()->user()->name }}</div>
                    <span class="icon icon--sizeMedium icon--colorSubdued">
                    <svg class="icon__svg" aria-hidden="true">
                        <use xlink:href="static/img/general/sprite.svg#icon-angle-right"></use>
                    </svg>
                </span>
                </a>
            @endauth
            @guest
                <div class="buttonGroup buttonGroup--stretched">
                    <div class="buttonGroup__item">
                        <a href="/register" class="button button--primary" aria-label="{{ __('messages.Регистрация нового пользователя') }}">
                            <span class="button__text">{{ __('messages.Регистрация') }}</span>
                        </a>
                    </div>
                    <div class="buttonGroup__item">
                        <a href="/login" class="button button--plain" aria-label="{{ __('messages.Войти в личный кабинет') }}">
                            <span class="button__text">{{ __('messages.Войти') }}</span>
                        </a>
                    </div>
                </div>
            @endguest
            <form class="search mobile-menu__search" action="/search" method="get" role="search">
                <div class="label label--hidden">
                    <label id="mobileSearchLabel" for="search_mobile" class="label__text">{{ __('messages.Подписка на рассылку')}}</label>
                </div>
                <div class="textField">
                    <input id="search_mobile" name="search" class="textField__input textField__input--hasClearButton" placeholder="{{ __('messages.Поиск') }}" type="text" autocomplete="off" aria-invalid="false" aria-labelledby="mobileSearchLabel">
                    <button type="button" class="textField__clearButton" aria-label="{{ __('messages.Очистить поиск') }}" data-clear-button>
                        <span class="visuallyHidden">{{ __('messages.Очистить') }}</span>
                        <span class="icon icon--colorBase">
                        <svg viewBox="0 0 20 20" class="icon__svg" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm-2.293 4.293a1 1 0 0 0-1.414 1.414l2.293 2.293-2.293 2.293a1 1 0 1 0 1.414 1.414l2.293-2.293 2.293 2.293a1 1 0 1 0 1.414-1.414l-2.293-2.293 2.293-2.293a1 1 0 0 0-1.414-1.414l-2.293 2.293-2.293-2.293z"></path></svg>
                    </span>
                    </button>
                    <div class="textField__suffix">
                        <button type="submit" class="button button--primary button--iconOnly search__button" aria-label="{{ __('messages.Поиск') }}">
                            <span class="button__icon">
                            <span class="icon icon--sizeMedium">
                                <svg class="icon__svg" aria-hidden="true">
                                    <use xlink:href="/static/img/general/icon-search.svg#icon-search"></use>
                                </svg>
                            </span>
                            </span>
                        </button>
                    </div>
                    <div class="textField__backdrop"></div>
                </div>
            </form>
            
            <div class="mobile-menu__menuContainer scrollable scrollable--vertical" data-scrollable="true">
                <ul class="mobile-menu__menu" data-accordion>
                    @foreach($domain->getMenuCategory('osnovnoe_meniu')->items as $item)
                        <li class="mobile-menu__item">
                            @if ($item->children->count() > 0)
                            <button id="mob-menu-header-1" type="button" class="mobile-menu__toggle" aria-label="{{ $item->name }}" aria-expanded="false" aria-controls="mob-menu-panel-1" data-accordion-trigger>
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
            </div>
            @if ($domains->count() > 1)
            <div class="mobile-menu__bottom">
                <button type="button" class="button lang-selector" aria-label="Смена языка" data-micromodal-trigger="modal-lang">
                    <span class="button__icon">
                        <img src="/storage/uploads/{{ $domain->getIcon->url }}" alt="{{ $domain->getIcon->getAlt($domain->getIcon->url, $domain->id) }}" width="24" height="24">
                    </span>
                    <span class="button__text">{{ $domain->domain_name }}</span>
                    <span class="button__icon">
                    <svg aria-hidden="true">
                        <use xlink:href="/static/img/general/icon-angle-down.svg#icon-angle-down"></use>
                    </svg>
                </span>
                </button>
            </div>
            @endif
        </div>
    </dialog>
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
                                                    <img src="/storage/uploads/{{ $item->getIcon->url }}" alt="{{ $item->getIcon->getAlt($item->getIcon->url, $domain->id) }}" width="24" height="24">
                                                </span>
                                                <span class="actionList__text">{{ $item->domain_name }}</span>
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
    <!-- Search Dialog Begin -->
    <dialog class="search-dialog">
        <form class="search-dialog__body" action="/search" method="get" role="search">
            <div class="search">
                <div class="label label--hidden">
                    <label id="searchLabel" for="search" class="label__text">{{ __('messages.Подписка на рассылку')}}</label>
                </div>
                <div class="textField">
                    <input id="search" name="search" class="textField__input textField__input--hasClearButton" placeholder="{{ __('messages.Поиск') }}" type="text" autocomplete="off" aria-invalid="false" aria-labelledby="searchLabel">
                    <button type="button" class="textField__clearButton" aria-label="{{ __('messages.Очистить поиск') }}" data-clear-button>
                        <span class="visuallyHidden">{{ __('messages.Очистить') }}</span>
                        <span class="icon icon--colorBase">
                        <svg viewBox="0 0 20 20" class="icon__svg" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm-2.293 4.293a1 1 0 0 0-1.414 1.414l2.293 2.293-2.293 2.293a1 1 0 1 0 1.414 1.414l2.293-2.293 2.293 2.293a1 1 0 1 0 1.414-1.414l-2.293-2.293 2.293-2.293a1 1 0 0 0-1.414-1.414l-2.293 2.293-2.293-2.293z"></path></svg>
                    </span>
                    </button>
                    <div class="textField__suffix">
                        <button type="submit" class="button button--primary button--iconOnly search__button" aria-label="{{ __('messages.Поиск') }}">
                            <span class="button__icon">
                            <span class="icon icon--sizeMedium">
                                <svg class="icon__svg" aria-hidden="true">
                                    <use xlink:href="/static/img/general/icon-search.svg#icon-search"></use>
                                </svg>
                            </span>
                            </span>
                        </button>
                    </div>
                    <div class="textField__backdrop"></div>
                </div>
            </div>
            <button type="button" class="button button--iconOnly search-dialog__close" aria-label="{{ __('messages.Закрыть') }}" data-search-close>
                <span class="button__icon">
                <span class="icon icon--sizeLarge icon--colorSubdued">
                    <svg class="icon__svg" aria-hidden="true">
                        <use xlink:href="/static/img/general/icon-close.svg#icon-close"></use>
                    </svg>
                </span>
                </span>
            </button>
        </form>
        <div class="search-dialog__backdrop" data-search-close></div>
    </dialog>

    <!-- Modal Success Begin -->
    <dialog class="modal modal--footerHidden modal--slide" id="modal-success" aria-hidden="true">
        <div class="modal__dialog" role="dialog" aria-labelledby="modal-success-header">
            <div class="modal__header text--center">
                <img src="/static/img/general/success-email.svg" class="modal__headerImg" width="90" height="90" alt="">
                <h2 id="modal-success-header" class="modal__headerTitle">{{ __('messages.Подписка оформлена') }}</h2>
                <button type="button" class="modal__closeButton" aria-label="{{ __('messages.Закрыть') }}" data-micromodal-close>
                    <span class="icon icon--sizeMedium icon--applyColor">
                    <svg class="icon__svg" focusable="false" aria-hidden="true">
                        <use xlink:href="/static/img/general/icon-close.svg#icon-close"></use>
                    </svg>
                </span>
                </button>
            </div>
            <div class="modal__bodyWrapper">
                <div class="modal__body">
                    <div class="modal__section text--center">
                        <p>{{ __('messages.Спасибо! Совсем скоро вы получите первое полезное письмо.') }}</p>
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
    <!--/. Modal Success End -->
</body>
</html>
