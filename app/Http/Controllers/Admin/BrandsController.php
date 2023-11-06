<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreBrandRequest;
use App\Http\Requests\UpdateRequests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\Gallery;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function indexDomains()
    {
        return view('admin.brands/index-domains');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        
        $perPage = 25;

        $builder = Brand::where('locale_id', $domainId)->orderBy('id', 'DESC');

        $brands = $builder->paginate($perPage);

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $attibutes = Attribute::all();

        return view('admin.brands.create', compact('attibutes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreBrandRequest $request)
    {
        $requestData = $request->all();
        
        if ($requestData['logo'] != null) {
            $requestData['logo'] = explode('/',$requestData['logo']);
            $imageId = Gallery::where('url', $requestData['logo'][3])->first();
            $requestData['logo'] = $imageId->id;
        }

        // if ($requestData['custom_logo'] != null) {
        //     $requestData['custom_logo'] = explode('/',$requestData['custom_logo']);
        //     $imageId = Gallery::where('url', $requestData['custom_logo'][3])->first();
        //     $requestData['custom_logo'] = $imageId->id;
        // }

        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $requestData['locale_id'] = $domainId;

        if (isset($requestData['showcase'])) {
            $requestData['showcase'] = json_encode($requestData['showcase'], JSON_UNESCAPED_UNICODE);
        }

        if (isset($requestData['rating'])) {
            $requestData['rating'] = json_encode($requestData['rating'], JSON_UNESCAPED_UNICODE);
        }

        if (isset($requestData['sidebar'])) {
            $requestData['sidebar'] = json_encode($requestData['sidebar'], JSON_UNESCAPED_UNICODE);
        }
        
        Brand::create($requestData);

        return redirect('admin/brands')->with('flash_message', 'Brand added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $brand = Brand::where(['slug' => $slug, 'locale_id' => $domainId])->first();
        
        if (!$brand) {
            abort(404);
        }

        $attributes = Attribute::all();

        return view('admin.brands.edit', compact('brand', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateBrandRequest $request, $slug)
    {
        $requestData = $request->all();

        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $brand = Brand::where(['slug' => $slug, 'locale_id' => $domainId])->first();
        
        if (!$brand) {
            abort(404);
        }

        if ($requestData['logo'] != null) {
            $check = strripos($requestData['logo'], "/");
            if (is_numeric($check)) {
                $url = explode('/',$requestData['logo']);
                $url = $url[3];
            } else {
                $url = $requestData['logo'];
            }
            
            $imageId = Gallery::where('url', $url)->first();
            $requestData['logo'] = $imageId->id;
        }

        // if ($requestData['custom_logo'] != null) {
        //     $check = strripos($requestData['custom_logo'], "/");
        //     if (is_numeric($check)) {
        //         $url = explode('/',$requestData['custom_logo']);
        //         $url = $url[3];
        //     } else {
        //         $url = $requestData['custom_logo'];
        //     }
            
        //     $imageId = Gallery::where('url', $url)->first();
        //     $requestData['custom_logo'] = $imageId->id;
        // }
        
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $requestData['locale_id'] = $domainId;

        if (isset($requestData['showcase'])) {
            $requestData['showcase'] = json_encode($requestData['showcase'], JSON_UNESCAPED_UNICODE);
        }

        if (isset($requestData['rating'])) {
            $requestData['rating'] = json_encode($requestData['rating'], JSON_UNESCAPED_UNICODE);
        }

        if (isset($requestData['sidebar'])) {
            $requestData['sidebar'] = json_encode($requestData['sidebar'], JSON_UNESCAPED_UNICODE);
        }

        $brand->update($requestData);

        return redirect('admin/brands')->with('flash_message', 'Brand updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroy($slug)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $brand = Brand::where(['slug' => $slug, 'locale_id' => $domainId])->first();
        
        if (!$brand) {
            abort(404);
        }

        $brand->recomendedBrands()->detach();

        $brand->delete();

        return redirect('admin/brands')->with('flash_message', 'Brand deleted!');
    }

    public function editRecomendedBrands($brandId)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        
        $brands = Brand::where('locale_id', $domainId)->get();
        $brand = Brand::findOrfail($brandId);

        $recomendedBrands = $brand->recomendedBrands()->orderBy('position', 'asc')->get();

        return view('admin.brands.recomended-brands', compact('brands', 'brandId', 'recomendedBrands', 'brand'));
    }

    public function updateRecomendedBrands(Request $request, $brandId)
    {
        $recomendedBrand = DB::table('recomended_brands')->where(['brand_id'=> $brandId, 'recomended_brand_id' => $request->input('recomended_brand_id')])->first();
        
        if($recomendedBrand){
            return back()->with('error', 'Brand alredy exist!'); 
        }

        DB::table('recomended_brands')->insert([
            'brand_id' => $brandId,
            'recomended_brand_id' => $request->input('recomended_brand_id') 
        ]);
        
        return redirect('admin/brands/' . $brandId . '/recomended-brands')->with('flash_message', 'Brand added to recomended brands!');
    }

    public function deleteRecomendedBrands($brandId, $recomendedBrandId) 
    {
        DB::table('recomended_brands')->where([
            'brand_id' => $brandId,
            'recomended_brand_id' => $recomendedBrandId
        ])->delete();

        return redirect('admin/brands/' . $brandId . '/recomended-brands')->with('flash_message', 'Brand deleted from recomended brands!');
    }

    public function updateRecomendedBrandsPosition()
    {
        $result = DB::table('recomended_brands')->where([
            'brand_id' => request('brand_id'),
            'recomended_brand_id' => request('recomended_brand_id')
        ])->update([
            'position' => request('position')
        ]);

        return $result;
    }

    public function copyPage(Request $request)
    {
        $requestData = $request->all();

        DB::beginTransaction();

        try {
            foreach ($requestData['select_languages'] as $domainCode) {
                $domain = Localization::where('code', $domainCode)->first();
                $pageId = $requestData['page_id'];
    
                $brand = Brand::findOrFail($pageId);
                $new = $brand->replicate();
                $new->locale_id = $domain->id;
                
                //Сохранение копии
                $new->push();    
    
                //вытягиваем рекомендованные бренды из копируемого бренда
                $recomendedBrands = $brand->recomendedBrands->pluck('id')->toArray();
    
                //записываем копию
                $new->recomendedBrands()->sync($recomendedBrands);
                DB::commit();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return $new;
    }
}
