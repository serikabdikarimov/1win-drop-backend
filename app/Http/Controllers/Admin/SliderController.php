<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Localization;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($pageId)
    {
        $slider = Slider::where('page_id', $pageId)->first();

        return view('admin.slider.edit', compact('slider', 'pageId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $pageId)
    {
        $requestData = $request->all();
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        
        if ($requestData['image'] != null && isset($requestData['image'][3])) {
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

        $requestData['locale_id'] = $domainId;

        Slider::updateOrCreate(['page_id' => $pageId], $requestData);

        return redirect('pages')->with('flash_message', 'Slider updated!');
    }
}
