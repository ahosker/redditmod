<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HaveRedditAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //dd($request->user()->has('redditAuth'));

        //chefk if User has Reddit Auth
        if (! $request->user()->has('redditAuth')->exists()) {
            return redirect()->route('reddit.auth');
        }

        return $next($request);
    }
}
