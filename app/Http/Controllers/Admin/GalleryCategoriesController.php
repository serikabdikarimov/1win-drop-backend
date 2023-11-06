<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoriesController extends Controller
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
        
        $builder = GalleryCategory::latest();

        if (!empty($keyword)) {
            $builder->where('name', 'LIKE', "%$keyword%");
        }

        if (!empty(request('parent_id'))) {
            $builder->where('parent_id', request('parent_id'));
        } else {
            $builder->whereNull('parent_id');
        }
        
        $gallerycategories = $builder->get();

        return view('admin.gallery-categories.index', compact('gallerycategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $status = GalleryCategory::STATUS_MAP;

        return view('admin.gallery-categories.create', compact('status'));
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
        $path = '';
        $requestData = $request->all();

        if (!empty(request('parent_id'))) {
            $requestData['parent_id'] =  request('parent_id');
            $path = '?parent_id=' . request('parent_id');
        }

        GalleryCategory::create($requestData);

        return redirect('gallery-categories' . $path)->with('flash_message', 'GalleryCategory added!');
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
        $gallerycategory = GalleryCategory::findOrFail($id);
        $status = GalleryCategory::STATUS_MAP;

        return view('admin.gallery-categories.edit', compact('gallerycategory', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $path = '';
        $requestData = $request->all();

        if (!empty(request('parent_id'))) {
            $requestData['parent_id'] =  request('parent_id');
            $path = '?parent_id=' . request('parent_id');
        }
        
        $gallerycategory = GalleryCategory::findOrFail($id);
        $gallerycategory->update($requestData);

        return redirect('gallery-categories' . $path)->with('flash_message', 'GalleryCategory updated!');
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
        $path = '';
        
        if (!empty(request('parent_id'))) {
            $path = '?parent_id=' . request('parent_id');
        }

        GalleryCategory::destroy($id);

        return redirect('gallery-categories' . $path)->with('flash_message', 'GalleryCategory deleted!');
    }

    public function saveCategory(Request $request)
    {
        $requestData = $request->all();
        $gallerycategory = GalleryCategory::create($requestData);
        
        $id = $gallerycategory->id;

        return response()->json(['id' => $id]);
    }
}
