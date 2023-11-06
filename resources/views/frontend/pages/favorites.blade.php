@extends('frontend.layout.app-without-seo')

@section('content')
    <!-- Profile Begin -->
    <section class="profile">
        <div class="profile__menu">
            <button type="button" class="profile__menuToggle" data-user-menu-toggle>
                <span class="icon icon--sizeMedium">
                <svg class="icon__svg" aria-hidden="true">
                    <use xlink:href="/static/img/general/sprite.svg#icon-angle-left"></use>
                </svg>
            </span>
            </button>
            <h2 class="profile__heading">{{ __('messages.Личный кабинет') }}</h2>
            <ul class="profile__menuList">
                <li class="profile__menuItem">
                    <a href="/profile" class="profile__menuLink {{ \Request::route()->getName() == 'profile' ? 'profile__menuLink--active' : '' }}">
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-user-v2"></use>
                            </svg>
                         </span>
                        </span>
                        <span class="profile__text">{{ __('messages.Профиль') }}</span>
                    </a>
                </li>
                <li class="profile__menuItem">
                    <a href="/profile/favorites" class="profile__menuLink {{ \Request::route()->getName() == 'profile.favorites' ? 'profile__menuLink--active' : '' }}">
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-heart"></use>
                            </svg>
                         </span>
                        </span>
                        <span class="profile__text">{{ __('messages.Избранное') }}</span>
                    </a>
                </li>
                <li class="profile__menuItem">
                    <a href="/profile/settings" class="profile__menuLink {{ \Request::route()->getName() == 'profile.settings' ? 'profile__menuLink--active' : '' }}">
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-lock"></use>
                            </svg>
                         </span>
                        </span>
                        <span class="profile__text">{{ __('messages.Пароль') }}</span>
                    </a>
                </li>
                <li class="profile__menuItem">
                    <form action="/logout" class="profile__menuLink" method="POST">
                        {{ csrf_field() }}
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-logout"></use>
                            </svg>
                         </span>
                        </span>
                        <button class="profile__text">{{ __('messages.Выйти') }}</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="profile__content">
            <h2 class="profile__heading">{{ __('messages.Избранное') }}</h2>
            <ul class="casino-list">
                @foreach ($userFavorites as $item)
                @php
                    $brand = $item->brand;
                    $rating = round($brand->rating())
                @endphp
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
                        </header>
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
    </section>
    <!--/. Profile End -->
@stop