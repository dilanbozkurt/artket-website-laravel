<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
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
        // TODO: Add your logic here.

        if(!session('current_user_id')){
            return redirect('sign_in');
        }else{
            return $next($request);
        }

    }
}