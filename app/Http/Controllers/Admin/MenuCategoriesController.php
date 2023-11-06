<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreMenuCategoryRequest;
use App\Http\Requests\UpdateRequests\UpdateMenuCategoryRequest;
use App\Models\Localization;
use App\Models\MenuCategory;
use App\Services\ImageService;
use Illuminate\Http\Request;

class MenuCategoriesController extends Controller
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

        if (!empty($keyword)) {
            $menucategories = MenuCategory::where('name', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->orWhere('is_active', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $menucategories = MenuCategory::latest()->paginate($perPage);
        }

        return view('admin.menu-categories.index', compact('menucategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.menu-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreMenuCategoryRequest $request, ImageService $imageService)
    {
        $requestData = $request->all();
        $requestData['locale_id'] = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        // if ($requestData['image'] != null) {
        //     $imageId = Gallery::where('url', $requestData['image'])->first();
        //     $requestData['image'] = $imageId->id;
        // }

        MenuCategory::create($requestData);

        return redirect('admin/menu-categories')->with('flash_message', 'MenuCategory added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $menucategory = MenuCategory::findOrFail($id);

        return view('admin.menu-categories.edit', compact('menucategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateMenuCategoryRequest $request, ImageService $imageService, $id)
    {   
        $requestData = $request->all();
  
        $menucategory = MenuCategory::findOrFail($id);

        // if ($requestData['image'] != null) {
        //     $imageId = Gallery::where('url', $requestData['image'])->first();
        //     $requestData['image'] = $imageId->id;
        // }
        
        $menucategory->update($requestData);

        return redirect('admin/menu-categories')->with('flash_message', 'MenuCategory updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MenuCategory::destroy($id);

        return redirect('admin/menu-categories')->with('flash_message', 'MenuCategory deleted!');
    }
}
