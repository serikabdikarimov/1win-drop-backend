<!-- Author Begin -->

<div class="author__body" itemprop="description">
    <picture>
        <img src="{{ url('') }}/storage/uploads/{{ $author->getImage->url }}" class="author__avatar" width="80" height="80" alt="" loading="lazy">
    </picture>
    <div class="author__name">{{ $author->name }}</div>
    <div class="author__bio">{{ $author->post }}</div>
    @if ($author->bio)
        <p class="author__desc">{{ $author->bio }}</p>
    @endif
    @if ($author->fb || $author->twitter || $author->linkedin)
    <ul class="social author__social">
        @if ($author->fb)
        <li>
            <a href="{{ $author->fb }}" title="fb" class="social__link" rel="noopener" aria-label="facebook" target="_blank">
                <svg aria-hidden="true" class="social__icon">
                    <use xlink:href="/static/img/general/sprite.svg#icon-facebook"></use>
                </svg>
            </a>
        </li>
        @endif
        @if ($author->twitter)
        <li>
            <a href="{{ $author->twitter }}" title="twitter" class="social__link" rel="noopener" aria-label="twitter" target="_blank">
                <svg aria-hidden="true" class="social__icon">
                    <use xlink:href="/static/img/general/sprite.svg#icon-twitter"></use>
                </svg>
            </a>
        </li>
        @endif
        @if ($author->linkedin)
        <li>
            <a href="{{ $author->linkedin }}" title="linkedin" class="social__link" rel="noopener" aria-label="linkedin" target="_blank">
                <svg aria-hidden="true" class="social__icon">
                    <use xlink:href="/static/img/general/sprite.svg#icon-linkedin"></use>
                </svg>
            </a>
        </li>
        @endif
    </ul>
    @endif
</div>

<!--/. Author End -->