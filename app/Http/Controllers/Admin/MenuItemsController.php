<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreMenuItemRequest;
use App\Http\Requests\UpdateRequests\UpdateMenuItemRequest;
use App\Models\Domain;
use App\Models\Localization;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Page;
use App\Services\TranslateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $keyword = $request->get('search');
        $parentId = $request->get('parent_id');
        $categories = $request->get('categories');
        $perPage = 25;

        $builder = MenuItem::where('locale_id', $domainId)->select('menu_items.id', 'menu_items.locale_id', 'menu_items.name', 'menu_items.code', 'menu_items.page_id', 'menu_items.created_at', 'menu_items.position');
        if (!empty($keyword)) {
            $builder->join('translates as name', 'name.id', 'menu_items.name')
                ->where('name.' . env('DEFAULT_LANG'), 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%");
        }

        if (!empty($parentId)) { 
            $builder->where('menu_items.parent_id', $parentId);
        } else {
            $builder->whereNull('menu_items.parent_id');
        }

        if (!empty($categories)) {
            $builder->join('menu_category_menu_item', 'menu_category_menu_item.menu_item_id', 'menu_items.id')->whereIn('menu_category_menu_item.menu_category_id', $categories)->distinct();
        }

        $menuitems = $builder->orderBy('menu_items.position', 'ASC')->paginate($perPage);
        $menuCategories = MenuCategory::pluck('name', 'id')->all();

        return view('admin.menu-items.index', compact('menuitems', 'menuCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $menuCategories = MenuCategory::pluck('name', 'id')->all();
        $pages = Page::where('locale_id', $domainId)->pluck('name', 'id');

        return view('admin.menu-items.create', compact('menuCategories', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreMenuItemRequest $request)
    {
        
        $requestData = $request->all();

        DB::beginTransaction();
        
        try {
            
            $requestData['locale_id'] = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

            $menuitem = MenuItem::create($requestData);

            if (isset($requestData['categories'])) {
                $menuitem->categories()->sync($requestData['categories']);
            }
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            
        }

        return redirect('/admin/menu-items')->with('flash_message', 'Меню добавлен!');
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
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $menuitem = MenuItem::findOrFail($id);
        $menuCategories = MenuCategory::pluck('name', 'id')->all();
        $pages = Page::where('locale_id', $domainId)->pluck('name', 'id');

        return view('admin.menu-items.edit', compact('menuitem', 'menuCategories', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateMenuItemRequest $request, $id)
    {
        
        $requestData = $request->all();
        DB::beginTransaction();
        
        try {

            $menuitem = MenuItem::findOrFail($id);

            $menuitem->update($requestData);

            if (isset($requestData['categories'])) {
                $menuitem->categories()->sync($requestData['categories']);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            
        }

        return redirect('/admin/menu-items')->with('flash_message', 'Меню изменен!');
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
        //MenuItem::destroy($id);
        $menuItem = MenuItem::findOrFail($id);
        $menuItemChild = MenuItem::where('parent_id', $menuItem->id)->get();
        
        if ($menuItemChild) {
            foreach ($menuItemChild as $key => $value) {
                $value->delete();
            }
        }
        
        $menuItem->delete();

        return redirect('/admin/menu-items')->with('flash_message', 'Меню удален!');
    }

    public function updatePosition(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->position = $request->position;
        $menuItem->update();

        return $menuItem->position;
    }
}
