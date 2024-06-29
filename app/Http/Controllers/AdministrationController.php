<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http;
use App\Models\User;
use App\Models\Setup\SetGender;
class AdministrationController extends Controller
{
    public function index(Request $request): View
    {
        $formname = substr($request->getPathInfo(), -8);
        $tabledata = [];
        if ($formname == 'SEC_0003') {
            $tabledata = User::latest()->get();
        }
        return view('administration.' . $formname, compact('tabledata'));
    }

    public function edit(Request $request,$formname,$recordid): View
    {
        //  dd($recordid);
        // $pathinfo=$request->getPathInfo();
        // dd(strrev($pathinfo));
        // dd(strrev(substr(strrev($pathinfo),strpos(strrev($pathinfo),'/')+1,13)));
        //$formname = strrev(substr(strrev($pathinfo),strpos(strrev($pathinfo),'/')+1,13));
        
        $tabledata = [];
        if ($formname == 'SEC_0003_EDIT') {
            $tabledata = User::findOrFail($recordid);
            $erpgender = SetGender::get();
            //  dd($erpgender);

        }
        return view('administration.' . $formname, compact('tabledata','erpgender'));
    }

    public function dashboard(Request $request): View
    {
        $this->getmoduleActionRights($request, '0');
        $abc = 1;
        return view('admin.index');
    }

    public function getmoduleActionRights(Request $request, string $pmoduleaction): array
    {
        //   dd($pmoduleaction);
        $userid = Auth::user()->user_id;
        $menudata = DB::select(
            "select * 
            from vw_sys_users_module um 
            where user_id=$userid and um.module_action='$pmoduleaction'
             and active='Y'"
        );
        // dd($menudata[0]->rn);
        // dd($menudata);
        session()->forget('g_user_access');
        session()->put("g_user_access", $menudata);
        // dd(session()->get("g_user_access")==null);
        return $menudata;
    }
}
