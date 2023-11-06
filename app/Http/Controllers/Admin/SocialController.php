<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function edit()
    {
        return view('admin.social.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $requestData = $request->all();

        $domains = Localization::get();

        foreach($domains as $item) {
            Social::updateOrCreate([
                'locale_id' => $item->id
            ],
            [
                'locale_id' => $item->id,
                'twitter' => $requestData['twitter'][$item->id],
                'facebook' => $requestData['facebook'][$item->id],
                'telegram' => $requestData['telegram'][$item->id],
                'youtube' => $requestData['youtube'][$item->id],
                'instagram' => $requestData['instagram'][$item->id],
            ]);
        }

        return redirect('admin/social')->with('flash_message', 'Social updated!');
    }
}
