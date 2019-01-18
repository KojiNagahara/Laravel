<?php

namespace App\Http\Middleware;

use Closure;

class DbTransaction
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
        \DB::beginTransaction();
        $response = $next($request);
        if ($response->exception)
        {
            \DB::rollback();
        } else {
            \DB::commit();
        }

        return $response;
    }
}
