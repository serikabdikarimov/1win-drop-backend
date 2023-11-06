<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingsController extends Controller
{
    public function index()
    {
        return view('admin.site_settings.index');
    }

    public function store(Request $request)
    {
        // Валидация и сохранение настроек в базу данных
        $requestdData = $request->validate([
            'site_type' => 'required|in:multi_domain,multi_language',
            'name' => 'required',
            'locale_name' => 'required',
            'code' => 'required'
        ]);
        
        // Сохранение настроек в базу данных
        SiteSetting::create($requestdData);

        $localization = Localization::create($requestdData);

        // Редирект на страницу добавления локализации
        return redirect()->route('admin.localizations.edit', ['localization' => $localization->id]);
    }

    public function multiDomain(Request $request) 
    {
        return view('admin.site_settings.components.' . $request->input('syte_type'));
    }
}
