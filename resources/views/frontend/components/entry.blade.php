<section class="entry">
    <picture>
        <img src="/storage/uploads/{{ $slide->getImage->url }}" alt="{{ $slide->getImage->alt }}" title="{{ $slide->getImage->attr_title }}" class="entry__img" loading="lazy" width="640" height="556" >
    </picture>
    <div class="entry__header">
        <p class="entry__subTitle">{{ $slide->subtitle }}</p>
        <h2 class="entry__headerTitle">{{ $slide->title }}</h2>
    </div>
    @if ($menu->items)
    <ul class="entry__list">
        @foreach ($menu->items as $item)
        <li class="entry__item">
            <a href="{{ $item->page_id != null ? $item->page->slug : $item->url }}" class="entry__link">
                {{--<svg aria-hidden="true" class="entry__badge">
                    <use xlink:href="/static/img/general/entry/rating-top.svg#icon-top-badge"></use>
                </svg> --}}
                {!! $item->icon !!}
                <div class="entry__title">{{ $item->name }}</div>
                <div class="entry__desc">{{ __('messages.ТОП-100 лучших онлайн казино') }}</div>
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</section>
