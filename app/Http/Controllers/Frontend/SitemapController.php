<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use App\Models\Page;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $domainId = Localization::where('locale_name', request()->getHost())->first();
        $homePage = Page::where('slug', '/')->where('locale_id', $domainId->id)->orderBy('updated_at', 'DESC')->first();
        $pages = Page::where(['status' => 2,'locale_id' => $domainId->id, 'type' => 1])->where('slug', '<>', '/')->orderBy('updated_at', 'DESC')->get();
        $brands = Page::where(['status' => 2,'locale_id' => $domainId->id, 'type' => 2])->orderBy('updated_at', 'DESC')->get();
        $authors = Page::where(['status' => 2,'locale_id' => $domainId->id, 'type' => 3])->orderBy('updated_at', 'DESC')->get();

        return response()->view('frontend.sitemap.lang-index', [
            'homePage' => $homePage,
            'pages' => $pages,
            'brands' => $brands,
            'authors' =>$authors
        ])->header('Content-Type', 'text/xml');
    }
}


