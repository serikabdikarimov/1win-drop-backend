<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Autor;
use App\Models\Domain;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AutorsController extends Controller
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
        $autors = Autor::latest()->paginate($perPage);

        return view('admin.autors.index', compact('autors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.autors.create');
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

        if ($requestData['image'] != null) {
            $requestData['image'] = explode('/',$requestData['image']);
            $imageId = Gallery::where('url', $requestData['image'][3])->first();
            $requestData['image'] = $imageId->id;
        }
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $requestData['locale_id'] = $domainId;
        $requestData['slug'] = Str::slug($requestData['name']);

        Autor::create($requestData);

        return redirect('admin/autors')->with('flash_message', 'Autor added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);

        return view('admin.autors.show', compact('autor'));
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
        $autor = Autor::findOrFail($id);

        return view('admin.autors.edit', compact('autor'));
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
        $requestData = $request->all();

        $autor = Autor::findOrFail($id);
        
        if ($requestData['image'] != null) {
            $check = strripos($requestData['image'], "/");
            if (is_numeric($check)) {
                $url = explode('/',$requestData['image']);
                $url = $url[3];
            } else {
                $url = $requestData['image'];
            }
            $imageId = Gallery::where('url', $url)->first();
            $requestData['image'] = $imageId->id;
        }

        $requestData['slug'] = Str::slug($requestData['name']);
        $autor->update($requestData);

        return redirect('admin/autors')->with('flash_message', 'Autor updated!');
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
        $autor = Autor::findOrFail($id);
        
        $autor->delete();

        return redirect('admin/autors')->with('flash_message', 'Autor deleted!');
    }
}
