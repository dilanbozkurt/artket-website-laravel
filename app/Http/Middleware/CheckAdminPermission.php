<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoleModel;

class CheckAdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if(session('current_user_id')){
            $current_user_id = session('current_user_id');

            $role=RoleModel::where('user_id',$current_user_id)->first();
    
            if($role->label != '1'){
                return back();
            }else{
                return $next($request);
            }
        }else{
            return redirect('sign_in');
        }

    }
}
