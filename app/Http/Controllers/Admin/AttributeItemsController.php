<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\AttributeItem;
use App\Models\Gallery;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributeItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $attributeUid)
    {
        $perPage = 25;
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $attributeitems = AttributeItem::where('attribute_uid', $attributeUid)->groupBy(['attribute_uid', 'name', 'slug'])->select('attribute_uid', 'name', 'slug')->orderBy('name', 'ASC')->paginate($perPage);

        return view('admin.attribute-items.index', compact('attributeitems', 'attributeUid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($attributeId)
    {
        return view('admin.attribute-items.create', compact('attributeId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $attributeUid)
    {
        
        $requestData = $request->all();
        $slug = 'uid-' . Str::random(10);
        $domains = Localization::all();

        if (isset($requestData['icon'])) {
            $requestData['icon'] = explode('/',$requestData['icon']);
            $imageId = Gallery::where('url', $requestData['icon'][3])->first();
            $requestData['icon'] = $imageId->id;
        }
        
        foreach ($domains as $domain) {
            if ($requestData['title'][$domain->code] != null) {
                AttributeItem::create([
                    'title' => $requestData['title'][$domain->code],
                    'name' => $requestData['name'],
                    'locale_id' => $domain->id,
                    'slug' => Str::lower($slug),
                    'attribute_uid' => $attributeUid,
                    'icon' => isset($requestData['icon']) ? $requestData['icon'] : null
                ]);
            }
        }
        
        return redirect('admin/attributes/' . $attributeUid . '/attribute-items')->with('flash_message', 'AttributeItem added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($attributeUid, $slug)
    {
        $attributeitem = AttributeItem::where(['slug' => $slug, 'attribute_uid' => $attributeUid])->first();
        
        if (!$attributeitem) {
            abort(404);
        }

        return view('admin.attribute-items.edit', compact('attributeitem', 'attributeUid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $attributeId, $slug)
    {
        $requestData = $request->all();

        if (isset($requestData['icon'])) {
            $requestData['icon'] = explode('/',$requestData['icon']);
            $imageId = Gallery::where('url', $requestData['icon'][3])->first();
            $requestData['icon'] = $imageId->id;
        }

        $domains = Localization::all();

        foreach ($domains as $domain) {
            if ($requestData['title'][$domain->code] != null) {
                AttributeItem::updateOrCreate([
                    'locale_id' => $domain->id,
                    'attribute_uid' => $attributeId,
                    'slug' => $slug
                ],[
                    'title' => $requestData['title'][$domain->code],
                    'name' => $requestData['name'],
                    'icon' => isset($requestData['icon']) ? $requestData['icon'] : null
                ]);
            }
        }

        return redirect('admin/attributes/' . $attributeId . '/attribute-items')->with('flash_message', 'AttributeItem updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($attributeId, $slug)
    {   
        $domains = Localization::all();

        foreach ($domains as $domain) {
            $attributeitem = AttributeItem::updateOrCreate(['locale_id' => $domain->id, 'attribute_uid' => $attributeId, 'slug' => $slug])->first();
            $attributeitem->delete();
        }

        return redirect('admin/attributes/' . $attributeId . '/attribute-items')->with('flash_message', 'AttributeItem deleted!');
    }
}
