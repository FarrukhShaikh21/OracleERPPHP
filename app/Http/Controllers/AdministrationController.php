<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http;
class AdministrationController extends Controller
{
    public function index(Request $request): View
    {
        $abc=133;
        $formname=substr($request->getPathInfo(),-8);
        return view('administration.'.$formname);
    }

    
    public function dashboard(Request $request): View
    {
        // dd($request);
        // $menudata=DB::select("select 'farrukh shaikh' as rn");
        // dd($menudata[0]->rn);
        $abc=1;
        return view('admin.index');
    }

    public function getmoduleActionRights(Request $request,string $pmoduleaction): array {
        //   dd($pmoduleaction);
        $userid=Auth::user()->user_id;
         $menudata=DB::select(
            "select * 
            from vw_sys_users_module um 
            where user_id=$userid and um.module_action='$pmoduleaction'
             and active='Y'");
        // dd($menudata[0]->rn);
        session()->forget('g_user_access');
        session()->put("g_user_access",$menudata);
        return $menudata;
    }
    

}
