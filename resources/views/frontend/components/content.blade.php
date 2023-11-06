@extends('frontend.layout.app')

@section('content')
<section class="card">
    <div class="card__section">
        <div class="card__body">
            <picture>
                <source media="(min-width: 1024px)" srcset="/static/img/general/banners/casino-banner-lg.webp, static/img/general/banners/casino-banner-lg@2x.webp 2x, static/img/general/banners/casino-banner-lg@3x.webp 3x" width="768" height="270">
                    <img src="/static/img/general/banners/casino-banner.webp" srcset="/static/img/general/banners/casino-banner@2x.webp 2x, static/img/general/banners/casino-banner@3x.webp 3x" alt="Баннер" class="card__img" loading="lazy" width="688" height="270">
            </picture>
            <div class="card__subheading">Casino</div>
            <h2>Показываем рейтинг лучших казино за февраль 2023</h2>
            <p>Картельные сговоры не допускают ситуации, при которой представители современных социальных резервов, инициированные исключительно синтетически, в равной степени предоставлены сами себе. Картельные сговоры не допускают
                ситуации, при которой представители современных социальных резервов, инициированные исключительно синтетически, в равной степени предоставлены сами себе.</p>
        </div>
    </div>
    <div class="card__section">
        <ul class="casino-list">
            <li class="casino-list__item casino-list__item--compact">
                <article class="casino">
                    <div class="casino__imgContainer">
                        <picture class="casino__img">
                            <source media="(min-width: 1024px)" srcset="/static/img/general/casino/casino-card-logo-big.webp, static/img/general/casino/casino-card-logo-big@2x.webp 2x, static/img/general/casino/casino-card-logo-big@3x.webp 3x" width="214" height="155">
                                <source media="(min-width: 768px)" srcset="/static/img/general/casino/casino-card-logo-md.webp, static/img/general/casino/casino-card-logo-md@2x.webp 2x, static/img/general/casino/casino-card-logo-md@3x.webp 3x" width="214" height="155">
                                    <img src="/static/img/general/casino/casino-card-logo.webp" srcset="/static/img/general/casino/casino-card-logo@2x.webp 2x, static/img/general/casino/casino-card-logo@3x.webp 3x" width="214" height="155" alt="Логотип Казино" loading="lazy">
                        </picture>
                        <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">4.0</li>
                        </ul>
                    </div>
                    <header class="casino__header">
                        <h3 class="casino__title">1win</h3>
                        <div class="casino__place">
                            <span>{{ __('messages.место') }}</span>
                        </div>
                        <div class="casino__like">
                            <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="{{ __('messages.Добавить в избранные') }}">
                                <span class="button__icon">
                                <span class="icon icon--sizeMedium">
                                    <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                </span>
                                </span>
                            </button>
                        </div>
                    </header>
                    <div class="casino__bonus">
                        <svg aria-hidden="true">
                            <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                        </svg>
                        Бонус 300% в криптовалюте
                    </div>
                    <ul class="casino__features">
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">259</div>
                            <div class="casino__featuresDesc">слоты</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">3-5 дней</div>
                            <div class="casino__featuresDesc">срок выплат</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">980</div>
                            <div class="casino__featuresDesc">онлайн игр</div>
                        </li>
                    </ul>
                    <div class="casino__actions">
                        <a href="#" class="button button--primary" aria-label="Перейти на сайт">
                            <span class="class=button__text">Сайт</span>
                        </a>
                        <a href="#" class="button button--plain" aria-label="Обзор">
                            <span class="class=button__text">Обзор</span>
                        </a>
                        <p class="casino__actionsText">100% бонус, 1000 бесплатных вращений, бонус 300%</p>
                    </div>
                </article>
            </li>
            <li class="casino-list__item casino-list__item--compact">
                <article class="casino">
                    <div class="casino__imgContainer">
                        <picture class="casino__img">
                            <source media="(min-width: 1024px)" srcset="/static/img/general/casino/casino-card-logo-big.webp, static/img/general/casino/casino-card-logo-big@2x.webp 2x, static/img/general/casino/casino-card-logo-big@3x.webp 3x" width="214" height="155">
                                <source media="(min-width: 768px)" srcset="/static/img/general/casino/casino-card-logo-md.webp, static/img/general/casino/casino-card-logo-md@2x.webp 2x, static/img/general/casino/casino-card-logo-md@3x.webp 3x" width="214" height="155">
                                    <img src="/static/img/general/casino/casino-card-logo.webp" srcset="/static/img/general/casino/casino-card-logo@2x.webp 2x, static/img/general/casino/casino-card-logo@3x.webp 3x" width="214" height="155" alt="Логотип Казино" loading="lazy">
                        </picture>
                        <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">4.0</li>
                        </ul>
                    </div>
                    <header class="casino__header">
                        <h3 class="casino__title">Stake</h3>
                        <div class="casino__place">
                            <span>место</span>
                        </div>
                        <div class="casino__like">
                            <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="Добавить в избранные">
                                <span class="button__icon">
                                <span class="icon icon--sizeMedium">
                                    <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                </span>
                                </span>
                            </button>
                        </div>
                    </header>
                    <div class="casino__bonus">
                        <svg aria-hidden="true">
                            <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                        </svg>
                        Бонус 300% в криптовалюте
                    </div>
                    <ul class="casino__features">
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">259</div>
                            <div class="casino__featuresDesc">слоты</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">3-5 дней</div>
                            <div class="casino__featuresDesc">срок выплат</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">980</div>
                            <div class="casino__featuresDesc">онлайн игр</div>
                        </li>
                    </ul>
                    <div class="casino__actions">
                        <a href="#" class="button button--primary" aria-label="Перейти на сайт">
                            <span class="class=button__text">Сайт</span>
                        </a>
                        <a href="#" class="button button--plain" aria-label="Обзор">
                            <span class="class=button__text">Обзор</span>
                        </a>
                        <p class="casino__actionsText">100% бонус, 1000 бесплатных вращений, бонус 300%</p>
                    </div>
                </article>
            </li>
            <li class="casino-list__item casino-list__item--compact">
                <article class="casino">
                    <div class="casino__imgContainer">
                        <picture class="casino__img">
                            <source media="(min-width: 1024px)" srcset="/static/img/general/casino/casino-card-logo-big.webp, static/img/general/casino/casino-card-logo-big@2x.webp 2x, static/img/general/casino/casino-card-logo-big@3x.webp 3x" width="214" height="155">
                                <source media="(min-width: 768px)" srcset="/static/img/general/casino/casino-card-logo-md.webp, static/img/general/casino/casino-card-logo-md@2x.webp 2x, static/img/general/casino/casino-card-logo-md@3x.webp 3x" width="214" height="155">
                                    <img src="/static/img/general/casino/casino-card-logo.webp" srcset="/static/img/general/casino/casino-card-logo@2x.webp 2x, static/img/general/casino/casino-card-logo@3x.webp 3x" width="214" height="155" alt="Логотип Казино" loading="lazy">
                        </picture>
                        <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">4.0</li>
                        </ul>
                    </div>
                    <header class="casino__header">
                        <h3 class="casino__title">KazaBoom</h3>
                        <div class="casino__place">
                            <span>место</span>
                        </div>
                        <div class="casino__like">
                            <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="Добавить в избранные">
                                <span class="button__icon">
                                <span class="icon icon--sizeMedium">
                                    <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                </span>
                                </span>
                            </button>
                        </div>
                    </header>
                    <div class="casino__bonus">
                        <svg aria-hidden="true">
                            <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                        </svg>
                        Бонус 300% в криптовалюте
                    </div>
                    <ul class="casino__features">
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">259</div>
                            <div class="casino__featuresDesc">слоты</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">3-5 дней</div>
                            <div class="casino__featuresDesc">срок выплат</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">980</div>
                            <div class="casino__featuresDesc">онлайн игр</div>
                        </li>
                    </ul>
                    <div class="casino__actions">
                        <a href="#" class="button button--primary" aria-label="Перейти на сайт">
                            <span class="class=button__text">Сайт</span>
                        </a>
                        <a href="#" class="button button--plain" aria-label="Обзор">
                            <span class="class=button__text">Обзор</span>
                        </a>
                        <p class="casino__actionsText">100% бонус, 1000 бесплатных вращений, бонус 300%</p>
                    </div>
                </article>
            </li>
            <li class="casino-list__item">
                <article class="casino">
                    <div class="casino__imgContainer">
                        <picture class="casino__img">
                            <source media="(min-width: 1024px)" srcset="/static/img/general/casino/casino-card-logo-big.webp, static/img/general/casino/casino-card-logo-big@2x.webp 2x, static/img/general/casino/casino-card-logo-big@3x.webp 3x" width="214" height="155">
                                <source media="(min-width: 768px)" srcset="/static/img/general/casino/casino-card-logo-md.webp, static/img/general/casino/casino-card-logo-md@2x.webp 2x, static/img/general/casino/casino-card-logo-md@3x.webp 3x" width="214" height="155">
                                    <img src="/static/img/general/casino/casino-card-logo.webp" srcset="/static/img/general/casino/casino-card-logo@2x.webp 2x, static/img/general/casino/casino-card-logo@3x.webp 3x" width="214" height="155" alt="Логотип Казино" loading="lazy">
                        </picture>
                        <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem">
                                <svg aria-hidden="true" class="casino__rateIcon" role="presentation">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem">
                                <svg aria-hidden="true" class="casino__rateIcon" role="presentation">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem">
                                <svg aria-hidden="true" class="casino__rateIcon" role="presentation">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">4.0</li>
                        </ul>
                    </div>
                    <header class="casino__header">
                        <h3 class="casino__title">Spin Casino</h3>
                        <div class="casino__place">
                            <span>место</span>
                        </div>
                        <div class="casino__like">
                            <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="Добавить в избранные">
                                <span class="button__icon">
                                <span class="icon icon--sizeMedium">
                                    <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                </span>
                                </span>
                            </button>
                        </div>
                    </header>
                    <div class="casino__bonus">
                        <svg aria-hidden="true">
                            <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                        </svg>
                        Бонус 300% в криптовалюте
                    </div>
                    <ul class="casino__features">
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">259</div>
                            <div class="casino__featuresDesc">слоты</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">3-5 дней</div>
                            <div class="casino__featuresDesc">срок выплат</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">980</div>
                            <div class="casino__featuresDesc">онлайн игр</div>
                        </li>
                    </ul>
                    <div class="casino__actions">
                        <a href="#" class="button button--primary" aria-label="Перейти на сайт">
                            <span class="class=button__text">Сайт</span>
                        </a>
                        <a href="#" class="button button--plain" aria-label="Обзор">
                            <span class="class=button__text">Обзор</span>
                        </a>
                        <p class="casino__actionsText">100% бонус, 1000 бесплатных вращений, бонус 300%</p>
                    </div>
                </article>
            </li>
            <li class="casino-list__item">
                <article class="casino">
                    <div class="casino__imgContainer">
                        <picture class="casino__img">
                            <source media="(min-width: 1024px)" srcset="/static/img/general/casino/casino-card-logo-big.webp, static/img/general/casino/casino-card-logo-big@2x.webp 2x, static/img/general/casino/casino-card-logo-big@3x.webp 3x" width="198" height="103">
                                <source media="(min-width: 768px)" srcset="/static/img/general/casino/casino-card-logo-md.webp, static/img/general/casino/casino-card-logo-md@2x.webp 2x, static/img/general/casino/casino-card-logo-md@3x.webp 3x" width="99" height="86">
                                    <img src="/static/img/general/casino/casino-card-logo.webp" srcset="/static/img/general/casino/casino-card-logo@2x.webp 2x, static/img/general/casino/casino-card-logo@3x.webp 3x" width="99" height="65" alt="Логотип Казино" loading="lazy">
                        </picture>
                        <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">4.0</li>
                        </ul>
                    </div>
                    <header class="casino__header">
                        <h3 class="casino__title">Zeslots</h3>
                        <div class="casino__place">
                            <span>место</span>
                        </div>
                        <div class="casino__like">
                            <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="Добавить в избранные">
                                <span class="button__icon">
                                <span class="icon icon--sizeMedium">
                                    <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                </span>
                                </span>
                            </button>
                        </div>
                    </header>
                    <div class="casino__bonus">
                        <svg aria-hidden="true">
                            <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                        </svg>
                        Бонус 300% в криптовалюте
                    </div>
                    <ul class="casino__features">
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">259</div>
                            <div class="casino__featuresDesc">слоты</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">3-5 дней</div>
                            <div class="casino__featuresDesc">срок выплат</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">980</div>
                            <div class="casino__featuresDesc">онлайн игр</div>
                        </li>
                    </ul>
                    <div class="casino__actions">
                        <a href="#" class="button button--primary" aria-label="Перейти на сайт">
                            <span class="class=button__text">Сайт</span>
                        </a>
                        <a href="#" class="button button--plain" aria-label="Обзор">
                            <span class="class=button__text">Обзор</span>
                        </a>
                        <p class="casino__actionsText">100% бонус, 1000 бесплатных вращений, бонус 300%</p>
                    </div>
                </article>
            </li>
            <li class="casino-list__item">
                <article class="casino">
                    <div class="casino__imgContainer">
                        <picture class="casino__img">
                            <source media="(min-width: 1024px)" srcset="/static/img/general/casino/casino-card-logo-big.webp, static/img/general/casino/casino-card-logo-big@2x.webp 2x, static/img/general/casino/casino-card-logo-big@3x.webp 3x" width="198" height="103">
                                <source media="(min-width: 768px)" srcset="/static/img/general/casino/casino-card-logo-md.webp, static/img/general/casino/casino-card-logo-md@2x.webp 2x, static/img/general/casino/casino-card-logo-md@3x.webp 3x" width="99" height="86">
                                    <img src="/static/img/general/casino/casino-card-logo.webp" srcset="/static/img/general/casino/casino-card-logo@2x.webp 2x, static/img/general/casino/casino-card-logo@3x.webp 3x" width="99" height="65" alt="Логотип Казино" loading="lazy">
                        </picture>
                        <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem casino__rateItem--active" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">
                                <svg aria-hidden="true" class="casino__rateIcon">
                                    <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                                </svg>
                            </li>
                            <li class="casino__rateItem" role="presentation">4.0</li>
                        </ul>
                    </div>
                    <header class="casino__header">
                        <h3 class="casino__title">Friends Casino</h3>
                        <div class="casino__place">
                            <span>место</span>
                        </div>
                        <div class="casino__like">
                            <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="Добавить в избранные">
                                <span class="button__icon">
                                <span class="icon icon--sizeMedium">
                                    <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                                </span>
                                </span>
                            </button>
                        </div>
                    </header>
                    <div class="casino__bonus">
                        <svg aria-hidden="true">
                            <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                        </svg>
                        Бонус 300% в криптовалюте
                    </div>
                    <ul class="casino__features">
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">259</div>
                            <div class="casino__featuresDesc">слоты</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">3-5 дней</div>
                            <div class="casino__featuresDesc">срок выплат</div>
                        </li>
                        <li class="casino__featuresItem" role="presentation">
                            <div class="casino__featuresTitle">980</div>
                            <div class="casino__featuresDesc">онлайн игр</div>
                        </li>
                    </ul>
                    <div class="casino__actions">
                        <a href="#" class="button button--primary" aria-label="Перейти на сайт">
                            <span class="class=button__text">Сайт</span>
                        </a>
                        <a href="#" class="button button--plain" aria-label="Обзор">
                            <span class="class=button__text">Обзор</span>
                        </a>
                        <p class="casino__actionsText">100% бонус, 1000 бесплатных вращений, бонус 300%</p>
                    </div>
                </article>
            </li>
        </ul>
    </div>
    <div class="card__section">
        <div class="text--center">
            <button type="button" class="button button--plain" aria-label="Показать ещё">
                <span class="class=button__text">Показать ещё</span>
            </button>
        </div>
    </div>
