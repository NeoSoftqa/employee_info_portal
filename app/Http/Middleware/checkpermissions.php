<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Rolepermission;

class checkpermissions
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
        if (Auth::check() && Auth::user()) {
            // echo "hi........";die;
            $username = Auth::user()->role_id;

            $permissions = Rolepermission::getPermissionsByRole($username); 

             $url = $request->path();
             $urlseg = explode('/', $url);
             

             if($url == 'home'){
                return $next($request);
            }else{
                // echo $url;echo"<hr>";
                // print_r($permissions);
                if (in_array($urlseg[0], (array)$permissions))
                  {
                  return $next($request);
                  }
                else
                  {
                    return redirect('home')->with('info', 'This Url access is restricted for this user');
                  }
            }
            // echo $url;die;
            return $next($request);

        }else{
            return redirect('login');
        }
        // abort(403);
        // $user = Auth::user();
        // return $user;die;
        // return $next($request)->with('user', $user);

    }
}
