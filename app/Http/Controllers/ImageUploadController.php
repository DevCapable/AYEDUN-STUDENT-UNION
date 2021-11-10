<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
class ImageUploadController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();
        $fileName= $request->file('image')->getClientOriginalName();
        $request->image->move(storage_path('public_html/images'), $imageName);
        $user = $request->session()->get('user');

        # verify if user email exist
        $verifyUsername = UserAccount::where('username', $user->username)->first();

        if ($verifyUsername) {
            try {
                # create user data
                UserAccount::find($verifyUsername->id)->update([
                    'picture' => 'images/'.$fileName
                ]);

                $success = Session::flash('success', 'Uploaded successfully.');
                return back()->with($success); 
            } catch (\Exception $ex) {
                $error = Session::flash('error', 'Uploading failed.');
                return redirect()->back()->withInput()->with($error);
            }
        } else {
            return redirect()->back();
        }
    }
}