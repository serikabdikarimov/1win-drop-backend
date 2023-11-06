<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreDomainRequest;
use App\Http\Requests\UpdateRequests\UpdateDomainRequest;
use App\Models\Localization;
use App\Models\Gallery;
use Illuminate\Http\Request;

class LocalizationsController extends Controller
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

        $builder = Localization::orderBy('created_at', 'desc');
        if (!empty($keyword)) {
            $builder->where('name', 'LIKE', "%$keyword%")
                ->orWhere('locale_name', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%");
        }
        
        $domains = $builder->paginate($perPage);

        return view('admin.domains.index', compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.domains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreDomainRequest $request)
    {
        
        $requestData = $request->all();

        if ($requestData['icon'] != null) {
            $check = strripos($requestData['icon'], "/");
            if (is_numeric($check)) {
                $url = explode('/',$requestData['icon']);
                $url = $url[3];
            } else {
                $url = $requestData['icon'];
            }
            
            $imageId = Gallery::where('url', $url)->first();
            $requestData['icon'] = $imageId->id;
        }

        Localization::create($requestData);

        return redirect('/admin/localizations')->with('flash_message', 'Domain added!');
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
        $domain = Localization::findOrFail($id);

        return view('admin.domains.show', compact('domain'));
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
        $domain = Localization::findOrFail($id);

        return view('admin.domains.edit', compact('domain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateDomainRequest $request, $id)
    {
        $requestData = $request->all();
        
        $localization = Localization::findOrFail($id);

        if ($requestData['icon'] != null) {
            $check = strripos($requestData['icon'], "/");
            if (is_numeric($check)) {
                $url = explode('/', $requestData['icon']);
                $url = $url[3];
            } else {
                $url = $requestData['icon'];
            }
            
            $imageId = Gallery::where(['url' => $url, 'locale_id' => $id])->first();

            $requestData['icon'] = $imageId->id;
        }

        $localization->update($requestData);

        return redirect('/admin/localizations')->with('flash_message', 'Localization updated!');
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
        Localization::destroy($id);

        return redirect('/admin/localizations')->with('flash_message', 'Domain deleted!');
    }
}
