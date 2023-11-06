<!-- Breadcrumbs Begin -->
<div class="app__container">
    <ol class="breadcrumbs">
        <li class="breadcrumbs__item">
            <a href="/" class="breadcrumbs__link">{{ __('messages.Главная')}}</a>
        </li>
        @if (isset($page))
        <li class="breadcrumbs__item">
            <span class="breadcrumbs__link">{{ $page->currentMenu($page->id) == null ? $page->name : $page->currentMenu($page->id)->name}}</span>
        </li>
        @elseif (\Request::route()->getName() == 'author-page')
        <li class="breadcrumbs__item">
            <span class="breadcrumbs__link">{{ $author->name}}</span>
        </li>
        @elseif (\Request::route()->getName() == 'search')
        <li class="breadcrumbs__item">
            <span class="breadcrumbs__link">{{ __('messages.Результаты поиска по запросу') }} «{{ request('search')}}»</span>
        </li>
        @elseif (\Request::route()->getName() == 'profile.favorites' || \Request::route()->getName() == 'profile' || \Request::route()->getName() == 'profile.settings')
        <li class="breadcrumbs__item">
            <span class="breadcrumbs__link">{{ __('messages.Личный кабинет')}}</span>
        </li>
        @endif
    </ol>
    @if(request()->session()->has('success_edit'))
    <div id="alert" class="alert alert--statusSuccess alert--hasDismiss alert--withinPage" data-alert tabindex="0" role="status" aria-live="polite" aria-labelledby="bannerHeading_StatusSuccess">
        <div class="alert__ribbon">
            <span class="icon">
                <svg viewBox="0 0 20 20" class="icon__svg" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M0 10a10 10 0 1 0 20 0 10 10 0 0 0-20 0zm15.2-1.8a1 1 0 0 0-1.4-1.4l-4.8 4.8-2.3-2.3a1 1 0 0 0-1.4 1.4l3 3c.4.4 1 .4 1.4 0l5.5-5.5z"></path></svg>
            </span>
        </div>
        <div class="alert__contentWrapper">
            <div class="alert__heading" id="bannerHeading_StatusSuccess">
                <p class="quasar-text--headingMd">{{ __('messages.Данные успешно сохранены') }}</p>
            </div>
        </div>
        <div class="alert__dismiss">
            <button class="button button--plain button--iconOnly" type="button" data-alert-dismiss>
                <span class="button__content">
             <span class="button__icon">
                <span class="icon">
                    <svg viewBox="0 0 20 20" class="icon__svg" focusable="false" aria-hidden="true"><path d="M6.707 5.293a1 1 0 0 0-1.414 1.414l3.293 3.293-3.293 3.293a1 1 0 1 0 1.414 1.414l3.293-3.293 3.293 3.293a1 1 0 0 0 1.414-1.414l-3.293-3.293 3.293-3.293a1 1 0 0 0-1.414-1.414l-3.293 3.293-3.293-3.293Z"></path></svg>
                </span>
                </span>
                </span>
            </button>
        </div>
    </div>
    @endif
    
</div>
<!--/. Breadcrumbs End -->