</section>
<section class="card">
    <div class="card__section">
        <div class="card__body">
            <h2>Как зарабатывать игрой на рулетке?</h2>
            <p>Картельные сговоры не допускают ситуации, при которой представители современных социальных резервов, инициированные исключительно синтетически, в равной степени предоставлены сами себе.</p>
            <h4>Видеообзор</h4>
            <p>Банальные, но неопровержимые выводы, а также базовые сценарии поведения пользователей будут ограничены исключительно образом мышления. И нет сомнений, что действия представителей оппозиции будут подвергнуты целой
                серии независимых исследований. Лишь явные признаки победы институционализации будут призваны к ответу.</p>
            <ul>
                <li>Уникальный бонус 300% в криптовалюте</li>
                <li>Как принято считать, стремящиеся вытеснить традиционное производство, нанотехнологии неоднозначны и будут призваны к ответу.</li>
                <li>Уникальный бонус 300% в криптовалюте</li>
            </ul>
            <blockquote>
                <p>Банальные, но неопровержимые выводы, а также базовые сценарии поведения пользователей будут ограничены исключительно образом мышления. И нет сомнений, что действия представителей оппозиции будут подвергнуты
                    целой серии независимых исследований. Лишь явные признаки победы институционализации будут призваны к ответу.</p>
            </blockquote>
            <p>Учитывая ключевые сценарии поведения, сплочённость команды профессионалов позволяет оценить значение существующих финансовых и административных условий.</p>
            <h4>Таблица сравнений</h4>
            <div class="card__table">
                <table>
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Категория</th>
                            <th>Категория</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Название</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                            <td>Очевидцы сообщают, что слышали боевой клич героев</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p>Банальные, но неопровержимые выводы, а также базовые сценарии поведения пользователей будут ограничены исключительно образом мышления. И нет сомнений, что действия представителей оппозиции будут подвергнуты целой
                серии независимых исследований. Лишь явные признаки победы институционализации будут призваны к ответу.</p>
        </div>
    </div>
