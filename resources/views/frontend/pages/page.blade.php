@extends('frontend.layout.app')

@section('content')


@if ($page->getSlider($page->id) && $page->getSlider($page->id)->getImage)
<!-- Entry Begin -->
    @include('frontend.components.entry', ['slide' => $page->getSlider($page->id), 'menu' => $page->getMenuCategory('meniu_na_slaidere')])
<!--/. Entry End -->
@endif

<!-- App Layout Begin -->
    <div class="app__container">
        <article class="article">
                <header class="article__header">
                    @if ($page->banner != null)
                    <picture>
                        <img src="/storage/uploads/{{ $page->getBanner->url }}" alt="{{ $page->getBanner->alt }}" title="{{ $page->getBanner->attr_title }}" class="card__img" loading="eager" decoding="async" width="1056" height="512">
                    </picture>
                    @endif
                    <h1 class="article__headerTitle">{{ $page->title }}</h1>
                </header>
                <div class="article__body">
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
                        {{--</section>--}}
                    @endif
                    @if ($page->headerLinks($page->id, $currentLocalization->id) != null)
                        <details>
                            <summary>{{ __('messages.Содержание') }}</summary>
                            {!! $page->headerLinks($page->id, $currentLocalization->id)!!}
                        </details>
                    @endif
                    @if ($page->add_content != "null" && $page->add_content != null)
                        @foreach (json_decode($page->add_content) as $index=>$blocks)
                            @if (key($blocks) == 'showcase')
                                <ul class="casino-list">
                                    @foreach($blocks->showcase as $key=>$item)
                                        @php
                                            $brand = $page->getBrandInWiew($item, request()->getHost());
                                            $rating = round($brand->rating())
                                        @endphp
                                        <li class="casino-list__item">
                                            <article class="casino">
                                                <a href="{{ $brand->page($brand->id) ? '/'.$brand->page($brand->id)->slug : 'javascript:void(0)' }}" class="casino__imgContainer">
                                                    <picture class="casino__img">
                                                        <img src="/storage/uploads/{{ $brand->getLogo != null ? $brand->getLogo->url : ''}}" width="214" height="155" title="{{ $brand->getLogo != null ? $brand->getLogo->attr_title : ''}}" alt="{{ $brand->getLogo != null ? $brand->getLogo->alt : ''}}" loading="lazy">
                                                    </picture>
                                                </a>
                                                <div class="casino__content">
                                                    <header class="casino__header">
                                                        <div class="casino__headerSubtitle">{{ $brand->subtitle }}</div>
                                                        <h3 class="casino__title">{{ $brand->text_after_button }}</h3>
                                                    </header>
                                                    <ul class="casino__features">
                                                        @foreach (json_decode($brand->showcase) as $brandShowcase)
                                                        @php
                                                            $attributes = $brand->attributeWeb($brandShowcase, request()->getHost());
                                                        @endphp
                                                    <li class="casino__featuresItem" role="presentation">
                                                        <div class="casino__featuresIcon">
                                                            {!! $attributes['attr'] !!}
                                                        </div>
                                                        <div class="casino__featuresTitle">{!! $attributes['item'] !!}</div>
                                                    </li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                                <div class="casino__providers">
                                                    @foreach (json_decode($brand->sidebar) as $item)
                                                        @if($brand->checkAttr($item->attribute_id, $domain->id))
                                                            @php
                                                                $sidebarAttr = $brand->checkAttr($item->attribute_id, $domain->id)
                                                            @endphp
                                                            @if (isset($item->attribute_item_id))
                                                            <div class="casino__providersTitle">{{ $sidebarAttr->getTitle($item->attribute_id, $domain->id)->title }}</div>
                                                            <div class="casino__providersList">
                                                                @foreach ($item->attribute_item_id as $attrItem)
                                                                    <div class="casino__providersItem">
                                                                        @if ($sidebarAttr->getItem($attrItem, $domain->id) != null)
                                                                        @if ($sidebarAttr->getItem($attrItem, $domain->id)->icon == null)
                                                                            <span class="badge">{{ $sidebarAttr->getItem($attrItem, $domain->id)->getTitle($attrItem, $domain->id)->title }}</span>
                                                                        @else
                                                                            <img src="/storage/uploads/{{ $sidebarAttr->getItem($attrItem, $domain->id)->getIcon($attrItem, $domain->id)->url }}" loading="lazy" alt="" width="24" height="24">
                                                                        @endif
                                                                        @endif
                                                                    </div>
                                                                @endforeach

                                                                @if (isset($item->comment))
                                                                    <div class="casino__providersItem">{{ $item->comment }}</div>
                                                                @endif
                                                            </div>
                                                            @endif
                                                        @else
                                                            <div>
                                                                <div>{{ $item->attribute_id }}:</div>
                                                                <div>{{ $item->attribute_item_id }}</div>
                                                            </div>
                                                        @endif

                                                    @endforeach
                                                </div>
                                                <div class="casino__actions">
                                                    @if ($brand->page($brand->id))
                                                        <a href="/{{ $brand->page($brand->id)->slug }}" class="casino__name" aria-label="{{ $brand->name }}">
                                                    @else
                                                        <a href="javascript:void(0)" class="casino__name" aria-label="{{ $brand->name }}">{{ $brand->name }}</a>
                                                    @endif
                                                    <ul class="rate">
                                                        @for ($i = 1; $i < 6; $i++)
                                                            <li class="rate__item @if ($rating >= $i) rate__item--active @endif">
                                                                <svg aria-hidden="true" class="rate__icon">
                                                                    <use xlink:href="static/img/general/sprite.svg#icon-star"></use>
                                                                </svg>
                                                            </li>
                                                        @endfor
                                                        <li class="rate__text">{{ round($rating) }}/5</li>
                                                    </ul>
                                                    @if ($brand->url)
                                                        <a href="{{ $brand->url }}" class="button button--secondary" aria-label="{{ __('messages.Играть')}}">
                                                            <span class="button__text">{{ __('messages.Играть')}}</span>
                                                        </a>
                                                    @endif
                                                    @if ($brand->page($brand->id))
                                                        <a href="/{{ $brand->page($brand->id)->slug }}" class="button button--primary" aria-label="{{ __('messages.Обзор')}}">
                                                            <span class="button__text">{{ __('messages.Обзор')}}</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </article>
                                        </li>
                                    @endforeach
                                </ul>
                            @elseif (key($blocks) == 'login')
                                <ul class="buttonGroup buttonGroup--distributionCenter">
                                    <li class="buttonGroup__item">
                                        <a href="#" class="button button--primary" aria-label="{{__('messages.Играть')}}">
                                            <span class="button__text">{{__('messages.Играть')}}</span>
                                        </a>
                                    </li>
                                    <li class="buttonGroup__item">
                                        <a href="#" class="button button--secondary" aria-label="{{__('messages.Обзор')}}">
                                            <span class="button__text">{{__('messages.Обзор')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            @elseif (key($blocks) == 'block')
                                <h2>{{ $blocks->block->title }}</h2>
                                {!! $blocks->block->content !!}
                            @elseif (key($blocks) == 'faqs')
                                @php
                                    $faqs = (array)$blocks;
                                @endphp
                                @foreach($blocks as $question)
                                    <div class="card__body">
                                        <h2 id="{{ \Illuminate\Support\Str::slug($question->faqs_title) }}">{{ $question->faqs_title }}</h2>
                                        <p>{{ $question->faqs_description }}</p>
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
                                @if($blocks->plus_minus->title != null)
                                    <h2 id="{{ \Illuminate\Support\Str::slug($blocks->plus_minus->title) }}">{{ $blocks->plus_minus->title }}</h2>
                                @endif
                                <div class="compare">
                                    <ul class="compare__list">
                                        @foreach ($blocks->plus_minus->plus as $plus)
                                        @if ($plus != null)
                                            <li class="compare__item">{{ $plus }}</li>
                                        @endif
                                        @endforeach

                                    </ul>
                                    <ul class="compare__list">
                                        @foreach ($blocks->plus_minus->minus as $minus)
                                        @if ($minus != null)
                                            <li class="compare__item">{{ $minus }}</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @if($blocks->plus_minus->short_description != null)
                                    <p>{{ $blocks->plus_minus->short_description }}</p>
                                @endif
                            @elseif (key($blocks) == 'static_attributes')
                                @if ($blocks->static_attributes->title != null)
                                    <h2 id="{{ Str::slug($blocks->static_attributes->title) }}">{{ $blocks->static_attributes->title }}</h2>
                                @endif
                                <table class="brand-info">
                                    <tbody>
                                        <tr>
                                        @foreach($blocks->static_attributes->attribute as $attrKey=>$attr)
                                            <td class="brand-info__title">{{ $attr }}:</td>
                                            <td class="brand-info__content">{{ $blocks->static_attributes->attribute_item[$attrKey] }}</td>
                                            @if (($attrKey + 1) % 2 == 0)
                                                </tr>
                                                @if (array_key_last($blocks->static_attributes->attribute) != $attrKey)
                                                    <tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($blocks->static_attributes->short_description != null)
                                    <p>{{ $blocks->static_attributes->short_description }}</p>
                                @endif
                            @elseif (key($blocks) == 'dynamic_attributes')
                                @if ($blocks->dynamic_attributes->title != null)
                                    <h2 id="{{ Str::slug($blocks->dynamic_attributes->title) }}">{{ $blocks->dynamic_attributes->title }}</h2>
                                @endif
                                <div class="brand-features">
                                    @foreach($blocks->dynamic_attributes->items as $item)
                                    <div class="brand-features__row">
                                        <div class="brand-features__heading">
                                            <div class="brand-features__icon">
                                                <img src="/storage/uploads/{{ $page->getAttributeToFront($item->attribute)->getIcon($item->attribute, $currentLocalization->id)->url }}" width="20" height="18" alt="{{ $page->getAttributeToFront($item->attribute)->getIcon($item->attribute, $currentLocalization->id)->alt }}" title="{{ $page->getAttributeToFront($item->attribute)->getIcon($item->attribute, $currentLocalization->id)->attr_title }}">
                                            </div>
                                            <div class="brand-features__title">{{ $page->getAttributeToFront($item->attribute)->title }}</div>
                                        </div>
                                        <div class="brand-features__content">
                                            @foreach($item->attribute_item as $attributeItem)
                                            @if ($page->getAttributItemByAttrToFront($attributeItem) != null)
                                                <div class="brand-features__item">{{ $page->getAttributItemByAttrToFront($attributeItem)->title }}</div>
                                            @endif
                                            @endforeach
                                            <div class="brand-features__item">{{ $item->static_text }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @if ($blocks->dynamic_attributes->short_description != null)
                                    <p>{{ $blocks->dynamic_attributes->short_description }}</p>
                                @endif
                            @elseif (key($blocks) == 'reviews')
                                @include('frontend.components.reviews', ['reviews' => $page->getReviews($page->id)])
                            @elseif (key($blocks) == 'author')
                                @include('frontend.components.author-block', ['author' => $page->getAuthor($page->autor_id)])
                            @endif
                        @endforeach
                    @endif
                </div>
        </article>
    </div>
<!--/. App Layout End -->

@stop
