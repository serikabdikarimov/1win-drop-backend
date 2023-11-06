@extends('frontend.layout.app')

@section('content')

<!-- App Layout Begin -->
<div class="app__layout">
    <div class="app__layoutCol">
        <article class="card">
            <header class="card__header">
                <h1 class="card__headerTitle">{{ $author->name }}</h1>
            </header>
            <div class="card__section">
                <section class="author author--injected">
                    <div class="author__body">
                        <picture>
                            <img src="/storage/uploads/{{ $author->getImage->url }}" class="author__avatar" width="80" height="80" title="{{ $author->getImage->attr_title }}" alt="{{ $author->getImage->alt }}" loading="lazy">
                        </picture>
                        <div class="author__name">{{ $author->name }}</div>
                        <div class="author__bio">{{ $author->post }}</div>
                        <p class="author__desc">{{ $author->bio }}</p>
                        <ul class="social author__social">
                            @if (isset($author->fb))
                            <li>
                                <a href="{{ $author->fb }}" title="facebook" class="social__link" aria-label="facebook" rel="nofollow noindex" target="_blank">
                                    <svg aria-hidden="true" class="social__icon">
                                        <use xlink:href="/static/img/general/sprite.svg#icon-facebook"></use>
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if (isset($author->twitter))
                            <li>
                                <a href="{{ $author->twitter }}" title="Twitter" class="social__link" aria-label="Twitter" rel="nofollow noindex" target="_blank">
                                    <svg aria-hidden="true" class="social__icon">
                                        <use xlink:href="/static/img/general/sprite.svg#icon-twitter"></use>
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if (isset($author->linkedin))
                            <li>
                                <a href="{{ $author->linkedin }}" title="Linkedin" class="social__link" aria-label="Linkedin" rel="nofollow noindex" target="_blank">
                                    <svg aria-hidden="true" class="social__icon">
                                        <use xlink:href="/static/img/general/sprite.svg#icon-linkedin"></use>
                                    </svg>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </section>
            </div>
        </article>
        <section class="card">
            <div class="card__section">
                <ul class="search-results">
                    @foreach($author->getAuthorPages as $item)
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
        </section>
    </div>
    <aside class="app__layoutCol">
        @include('frontend.components.subscribe')        
    </aside>
</div>
<!--/. App Layout End -->

@stop
