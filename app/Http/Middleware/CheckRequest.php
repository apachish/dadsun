<?php

namespace App\Http\Middleware;

use Closure;

class CheckRequest
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
        if (!$request->isJson() && !$request->isMethod('GET') && !$request->isMethod('DELETE')) {
            $status = 400;
            $response = [
                'errors' => 'Sorry, you can send json.'
            ];
            return response($response,$status);
        }
        return $next($request);
    }
}
