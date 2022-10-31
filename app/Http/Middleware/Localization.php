<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('locale')){
            App()->setLocale(Session::get('locale'));
        }else{
            App()->setLocale(Session::get('ar'));

        }
        return $next($request);
    }
}
