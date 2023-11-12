<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DefaultSetting;
use App\Models\Localization;
use App\Models\Gallery;
use App\Models\Robot;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $locale = Localization::where('id', session('locale_id'))->first();
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

        if (isset($requestData['favicon_32'])) {
            $image = $request->file('favicon_32');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['favicon_32'] = $originalName;
        }
        if (isset($requestData['favicon_64'])) {
            $image = $request->file('favicon_64');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['favicon_64'] = $originalName;
        }

        if (isset($requestData['favicon_180'])) {
            $image = $request->file('favicon_180');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['favicon_180'] = $originalName;
        }

        if (isset($requestData['manifest_192'])) {
            $image = $request->file('manifest_192');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['manifest_192'] = $originalName;
        }

        if (isset($requestData['manifest_512'])) {
            $image = $request->file('manifest_512');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['manifest_512'] = $originalName;
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
        $locale = Localization::where('id', $domainId)->first();
        return view('admin.default-settings.edit', compact('domainId', 'defaultsetting', 'locale'));
    }

    public function update(Request $request, $domainId)
    {
        $requestData = $request->all();

        $locale = Localization::where('id', $domainId)->first();

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

        if (isset($requestData['favicon_32'])) {
            $image = $request->file('favicon_32');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['favicon_32'] = $originalName;
        }
        if (isset($requestData['favicon_64'])) {
            $image = $request->file('favicon_64');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['favicon_64'] = $originalName;
        }

        if (isset($requestData['favicon_180'])) {
            $image = $request->file('favicon_180');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['favicon_180'] = $originalName;
        }

        if (isset($requestData['manifest_192'])) {
            $image = $request->file('manifest_192');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['manifest_192'] = $originalName;
        }

        if (isset($requestData['manifest_512'])) {
            $image = $request->file('manifest_512');
            $originalName = $image->getClientOriginalName();
            Storage::disk('public')->put($locale->locale_name . '/' . $originalName, file_get_contents($image));
            $requestData['manifest_512'] = $originalName;
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
