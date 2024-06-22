<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdministrationController;
class ERPUserHasAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$useraccess): Response
    {
        $userid=Auth::user()->user_id;
        $moduleaction=substr($request->getPathInfo(),-8);
        $menumodule =(new AdministrationController)->getmoduleActionRights($request,$moduleaction);
         
        if($menumodule==null)
        {
            return redirect('dashboard');   
        }
        // dd(substr($request->getPathInfo(),-8));
        return $next($request);
    }
}
