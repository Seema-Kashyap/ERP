<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Session;

class CheckAdminAuth
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
        if(!Auth::check()){

            return redirect('/')->with('error',"Please Login First");

        }
        // else if(Auth::check()){

        //     // get user role permissions
        //     $user_details = User::where('id',Auth::user()->id)->first();

        //     if($user_details->role_id == '2' || $user_details->role_id == '3'){
        //         $permissions = $user_details->permissions;// get requested action
        //         $uri = $request->route()->uri();
        //         foreach ($permissions as $permission)
        //         {
        //             if ($permission->uri == $uri)
        //             {
        //                 // authorized request
        //                 return $next($request);
        //             }
        //         }

        //         if($uri == 'admin/dashboard'){

        //             return $next($request);

        //         }else if($uri == 'admin/my-profile'){

        //         	return $next($request);

        //         }else{

        //             // none authorized request
        //             return redirect()->back()->with('error',"You Don't Have Permission To Access This Page");
        //         }
        //     }

        // }
        
        return $next($request);
    }
}
