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

        if ($requestData['lang_icon'] != null) {
            $check = strripos($requestData['lang_icon'], "/");
            if (is_numeric($check)) {
                $url = explode('/',$requestData['lang_icon']);
                $url = $url[3];
            } else {
                $url = $requestData['lang_icon'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['lang_icon'] = $imageId->id;
        }

        if ($requestData['favicon_32'] != null) {
            $check = strripos($requestData['favicon_32'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['favicon_32']);
                $url = $url[3];
            } else {
                $url = $requestData['favicon_32'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['favicon_32'] = $imageId->id;
        }

        if ($requestData['favicon_64'] != null) {
            $check = strripos($requestData['favicon_64'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['favicon_64']);
                $url = $url[3];
            } else {
                $url = $requestData['favicon_64'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['favicon_64'] = $imageId->id;
        }

        if ($requestData['favicon_180'] != null) {
            $check = strripos($requestData['favicon_180'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['favicon_180']);
                $url = $url[3];
            } else {
                $url = $requestData['favicon_180'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['favicon_180'] = $imageId->id;
        }

        if ($requestData['manifest_192'] != null) {
            $check = strripos($requestData['manifest_192'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['manifest_192']);
                $url = $url[3];
            } else {
                $url = $requestData['manifest_192'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['manifest_192'] = $imageId->id;
        }

        if ($requestData['manifest_512'] != null) {
            $check = strripos($requestData['manifest_512'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['manifest_512']);
                $url = $url[3];
            } else {
                $url = $requestData['manifest_512'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['manifest_512'] = $imageId->id;
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
        $defaultsetting = DefaultSetting::where('id', $domainId)->first();

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

        if ($requestData['lang_icon'] != null) {
            $check = strripos($requestData['lang_icon'], "/");
            if (is_numeric($check)) {
                $url = explode('/',$requestData['lang_icon']);
                $url = $url[3];
            } else {
                $url = $requestData['lang_icon'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['lang_icon'] = $imageId->id;
        }

        if ($requestData['favicon_32'] != null) {
            $check = strripos($requestData['favicon_32'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['favicon_32']);
                $url = $url[3];
            } else {
                $url = $requestData['favicon_32'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['favicon_32'] = $imageId->id;
        }

        if ($requestData['favicon_64'] != null) {
            $check = strripos($requestData['favicon_64'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['favicon_64']);
                $url = $url[3];
            } else {
                $url = $requestData['favicon_64'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['favicon_64'] = $imageId->id;
        }

        if ($requestData['favicon_180'] != null) {
            $check = strripos($requestData['favicon_180'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['favicon_180']);
                $url = $url[3];
            } else {
                $url = $requestData['favicon_180'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['favicon_180'] = $imageId->id;
        }

        if ($requestData['manifest_192'] != null) {
            $check = strripos($requestData['manifest_192'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['manifest_192']);
                $url = $url[3];
            } else {
                $url = $requestData['manifest_192'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['manifest_192'] = $imageId->id;
        }

        if ($requestData['manifest_512'] != null) {
            $check = strripos($requestData['manifest_512'], "/");

            if (is_numeric($check)) {
                $url = explode('/',$requestData['manifest_512']);
                $url = $url[3];
            } else {
                $url = $requestData['manifest_512'];
            }

            $imageId = Gallery::where('url', $url)->first();
            $requestData['manifest_512'] = $imageId->id;
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
