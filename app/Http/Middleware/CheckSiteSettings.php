<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSiteSettings
{
    public function handle($request, Closure $next)
    {
        if (!$this->siteSettingsExist()) {
            return redirect()->route('admin.site-settings.index');
        }

        return $next($request);
    }

    private function siteSettingsExist()
    {
        // Здесь выполните проверку наличия настроек сайта
        // Например, проверьте наличие записи в базе данных
        return SiteSetting::count() > 0;
    }
}
