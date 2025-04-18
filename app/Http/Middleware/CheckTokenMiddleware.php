<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedToken  = $request->query('token');
        $clientIp = $request->ip();
        $allowedIps = explode("," , env('ALLOWED_IPS'));
        $providedToken = env('TOKEN');


        if (!empty($allowedIps) && !in_array($clientIp, $allowedIps)) {
            Log::warning("IP not whitelisted", ['ip' => $clientIp]);
            return redirect()->route('home');
        }


        if ($expectedToken !== $providedToken) {
            Log::warning("Invalid token", ['token' => $expectedToken]);
            return redirect()->route('home');
        }


        Log::info("Token validated successfully", ['token' => $expectedToken , 'ip' => $clientIp, 'time' => now()]);


        
        return $next($request);

    }
}
