<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SetLocale
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
        $locale = $request->session()->get('web.locale');
        if ($locale === null) {
            $request->session()->put('web.locale', 'zh');
            App::setLocale('zh');
        } else {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
