<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class ConfirmDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = $request->input('token');

        if ($accessToken !== null) {
            $confirm = Carbon::now()->format('d-m-Y');
            $acc = Carbon::parse($accessToken)->format('d-m-Y');

            if ($confirm === $acc) {
                return $next($request);
            }
        }
        return response("access denied");
    }
}
