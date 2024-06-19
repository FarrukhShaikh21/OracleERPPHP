<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AdministrationController extends Controller
{
    public function index(Request $request): View
    {
        $abc=133;
        return view('administration.SEC_0014',compact('abc'));
    }

    
    public function dashboard(Request $request): View
    {
        // dd($request);
        // $menudata=DB::select("select 'farrukh shaikh' as rn");
        // dd($menudata[0]->rn);
        $abc=1;
        $session = session();
        $session->put('SideBarMenu', "true");
        return view('admin.index',compact('abc'));
    }
    

}
