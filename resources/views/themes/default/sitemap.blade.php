<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>{{ url('/') }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <priority>1.00</priority>
    </url>

     <url>
        <loc>{{ url('/register') }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <priority>0.8</priority>
    </url>


    <url>
        <loc>{{ url('/packages') }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/forget-password') }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <priority>0.8</priority>
    </url>

    

     
    @foreach ($pages as $page)
        <url>
            <loc>{{ route('page',$page->route_name) }}</loc>
            <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            {{-- <changefreq>weekly</changefreq> --}}
            <priority>0.8</priority>
        </url>
    @endforeach
    

    @foreach ($success_profiles as $profile)
        <url>
            <loc>{{ route('success.stories_details',$profile->id) }}</loc>
            <lastmod>{{ $profile->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            {{-- <changefreq>weekly</changefreq> --}}
            <priority>0.8</priority>
        </url>
    @endforeach

    <url>
        <loc>{{ route('blogs.index') }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <priority>0.8</priority>
    </url>

    
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ route('blogDetails2',[$blog->id,$blog->title]) }}</loc>
            <lastmod>{{ $blog->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            {{-- <changefreq>weekly</changefreq> --}}
            <priority>0.8</priority>
        </url>
    @endforeach

    
</urlset>