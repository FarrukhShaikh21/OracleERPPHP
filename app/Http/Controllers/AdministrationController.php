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
use App\Models\SysPasswordPolicyHeader;
use App\Models\SysUserPasswordPolicy;
use Illuminate\Support\Facades\Validator;
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
            $erppolicy = new SysPasswordPolicyHeader();
            $erpuserpolicy = new SysUserPasswordPolicy();
            $erpgender=$erpgender->getGenderList();
            $erpcountry=$erpcountry->getCountryList();
            $erppolicy=$erppolicy->getPasswordPolicyList();
            $erpuserpolicy=$erpuserpolicy->getUserPasswordPolicyList($recordid);
            
            //  dd($erpgender);
            $erppoplists = [
                "genderlov"=>$erpgender,
                "countrylov"=>$erpcountry,
                "policylov"=>$erppolicy
            ];

            $erpdetails = [
                "userpolicydetail"=>$erpuserpolicy
            ];
            // dd($erpgender);
            // dd($erppoplists["genderlist"]);

 
        }
        return view('administration.' . $formname, compact('tabledata','erppoplists','erpdetails'));
    }

    public function update(Request $request)
    {
        // dd($request);
       $validatedData = $request->validate([
        'USER_CODE'  => 'required|max:20|unique:SYS_USERS,USER_CODE,'.$request->USER_ID.',USER_ID',
        'CNIC_NO'    => 'required|min:13|max:13',
        'EMAIL'      => 'required',
        'FIRST_NAME' => 'required',
        'LAST_NAME'  => 'required'
    ],
    [
        'USER_CODE.required' => 'Please Enter Valid User Code',
        'USER_CODE.max'     => 'Login ID should not be greater than 20 characters',
        'USER_CODE.unique' => 'This User Code is already used.',
        'CNIC_NO.required' => 'Please Enter valid CNIC No',
        'CNIC_NO.min' => 'CNIC No Should be 13 Characters',
        'CNIC_NO.max' => 'CNIC No Should not be greater 13 Characters',
        'EMAIL.required' => 'Please Enter Valid Email',
        'FIRST_NAME.required' => 'Please Enter First Name',
        'LAST_NAME.required' => 'Please Enter Last Name'
    ]);
    // dd($validatedData);
    /*
    $validator = Validator::make($request->all(), [
        'USER_CODE' => 'required|unique:SYS_USERS,USER_CODE,'.$request->USER_ID.',USER_ID',
        'CNIC_NO' => 'required|min:13|max:13'
    ],
    [
        'USER_CODE.required' => 'Please Enter Valid User Code',
        'USER_CODE.unique' => 'This user code is already used.',
        'CNIC_NO.required' => 'Please Enter valid CNIC No',
        'CNIC_NO.min' => 'CNIC No Should be 13 Characters',
        'CNIC_NO.max' => 'CNIC No Should not be greater 13 Characters'
    ]
);

$notification = array(
    'message' => $validator->errors(),
    'alert-type' => 'error'
);

if ($validator->fails()) {
    return redirect()->back()->withErrors(['USER_CODE' => 'Invalid email address.'])
    ->withInput()
    ->with($notification);
}*/
    
    
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
