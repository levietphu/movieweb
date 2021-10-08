<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ViewCountMovie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $movie = $this->checkSession();
        if (!is_null($movie)) {
            $movie = $this->testTimeInMovie($movie);
            $this->putSession($movie);
        }
        return $next($request);
    }
    public function checkSession()
    {
        return Session::get('view_count',null);
    }
    public function testTimeInMovie($movie)
    {
        $now = Carbon::now();
        return array_filter($movie, function ($timestamp) use ($now)
        {
            return $timestamp->diffInMinutes($now)<2;
        });
    }
    public function putSession($movie)
    {
        return Session::put('view_count',$movie);
    }
}
