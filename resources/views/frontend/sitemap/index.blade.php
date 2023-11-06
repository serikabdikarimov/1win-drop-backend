<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($languages as $item)
        @foreach ($pages as $page)
        @php
            $langCode = $item->code;
        @endphp
        @if ($page->getTitle->$langCode)
            <sitemap>
                <loc>{{ route('langIndex', ['locale' => $langCode]) }}</loc>
                <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            </sitemap>
        @endif
        @break
        @endforeach
    @endforeach
</sitemapindex>