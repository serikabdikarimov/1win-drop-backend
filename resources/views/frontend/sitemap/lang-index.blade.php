<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="https://www.w3.org/1999/xhtml" xmlns:image="https://www.google.com/schemas/sitemap-image/1.1">
    <url>
        <loc>https://{{ request()->getHost() }}</loc>
        <lastmod>{{ $homePage->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    @foreach ($pages as $page)
            <url>
                <loc>https://{{ request()->getHost() }}/{{ $page->slug }}</loc>
                <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
    @endforeach
    @foreach ($brands as $brand)
            <url>
                <loc>https://{{ request()->getHost() }}/{{ $brand->slug }}</loc>
                <lastmod>{{ $brand->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
    @endforeach
    @foreach ($authors as $author)
            <url>
                <loc>https://{{ request()->getHost() }}/{{ $author->slug }}</loc>
                <lastmod>{{ $author->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
    @endforeach
</urlset>