</section>
<section class="card">
    <div class="card__section">
        <article class="casino">
            <div class="casino__imgContainer">
                <picture class="casino__img">
                    <source media="(min-width: 1024px)" srcset="/static/img/general/casino/casino-card-logo-big.webp, static/img/general/casino/casino-card-logo-big@2x.webp 2x, static/img/general/casino/casino-card-logo-big@3x.webp 3x" width="198" height="103">
                        <source media="(min-width: 768px)" srcset="/static/img/general/casino/casino-card-logo-md.webp, static/img/general/casino/casino-card-logo-md@2x.webp 2x, static/img/general/casino/casino-card-logo-md@3x.webp 3x" width="99" height="86">
                            <img src="/static/img/general/casino/casino-card-logo.webp" srcset="/static/img/general/casino/casino-card-logo@2x.webp 2x, static/img/general/casino/casino-card-logo@3x.webp 3x" width="99" height="65" alt="Логотип Казино" loading="lazy">
                </picture>
                <ul class="casino__rate" aria-label="{{ __('messages.Рейтинг') }} {{ $brand->name }}">
                    <li class="casino__rateItem casino__rateItem--active" role="presentation">
                        <svg aria-hidden="true" class="casino__rateIcon">
                            <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                        </svg>
                    </li>
                    <li class="casino__rateItem casino__rateItem--active" role="presentation">
                        <svg aria-hidden="true" class="casino__rateIcon">
                            <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                        </svg>
                    </li>
                    <li class="casino__rateItem" role="presentation">
                        <svg aria-hidden="true" class="casino__rateIcon">
                            <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                        </svg>
                    </li>
                    <li class="casino__rateItem" role="presentation">
                        <svg aria-hidden="true" class="casino__rateIcon">
                            <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                        </svg>
                    </li>
                    <li class="casino__rateItem" role="presentation">
                        <svg aria-hidden="true" class="casino__rateIcon">
                            <use xlink:href="/static/img/general/sprites/sprite-card-icons.svg#icon-star"></use>
                        </svg>
                    </li>
                    <li class="casino__rateItem" role="presentation">4.0</li>
                </ul>
            </div>
            <header class="casino__header">
                <h3 class="casino__title">Friends Casino</h3>
                <div class="casino__place">
                    <span>место</span>
                </div>
                <div class="casino__like">
                    <button type="button" class="button button--sizeExtraSlim button--iconOnly add_to_favorites" aria-label="Добавить в избранные">
                        <span class="button__icon">
                        <span class="icon icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-heart.svg#icon-heart"></use></svg>
                        </span>
                        </span>
                    </button>
                </div>
            </header>
            <div class="casino__bonus">
                <svg aria-hidden="true">
                    <use xlink:href="/static/img/general/icon-fire.svg#icon-fire"></use>
                </svg>
                Бонус 300% в криптовалюте
            </div>
            <ul class="casino__features">
                <li class="casino__featuresItem">
                    <div class="casino__featuresTitle">259</div>
                    <div class="casino__featuresDesc">слоты</div>
                </li>
                <li class="casino__featuresItem">
                    <div class="casino__featuresTitle">3-5 дней</div>
                    <div class="casino__featuresDesc">срок выплат</div>
                </li>
                <li class="casino__featuresItem">
                    <div class="casino__featuresTitle">980</div>
                    <div class="casino__featuresDesc">онлайн игр</div>
                </li>
            </ul>
            <div class="casino__actions">
                <a href="#" class="button button--primary" aria-label="Перейти на сайт">
                    <span class="class=button__text">Сайт</span>
                </a>
                <a href="#" class="button button--plain" aria-label="Обзор">
                    <span class="class=button__text">Обзор</span>
                </a>
                <p class="casino__actionsText">100% бонус, 1000 бесплатных вращений, бонус 300%</p>
            </div>
        </article>
    </div>
