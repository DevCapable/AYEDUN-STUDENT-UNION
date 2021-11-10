<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminAccount;
use App\Models\compound;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class adminLoginController extends Controller
{
    public function AdminLogin(Request $request)
    {
       
            # validation rules
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];
    
            # validator
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                try{

                    # collate data from login form
                    $username = $request->username;
                    $password = $request->password;
        
                    # check if user record exists
                    $checkAdminAccount = AdminAccount::where('AdminName', $username)->first();
        
                    if ($checkAdminAccount) {
        
                        # hash password
                        $hashPassword = $checkAdminAccount->password;
        
                        # check password validity
                        $passwordCheck = Hash::check($password, $hashPassword);
        
                        if ($passwordCheck) {
                            $session = Session::put('admin', $checkAdminAccount->AdminName);
                           // dd($passwordCheck);
                            return redirect()->to('administrator/home')->with($session);
                        } else {
                            $error = Session::flash('error', 'Invalid login credentials.');
                            return redirect()->back()->withInput()->with($error);
                        }
                    } else {
                        $error = Session::flash('error', 'Invalid login credentials.');
                        return redirect()->back()->withInput()->with($error);
                    }
                }catch(\Exception $e){

                }
            }
           
    }
}
