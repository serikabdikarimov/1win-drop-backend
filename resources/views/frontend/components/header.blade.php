<div class="header__container">
    <a href="/" class="logo" title="{{ $settings->getLogo->attr_title }}">
        <img src="/storage/uploads/{{ $settings->getLogo->url }}" width="{{ $settings->getLogo->width ? $settings->getLogo->width : '142' }}" height="{{ $settings->getLogo->height ? $settings->getLogo->height : '52' }}" class="logo__img" alt="{{ $settings->getLogo->alt }}">
        <span class="logo__title">{{ $domain->region_name }}</span>
    </a>
    @if($menu)
    <nav class="navigation" aria-label="{{ __('messages.Основное меню') }}">
        <ul class="navigation__list">
            @foreach ($menu->items as $item)
                <li class="navigation__item {{ $item->children->count() > 0 ? 'popover' : ''}}">
                    @if ($item->children->count() > 0)
                    <button type="button" class="navigation__link" data-popper-toggle="dropdown" data-popper-placement="bottom" aria-haspopup="true" aria-expanded="false">{{ $item->name }}</button>
                    <div class="popover__menu" data-popper-show="false">
                        <div class="popover__wrapper">
                            <div class="popover__content popover__content--sizeMedium">
                                <div class="popover__pane scrollable scrollable--vertical" data-scrollable="true">
                                    <div class="actionList">
                                        <ul class="actionList__actions" tabindex="-1">
                                            @foreach($item->children as $child)
                                            <li role="presentation">
                                                <a href="https://{{ request()->getHost() }}{{ $item->slug == '/' ? '' : '/'}}{{ $child->page_id != null ? $child->page->slug : $child->url }}" class="actionList__item" role="menuitem">
                                                    <span class="actionList__text">{{ $child->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @php
                        $url = $item->page_id != null ? $item->page->slug : $item->url;
                    @endphp
                    <a href="https://{{ request()->getHost() }}{{ $item->slug == '/' ? '' : '/'}}{{ $url }}" class="navigation__link {{ $url == $slug ? 'navigation__link--active' : ''}}" {{ $url == $slug ? 'aria-current="page"' : ''}}>{{ $item->name }}</a>
                    @endif
                </li>
            @endforeach
            {{--<li class="navigation__item popover">
                <button type="button" class="navigation__link" data-popper-toggle="dropdown" data-popper-placement="bottom" aria-haspopup="true" aria-expanded="false">{{ __('messages.More') }}</button>
                <div class="popover__menu" data-popper-show="false">
                    <div class="popover__wrapper">
                        <div class="popover__content popover__content--sizeMedium">
                            <div class="popover__pane scrollable scrollable--vertical" data-scrollable="true">
                                <div class="actionList">
                                    <ul class="actionList__actions" role="menu" tabindex="-1">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            --}}
        </ul>
        <button type="button" class="button button--iconOnly burger" aria-expanded="false" data-mobile-menu-toggle>
            <span class="burger__line"></span>
        </button>
    </nav>
    @endif
    @if ($domains->count() > 1 || isset($design_settings) && $design_settings->play_link)
    <ul class="header__right">
        @if ($domains->count() > 1)
        <li class="header__rightItem">
            <button type="button" class="lang-selector" data-micromodal-trigger="modal-lang">
                <span class="visuallyHidden">{{ __('messages.Выбор языка страницы') }}</span>
                <img class="lang-selector__icon" src="/storage/uploads/{{ $settings->getLangIcon->url }}" width="24" height="24" title="{{ $settings->getLangIcon->title }}" alt="{{ $settings->getLangIcon->alt }}">
                <span class="lang-selector__text">{{ $domain->locale_name }}</span>
            </button>
        </li>
        @endif
        @if($design_settings->play_link)
        <li class="header__rightItem">
            <a href="{{ $design_settings->play_link }}" class="button button--primary" rel="nofollow noindex">
                <span class="button__content">
               <span class="button__text">{{ $design_settings->play_val }}<br></span>
                </span>
            </a>
        </li>
        @endif
    </ul>
    @endif
    @if($menu)
    <button type="button" class="button button--iconOnly burger" aria-expanded="false" data-mobile-menu-toggle="">
        <span class="burger__line"></span>
    </button>
    @endif
</div>
