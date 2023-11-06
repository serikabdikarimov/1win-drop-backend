<?php

namespace App\Http\Middleware;

use App\Models\Domain;
use App\Models\Localization;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //$domains = Domain::pluck('domain_name')->toArray();
        $domain = Localization::where('locale_name' , $request->getHost())->where('is_active', "1")->first();
        // if ($request->getHost() == env('ADMIN_DOMAIN') && !$domain) {
        //     return redirect('/login');
        
        // } else
        if(!$domain)
        {
            return response('', 400);
        } 

        return $next($request);
    }
}
