<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class SiteSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $site_settings = config("site_settings");
        $site_settings["new_phone_hn"] = str_replace(".", "", $site_settings["phone_hn"]);
        $site_settings["new_phone_hcm"] = str_replace(".", "", $site_settings["phone_hcm"]);
        View::share('site_settings', $site_settings);
        return $next($request);
    }
}
