<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    /**
     *  this query call for existing user and supplies infor from database
     */
    public function login(Request $request)
    {
        # validation rules
        $rules = [
            'password' => 'required',
            'email' => 'required',
        ];

        # validator
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # collate data from login form
            $email = $request->email;
            $password = $request->password;

            # check if user record exists
            $checkUserAccount = UserAccount::where('email', $email)->first();

            if ($checkUserAccount) {

                # hash password
                $hashPassword = $checkUserAccount->password;

                # check password validity
                $passwordCheck = Hash::check($password, $hashPassword);

                if ($passwordCheck) {
                    # check if user record is active
                    $checkUserAccountActive = UserAccount::where('email', $email)->where('status', 'active')->first();
                    if ($checkUserAccountActive){
                        $session = Session::put('user', $checkUserAccount->email);
                      // UserAccount::where('id_number',$checkUserAccount->id_number)->update([
                      //      'is_online'=>'1'
                     //   ]);
                      
                        return redirect()->to('user/home')->with($session);
                     
                    }else{
                        $error = Session::flash('error', 'Account Suspended.');
                        return redirect()->to('administrator/suspension');
                    }
                } else {
                    $error = Session::flash('error', 'Invalid login credentials.');
                    return redirect()->back()->withInput()->with($error);
                }
            } else {
                $error = Session::flash('error', 'Invalid login credentials.');
                return redirect()->back()->withInput()->with($error);
            }
        }
    }
}
