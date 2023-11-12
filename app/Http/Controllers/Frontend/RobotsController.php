<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DefaultSetting;
use App\Models\Localization;
use App\Models\Robot;

class RobotsController extends Controller
{
    public function robots()
    {
        $domain = Localization::where('locale_name', request()->getHost())->first();

        $robots = Robot::where(['locale_id' => $domain->id])->first();

        return response(view('frontend.robots.robots', compact('robots')))->header('Content-Type', 'text/plain');
    }

    public function manifest(){
        $domain = Localization::where('locale_name', request()->getHost())->first();

        $manifest = DefaultSetting::where(['locale_id' => $domain->id])->first();

        $data = [
            'name' => $manifest->manifest_name,
            'short_description' => $manifest->manifest_short_description,
            'description' => $manifest->manifest_description,
            'icons' => [
                [
                    "src" => $manifest->manifest_192 ? '/storage/' . $domain->locale_name . '/' . $manifest->manifest_192 : '',
                    "sizes" => "192x192",
                    "type" => "image/png"
                ],
                [
                    "src" => $manifest->manifest_512 ? '/storage/' . $domain->locale_name . '/' . $manifest->manifest_512 : '',
                    "sizes" => "512x512",
                    "type" => "image/png"
                ]
            ],
            'theme_color' => $manifest->manifest_theme_color,
            'background_color' => $manifest->manifest_background_color,
        ];

        return response()->json($data)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
