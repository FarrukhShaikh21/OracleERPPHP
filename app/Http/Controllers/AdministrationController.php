<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class AdministrationController extends Controller
{
    public function index(Request $request): View
    {
        return view('administration.SEC_0014');
    }

}
