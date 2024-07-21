<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roleid = Auth::user()->role_id;
        $routeName = Route::currentRouteName();

        $route     = DB::table('routes')
                    ->where('route_name', $routeName)
                    ->first();
       if($route !=null){
           $permisions = DB::table("permissions")
               ->where('role_id', $roleid)
               ->where('route_id', $route->id)
               ->first();
           if($permisions != null){
               if($permisions->status == 0){
                   return redirect()->route('admin');
               }
           }else{
               return redirect()->route('admin');
           }
       }else{
           return redirect()->route('admin');
       }

        return $next($request);
    }
}
