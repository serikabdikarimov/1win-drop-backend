<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use App\Models\Robot;

class RobotsController extends Controller
{
    public function robots()
    {
        $domain = Localization::where('domain_name', request()->getHost())->first();

        $robots = Robot::where(['domain_id' => $domain->id])->first();

        return response(view('frontend.robots.robots', compact('robots')))->header('Content-Type', 'text/plain');
    }
}
