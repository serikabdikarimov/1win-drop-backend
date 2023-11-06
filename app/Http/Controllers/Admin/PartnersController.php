<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Gallery;
use App\Models\Localization;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $partners = Partner::where('locale_id', $domainId)->get();

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($requestData['logo'] != null) {
            $requestData['logo'] = explode('/',$requestData['logo']);
            $imageId = Gallery::where('url', $requestData['logo'][3])->first();
            $requestData['logo'] = $imageId->id;
        }

        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $requestData['locale_id'] = $domainId;

        Partner::create($requestData);

        return redirect('partners')->with('flash_message', 'Partner added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Domain::defaultDomain();
        $partner = Partner::where(['id' => $id, 'locale_id' => $domainId])->first();

        if (!$partner)
            abort(404);
        
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $partner = Partner::where(['id' => $id, 'locale_id' => $domainId])->first();

        if (!$partner)
            abort(404);

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

        $partner->update($requestData);

        return redirect('partners')->with('flash_message', 'Partner updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner, $id)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $partner = Partner::where(['id' => $id, 'locale_id' => $domainId])->first();

        if (!$partner)
            abort(404);
        
        $partner->delete();    

        return redirect('partners')->with('flash_message', 'Partner deleted!');
    }
}
