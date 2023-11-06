@extends('frontend.layout.auth')

@section('content')


@if (isset($page) && $page->getSlider($page->id) && $page->getSlider($page->id)->getImage)
<!-- Entry Begin -->
    @include('frontend.components.entry', ['slide' => $page->getSlider($page->id), 'menu' => $page->getMenuCategory('meniu_na_slaidere')])
<!--/. Entry End -->
@endif

<!-- App Layout Begin -->
<div class="app__layout">
    <div class="app__layoutCol">
        <article class="card">
            <header class="card__header">
                @if (request('search') == null || empty(request('search')))
                    <h1 class="card__headerTitle">{{__('messages.Пожалуйста, уточните ваш запрос')}}</h1>
                @else
                    <h1 class="card__headerTitle">{{__('messages.Результаты поиска по запросу')}} «{{ request('search') }}»</h1>
                @endif
            </header>
            <div class="card__section">
                <div class="tabs">
                    <ul class="tabs__list">
                        <li class="tabs__item">
                            <button type="button" class="tabs__button tabs__button--active" data-tabs-button="tab2" role="tab" tabindex="0" aria-controls="tab2">{{__('messages.Страницы')}}</button>
                        </li>
                        <li class="tabs__item">
                            <button type="button" class="tabs__button " data-tabs-button="tab1" role="tab" tabindex="0" aria-controls="tab1">{{__('messages.Казино')}}</button>
                        </li>
                    </ul>
                    <div class="tabs__content">
                        <div id="tab2" class="tabs__pane">
                            <ul class="search-results">
                                @foreach($pages as $item)
                                <li class="search-results__item">
                                    <time class="search-results__date" datetime="{{ $item->updated_at }}">{{ $item->updated_at }}</time>
                                    <a href="https://{{ request()->getHost() }}{{ $item->slug == '/' ? '' : '/'}}{{ $item->slug }}" class="search-results__title">{{ $item->title }}</a>
                                    <div class="search-results__desc">
                                        {!! \Illuminate\Support\Str::limit($item->content, 200) !!}
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="tab1" class="tabs__pane">
                            <ul class="casino-list">
                                @foreach($brands as $brand)
                                @php
                                    $rating = round($brand->rating())
                                @endphp
                                
                                <li class="casino-list__item">
                                    <article class="casino">
                                        <div class="casino__imgContainer">
                                            @if ($brand->page($brand->id))
                                                <a href="/{{ $brand->page($brand->id)->slug }}" aria-label="{{ $brand->name }}">
                                            @endif
                                            <picture class="casino__img">
                                                <img src="/storage/uploads/{{ $brand->getLogo != null ? $brand->getLogo->url : ''}}" width="99" height="65" title="{{ $brand->getLogo != null ? $brand->getLogo->attr_title : ''}}" alt="{{ $brand->getLogo != null ? $brand->getLogo->alt : ''}}" loading="lazy">
                                            </picture>
                                            @if ($brand->page($brand->id))
                                                </a>
                                            @endif
                                            <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                                                @for ($i = 1; $i < 6; $i++)
                                                <li class="casino__rateItem @if ($rating >= $i) casino__rateItem--active @endif" role="presentation">
                                                    <svg aria-hidden="true" class="casino__rateIcon">
                                                        <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                                    </svg>
                                                </li>
                                            @endfor
                                            <li class="casino__rateItem" role="presentation">{{ $rating }}</li>
                                            </ul>
                                        </div>
                                        <header class="casino__header">
                                            @if ($brand->page($brand->id))
                                                <a href="/{{ $brand->page($brand->id)->slug }}" aria-label="{{ $brand->name }}">
                                                    <h3 class="casino__title">{{ $brand->name }}</h3>
                                                </a>
                                            @else
                                                <h3 class="casino__title">{{ $brand->name }}</h3>
                                            @endif
                                            <div class="casino__like">
                                                <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="{{ __('messages.Добавить в избранные')}}" data-brand-id="{{ $brand->id }}" data-liked="false">
                                                    <span class="button__icon">
                                                    <span class="icon icon--sizeMedium">
                                                        <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                                    </span>
                                                    </span>
                                                </button>
                                            </div>
                                        </header>
                                        @if ($brand->subtitle)
                                            <div class="casino__bonus">
                                                <svg aria-hidden="true">
                                                    <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                                                </svg>
                                                {{ $brand->subtitle }}
                                            </div>
                                        @endif
                                        <ul class="casino__features">
                                            @foreach (json_decode($brand->showcase) as $brandShowcase)
                                            @php
                                                $attributes = $brand->attributeWeb($brandShowcase, request()->getHost());
                                            @endphp
                                            <li class="casino__featuresItem" role="presentation">
                                                <div class="casino__featuresTitle">{{ $attributes['item'] }}</div>
                                                <div class="casino__featuresDesc">{{ $attributes['attr'] }}</div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="casino__actions">
                                            @if ($brand->url)
                                            <a href="{{ $brand->url }}" class="button button--primary" aria-label="{{ __('messages.Сайт')}}">
                                                <span class="class=button__text">{{ __('messages.Сайт')}}</span>
                                            </a>
                                            @endif
                                            @if ($brand->slug)
                                            <a href="/{{ $brand->slug }}" class="button button--plain" aria-label="{{ __('messages.Обзор')}}">
                                                <span class="class=button__text">{{ __('messages.Обзор')}}</span>
                                            </a>
                                            @endif
                                            @if ($brand->text_after_button)
                                            <p class="casino__actionsText">{{ $brand->text_after_button }}</p>
                                            @endif
                                        </div>
                                    </article>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </article>
    </div>
    <aside class="app__layoutCol">
        @include('frontend.components.subscribe')        
    </aside>
</div>
<!--/. App Layout End -->

@stop
