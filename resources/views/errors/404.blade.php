@extends('frontend.layout.app')

@section('content')
    <div class="app__container">
        <!-- Not Found Begin -->
        <section class="not-found">
            <h1 class="not-found__title">404</h1>
            <h2 class="not-found__subtitle">{{ __('messages.Страница не найдена') }}</h2>
            <a href="/" class="button button--primary">
                <span class="button__text">{{ __('messages.Вернуться на главную') }}</span>
            </a>
        </section>
        <!--/. Not Found End -->
    </div>
@stop