</section>
<section class="card">
    <div class="card__section">
        <div class="card__body">
            <picture>
                <source media="(min-width: 1024px)" srcset="/static/img/general/banners/casino-banner-lg.webp, static/img/general/banners/casino-banner-lg@2x.webp 2x, static/img/general/banners/casino-banner-lg@3x.webp 3x" width="768" height="270">
                    <img src="/static/img/general/banners/casino-banner.webp" srcset="/static/img/general/banners/casino-banner@2x.webp 2x, static/img/general/banners/casino-banner@3x.webp 3x" alt="Баннер" class="card__img" loading="lazy" width="688" height="270">
            </picture>
            <h2>Статьи </h2>
            <p>Безусловно, выбранный нами инновационный путь однозначно определяет каждого участника как способного принимать собственные решения касаемо соответствующих.</p>
        </div>
    </div>
    <div class="card__section">
        <ul class="tiles">
            <li>
                <a href="#" class="tiles__link">
                    <article class="tiles__container">
                        <picture class="tiles__imgContainer">
                            <source media="(min-width: 768px)" srcset="/static/img/general/articles/article-first.webp, static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" width="90" height="90">
                                <img src="/static/img/general/articles/article-first.webp" srcset="/static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" alt="Первая статья" width="70" height="71" class="tiles__img" loading="lazy">
                        </picture>
                        <div class="tiles__content">
                            <h3 class="tiles__title">Как начать и закончить большое дело</h3>
                            <time class="tiles__date" datetime="2023-04-29T08:00:00-05:00">12 июня</time>
                        </div>
                    </article>
                </a>
            </li>
            <li>
                <a href="#" class="tiles__link">
                    <article class="tiles__container">
                        <picture class="tiles__imgContainer">
                            <source media="(min-width: 768px)" srcset="/static/img/general/articles/article-first.webp, static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" width="90" height="90">
                                <img src="/static/img/general/articles/article-first.webp" srcset="/static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" alt="Первая статья" width="70" height="71" class="tiles__img" loading="lazy">
                        </picture>
                        <div class="tiles__content">
                            <h3 class="tiles__title">New Study Shows Benefits of Exercise</h3>
                            <time class="tiles__date" datetime="2023-04-29T08:00:00-05:00">April 29, 2023</time>
                        </div>
                    </article>
                </a>
            </li>
            <li>
                <a href="#" class="tiles__link">
                    <article class="tiles__container">
                        <picture class="tiles__imgContainer">
                            <source media="(min-width: 768px)" srcset="/static/img/general/articles/article-first.webp, static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" width="90" height="90">
                                <img src="/static/img/general/articles/article-first.webp" srcset="/static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" alt="Первая статья" width="70" height="71" class="tiles__img" loading="lazy">
                        </picture>
                        <div class="tiles__content">
                            <h3 class="tiles__title">Как начать и закончить большое дело</h3>
                            <time class="tiles__date" datetime="2023-04-29T08:00:00-05:00">12 июня</time>
                            <span class="tiles__badge">HIT</span>
                        </div>
                    </article>
                </a>
            </li>
            <li>
                <a href="#" class="tiles__link">
                    <article class="tiles__container">
                        <picture class="tiles__imgContainer">
                            <source media="(min-width: 768px)" srcset="/static/img/general/articles/article-first.webp, static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" width="90" height="90">
                                <img src="/static/img/general/articles/article-first.webp" srcset="/static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" alt="Первая статья" width="70" height="71" class="tiles__img" loading="lazy">
                        </picture>
                        <div class="tiles__content">
                            <h3 class="tiles__title">New Study Shows Benefits of Exercise</h3>
                            <time class="tiles__date" datetime="2023-04-29T08:00:00-05:00">April 29, 2023</time>
                        </div>
                    </article>
                </a>
            </li>
            <li>
                <a href="#" class="tiles__link">
                    <article class="tiles__container">
                        <picture class="tiles__imgContainer">
                            <source media="(min-width: 768px)" srcset="/static/img/general/articles/article-first.webp, static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" width="90" height="90">
                                <img src="/static/img/general/articles/article-first.webp" srcset="/static/img/general/articles/article-first@2x.webp 2x, static/img/general/articles/article-first@3x.webp 3x" alt="Первая статья" width="70" height="71" class="tiles__img" loading="lazy">
                        </picture>
                        <div class="tiles__content">
                            <h3 class="tiles__title">New Study Shows Benefits of Exercise</h3>
                            <time class="tiles__date" datetime="2023-04-29T08:00:00-05:00">April 29, 2023</time>
                        </div>
                    </article>
                </a>
            </li>
        </ul>
    </div>
    <div class="card__section">
        <div class="text--center">
            <button type="button" class="button button--plain" aria-label="Показать ещё">
                <span class="class=button__text">Показать ещё</span>
            </button>
        </div>
    </div>
