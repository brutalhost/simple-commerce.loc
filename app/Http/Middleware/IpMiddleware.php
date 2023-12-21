<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class IpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::alert($request->toArray());
        $ipsAllow = config('commerce.yookassaIPs');

        // check ip is allowed
        if (count($ipsAllow) >= 1) {
            if (!in_array(request()->ip(), $ipsAllow)) {
                return response([
                    'success' => false,
                    'message' => 'You are blocked to call API!'
                ], 419);

            }

        }
        return $next($request);
    }
}
