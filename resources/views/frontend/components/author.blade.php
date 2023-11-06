<section class="author">
    <h3 class="author__heading">{{ __('messages.Автор статьи') }}</h3>
    <div class="author__body">
        <a href="https://{{ request()->getHost() }}/{{ $page->author->page($page->author->id)->slug }}" title="{{ $page->author->getImage->attr_title }}">
            <picture>
                <img src="/storage/uploads/{{ $page->author->getImage->url }}" class="author__avatar" width="80" height="80" alt="{{ $page->author->getImage->alt }}" loading="lazy">
            </picture>
        </a>
        <div class="author__name"><a href="https://{{ request()->getHost() }}/{{ $page->author->page($page->author->id)->slug }}">{{ $page->author->name }}</a></div>
        <div class="author__bio">{{ $page->author->post }}</div>
        <p class="author__desc">{{ $page->author->bio }}</p>
        <ul class="social author__social">
            @if (isset($page->author->fb))
            <li>
                <a href="{{ $page->author->fb }}" title="facebook" class="social__link" aria-label="facebook" rel="nofollow noindex" target="_blank">
                    <svg aria-hidden="true" class="social__icon">
                        <use xlink:href="/static/img/general/sprite.svg#icon-facebook"></use>
                    </svg>
                </a>
            </li>
            @endif
            @if (isset($page->author->twitter))
            <li>
                <a href="{{ $page->author->twitter }}" title="Twitter" class="social__link" aria-label="Twitter" rel="nofollow noindex" target="_blank">
                    <svg aria-hidden="true" class="social__icon">
                        <use xlink:href="/static/img/general/sprite.svg#icon-twitter"></use>
                    </svg>
                </a>
            </li>
            @endif
            @if (isset($page->author->linkedin))
            <li>
                <a href="{{ $page->author->linkedin }}" title="Linkedin" class="social__link" aria-label="Linkedin" rel="nofollow noindex" target="_blank">
                    <svg aria-hidden="true" class="social__icon">
                        <use xlink:href="/static/img/general/sprite.svg#icon-linkedin"></use>
                    </svg>
                </a>
            </li>
            @endif
        </ul>
    </div>
</section>