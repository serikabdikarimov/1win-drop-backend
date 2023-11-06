@extends('frontend.layout.app')

@section('content')


@if ($page->getSlider($page->id) && $page->getSlider($page->id)->getImage)
<!-- Entry Begin -->
    @include('frontend.components.entry', ['slide' => $page->getSlider($page->id), 'menu' => $page->getMenuCategory('meniu_na_slaidere')])
<!--/. Entry End -->
@endif

<!-- App Layout Begin -->
<div class="app__layout">
    <div class="app__layoutCol">
        <section class="card">
            <div class="card__header">
                <h1 class="card__headerTitle">{{ $page->title }}</h1>
            </div>
            <div class="card__section">
                <div class="card__body">
                    {!! $page->content !!}
                </div>
            </div>
            <div class="card__section">

                <form action="" method="post" class="formLayout">
                    {{ csrf_field() }}
                    <div class="formLayout__row">
                        <div class="formLayout__item">
                            <div class="label">
                                <label id="clientNameLabel" for="clientName" class="label__text">{{ __('messages.Имя') }}</label>
                            </div>
                            <div class="textField {{ $errors->has('name') ? 'textField--error' : ''}}">
                                <input id="clientName" placeholder="{{ __('messages.Введите ваше имя') }}" name="name" autocomplete="off" class="textField__input" type="text" aria-labelledby="clientNameLabel" aria-invalid="false" value="{{ old('name') }}">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                        <div class="formLayout__item">
                            <div class="label">
                                <label id="clientEmailLabel" for="clientEmail" class="label__text">Email</label>
                            </div>
                            <div class="textField {{ $errors->has('email') ? 'textField--error' : ''}}">
                                <input id="clientEmail" placeholder="name@example.com" autocomplete="off" name="email" class="textField__input" type="text" aria-labelledby="clientEmailLabel" aria-invalid="false" value="{{ old('email') }}">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                    <div class="formLayout__item">
                        <div class="label">
                            <label id="clientMessageLabel" for="clientMessage" class="label__text">{{ __('messages.Сообщение') }}</label>
                        </div>
                        <div class="textField textField--multiline {{ $errors->has('message') ? 'textField--error' : ''}}">
                            <textarea id="clientMessage" placeholder="{{ __('messages.Сообщение') }}" name="message" autocomplete="off" class="textField__input" type="text" aria-labelledby="clientMessageLabel" aria-invalid="false">{{ old('message') }}</textarea>
                            <div class="textField__backdrop"></div>
                        </div>
                    </div>
                    <div class="formLayout__item">
                        <div class="captcha">
                            <div class="label label--hidden">
                                <label id="captchaLabel" for="captcha" class="label__text">Введите качпу *</label>
                            </div>
                            <div class="captcha__input">
                                <div class="textField {{ $errors->has('captcha') ? 'textField--error' : ''}}">
                                    <input id="captcha" placeholder="" autocomplete="off" class="textField__input" name="captcha" aria-labelledby="captchaLabel" aria-invalid="false">
                                    <div class="textField__backdrop"></div>
                                </div>
                            </div>
                            <img src="/captcha_image" alt="Captcha Image" class="captcha__img" width="80" height="40">
                        </div>
                    </div>
                    <div class="formLayout__item">
                        <div class="text--end">
                            <button type="submit" class="button button--primary" aria-label="{{ __('messages.Отправить') }}">
                                <span class="button__text">{{ __('messages.Отправить') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <aside class="app__layoutCol">
        {{--<section class="card">
            <div class="card__section">
                <div class="card__body">
                    <h4>Категории</h4>
                </div>
                <ul class="categories">
                    <li class="categories__item">
                        <a href="#" class="categories__link">
                            <svg aria-hidden="true" class="categories__icon">
                                <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-reviews"></use>
                            </svg>
                            <span class="categories__text">Отзывы</span>
                        </a>
                    </li>
                    <li class="categories__item">
                        <a href="#" class="categories__link">
                            <svg aria-hidden="true" class="categories__icon">
                                <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-heart"></use>
                            </svg>
                            <span class="categories__text">Популярные статьи</span>  <span class="categories__badge">Soon</span>
                        </a>
                    </li>
                    <li class="categories__item">
                        <a href="#" class="categories__link">
                            <svg aria-hidden="true" class="categories__icon">
                                <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-table"></use>
                            </svg>
                            <span class="categories__text">Турнирная таблица</span>
                        </a>
                    </li>
                    <li class="categories__item">
                        <a href="#" class="categories__link">
                            <svg aria-hidden="true" class="categories__icon">
                                <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-new"></use>
                            </svg>
                            <span class="categories__text">Новые онлайн-казино</span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="card">
            <div class="card__section">
                <div class="card__body">
                    <h4>Обсуждаемое</h4>
                </div>
                <ul class="featured-news">
                    <li class="featured-news__item">
                        <article>
                            <h3 class="featured-news__title">Логотип крупнейшей компании по производству мыльных </h3>
                            <time datetime="2023-06-12" class="featured-news__date">12 июня</time>
                            <a href="#" class="featured-news__link" aria-label="Логотип крупнейшей компании по производству мыльных - 12 июня"></a>
                        </article>
                    </li>
                    <li class="featured-news__item">
                        <article>
                            <h3 class="featured-news__title">Как начать и закончить большое дело</h3>
                            <time datetime="2023-06-12" class="featured-news__date">12 июня</time>
                            <a href="#" class="featured-news__link" aria-label="Как начать и закончить большое дело - 12 июня"></a>
                        </article>
                    </li>
                    <li class="featured-news__item">
                        <article>
                            <h3 class="featured-news__title">Политика не может не реагировать на полуночный пёсий вой</h3>
                            <time datetime="2023-06-12" class="featured-news__date">12 июня</time>
                            <a href="#" class="featured-news__link" aria-label="Политика не может не реагировать на полуночный пёсий вой - 12 июня"></a>
                        </article>
                    </li>
                </ul>
            </div>
        </section> --}}
        @include('frontend.components.subscribe')        
    </aside>
</div>
<!--/. App Layout End -->

@stop
