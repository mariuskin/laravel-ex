<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use Session;

class RoleMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role1,$role2)
    {
        if (! ( ($request->user()->user_type === $role1) || ($request->user()->user_type === $role1) )) {

            Session::flash('flash_message', "Can't do that buddy!!!");
            Session::flash('alert-class', 'alert-danger'); 

            return redirect('/');
            
            
        }


        return $next($request);
    }

    



}
