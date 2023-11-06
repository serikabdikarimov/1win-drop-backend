<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\Gallery;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $builder = Attribute::select(DB::raw('COUNT(*) as count'), 'slug', 'name')->orderBy('slug', 'ASC')->groupBy(['slug', 'name']);

        $attributes = $builder->paginate($perPage);
 
        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $domains = Localization::all();
        $slug = 'uid-' . Str::random(10);

        if (isset($requestData['icon'])) {
            $requestData['icon'] = explode('/',$requestData['icon']);
            $imageId = Gallery::where('url', $requestData['icon'][3])->first();
            $requestData['icon'] = $imageId->id;
        }

        foreach ($domains as $domain) {
            if ($requestData['title'][$domain->code] != null) {
                Attribute::create([
                    'title' => $requestData['title'][$domain->code],
                    'name' => $requestData['name'],
                    'locale_id' => $domain->id,
                    'slug' => Str::lower($slug) 
                ]);
            }
        }

        return redirect('admin/attributes')->with('flash_message', 'Attribute added!');
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
        $attribute = Attribute::where('slug', $slug)->first();
        
        if(!$attribute) {
            abort(404);
        }

        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $slug)
    {
        
        $requestData = $request->all();
        $domains = Localization::all();

        if (isset($requestData['icon'])) {
            $check = strripos($requestData['icon'], "/");
            
            if (is_numeric($check)) {
                $url = explode('/', $requestData['icon']);
                $url = $url[3];
            } else {
                $url = $requestData['icon'];
            }
            
            $imageId = Gallery::where(['url' => $url])->first();

            $requestData['icon'] = $imageId->id;
        }
        
        foreach ($domains as $domain) {
            if ($requestData['title'][$domain->code] != null) {
                Attribute::updateOrCreate([
                    'locale_id' => $domain->id,
                    'slug' => $slug
                ],[
                    'title' => $requestData['title'][$domain->code],
                    'name' => $requestData['name'],
                    'locale_id' => $domain->id,
                    'icon' => $requestData['icon']
                ]);
            }
        }

        return redirect('admin/attributes')->with('flash_message', 'Attribute updated!');
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
        $attributes = Attribute::where('slug', $slug)->get();
        
        foreach ($attributes as $attribute) {
            $attribute->delete();
        }

        return redirect('admin/attributes')->with('flash_message', 'Attribute deleted!');
    }

    public function attributeItems()
    {
        $id = request('attribute_id');
        $data = '';
        $attributeItems = AttributeItem::where('attribute_uid', $id)->pluck('name','slug');
        if ($attributeItems != null) {
            foreach ($attributeItems as $key => $value) {
                $data .= '<option value="' . $key . '">' . $value . '</option>';
            }
        }
        
        return $data;
    }
    
}
