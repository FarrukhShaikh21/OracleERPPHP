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
use App\Models\Setup\SmCountry;

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
            $erpgender = new SetGender();
            $erpcountry = new SmCountry();
            $erpgender=$erpgender->getGenderList();
            $erpcountry=$erpcountry->getCountryList();
            //  dd($erpgender);
            $erppoplists = [
                "genderlov"=>$erpgender,
                "countrylov"=>$erpcountry
            ];
            // dd($erpgender);
            // dd($erppoplists["genderlist"]);

 
        }
        return view('administration.' . $formname, compact('tabledata','erppoplists'));
    }

    public function update(Request $request)
    {
        //public function update(ContactRequest $request, Contact $contact)
       // {
        
       $validatedData = $request->validate([
        'CNIC_NO' => 'required|min:13|max:13'
    ]);
    //    dd($request->getPathInfo());
            // $request->validate($this->rules());
            $record=User::findOrFail($request->USER_ID);
            // DD($record);
            //  dd($request);
            $record->update([
                'USER_NAME'       => $request->FIRST_NAME.' '.$request->LAST_NAME,
                'IS_LOCK'         => $request->IS_LOCK,
                'USER_CODE'       => $request->USER_CODE,
                'SCAN_PATH'       => $request->SCAN_PATH,
                'SAVE_PATH'       => $request->SAVE_PATH,
                'CNIC_NO'         => $request->CNIC_NO,
                'FIRST_NAME'      => $request->FIRST_NAME,
                'LAST_NAME'       => $request->LAST_NAME,
                'MOBILE_NO'       => $request->MOBILE_NO,
                'PHONE_NO'        => $request->PHONE_NO,
                'DOB'             => $request->DOB,
                'COUNTRY_SNO'     => $request->COUNTRY_SNO,
                'CITY_SNO'        => $request->CITY_SNO,
                'GENDER_SNO'      => $request->GENDER_SNO,
                'ALLOWED_IP_ADDRESS' =>$request->ALLOWED_IP_ADDRESS,
                'EMAIL'           =>$request->EMAIL,
                'LOCK_DATE'       =>$request->LOCK_DATE,
                'USER_TYPE_SNO'   =>$request->USER_TYPE_SNO,
                'ACCESS_TYPE'     =>$request->ACCESS_TYPE,
                'REMARKS'         =>$request->REMARKS,
                'LAST_LOGIN_DATE' =>$request->LAST_LOGIN_DATE,
                'IS_EXPIRED'      =>$request->IS_EXPIRED,
                'EXPIRY_DATE'     =>$request->EXPIRY_DATE
                 
                


            ]);
            
            $notification = array(
                'message' => 'User Data Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect('sec/SEC_0003')->with($notification);

        // dd($request);
        // $request->validate($this->rules());
        
        //$contact->update($request->all());
        //return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }



    public function dashboard(Request $request): View
    {
        $this->getmoduleActionRights($request, '0');
        return view('admin.index');
    }

    public function getmoduleActionRights(Request $request, string $pmoduleaction): array
    {
        //   dd($pmoduleaction);
        $userid = Auth::user()->USER_ID;
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
