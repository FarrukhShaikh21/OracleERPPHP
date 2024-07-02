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
        $moduleaction=$request->getPathInfo();

        if($useraccess=='editallow')
        {
            $path=strrev($moduleaction);
            $path=substr($moduleaction,0,strlen($moduleaction)-strpos($path,'/'));
            $moduleaction=basename($path) ."<br/>";
            $moduleaction=substr($moduleaction,0,8);
        }
        else
        {
            $moduleaction=substr($request->getPathInfo(),-8);
        }
        // dd($moduleaction);

        $menumodule =(new AdministrationController)->getmoduleActionRights($request,$moduleaction);
        //  DD($menumodule);
        if($menumodule==null)
        {
            return redirect('dashboard');   
        }
        
        // dd($useraccess);
        if($useraccess=='editallow' && $menumodule[0]->ALLOW_EDIT=='N')
        {
            return redirect('dashboard');

        }
        // dd(substr($request->getPathInfo(),-8));
        return $next($request);
    }
}
