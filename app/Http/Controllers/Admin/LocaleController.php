<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale(Request $request)
    {
        $localization = Localization::where('code', $request->locale)->first();

        session(['admin_locale' => $request->locale]);
        session(['locale_id' => $localization->id]);

        return session('admin_locale');
    }
}
