<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\DesignSetting;
use App\Models\Localization;
use Illuminate\Http\Request;

class DesignSettingsController extends Controller
{
    public function edit()
    {
        $localeId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $designsetting = DesignSetting::where('locale_id', $localeId)->first();

        return view('admin.design-settings.edit', compact('designsetting'));
    }

    public function update(Request $request)
    {
        $requestData = $request->all();
        
        $localeId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        
        $designsetting = DesignSetting::where('locale_id', $localeId)->first();
        
        if ($designsetting) {
            $designsetting->update($requestData);
        } else {
            
            $requestData['locale_id'] = $localeId;

            DesignSetting::create($requestData);
        }

        return redirect('admin/design-settings')->with('flash_message', 'DesignSetting updated!');
    }
}
