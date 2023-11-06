<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DefaultSetting;
use App\Models\Localization;
use App\Models\Gallery;
use App\Models\Robot;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class DefaultSettingsController extends Controller
{

    public function index(Request $request)
    {
        $siteSettings = SiteSetting::first();

        if ($siteSettings->site_type == 'multi_domain') {
            $localizations = Localization::get();

            return view('admin.default-settings.index', compact('localizations'));
        } else {
            $defaultsetting = DefaultSetting::first();

            return view('admin.default-settings.create', compact('defaultsetting'));
        }
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $defaultsetting = DefaultSetting::first();
        
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

        if (isset($defaultsetting)) {
            DefaultSetting::updateOrCreate([
                'id'=> $defaultsetting->id
            ], $requestData);
        } else {

            DefaultSetting::create($requestData);
        }

        return redirect('/admin/default-settings')->with('flash_message', 'DefaultSetting updated!');
    }

    public function edit($domainId)
    {
        $defaultsetting = Localization::where('id', $domainId)->first();

        return view('admin.default-settings.edit', compact('domainId', 'defaultsetting'));
    }

    public function update(Request $request, $domainId)
    {
        $requestData = $request->all();

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

        DefaultSetting::updateOrCreate([
            'locale_id'=> $domainId
        ], $requestData);

        return redirect('/admin/default-settings')->with('flash_message', 'DefaultSetting updated!');
    }

    public function robotsEdit($domainId)
    {
        $robots = Robot::where('locale_id', $domainId)->first();

        return view('admin.default-settings.robots', compact('domainId', 'robots'));
    }

    public function robotsUpdate(Request $request, $domainId)
    {
        $requestData = $request->all();

        Robot::updateOrCreate([
            'locale_id'=> $domainId
        ], $requestData);

        return redirect('/admin/default-settings')->with('flash_message', 'Robots updated!');
    }
}
