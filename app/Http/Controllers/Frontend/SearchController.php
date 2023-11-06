<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Domain;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;

        $domain = Domain::where('domain_name', $request->getHost())->first();
         
        //ищем бренды по поисковому запросу
        $brandsBulder = Brand::where(['is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id]);
        if ($search) {
            $brandsBulder->where('brands.showcase', 'LIKE', "%$search%")
                   ->orWhere('brands.name', 'LIKE', "%$search%")
                   ->where(['brands.is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id])
                   ->orWhere('brands.description', 'LIKE', "%$search%")
                   ->where(['brands.is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id])
                   ->orWhere('brands.sidebar', 'LIKE', "%$search%")
                   ->where(['brands.is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id])
                   ->orWhere('brands.short_description', 'LIKE', "%$search%")
                   ->where(['brands.is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id])
                   ->orWhere('brands.text_after_button', 'LIKE', "%$search%")
                   ->where(['brands.is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id])
                   ->orWhere('brands.promocode_text', 'LIKE', "%$search%")
                   ->where(['brands.is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id])
                   ->orWhere('brands.rating', 'LIKE', "%$search%")
                   ->where(['brands.is_active' => Brand::ACTIVE, 'brands.domain_id' => $domain->id]);
        }
        //join-им страницы брендов 
        $brandsBulder->leftJoin('pages', function($join){
            $join->on('pages.type_content_id','=', 'brands.id')
            ->where(['pages.type' => Page::BRAND_PAGE]);
        })->orWhere('pages.add_content', 'LIKE', "%$search%")
        ->where(['pages.status' => Page::ACTIVE, 'pages.domain_id' => $domain->id])
        ->orWhere('pages.title', 'LIKE', "%$search%")
        ->where(['pages.status' => Page::ACTIVE, 'pages.domain_id' => $domain->id])
        ->orWhere('pages.content', 'LIKE', "%$search%")
        ->where(['pages.status' => Page::ACTIVE, 'pages.domain_id' => $domain->id]);

        //select-им нужные нам столбцы
        $brands = $brandsBulder->select('brands.id as id', 'brands.name as name', 'pages.slug as slug', 'brands.subtitle', 'brands.text_after_button','brands.showcase', 'brands.rating', 'brands.url', 'brands.logo')->get();

        //ищем страницы по поисковому запросу
        $pagesBulder = Page::where(['status' => Page::ACTIVE, 'domain_id' => $domain->id, 'type' => Page::DEFAULT_PAGE]);
        
        if ($search) {
            $pagesBulder->where('add_content', 'LIKE', "%$search%")
                   ->orWhere('title', 'LIKE', "%$search%")
                   ->where(['status' => Page::ACTIVE, 'domain_id' => $domain->id, 'type' => Page::DEFAULT_PAGE])
                   ->orWhere('content', 'LIKE', "%$search%")
                   ->where(['status' => Page::ACTIVE, 'domain_id' => $domain->id, 'type' => Page::DEFAULT_PAGE]);

        }
        //select-им нужные нам столбцы
        $pages = $pagesBulder->select('title', 'updated_at', 'content', 'slug')->get();

        if (!$search) {
            $brands = array();
            $pages = array();
        }
        
        return view('frontend.pages.search', compact('brands', 'pages'));
    }
}