</section>
<section class="card">
    <div class="card__section">
        <div class="card__body">
            <h2>Ответы на вопросы </h2>
        </div>
        <ul class="faq" data-accordion>
            <li class="faq__item">
                <button id="faq-header-1" type="button" class="faq__toggle" aria-label="Сколько максимум можно вывести денег за один раз?" aria-expanded="false" aria-controls="faq-panel-1" data-accordion-trigger>
                    <span class="faq__title">Сколько максимум можно вывести денег за один раз?</span>
                    <span class="faq__icon">
                    <svg aria-hidden="true">
                        <use xlink:href="/static/img/general/sprites/accordion-sprite.svg#arrow-default"></use>
                    </svg>
                </span>
                </button>
                <div id="faq-panel-1" class="faq__body" aria-labelledby="faq-header-1" data-accordion-body aria-hidden="true">
                    <p>И нет сомнений, что действия представителей оппозиции будут подвергнуты целой серии независимых исследований. Лишь явные признаки победы институционализации будут призваны к ответу.</p>
                </div>
            </li>
            <li class="faq__item">
                <button id="faq-header-2" type="button" class="faq__toggle" aria-label="Как вывести бонус?" aria-expanded="false" aria-controls="faq-panel-2" data-accordion-trigger>
                    <span class="faq__title">Как вывести бонус?</span>
                    <span class="faq__icon">
                    <svg aria-hidden="true">
                        <use xlink:href="/static/img/general/sprites/accordion-sprite.svg#arrow-default"></use>
                    </svg>
                </span>
                </button>
                <div id="faq-panel-2" class="faq__body" aria-labelledby="faq-header-2" data-accordion-body aria-hidden="true">
                    <p>И нет сомнений, что действия представителей оппозиции будут подвергнуты целой серии независимых исследований. Лишь явные признаки победы институционализации будут призваны к ответу.</p>
                </div>
            </li>
            <li class="faq__item">
                <button id="faq-header-3" type="button" class="faq__toggle" aria-label="Сколько максимум можно вывести денег за один раз?" aria-expanded="false" aria-controls="faq-panel-3" data-accordion-trigger>
                    <span class="faq__title">Сколько максимум можно вывести денег за один раз?</span>
                    <span class="faq__icon">
                    <svg aria-hidden="true">
                        <use xlink:href="/static/img/general/sprites/accordion-sprite.svg#arrow-default"></use>
                    </svg>
                </span>
                </button>
                <div id="faq-panel-3" class="faq__body" aria-labelledby="faq-header-3" data-accordion-body aria-hidden="true">
                    <p>И нет сомнений, что действия представителей оппозиции будут подвергнуты целой серии независимых исследований. Лишь явные признаки победы институционализации будут призваны к ответу.</p>
                </div>
            </li>
            <li class="faq__item">
                <button id="faq-header-4" type="button" class="faq__toggle" aria-label="Как начать и закончить большое дело" aria-expanded="false" aria-controls="faq-panel-4" data-accordion-trigger>
                    <span class="faq__title">Как начать и закончить большое дело</span>
                    <span class="faq__icon">
                    <svg aria-hidden="true">
                        <use xlink:href="/static/img/general/sprites/accordion-sprite.svg#arrow-default"></use>
                    </svg>
                </span>
                </button>
                <div id="faq-panel-4" class="faq__body" aria-labelledby="faq-header-4" data-accordion-body aria-hidden="true">
                    <p>И нет сомнений, что действия представителей оппозиции будут подвергнуты целой серии независимых исследований. Лишь явные признаки победы институционализации будут призваны к ответу.</p>
                </div>
            </li>
        </ul>
    </div>
</section>
@stop
