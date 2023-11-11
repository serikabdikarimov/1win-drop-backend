<div class="footer__container">
    <div class="footer__main">
        <div class="footer__col">
            <div class="footer__content">
                <div class="footer__group">
                    <a href="/" class="logo" aria-label="{{ __('messages.Футер') }}" title="{{ $settings->getLogo->attr_title }}">
                        <img src="/storage/uploads/{{ $settings->getLogo->url }}" class="logo__img" alt="{{ $settings->getLogo->alt }}" width="159" height="41">
                    </a>
                    <p class="footer__text">{{__('messages.footer_text')}}</p>
                </div>
                <div class="footer__group">
                    @if ($domains->count() > 1)
                        <div class="footer__langSelector">
                            <button type="button" class="button lang-selector" aria-label="Смена языка" data-micromodal-trigger="modal-lang">
                                <span class="button__icon">
                                    <img src="/storage/uploads/{{ $settings->getLangIcon != null ? $settings->getLangIcon->url : '' }}" alt="{{ $settings->getLangIcon != null ? $settings->getLangIcon->alt : '' }}" alt="{{ $settings->getLangIcon ? $settings->getLangIcon->title : '' }}" width="24" height="24">
                            </span>
                                <span class="button__text">{{ $domain->locale_name }}</span>
                                <span class="button__icon">
                                <svg aria-hidden="true">
                                    <use xlink:href="/static/img/general/icon-angle-right.svg#icon-angle-right"></use>
                                </svg>
                            </span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if($menu)
        <div class="footer__col">
            <div class="footer__menuTitle">{{ __('messages.Меню') }}</div>
            <ul class="footer__menu">
                @foreach ($menu->items as $item)
                    @php
                        $url = $item->page_id != null ? $item->page->slug : $item->url;
                    @endphp
                    <li>
                        <a href="https://{{ request()->getHost() }}{{ $item->slug == '/' ? '' : '/'}}{{ $url }}" class="footer__menuLink">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="footer__col">
            <div class="footer__menuTitle">{{__('messages.Контакты')}}</div>
            <p class="footer__contacts">
                Email:
                <br><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
            </p>
            <ul class="social footer__social">
                @if (isset($domain->getSocials($domain->id)->telegram))
                    <li>
                        <a href="{{ $domain->getSocials($domain->id)->telegram }}" title="Telegram" class="social__link" rel="noindex nofollow" aria-label="Telegram" target="_blank">
                            <svg aria-hidden="true" class="social__icon">
                                <use xlink:href="/static/img/general/sprite.svg#icon-telegram"></use>
                            </svg>
                        </a>
                    </li>
                    @endif
                    @if (isset($domain->getSocials($domain->id)->facebook))
                    <li>
                        <a href="{{ $domain->getSocials($domain->id)->facebook }}" title="Facebook" class="social__link" rel="noindex nofollow" aria-label="Facebook" target="_blank">
                            <svg aria-hidden="true" class="social__icon">
                                <use xlink:href="/static/img/general/sprite.svg#icon-facebook"></use>
                            </svg>
                        </a>
                    </li>
                    @endif
                    @if (isset($domain->getSocials($domain->id)->youtube))
                    <li>
                        <a href="{{ $domain->getSocials($domain->id)->youtube }}" title="Youtube" class="social__link" rel="noindex nofollow" aria-label="Youtube" target="_blank">
                            <svg aria-hidden="true" class="social__icon">
                                <use xlink:href="/static/img/general/sprite.svg#icon-youtube"></use>
                            </svg>
                        </a>
                    </li>
                    @endif
                    @if (isset($domain->getSocials($domain->id)->twitter))
                    <li>
                        <a href="{{ $domain->getSocials($domain->id)->twitter }}" title="Twitter" class="social__link" rel="noindex nofollow" aria-label="Twitter" target="_blank">
                            <svg aria-hidden="true" class="social__icon">
                                <use xlink:href="/static/img/general/sprite.svg#icon-twitter"></use>
                            </svg>
                        </a>
                    </li>
                    @endif
                    @if (isset($domain->getSocials($domain->id)->instagram))
                    <li>
                        <a href="{{ $domain->getSocials($domain->id)->instagram }}" title="Instagram" class="social__link" rel="noindex nofollow" aria-label="Instagram" target="_blank">
                            <svg aria-hidden="true" class="social__icon">
                                <use xlink:href="/static/img/general/sprite.svg#icon-instagram"></use>
                            </svg>
                        </a>
                    </li>
                    @endif

            </ul>
        </div>
    </div>
    @if ($partners->count() > 0)
    <div class="footer__middle">
        <ul class="footer__partners">
            @foreach($partners as $item)
            <li>
                <a href="{{ $item->link }}" rel="noindex nofollow" target="_blank" title="{{ $item->getLogo->attr_title }}">
                <picture>
                    <img src="/storage/uploads/{{ $item->getLogo->url }}" width="171" height="60" rel="noindex nofollow" alt="{{ $item->getLogo->alt }}" loading="lazy" class="footer__partnersLogo">
                </picture>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="footer__bottom">
        <p class="footer__copyright">Copyright©{{ date('Y') }}, {{__('messages.copyright_text')}}</p>
    </div>
</div>
