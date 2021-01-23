<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{

    public function handle(Request $request, Closure $next)
    {
        return $next($request)->header('Access-Control-Allow-Origin', '*') // maybe put this into the .env file so you can change the URL in production.
        ->header('Access-Control-Allow-Methods', '*');
    }
}
