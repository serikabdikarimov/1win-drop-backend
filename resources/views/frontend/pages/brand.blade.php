@extends('frontend.layout.app')

@section('content')

@if ($page->getSlider($page->id) && $page->getSlider($page->id)->getImage)
<!-- Entry Begin -->
    @include('frontend.components.entry', ['slide' => $page->getSlider($page->id), 'menu' => $page->getMenuCategory('meniu_na_slaidere')])
<!--/. Entry End -->
@endif
@php
    //$brand = $page->getBrandInWiew((int) $page->type_content_id, request()->getHost());
    $brand = $page->brand;
@endphp
<!-- App Layout Begin -->
<div class="app__layout">
    <div class="app__layoutCol app__layoutCol--fill">
        <div class="card">
            <div class="card__section">
                <article class="brand">
                    <div class="brand__imgContainer">
                        <picture>
                            <img src="/storage/uploads/{{ $brand->getLogo->url }}" class="brand__img" width="120" height="120" alt="{{ $brand->getLogo->alt }}" title="{{ $brand->getLogo->title }}" loading="lazy">
                        </picture>
                    </div>
                    <div class="brand__content">
                        <header class="brand__header">
                            <h1 class="brand__title">{{ $brand->name }}</h1>
                        </header>
                        <ul class="brand__rate" aria-label="{{__('messages.Рейтинг')}} {{ $brand->name }}">
                            @for($i=1; $i <= 5; $i++)
                            <li class="brand__rateItem {{ $i <= round($brand->rating()) ? 'brand__rateItem--active' : '' }}" role="presentation">
                                <svg aria-hidden="true" class="brand__rateIcon">
                                    <use xlink:href="static/img/general/sprite.svg#icon-star"></use>
                                </svg>
                            </li>
                            @endfor
                            
                            <li class="brand__rateItem" role="presentation">{{ round($brand->rating()) }}</li>
                        </ul>
                        <p class="brand__desc">{{ $brand->short_description }}</p>
                    </div>
                    <div class="brand__actions">
                        <div class="brand__secondaryActions">
                            <div class="brand__secondaryActionsItem">
                                <button type="button" @guest data-like-button @endguest class="button button--iconOnly button--plain @auth add_to_favorites @endauth" aria-label="{{__('messages.Добавить в избранные')}}" data-brand-id="{{ $brand->id }}" @auth data-liked="{{ $brand->userFavorite($brand->id) != null ? 'true' : 'false' }}" @endauth>
                                    <span class="button__icon">
                                    <span class="icon icon--sizeMedium icon--colorSubdued">
                                        <svg class="icon__svg" aria-hidden="true"><use xlink:href="static/img/general/sprite.svg#icon-heart"></use></svg>
                                    </span>
                                    </span>
                                </button>
                            </div>
                            <div class="brand__secondaryActionsItem">
                                <button type="button" class="button button--iconOnly button--plain" data-micromodal-trigger="modal-share" aria-label="{{__('messages.Поделиться')}}">
                                    <span class="button__icon">
                                    <span class="icon icon--sizeMedium icon--colorSubdued">
                                        <svg class="icon__svg" aria-hidden="true">
                                            <use xlink:href="static/img/general/sprite.svg#icon-share"></use>
                                        </svg>
                                    </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <a href="{{ $brand->url }}" class="button button--primary" aria-label="{{__('messages.Перейти на сайт')}}">
                            <span class="button__text">{{__('messages.Сайт')}}</span>
                        </a>
                        @if ($brand->promocode)
                        <button type="button" data-clipboard="true" data-copied-text="{{__('messages.Copied!')}}" data-value="{{ $brand->promocode }}" class="button button--outline button--distributionCenter" aria-label="{{__('messages.Обзор')}}">
                            <span class="button__text">{{ $brand->promocode }}</span>
                            <span class="button__icon">
                            <span class="icon icon--sizeSmall icon--colorSubdued">
                                <svg class="icon__svg" aria-hidden="true">
                                    <use xlink:href="static/img/general/icon-copy-clipboard.svg#icon-copy-clipboard"></use>
                                </svg>
                            </span>
                            </span>
                        </button>
                        @endif
                        @if ($brand->promocode_text)
                        <p class="brand__bonus">
                            <svg aria-hidden="true">
                                <use xlink:href="static/img/general/sprite.svg#icon-fire"></use>
                            </svg>
                            {{ $brand->promocode_text }}
                        </p>
                        @endif
                    </div>
                </article>
            </div>
        </div>
    </div>
    <section class="app__layoutCol">
        <section class="card">
            <div class="card__header">
                <h2 class="card__headerTitle">{{__('messages.Основная информация')}}</h2>
            </div>
            <div class="card__section">
                <div class="card__table card__table--stripped">
                    <table>
                        <tbody>
                            @foreach (json_decode($brand->sidebar) as $item)
                                @if($brand->checkAttr($item->attribute_id, $domain->id))
                                    @php
                                        $sidebarAttr = $brand->checkAttr($item->attribute_id, $domain->id)
                                    @endphp
                                    @if (isset($item->attribute_item_id))
                                    <tr>
                                        <td>{{ $sidebarAttr->getTitle($item->attribute_id, $domain->id)->title }}:</td>
                                        <td>
                                            @foreach ($item->attribute_item_id as $attrItem)
                                                @if ($sidebarAttr->getItem($attrItem, $domain->id) != null)
                                                @if ($sidebarAttr->getItem($attrItem, $domain->id)->icon == null)
                                                    <span class="badge">{{ $sidebarAttr->getItem($attrItem, $domain->id)->getTitle($attrItem, $domain->id)->title }}</span>
                                                @else
                                                    <img src="/storage/uploads/{{ $sidebarAttr->getItem($attrItem, $domain->id)->getIcon($attrItem->slug, $domain->id)->url }}" alt="">
                                                @endif
                                                @endif
                                            @endforeach
                                            @if (isset($item->comment))
                                                <span class="badge badge--statusPrimary">{{ $item->comment }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td>{{ $item->attribute_id }}:</td>
                                        <td>{{ $item->attribute_item_id }}</td>
                                    </tr>
                                @endif
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="card">
            <div class="card__header">
                <h2 class="card__headerTitle">{{__('messages.Рейтинг')}}</h2>
            </div>
            
            <div class="card__section">
                <div class="card__table card__table--stripped">
                    <table>
                        <tbody>
                            @foreach (json_decode($brand->rating) as $item)
                                <tr>
                                    <td>{{ $item->attribute_id }}:</td>
                                    <td>
                                        <ul class="rate" aria-label="{{__('messages.Рейтинг')}} {{ $brand->name }}">
                                            @for ($i=1; $i <6; $i++)
                                                <li class="rate__item {{ $i<= $item->attribute_item_id ? 'rate__item--active' : ''}}" role="presentation">
                                                    <svg aria-hidden="true" class="rate__icon">
                                                        <use xlink:href="static/img/general/sprite.svg#icon-star"></use>
                                                    </svg>
                                                </li>
                                            @endfor
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <article class="card">
            <header class="card__header">
                @if ($page->banner != null)
                <picture>
                    <img src="/storage/uploads/{{ $page->getBanner->url }}" alt="{{ $page->getBanner->alt }}" title="{{ $page->getBanner->attr_title }}" class="card__img" loading="lazy" width="688" height="270">
                </picture>
                @endif
                <h2 class="card__headerTitle">{{ $page->title }}</h2>
            </header>
            @if ($page->showcase)
                {{--<section class="card"> --}}
                    <div class="showcase-blocks">
                    <div class="card__section">
                        <ul class="casino-list">
                            @foreach(json_decode($page->showcase) as $key=>$item)
                            @php
                                $brand = $page->getBrandInWiew($item, request()->getHost());
                                $rating = round($brand->rating())
                            @endphp
                            {{-- @if ($key < 3 && count($blocks->showcase) > 1) casino-list__item--compact @endif --}}
                            <li class="casino-list__item">
                                <article class="casino">
                                    <div class="casino__imgContainer">
                                        @if ($brand->page($brand->id))
                                            <a href="/{{ $brand->page($brand->id)->slug }}" aria-label="{{ $brand->name }}">
                                        @endif
                                        <picture class="casino__img">
                                            <img src="/storage/uploads/{{ $brand->getLogo != null ? $brand->getLogo->url : ''}}" width="214" height="155" title="{{ $brand->getLogo != null ? $brand->getLogo->attr_title : ''}}" alt="{{ $brand->getLogo != null ? $brand->getLogo->alt : ''}}" loading="lazy">
                                        </picture>
                                        @if ($brand->page($brand->id))
                                            </a>
                                        @endif
                                        
                                    </div>
                                    <header class="casino__header">
                                        @if ($brand->page($brand->id))
                                            <a href="/{{ $brand->page($brand->id)->slug }}" aria-label="{{ $brand->name }}">
                                                <h3 class="casino__title">{{ $brand->name }}</h3>
                                            </a>
                                        @else
                                            <h3 class="casino__title">{{ $brand->name }}</h3>
                                        @endif
                                        @if (count(json_decode($page->showcase)) > 1)
                                        <div class="casino__place">
                                            <span data-place="{{ $key+1 }}">{{ __('messages.место') }}</span>
                                        </div>
                                        @endif
                                        <div class="casino__like">
                                            <button type="button" @guest data-like-button @endguest class="button button--sizeExtraSlim button--iconOnly @auth add_to_favorites @endauth" aria-label="{{ __('messages.Добавить в избранные') }}" data-brand-id="{{ $brand->id }}" @auth data-liked="{{ $brand->userFavorite($brand->id) != null ? 'true' : 'false' }}" @endauth>
                                                <span class="button__icon">
                                                <span class="icon icon--sizeMedium">
                                                    <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                                </span>
                                                </span>
                                            </button>
                                        </div>
                                    </header>
                                    <ul class="casino__rate" aria-label="{{__('messages.Рейтинг')}} {{ $brand->name }}">
                                        @for ($i = 1; $i < 6; $i++)
                                        <li class="casino__rateItem @if ($rating >= $i) casino__rateItem--active @endif" role="presentation">
                                            <svg aria-hidden="true" class="casino__rateIcon">
                                                <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                            </svg>
                                        </li>
                                    @endfor
                                    <li class="casino__rateItem" role="presentation">{{ round($rating) }}</li>
                                    </ul>
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
                                        @if ($brand->page($brand->id))
                                        <a href="/{{ $brand->page($brand->id)->slug }}" class="button button--plain" aria-label="{{ __('messages.Обзор')}}">
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
                    @if (count(json_decode($page->showcase)) > 1)
                    {{--<div class="card__section">
                        <div class="text--center">
                            <button type="button" class="button button--plain" aria-label="Показать ещё">
                                <span class="class=button__text">{{ __('messages.Показать ещё') }}</span>
                            </button>
                        </div>
                    </div>--}}
                    @endif
                </div>
                {{-- </section> --}}
            @endif
            <div class="card__section card__section--spacingTight">
                <div class="card__body">
                    {!! $page->content !!}
                </div>
            </div>
        </article>

        @if ($page->add_content != "null" && $page->add_content != null)
            @foreach (json_decode($page->add_content) as $index=>$blocks)
                @if (key($blocks) == 'showcase')
                    <section class="card">
                        <div class="card__section">
                            <ul class="casino-list">
                                @foreach($blocks->showcase as $key=>$item)
                                @php
                                    //$brand = $page->getBrandInWiew($item, request()->getHost());
                                    $brand = $page->brand;
                                    $rating = round($brand->rating())
                                @endphp
                                {{-- @if ($key < 3 && count($blocks->showcase) > 1) casino-list__item--compact @endif --}}
                                <li class="casino-list__item">
                                    <article class="casino">
                                        <div class="casino__imgContainer">
                                            @if ($brand->page($brand->id))
                                                <a href="/{{ $brand->page($brand->id)->slug }}" aria-label="{{ $brand->name }}">
                                            @endif
                                                <picture class="casino__img">
                                                    <img src="/storage/uploads/{{ $brand->getLogo != null ? $brand->getLogo->url : ''}}" width="214" height="155" title="{{ $brand->getLogo != null ? $brand->getLogo->attr_title : ''}}" alt="{{ $brand->getLogo != null ? $brand->getLogo->alt : ''}}" loading="lazy">
                                                </picture>
                                            @if ($brand->page($brand->id))
                                                </a>
                                            @endif
                                            
                                        </div>
                                        <header class="casino__header">
                                            @if ($brand->page($brand->id))
                                                <a href="/{{ $brand->page($brand->id)->slug }}" aria-label="{{ $brand->name }}">
                                                    <h3 class="casino__title">{{ $brand->name }}</h3>
                                                </a>
                                            @else
                                                <h3 class="casino__title">{{ $brand->name }}</h3>
                                            @endif
                                            @if (count($blocks->showcase) > 1)
                                            <div class="casino__place">
                                                <span data-place="{{ $key+1 }}">{{ __('messages.место') }}</span>
                                            </div>
                                            @endif
                                            <div class="casino__like">
                                                <button type="button" @guest data-like-button @endguest class="button button--sizeExtraSlim button--iconOnly @auth add_to_favorites @endauth" aria-label="{{ __('messages.Добавить в избранные') }}" data-brand-id="{{ $brand->id }}" @auth data-liked="{{ $brand->userFavorite($brand->id) != null ? 'true' : 'false' }}" @endauth>
                                                    <span class="button__icon">
                                                    <span class="icon icon--sizeMedium">
                                                        <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                                    </span>
                                                    </span>
                                                </button>    
                                            </div>
                                        </header>
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
                                        <div class="casino__bonus">
                                            <svg aria-hidden="true">
                                                <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                                            </svg>
                                            {{ $brand->subtitle }}
                                        </div>
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
                                            @if ($brand->page($brand->id))
                                            <a href="/{{ $brand->page($brand->id)->slug }}" class="button button--plain" aria-label="{{ __('messages.Обзор')}}">
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
                        @if (count($blocks->showcase) > 6)
                        <div class="card__section">
                            <div class="text--center">
                                <button type="button" class="button button--plain" aria-label="{{ __('messages.Показать ещё') }}">
                                    <span class="class=button__text">{{ __('messages.Показать ещё') }}</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </section>
                @elseif (key($blocks) == 'block')

                    <article class="card">
                        <div class="card__header">
                            <h2 class="card__headerTitle">{{ $blocks->block->title }}</h2>
                        </div>
                        <div class="card__section">
                            <div class="card__body">
                                {!! $blocks->block->content !!}
                            </div>
                        </div>
                    </article>
                @elseif (key($blocks) == 'faqs') 
                    @php
                        $faqs = (array)$blocks;
                    @endphp
                    <section class="card">
                        <div class="card__section">
                            @foreach($blocks as $question)
                            <div class="card__body">
                                <h2>{{ $question->faqs_title }}</h2>
                            </div>
                            <ul class="faq" data-accordion>
                                @foreach($question->question as $key=>$item)
                                    <li class="faq__item">
                                        <button id="faq-header-{{$key}}" type="button" class="faq__toggle" aria-label="{{ $item }}" aria-expanded="false" aria-controls="faq-panel-{{$key}}" data-accordion-trigger>
                                            <span class="faq__title">{{ $item }}</span>
                                            <span class="faq__icon">
                                            <svg aria-hidden="true">
                                                <use xlink:href="/static/img/general/sprites/accordion-sprite.svg#arrow-default"></use>
                                            </svg>
                                        </span>
                                        </button>
                                        <div id="faq-panel-{{$key}}" class="faq__body" aria-labelledby="faq-header-{{$key}}" data-accordion-body aria-hidden="true">
                                            <p>{{ $question->answer[$key] }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @endforeach
                        </div>
                    </section>
                @elseif (key($blocks) == 'reviews')
                    <section class="card">
                        <div class="card__header card__header--hasMetaData">
                            @if ($blocks->reviews->subtitle != null)
                            <h4 class="card__subheading">{{ $blocks->reviews->short_description }}</h4>
                            @endif
                            <h2 class="card__headerTitle">{{ $blocks->reviews->title }}</h2>
                            <span class="card__headerMeta">{{ $brand->reviews->count() }}</span>
                        </div>
                        @if ($blocks->reviews->short_description != null)
                        <div class="card__section card__section--spacingTight">
                            <div class="card__body">
                                <p>{{ $blocks->reviews->short_description }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="card__section">
                            <div class="reviews">
                                @auth
                                    <form action="/send-review/{{ $brand->id }}" class="reviewsForm" method="POST">
                                        {{ csrf_field() }}
                                        <div class="reviewsForm__avatar">
                                            <picture>
                                                <img src="static/img/content/placeholder.svg" width="48" height="48" alt="Логотип Казино" loading="lazy">
                                            </picture>
                                        </div>
                                        <div class="reviewsForm__top">
                                            <fieldset class="reviewsForm__rate">
                                                <legend>{{__('messages.Ваша оценка')}}:</legend>
                                                <div class="reviewsForm__rateList">
                                                    <input class="reviewsForm__input" checked type="radio" name="vote" value="1" id="rating-1" />
                                                    <label class="reviewsForm__label" for="rating-1" aria-label="One"></label>
                                                    <input class="reviewsForm__input" type="radio" name="vote" value="2" id="rating-2" />
                                                    <label class="reviewsForm__label" for="rating-2" aria-label="Two"></label>
                                                    <input class="reviewsForm__input" type="radio" name="vote" value="3" id="rating-3" />
                                                    <label class="reviewsForm__label" for="rating-3" aria-label="Three"></label>
                                                    <input class="reviewsForm__input" type="radio" name="vote" value="4" id="rating-4" />
                                                    <label class="reviewsForm__label" for="rating-4" aria-label="Four"></label>
                                                    <input class="reviewsForm__input" type="radio" name="vote" value="5" id="rating-5" />
                                                    <label class="reviewsForm__label" for="rating-5" aria-label="Five"></label>
                                                </div>
                                            </fieldset>
                                            <span class="reviewsForm__rateTitle">{{__('messages.Ваша оценка')}}</span>
                                        </div>
                                        <div class="reviewsForm__form">
                                            <label class="label label--hidden" id="reviewsInputLabel" for="reviewsInput">{{__('messages.Поле ввода отзыва')}}</label>
                                            <div class="textField">
                                                <input id="reviewsInput" name="message" class="textField__input" placeholder="{{__('messages.Ваш отзыв')}}" type="text" autocomplete="off" aria-labelledby="reviewsInputLabel" aria-invalid="false">
                                                <div class="textField__backdrop"></div>
                                            </div>
                                            <button type="submit" class="button button--primary" aria-label="{{__('messages.Отправить отзыв')}}">
                                                <span class="button__text">{{__('messages.Отправить')}}</span>
                                            </button>
                                        </div>
                                    </form>   
                                @endauth
                                @guest
                                    <div class="reviews__header">
                                        <p class="reviews__headerDesc">{{__('messages.Чтобы оставить комментарий, пожалуйста, авторизуйтесь')}}</p>
                                        <div class="buttonGroup">
                                            <div class="buttonGroup__item">
                                                <a href="/login" class="button button--plain" aria-label="{{__('messages.Зарегистрироваться')}}">
                                                    <span class="button__text">{{__('messages.Зарегистрироваться')}}</span>
                                                </a>
                                            </div>
                                            <div class="buttonGroup__item">
                                                <a href="/register" class="button button--primary" aria-label="{{__('messages.Войти')}}">
                                                    <span class="button__text">{{__('messages.Войти')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endguest
                                @if ($page->brand->reviews->count() > 0)
                                <ul class="reviews__list">
                                    @foreach ($page->brand->reviews as $review)
                                        <li class="reviews__listItem">
                                            <div class="reviewsItem">
                                                <div class="reviewsItem__avatar">
                                                    
                                                    @if ($review->getUser->getAvatar != null)
                                                        <picture>
                                                            <img src="/storage/uploads/{{ $review->getUser->getAvatar->url }}" class="profile__avatarPic" class="reviewsItem__avatarPic" width="44" height="44">
                                                        </picture>
                                                    @else
                                                        <svg width="44" height="44" class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-profile.svg#icon-user"></use></svg>
                                                    @endif
                                                    
                                                </div>
                                                <div class="reviewsItem__content">
                                                    <div class="reviewsItem__name">{{ $review->getUser->name }}</div>
                                                    <span class="reviewsItem__date">{{ date('d-m-Y H:i:s', strtotime($review->created_at)) }}</span>
                                                    <div class="reviewsItem__rate">
                                                        <ul class="rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                                                            @for($i = 1; $i < 6; $i++)
                                                                <li class="rate__item {{ $i <= $review->vote ? 'rate__item--active' : '' }}" role="presentation">
                                                                    <svg aria-hidden="true" class="rate__icon">
                                                                        <use xlink:href="/static/img/general/sprite.svg#icon-star"></use>
                                                                    </svg>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="reviewsItem__desc">
                                                    <p>{!! $review->message !!}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                        @if ($page->brand->reviews->count() > 10)
                        <div class="card__section">
                            <div class="text--center">
                                <button type="button" class="button button--plain" aria-label="{{__('messages.Показать ещё')}}">
                                    <span class="button__text">{{__('messages.Показать ещё')}}</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </section>
                @elseif (key($blocks) == 'recomended_brands')
                    <section class="card">
                        <div class="card__header">
                            @if ($blocks->recomended_brands->subtitle != null)
                            <h4 class="card__subheading">{{ $blocks->recomended_brands->subtitle }}</h4>
                            @endif
                            <h2 class="card__headerTitle">{{ $blocks->recomended_brands->title }}</h2>
                        </div>
                        @if ($blocks->recomended_brands->short_description != null)
                        <div class="card__section card__section--spacingTight">
                            <div class="card__body">
                                <p>{{ $blocks->recomended_brands->short_description }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="card__section">
                            <ul class="casino-list">
                                @foreach ($brand->recomendedBrands as $key=>$recomend)
                                    <li class="casino-list__item">
                                        <article class="casino">
                                            <div class="casino__imgContainer">
                                                @if ($recomend->page($recomend->id))
                                                    <a href="/{{ $recomend->page($recomend->id)->slug }}" aria-label="{{ $recomend->name }}">
                                                @endif
                                                <picture class="casino__img">
                                                    <img src="/storage/uploads/{{ $recomend->getLogo != null ? $recomend->getLogo->url : ''}}" width="214" height="155" title="{{ $recomend->getLogo != null ? $recomend->getLogo->attr_title : ''}}" alt="{{ $recomend->getLogo != null ? $recomend->getLogo->alt : ''}}" loading="lazy">
                                                </picture>
                                                @if ($brand->page($recomend->id))
                                                    </a>
                                                @endif
                                                <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                                                    @for ($i = 1; $i < 6; $i++)
                                                    <li class="casino__rateItem @if ($recomend->rating() >= $i) casino__rateItem--active @endif" role="presentation">
                                                        <svg aria-hidden="true" class="casino__rateIcon">
                                                            <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                                        </svg>
                                                    </li>
                                                @endfor
                                                <li class="casino__rateItem" role="presentation">{{ $recomend->rating() }}</li>
                                                </ul>
                                            </div>
                                            <header class="casino__header">
                                                @if ($recomend->page($brand->id))
                                                    <a href="/{{ $brand->page($recomend->id)->slug }}" aria-label="{{ $recomend->name }}">
                                                        <h3 class="casino__title">{{ $recomend->name }}</h3>
                                                    </a>
                                                @else
                                                    <h3 class="casino__title">{{ $recomend->name }}</h3>
                                                @endif
                                                <div class="casino__like">
                                                    @auth
                                                        <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="{{ __('messages.Добавить в избранные') }}" @auth data-liked="{{ $brand->userFavorite($brand->id) != null ? 'true' : 'false' }}" @endauth>
                                                            <span class="button__icon">
                                                            <span class="icon icon--sizeMedium">
                                                                <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                                            </span>
                                                            </span>
                                                        </button>
                                                    @endauth
                                                    @guest
                                                        <a href="/login" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="{{ __('messages.Добавить в избранные') }}">
                                                            <span class="button__icon">
                                                            <span class="icon icon--sizeMedium">
                                                                <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                                            </span>
                                                            </span>
                                                        </a>
                                                    @endguest
                                                </div>
                                            </header>
                                            <div class="casino__bonus">
                                                <svg aria-hidden="true">
                                                    <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                                                </svg>
                                                {{ $recomend->subtitle }}
                                            </div>
                                            <ul class="casino__features">
                                                @foreach (json_decode($recomend->showcase) as $brandShowcase)
                                                @php
                                                    $attributes = $recomend->attributeWeb($brandShowcase, request()->getHost());
                                                @endphp
                                                <li class="casino__featuresItem" role="presentation">
                                                    <div class="casino__featuresTitle">{{ $attributes['item'] }}</div>
                                                    <div class="casino__featuresDesc">{{ $attributes['attr'] }}</div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="casino__actions">
                                                @if ($recomend->url)
                                                <a href="{{ $recomend->url }}" class="button button--primary" aria-label="{{ __('messages.Сайт')}}">
                                                    <span class="class=button__text">{{ __('messages.Сайт')}}</span>
                                                </a>
                                                @endif
                                                @if ($recomend->page($recomend->slug))
                                                <a href="{{ $recomend->page($recomend->slug)->slug }}" class="button button--plain" aria-label="{{ __('messages.Обзор')}}">
                                                    <span class="class=button__text">{{ __('messages.Обзор')}}</span>
                                                </a>
                                                @endif
                                                @if ($recomend->text_after_button)
                                                <p class="casino__actionsText">{{ $recomend->text_after_button }}</p>
                                                @endif
                                            </div>
                                        </article>
                                    </li>
                                @endforeach
                            
                            </ul>
                        </div>
                        {{-- <div class="card__section">
                            <div class="text--center">
                                <button type="button" class="button button--plain" aria-label="Показать ещё">
                                    <span class="button__text">Показать ещё</span>
                                </button>
                            </div>
                        </div> --}}
                    </section>
                @elseif (key($blocks) == 'articles')
                    <section class="card">
                        <div class="card__header">
                            <h2 class="card__headerTitle">{{ $blocks->articles->title }}</h2>
                        </div>
                        @if ($blocks->articles->short_description )
                        <div class="card__section card__section--spacingTight">
                            <div class="card__body">
                                <p>{{ $blocks->articles->short_description }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="card__section">
                            <ul class="tiles">
                                @foreach ($articles as $articleItem)
                                    <li class="tiles__item">
                                        <a href="/{{ $articleItem->slug }}" class="tiles__link">
                                            <article class="tiles__container">
                                                @if ($articleItem->banner != null)
                                                    <picture class="tiles__imgContainer">
                                                        <img src="/storage/uploads/{{ $articleItem->getBanner->url }}" alt="{{ $articleItem->getBanner->alt }}" title="{{ $articleItem->getBanner->attr_title }}" width="70" height="71" class="tiles__img" loading="lazy">
                                                    </picture>
                                                @endif
                                                <div class="tiles__content">
                                                    <h3 class="tiles__title">{{ $articleItem->title }}</h3>
                                                    <time class="tiles__date" datetime="2023-04-29T08:00:00-05:00">{{ $articleItem->created_at }}</time>
                                                </div>
                                            </article>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if ($articlesCount > 6)
                        <div class="card__section">
                            <div class="text--center">
                                <button type="button" class="button button--plain" aria-label="Показать ещё">
                                    <span class="button__text">Показать ещё</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </section>
                @elseif (key($blocks) == 'plus_minus')
                    <section class="card">
                        <div class="card__header">
                            <h2 class="card__headerTitle">{{ $blocks->plus_minus->title }}</h2>
                        </div>
                        <div class="card__section">
                            <div class="compare">
                                <ul class="compare__list">
                                    @foreach ($blocks->plus_minus->plus as $plus)
                                    @if ($plus != null)
                                        <li class="compare__item">
                                            <span class="compare__icon">
                                            <svg aria-hidden="true">
                                                <use xlink:href="static/img/general/sprite.svg#icon-smile"></use>
                                            </svg>
                                        </span>
                                            {{ $plus }}
                                        </li>
                                    @endif
                                    @endforeach
                                    
                                </ul>
                                <ul class="compare__list">
                                    @foreach ($blocks->plus_minus->minus as $minus)
                                    @if ($minus != null)
                                        <li class="compare__item">
                                            <span class="compare__icon">
                                            <svg aria-hidden="true">
                                                <use xlink:href="static/img/general/sprite.svg#icon-sad"></use>
                                            </svg>
                                        </span>
                                            {{ $minus }}
                                        </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card__section">
                            <p>{{ $blocks->plus_minus->short_description }}</p>
                        </div>
                    </section>
                @endif
            @endforeach
        @endif
    </section>
    <aside class="app__layoutCol">
        @if (isset($page->autor_id)) 
            @include('frontend.components.author') 
        @endif
        @include('frontend.components.subscribe')        
    </aside>
</div>
<!--/. App Layout End -->

@stop
