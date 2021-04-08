<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
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
        if(Session::has("user")){
            if(Session::get("user")[0]->role_id!=1){
                return redirect("/");
            }

        }
        else{
                return redirect("/");
        }

        return $next($request);
    }
}
