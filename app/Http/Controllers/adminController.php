<?php

namespace App\Http\Controllers;

use App\Models\Compound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminAccount;
use App\Models\UserAccount;
use App\Models\Sports;
use App\Models\AdminIbox;
use App\Models\MissAsu;
use App\Models\NationalPresident;
use App\Models\NationalExecutive;
use App\Models\ChapterPresident;
use App\Models\AdminPost;
use App\Models\AdminLike;
use App\Models\listofallschool;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class adminController extends Controller
{
    public function Adminhome(Request $request)
    {
        try {

            # logged in user
            $loggedInAdmin = $request->session()->get('admin');
            # get user data
            $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();

            if ($admin) {
                // $AdminPosts = AdminPost::with('AdminLikes')->orderBy('id', 'DESC')->paginate(4);
                #set all the comment accordingly
                $AdminPosts = AdminPost::orderBy('id', 'DESC')->paginate(4);
                // know the total number of compound
                $totalCompound = Compound::get()->count() - 1;
                // know the total number of student
                // know the total number of StakeHolder
                $totalStakekholder = UserAccount::where('stakeHolder', 'STAKEHOLDER')->get()->count();
                $totalGuest = UserAccount::where('guest', 'GUEST')->get()->count();
                $totalStudent = UserAccount::count() - $totalStakekholder - $totalGuest;
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                return view::make('admin/AdminHome')->with([
                    'unreadMessage' => $unreadMessage,
                    'admin' => $admin,
                    'AdminPosts' => $AdminPosts,
                    'totalStakekholder' => $totalStakekholder,
                    'totalGuest' => $totalGuest,
                    'totalStudent' => $totalStudent,
                    'totalCompound' => $totalCompound,
                    'AdminInboxs' => $AdminInboxs
                ]);
            } else {
                return redirect()->to('/Administrator');
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function Manage_Users(Request $request)
    {
        try {
            $loggedInUser = $request->session()->get('admin');
            $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
            // dd($admin);
            if ($admin) {
                // to search for a user
                $userRequest = $request->question;
                if ($userRequest == '') {
                    $users = UserAccount::orderBy('username', 'ASC')->paginate(4);
                    # get user data
                    //total message unread
                    $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                    //get new notification
                    $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                    return view::make('admin/Manage_Users')->with([
                        'unreadMessage' => $unreadMessage,
                        'AdminInboxs' => $AdminInboxs,
                        'admin' => $admin,
                        'users' => $users
                    ]);
                } elseif ($userRequest) {

                    $SearchResult = UserAccount::where('username', 'Like', '%' . $userRequest . '%');
                    $users = $SearchResult->orderBy('username', 'DESC')->paginate(10);
                    // searching logic ends here
                    /*** $notification = array(
                        'message' => 'This are likely results for your search?!',
                        'alert-type' => 'info'
                    );
                    return redirect()->back()->with($notification);
                     **/
                    return view::make('admin/Manage_Users')->with([
                        'admin' => $admin,
                        'users' => $users
                    ]);
                } else {

                    $users = UserAccount::orderBy('username', 'ASC')->paginate(4);
                    # get user data
                    return view::make('admin/Manage_Users')->with([
                        'admin' => $admin,
                        'users' => $users
                    ]);
                }
            } else {
                return redirect()->to('/administrator');
            }
        } catch (\Exception $ex) {
            dd($ex);
            return redirect();
        }
    }

    public function Manage_Compounds(Request $request)
    {
        try {
            $loggedInAdmin = $request->session()->get('admin');
            if ($loggedInAdmin) {

                $compounds = compound::orderBy('id', 'ASC')->paginate(5);

                # get user data
                $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Manage_Compounds')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'compounds' => $compounds
                ]);
            } else {
                return redirect()->to('/AdminHome');
            }
        } catch (\Exception $ex) {
            return redirect();
        }
    }

    public function  Create_Compound(Request $request)
    {
        #set the rules here
        $rules = [
            'Name_of_Compound' => 'required|',
            'head_of_compound' => 'required|',
            'history_of_compound' => 'required|',
            'origin' => 'required|',
            'culture_of_compound' => 'required|',
            'phone' => 'required|',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # collate the date
            $Name_of_Compound = $request->Name_of_Compound;
            $head_of_compound = $request->head_of_compound;
            $history_of_compound = $request->history_of_compound;
            $origin = $request->origin;
            $culture_of_compound = $request->culture_of_compound;
            $phone = $request->phone;

            # verify if record exist
            # verify if username exist
            $verifyCompound = compound::where('Name_of_Compound', $Name_of_Compound)->first();

            if ($verifyCompound) {
                $error =  Session::flash('Compound Already Exist');
                return redirect()->back()->withInput()->withErrors($error);
            } else {

                try {
                    # create user data
                    compound::create([
                        'Name_of_Compound' => $Name_of_Compound,
                        'head_of_compound' => $head_of_compound,
                        'history_of_compound' => $history_of_compound,
                        'origin' => $origin,
                        'culture_of_compound' => $culture_of_compound,
                        'phone' => $phone,

                    ]);


                    $notification = array(
                        'message' => 'Compound created successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {

                    $notification = array(
                        'message' => 'Can not create Compound due to internal error.!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
        }
    }

    public function Edit_compound_page(Request $request)
    {
        try {
            $loogedInAdmin = $request->session()->get('admin');
            if ($loogedInAdmin) {
                #get user data here
                #$userId_to_edit = $id;
                $user = AdminAccount::where('AdminName', $loogedInAdmin)->first();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Update_Compound')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'user' => $user
                ]);
            } else {
                return redirect()->to('/administrator');
            }
        } catch (\Exception $ex) {
            return redirect();
        }
    }

    public function Update_Compound(Request $request)
    {
        # first of all u need to have a vallidation rules
        $rules = [
            'id' => 'required',
            'Name_of_Compound' => 'required',
            'head_of_compound' => 'required|',
            'history_of_compound' => 'required|',
            'origin' => 'required|',
            'culture_of_compound' => 'required|',
            'phone' => 'required|',

        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # now thirdly you COLLATE ALL THE DATA YOU WISH TO ACCEPT FROM INPUT
            $Name_of_Compound = $request->Name_of_Compound;
            $id = $request->id;
            $head_of_compound = $request->head_of_compound;
            $history_of_compound = $request->history_of_compound;
            $origin = $request->origin;
            $culture_of_compound = $request->culture_of_compound;
            $phone = $request->phone;

            # verify if user email exist
            $admin = $request->session()->get('admin');
            $verifyAdmin = AdminAccount::where('AdminName', $admin)->first();
            # $row = compound::where('id', $id)->first();
            #dd($row);
            if ($verifyAdmin) {
                try {
                    # Now final stage since it has passed all test and conditions
                    # we update now
                    # create user data
                    compound::where('id', $id)->update([
                        'Name_of_Compound' => $Name_of_Compound,
                        'head_of_compound' => $head_of_compound,
                        'history_of_compound' => $history_of_compound,
                        'origin' => $origin,
                        'culture_of_compound' => $culture_of_compound,
                        'phone' => $phone,
                    ]);



                    $notification = array(
                        'message' => 'Compound Updated Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {

                    $notification = array(
                        'message' => 'System can not update please try again!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
        }
    }

    public function Edit_Compound(Request $request, $id)
    {
        try {
            # logged in user
            $loggedInAdmin = $request->session()->get('admin');
            if ($loggedInAdmin) {
                #set all the comment accordingly
                $compound = compound::where('id', $id)->first();
                # get user data
                $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Edit_Compound')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'compound' => $compound
                ]);
            } else {
                return redirect()->to('/Administrator');
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function ChangeCompoundDp(Request $request)
    {
        $request->validate = [
            'image', 'required|image|mimes:jpeg,jpg,svg,png,gif|max:2045',
            'id', 'required|',
        ];
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $id = $request->id;
        // get current session
        $LoggedInAdmin = $request->session()->get('admin');
        $VerifyUser = AdminAccount::where('AdminName', $LoggedInAdmin)->first();
        if ($VerifyUser) {
            try {
                $ToDelete = compound::find($id);
                compound::where('id', $id)->update([
                    'head_image' => 'images/' . $imageName
                ]);

                if (!empty($ToDelete->head_image)) {
                    unlink($ToDelete->head_image);
                }

                $notification = array(
                    'message' => 'Dp changed Successfully.!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                dd($ex);
            }
        }
    }

    public function delete_compound(Request $request, $id)
    {

        try {
            $deleteCompound =   compound::where('id', $id)->delete();

            if ($deleteCompound) {
                $notification = array(
                    'message' => 'Compound has been deleted successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Can not Delete This Compound!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function manageStakeHolders(Request $request)
    {
        $loggedInUser = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {
                $stakeHolders = UserAccount::where('stakeholder', 'STAKEHOLDER')->orderBy('username', 'ASC')->paginate(5);
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/manageAllStakeHolders')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'stakeHolders' => $stakeHolders,
                    'admin' => $admin
                ]);
            } catch (\Exception $ex) {

                return redirect()->to('/');
            }
        }
    }


    # this methord to renders manage Sport page
    public function Manage_Sports(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        if ($loggedInAdmin) {
            try {
                #get sports data
                $sportDetails = Sports::orderBy('full_name', 'asc')->paginate();
                #get Admin data
                $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
                # get compounds data
                $getCompound = compound::all();
                $listOfSchools = listofallschool::all();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Manage_Sports')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'sportDetails' => $sportDetails,
                    'getCompound' => $getCompound,
                    'listOfSchools' => $listOfSchools,
                ]);
            } catch (\Exception $ex) {
                return redirect()->to('/');
            }
        }
    }

    public function  Create_Sport(Request $request)
    {
        #set the rules here
        $rules = [
            'full_name' => 'required|',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'sport' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # collate the date
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $sport = $request->sport;
            $history = $request->history;
            $phone = $request->phone;

            # verify if record exist
            # verify if username exist



            try {
                # create user data
                Sports::create([
                    'full_name' => $full_name,
                    'compound' => $compound,
                    'gender' => $gender,
                    'discepline' => $discepline,
                    'institution' => $institution,
                    'date_of_birth' => $date_of_birth,
                    'year_of_tenure_from' => $year_of_tenure_from,
                    'year_of_tenure_to' => $year_of_tenure_to,
                    'sport' => $sport,
                    'history' => $history,
                    'phone' => $phone,

                ]);
                $notification = array(
                    'message' => 'Sport Director created successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Can not create Sport Director due to internal error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }


    public function Edit_sports(Request $request, $id)
    {
        # logged in user
        $loggedInAdmin = $request->session()->get('admin');
        # get user data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                $listOfSchools = listofallschool::all();
                #set all the comment accordingly
                $SportDetails = Sports::where('id', $id)->first();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Edit_Sports')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'SportDetails' => $SportDetails,
                    'listOfSchools' => $listOfSchools,
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/Administrator');
        }
    }

    public function Update_Sports(Request $request)
    {
        # first of all u need to have a vallidation rules
        $rules = [
            'id' => 'required',
            'full_name' => 'required',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'sport' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # now thirdly you COLLATE ALL THE DATA YOU WISH TO ACCEPT FROM INPUT
            $id = $request->id;
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $sport = $request->sport;
            $history = $request->history;
            $phone = $request->phone;

            # verify if user email exist
            $admin = $request->session()->get('admin');
            $verifyAdmin = AdminAccount::where('AdminName', $admin)->first();
            # $row = compound::where('id', $id)->first();
            #dd($row);
            if ($verifyAdmin) {
                try {
                    # Now final stage since it has passed all test and conditions
                    # we update now
                    # create user data
                    Sports::where('id', $id)->update([
                        'full_name' => $full_name,
                        'compound' => $compound,
                        'gender' => $gender,
                        'discepline' => $discepline,
                        'institution' => $institution,
                        'date_of_birth' => $date_of_birth,
                        'year_of_tenure_from' => $year_of_tenure_from,
                        'year_of_tenure_to' => $year_of_tenure_to,
                        'sport' => $sport,
                        'history' => $history,
                        'phone' => $phone,
                    ]);
                    $success = Session::flash('success', 'Sport Director Updated Successfully.');
                    return redirect()->back()->with($success);
                    $notification = array(
                        'message' => 'Sport Director Updated Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $notification = array(
                        'message' => 'System can not update please try again!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withInput()->withErrors($notification);
                }
            }
        }
    }

    public function ChangeSportDp(Request $request)
    {
        $request->validate = ([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . "_" . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $id = $request->id;
        //get current session
        $loggedInUser = $request->session()->get('admin');
        //verify loggedin session
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {
                $ToDelete = Sports::find($id);
                Sports::where('id', $id)->update([
                    'picture' => $imageName,
                    'picture' => 'images/' . $imageName
                ]);
                if (!empty($ToDelete->picture)) {
                    unlink($ToDelete->picture);
                }
                $notification = array(
                    'message' => 'Display Picture Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Unable to upload this file',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function Delete_Sports(Request $request, $id)
    {
        try {
            $toDelete = Sports::find($id);
            $DeletSports = Sports::where('id', $id)->delete();
            if (!empty($toDelete->picture)) {
                unlink($toDelete->picture);
            }
            if ($DeletSports) {
                $notification = array(
                    'message' => 'Sport Director Deleted Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Can not Delete This Record!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    # this methord to renders manage Sport page
    public function Manage_MissAsu(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        #get Admin data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            #get sports data
            $MissAsus = MissAsu::orderBy('full_name', 'asc')->paginate();
            $listOfSchools = listofallschool::all();
            # get compounds data
            $getCompound = compound::all();
            //total message unread
            $unreadMessage = AdminIbox::where('status', 'notRead')->count();
            return view::make('admin/Manage_MissAsu')->with([
                'unreadMessage' => $unreadMessage,
                'admin' => $admin,
                'MissAsus' => $MissAsus,
                'getCompound' => $getCompound,
                'listOfSchools' => $listOfSchools,
            ]);
        }
    }

    public function  Create_MissAsu(Request $request)
    {
        #set the rules here
        $rules = [
            'full_name' => 'required|',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'sport' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # collate the date
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $sport = $request->sport;
            $history = $request->history;
            $phone = $request->phone;

            # verify if record exist
            # verify if username exist



            try {
                # create user data
                MissAsu::create([
                    'full_name' => $full_name,
                    'compound' => $compound,
                    'gender' => $gender,
                    'discepline' => $discepline,
                    'institution' => $institution,
                    'date_of_birth' => $date_of_birth,
                    'year_of_tenure_from' => $year_of_tenure_from,
                    'year_of_tenure_to' => $year_of_tenure_to,
                    'sport' => $sport,
                    'history' => $history,
                    'phone' => $phone,

                ]);
                $notification = array(
                    'message' => 'Sport MISS ASU created successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Can not create MISS ASU due to internal error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withInput()->withErrors($notification);
            }
        }
    }

    public function Edit_MissAsu(Request $request, $id)
    {
        # logged in user
        $loggedInAdmin = $request->session()->get('admin');
        # get user data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                #set all the comment accordingly
                $MissAsus = MissAsu::where('id', $id)->first();
                $listOfSchools = listofallschool::all();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Edit_MissAsu')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'MissAsus' => $MissAsus,
                    'listOfSchools' => $listOfSchools,
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/');
        }
    }
    public function Update_MissAsu(Request $request)
    {
        # first of all u need to have a vallidation rules
        $rules = [
            'id' => 'required',
            'full_name' => 'required',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'sport' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # now thirdly you COLLATE ALL THE DATA YOU WISH TO ACCEPT FROM INPUT
            $id = $request->id;
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $sport = $request->sport;
            $history = $request->history;
            $phone = $request->phone;

            # verify if user email exist
            $admin = $request->session()->get('admin');
            $verifyAdmin = AdminAccount::where('AdminName', $admin)->first();
            # $row = compound::where('id', $id)->first();
            #dd($row);
            if ($verifyAdmin) {
                try {
                    # Now final stage since it has passed all test and conditions
                    # we update now
                    # create user data
                    MissAsu::where('id', $id)->update([
                        'full_name' => $full_name,
                        'compound' => $compound,
                        'gender' => $gender,
                        'discepline' => $discepline,
                        'institution' => $institution,
                        'date_of_birth' => $date_of_birth,
                        'year_of_tenure_from' => $year_of_tenure_from,
                        'year_of_tenure_to' => $year_of_tenure_to,
                        'sport' => $sport,
                        'history' => $history,
                        'phone' => $phone,
                    ]);




                    $notification = array(
                        'message' => 'Sport Director Updated Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $notification = array(
                        'message' => 'System can not update please try again!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withInput()->withErrors($notification);
                }
            }
        }
    }

    public function ChangeMissAsuDp(Request $request)
    {
        $request->validate = ([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . "_" . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $id = $request->id;
        //get current session
        $loggedInUser = $request->session()->get('admin');
        //verify loggedin session
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {
                $ToDelete = MissAsu::find($id);
                MissAsu::where('id', $id)->update([
                    'picture' => $imageName,
                    'picture' => 'images/' . $imageName
                ]);
                if (!empty($ToDelete->picture)) {
                    unlink($ToDelete->picture);
                }
                $notification = array([
                    'message' => 'Display Picture Changed Successfully',
                    'Alert-Type' => 'success'
                ]);
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array([
                    'message' => 'Unable to Changed Dp please Try Again',
                    'Alert-Type' => 'error'
                ]);
                return redirect()->back()->with($notification);
            }
        }
    }

    public function Delete_MissAsu(Request $request, $id)
    {
        try {
            $toDelete = MissAsu::find($id);
            $DeletMissAsu = MissAsu::where('id', $id)->delete();
            // locate the parth and also the delete for images
            if (!empty($toDelete->picture)) {
                unlink($toDelete->picture);
            }

            if ($DeletMissAsu) {
                $notification = array(
                    'message' => 'Miss Asu Deleted Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Can not Delete This Record!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }


    public function Manage_National_President(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        #get Admin data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            #get sports data
            $NationalPresidents = NationalPresident::orderBy('full_name', 'asc')->paginate(5);
            $listOfSchools = listofallschool::all();
            # get compounds data
            $getCompound = compound::all();
            //total message unread
            $unreadMessage = AdminIbox::where('status', 'notRead')->count();
            //get new notification
            $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
            return view::make('admin/Manage_National_President')->with([
                'unreadMessage' => $unreadMessage,
                'AdminInboxs' => $AdminInboxs,
                'admin' => $admin,
                'NationalPresidents' => $NationalPresidents,
                'getCompound' => $getCompound,
                'listOfSchools' => $listOfSchools,
            ]);
        }
    }

    public function  Create_National_President(Request $request)
    {
        #set the rules here
        $rules = [
            'full_name' => 'required|',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'post' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # collate the date
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $post = $request->post;
            $history = $request->history;
            $phone = $request->phone;

            # verify if record exist
            # verify if username exist



            try {
                # create user data
                NationalPresident::create([
                    'full_name' => $full_name,
                    'compound' => $compound,
                    'gender' => $gender,
                    'discepline' => $discepline,
                    'institution' => $institution,
                    'date_of_birth' => $date_of_birth,
                    'year_of_tenure_from' => $year_of_tenure_from,
                    'year_of_tenure_to' => $year_of_tenure_to,
                    'post' => $post,
                    'history' => $history,
                    'phone' => $phone,

                ]);
                $notification = array(
                    'message' => 'New National President Created Successfully.!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Can not create President due to internal error.!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withInput()->withErrors($notification);
            }
        }
    }

    public function Edit_National_President(Request $request, $id)
    {
        # logged in user
        $loggedInAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                $NationalPresidents = NationalPresident::where('id', $id)->first();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Edit_National_President')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'NationalPresidents' => $NationalPresidents
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            return redirect()->back('/Administrator');
        }
    }

    public function Update_National_President(Request $request)
    {
        # first of all u need to have a vallidation rules
        $rules = [
            'id' => 'required',
            'full_name' => 'required',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'post' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # now thirdly you COLLATE ALL THE DATA YOU WISH TO ACCEPT FROM INPUT
            $id = $request->id;
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $post = $request->post;
            $history = $request->history;
            $phone = $request->phone;

            # verify if user email exist
            $loggInUser = $request->session()->get('admin');
            $admin = AdminAccount::where('AdminName', $loggInUser)->first();
            # $row = compound::where('id', $id)->first();
            #dd($row);
            if ($admin) {
                try {
                    # Now final stage since it has passed all test and conditions
                    # we update now
                    # create user data
                    NationalPresident::where('id', $id)->update([
                        'full_name' => $full_name,
                        'compound' => $compound,
                        'gender' => $gender,
                        'discepline' => $discepline,
                        'institution' => $institution,
                        'date_of_birth' => $date_of_birth,
                        'year_of_tenure_from' => $year_of_tenure_from,
                        'year_of_tenure_to' => $year_of_tenure_to,
                        'post' => $post,
                        'history' => $history,
                        'phone' => $phone,
                    ]);
                    $notification = array(
                        'message' => 'National President Updated Successfully.!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $notification = array(
                        'message' => 'System can not update please try again.!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withInput()->withErrors($notification);
                }
            }
        }
    }

    public function ChangeNationalDp(Request $request)
    {
        $request->validate = ([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id' => 'required|'
        ]);
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $id = $request->id;
        //get current session
        $loggedInUser = $request->session()->get('admin');
        //verify loggedin session
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {
                $ToDelete = NationalPresident::find($id);
                NationalPresident::where('id', $id)->update([
                    'picture' => 'images/' . $imageName
                ]);
                if (!empty($ToDelete->picture)) {
                    unlink($ToDelete->picture);
                }
                $notification = array(
                    'message' => 'Display Picture Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Unable to upload file',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }


    public function Delete_National_President(Request $request, $id)
    {
        try {
            $toDelete = NationalPresident::find($id);
            $DeleteNational = NationalPresident::where('id', $id)->delete();
            if (!empty($toDelete->picture)) {
                unlink($toDelete->picture);
            }
            if ($DeleteNational) {
                $notification = array(
                    'message' => 'National President Deleted Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Can not Delete This Record!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function Manage_Chapter_President(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        #get Admin data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                #get Chapter data
                $ChapterPresidents = ChapterPresident::orderBy('full_name', 'asc')->paginate();
                $listOfSchools = listofallschool::all();
                # get compounds data
                $getCompound = AdminIbox::all();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Manage_Chapter_President')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'ChapterPresidents' => $ChapterPresidents,
                    'getCompound' => $getCompound,
                    'listOfSchools' => $listOfSchools,
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        }
        return redirect()->back()->to('/');
    }
    public function  Create_Chapter_President(Request $request)
    {
        #set the rules here
        $rules = [
            'full_name' => 'required|',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'post' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # collate the date
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $post = $request->post;
            $history = $request->history;
            $phone = $request->phone;

            # verify if record exist
            # verify if username exist



            try {
                # create user data
                ChapterPresident::create([
                    'full_name' => $full_name,
                    'compound' => $compound,
                    'gender' => $gender,
                    'discepline' => $discepline,
                    'institution' => $institution,
                    'date_of_birth' => $date_of_birth,
                    'year_of_tenure_from' => $year_of_tenure_from,
                    'year_of_tenure_to' => $year_of_tenure_to,
                    'post' => $post,
                    'history' => $history,
                    'phone' => $phone,

                ]);
                $notification = array(
                    'message' => 'New Chapter President Created Successfully.!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Can not create President due to internal error.!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withInput()->withErrors($notification);
            }
        }
    }

    public function Edit_Chapter_President(Request $request, $id)
    {
        # logged in user
        $loggedInAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                // get list of schools
                $listOfSchools = listofallschool::all();
                $ChapterPresidents = ChapterPresident::where('id', $id)->first();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/Edit_Chapter_President')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'ChapterPresidents' => $ChapterPresidents,
                    'listOfSchools' => $listOfSchools,
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            return redirect()->back('/Administrator');
        }
    }

    public function Update_Chapter_President(Request $request)
    {
        # first of all u need to have a vallidation rules
        $rules = [
            'id' => 'required',
            'full_name' => 'required',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'post' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # now thirdly you COLLATE ALL THE DATA YOU WISH TO ACCEPT FROM INPUT
            $id = $request->id;
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $post = $request->post;
            $history = $request->history;
            $phone = $request->phone;

            # verify if user email exist
            $loggedInUser = $request->session()->get('admin');
            $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
            # $row = compound::where('id', $id)->first();
            #dd($row);
            if ($admin) {
                try {
                    # Now final stage since it has passed all test and conditions
                    # we update now
                    # create user data
                    ChapterPresident::where('id', $id)->update([
                        'full_name' => $full_name,
                        'compound' => $compound,
                        'gender' => $gender,
                        'discepline' => $discepline,
                        'institution' => $institution,
                        'date_of_birth' => $date_of_birth,
                        'year_of_tenure_from' => $year_of_tenure_from,
                        'year_of_tenure_to' => $year_of_tenure_to,
                        'post' => $post,
                        'history' => $history,
                        'phone' => $phone,
                    ]);
                    $notification = array(
                        'message' => 'chapter President Updated Successfully.!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $notification = array(
                        'message' => 'System can not update please try again.!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withInput()->withErrors($notification);
                }
            }
        }
    }

    public function ChangeChapterDp(Request $request)
    {
        $request->validate = ([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . "_" . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $id = $request->id;
        //get current session
        $loggedInUser = $request->session()->get('admin');
        //verify loggedin session
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {

                $ToDelete = ChapterPresident::find($id);
                ChapterPresident::where('id', $id)->update([
                    'picture' => $imageName,
                    'picture' => 'images/' . $imageName
                ]);
                $notification = array(
                    'message' => 'Display Picture Changed Successfully',
                    'alert-type' => 'success'
                );
                if (!empty($ToDelete->picture)) {
                    unlink($ToDelete->picture);
                }
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Unable to upload file',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }
    public function Delete_Chapter_President(Request $request, $id)
    {
        try {
            $toDelete = ChapterPresident::find($id);
            $DeleteChapter = ChapterPresident::where('id', $id)->delete();
            if (!empty($toDelete->picture)) {
                unlink($toDelete->picture);
            }
            if ($DeleteChapter) {


                $notification = array(
                    'message' => 'Chapter President Deleted Successfully.!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Can not Delete This Record!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function Inbox(Request $request)
    {

        $loggedInAdmin = $request->Session()->get('admin');
        #get Admin data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                # get compounds data
                $AdminInboxs = AdminIbox::orderBy('from_who', 'asc')->paginate(2);
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                // total number of message inbox
                $AllMessage = AdminIbox::count();
                return view::make('admin/Inbox')->with([
                    'unreadMessage' => $unreadMessage,
                    'AllMessage' => $AllMessage,
                    'admin' => $admin,
                    'AdminInboxs' => $AdminInboxs,
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        }
    }

    public function ReadMessage(Request $request, $id)
    {
        // get session data
        $loggedInAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                // get message from the table
                $Message = AdminIbox::where('id', $id)->first();
                if ($Message){
                    //total message unread
                    $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                    //get new notification
                    $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                    // total number of message inbox
                    $AllMessage = AdminIbox::count();
                    AdminIbox::where('id',$id)->update([
                        'status' => 'read'
                    ]);
                    return view::make('admin/ReadMessage')->with([
                        'unreadMessage' => $unreadMessage,
                        'AdminInboxs' => $AdminInboxs,
                        'admin' => $admin,
                        'Message' => $Message,
                         'AllMessage' => $AllMessage,
                    ]);

                } else{
                    $notification = array(
                        'message' => 'Message does not exist',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Message does not exist',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Message does not exist',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function Manage_National_Executive(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        #get Admin data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                #get sports data
                $NationalExecutives = NationalExecutive::orderBy('full_name', 'asc')->paginate(5);
                $listOfSchools = listofallschool::all();
                # get compounds data
                $getCompound = compound::all();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/NationalExecutive')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'NationalExecutives' => $NationalExecutives,
                    'getCompound' => $getCompound,
                    'listOfSchools' => $listOfSchools,
                ]);
            } catch (\Exception $ex) {
            }
        }
        return redirect()->back()->to('/');
    }

    public function  Create_National_Executive(Request $request)
    {
        #set the rules here
        $rules = [
            'full_name' => 'required|',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'post' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # collate the date
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $post = $request->post;
            $history = $request->history;
            $phone = $request->phone;

            # verify if record exist
            # verify if username exist



            try {
                # create user data
                NationalExecutive::create([
                    'full_name' => $full_name,
                    'compound' => $compound,
                    'gender' => $gender,
                    'discepline' => $discepline,
                    'institution' => $institution,
                    'date_of_birth' => $date_of_birth,
                    'year_of_tenure_from' => $year_of_tenure_from,
                    'year_of_tenure_to' => $year_of_tenure_to,
                    'post' => $post,
                    'history' => $history,
                    'phone' => $phone,

                ]);
                $notification = array(
                    'message' => 'New National Executive Created Successfully.!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Can not create Executive due to internal error.!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withInput()->withErrors($notification);
            }
        }
    }

    public function Edit_National_Executive(Request $request, $id)
    {
        # logged in user
        $loggedInAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                $NationalExecutives = NationalExecutive::where('id', $id)->first();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/EditNationalExecutive')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'NationalExecutives' => $NationalExecutives
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            return redirect()->back('/Administrator');
        }
    }

    public function Update_National_Executive(Request $request)
    {
        # first of all u need to have a vallidation rules
        $rules = [
            'id' => 'required',
            'full_name' => 'required',
            'compound' => 'required|',
            'gender' => 'required|',
            'discepline' => 'required|',
            'institution' => 'required|',
            'date_of_birth' => 'required|',
            'year_of_tenure_from' => 'required|',
            'year_of_tenure_to' => 'required|',
            'post' => 'required|',
            'history' => 'required|',
            'phone' => 'required|',

        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # now thirdly you COLLATE ALL THE DATA YOU WISH TO ACCEPT FROM INPUT
            $id = $request->id;
            $full_name = $request->full_name;
            $compound = $request->compound;
            $gender = $request->gender;
            $discepline = $request->discepline;
            $institution = $request->institution;
            $date_of_birth = $request->date_of_birth;
            $year_of_tenure_from = $request->year_of_tenure_from;
            $year_of_tenure_to = $request->year_of_tenure_to;
            $post = $request->post;
            $history = $request->history;
            $phone = $request->phone;

            # verify if user email exist
            $admin = $request->session()->get('admin');
            $verifyAdmin = AdminAccount::where('AdminName', $admin)->first();
            # $row = compound::where('id', $id)->first();
            #dd($row);
            if ($verifyAdmin) {
                try {
                    # Now final stage since it has passed all test and conditions
                    # we update now
                    # create user data
                    NationalExecutive::where('id', $id)->update([
                        'full_name' => $full_name,
                        'compound' => $compound,
                        'gender' => $gender,
                        'discepline' => $discepline,
                        'institution' => $institution,
                        'date_of_birth' => $date_of_birth,
                        'year_of_tenure_from' => $year_of_tenure_from,
                        'year_of_tenure_to' => $year_of_tenure_to,
                        'post' => $post,
                        'history' => $history,
                        'phone' => $phone,
                    ]);
                    $notification = array(
                        'message' => 'National President Updated Successfully.!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $notification = array(
                        'message' => 'System can not update please try again.!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withInput()->withErrors($notification);
                }
            }
            return redirect()->back()->to('/');
        }
    }

    public function ChangeExecutiveDp(Request $request)
    {
        $request->validate = ([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id' => 'required|'
        ]);
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        $id = $request->id;
        //get current session
        $loggedInUser = $request->session()->get('admin');
        //verify loggedin session
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {
                NationalExecutive::where('id', $id)->update([
                    'picture' => 'images/' . $imageName
                ]);

                $notification = array(
                    'message' => 'Display Picture Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Unable to upload file',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        return redirect()->back()->to('/');
    }

    public function Delete_National_Executive(Request $request, $id)
    {
        try {
            $toDelete = NationalExecutive::find($id);
            $DeleteNational = NationalExecutive::where('id', $id)->delete();
            if (!empty($toDelete->picture)) {
                unlink($toDelete->picture);
            }
            if ($DeleteNational) {
                $notification = array(
                    'message' => 'National Executive Deleted Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Can not Delete This Record!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function postingPublication(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInAdmin);
        if ($admin) {
            $rules = [
                'posting' => 'required|max:2000|min:15'
            ];
            $validator = validator::make($request->all(), $rules);
            // dd($validator);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {

                $posting = $request->posting;

                try {
                    AdminPost::updateOrCreate([
                        'posting' => $posting,

                    ]);
                    $notification = array([
                        'message' => 'You have Successfully published this post and Overriden the previous One',
                        'alert-type' => 'success'
                    ]);
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {

                    $notification = array([
                        'message' => 'Error occured while Publishing this post',
                        'alert-type' => 'danger'
                    ]);
                    return redirect()->back()->with($notification);
                }
            }
        }
        return redirect()->back()->to('/');
    }

    public function imagePublication(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageCaption'
        ]);
        // for  image
        // dd($request);
        $imageName = time() . '_' . $request->image->getClientOriginalName();

        $request->image->move(public_path('ImagePost'), $imageName);
        $imageCaption = $request->imageCaption;

        $loggedInAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInAdmin);
        if ($admin) {

            try {
                //$ToDelete = AdminPost::find($imageName);
                AdminPost::updateOrCreate([
                    'image' => 'ImagePost/' . $imageName,
                    'imageCaption' => $imageCaption

                ]);
                // if (!empty($ToDelete->picture)) {
                //     unlink($ToDelete->picture);
                // }
                $notification = array([
                    'message' => 'You have Successfully published this post and Overriden the previous One',
                    'alert-type' => 'danger'
                ]);
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array([
                    'message' => 'Error occured while Publishing this Image post',
                    'alert-type' => 'success'
                ]);
                return redirect()->back()->with($notification);
            }
        }
    }

    public function videoPublication(Request $request)
    {
        $request->validate([

            'video'          => 'mimes:mpeg,ogg,mp4,webm,jpeg,jpg,3gp,mov,flv,avi,wmv,ts|max:100040|required',
            'VideoCaption' => 'required|max:2000'
        ]);
        // for video
        // dd($request);
        $videoName = time() . '_' . $request->video->getClientOriginalName();
        $request->video->move(public_path('VideoPost'), $videoName);
        $videoCaption = $request->VideoCaption;
        $loggedInAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInAdmin);
        if ($admin) {
            try {
                AdminPost::updateOrCreate([
                    'video' => 'VideoPost/' . $videoName,
                    'VideoCaption' => $videoCaption
                ]);
                $notification = array([
                    'message' => 'You have Successfully published this post and Overriden the previous One',
                    'alert-type' => 'success'
                ]);
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array([
                    'message' => 'Error occured while Publishing this Video',
                    'alert-type' => 'danger'
                ]);
                return redirect()->back()->with($notification);
            }
        }
    }

    public function ManagePublications(Request $request)
    {
        # logged in user
        $loggedInAdmin = $request->session()->get('admin');
        # get user data
        $admin = AdminAccount::where('AdminName', $loggedInAdmin)->first();
        if ($admin) {
            try {
                // $AdminPosts = AdminPost::with('AdminLikes')->orderBy('id', 'DESC')->paginate(4);
                #set all the comment accordingly

                $AdminPosts = AdminPost::orderBy('id', 'DESC')->paginate(4);
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/manageAllPublication')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'admin' => $admin,
                    'AdminPosts' => $AdminPosts
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/Administrator');
        }
    }

    public function editPublication(Request $request, $id)
    {
        $loggedinAdmin = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedinAdmin)->first();
        if ($admin) {
            try {
                $fetcPost = AdminPost::where('id', $id)->get();
                //total message unread
                $unreadMessage = AdminIbox::where('status', 'notRead')->count();
                //get new notification
                $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
                return view::make('admin/editPublication')->with([
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'fetcPost'  => $fetcPost,
                    'admin' => $admin
                ]);
            } catch (\Exception $ex) {
            }
        }
    }

    public function updatePublication(Request $request)
    {
        $loggedInUser = $request->session()->get('admin');
        $verifyUser = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($verifyUser) {

            try {

                $rules = [
                    'postId',
                    'posting',
                    'imageCaption',
                    'videoCaption'
                ];
                $validator = Validator::make($request->all(), $rules);
                $postId = $request->postId;
                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator);
                } else {
                    if ($posting = $request->posting) {

                        AdminPost::where('id', $postId)->update([
                            'posting' => $posting
                        ]);
                        $notification = array(
                            'message' => 'Post Updated successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } elseif ($imageCaption = $request->imageCaption) {

                        AdminPost::where('id', $postId)->update([
                            'ImageCaption' => $imageCaption
                        ]);
                        $notification = array(
                            'message' => 'Post Updated successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } elseif ($videoCaption = $request->videoCaption) {

                        AdminPost::where('id', $postId)->update([
                            'VideoCaption' => $videoCaption
                        ]);
                        $notification = array(
                            'message' => 'Post Updated successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Please Contact The Developer!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function deletePublication(Request $request, $id)
    {
        try {
            $loggedInUser = $request->session()->get('admin');
            $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
            if ($admin) {
                #get user data here

                $postId = $id;
                # check for the poster
                $checkPOST = AdminPost::where('id', $postId)->first();
                #dd($checkPOST);
                if ($checkPOST) {
                    try {
                        // find the exact post to be deleted
                        $toDelete = AdminPost::find($id);
                        // delete the etire post
                        AdminPost::where('id', $postId)->delete();
                        // if it has likes then it delete the likes
                        // Like::where('post_id', $postId)->delete();
                        // locaate the path and also delete the file for image
                        if (!empty($toDelete->image)) {
                            unlink($toDelete->image);
                        }
                        // locate the parth and also the delete for video
                        if (!empty($toDelete->video)) {
                            unlink($toDelete->video);
                        }
                        // like::where('post_id', $id)->delete();
                        $notification = array(
                            'message' => 'Post Deleted successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } catch (\Exception $ex) {
                        $error = Session::flash('error', $ex->getMessage());
                        return redirect()->back()->withInput()->with($error);
                    }
                } else {
                    $error = Session::flash('error', 'You Are Not Allowed to Delete This Post.2');
                    return redirect()->back()->withInput()->with($error);
                }
            } else {
                return redirect()->back();
            }
        } catch (\Exception $ex) {
            return redirect()->back('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        $request->session()->regenerate();
        return redirect()->to('/administrator');
    }

    public function searchRequest(Request $request)
    {
        $loggedInUser = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {

                $userRequest = $request->question;
                $SearchResult = UserAccount::where('username', 'Like', '%' . $userRequest . '%');
                $searches = $SearchResult->orderBy('id', 'DESC')->paginate(10);
                return view::make('searchUsers')->with([
                    'searches' => $searches
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Sorry please contact your Developer to correct this error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function updateReadMessage(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {
                $updateStatus = AdminIbox::where('id', $id)->update([
                    'status' =>  'Read'
                ]);
                if ($updateStatus) {
                    $notification = array([
                        'message' => 'Message Has been marked as read',
                        'alert-type' => 'success'
                    ]);
                    return redirect()->back()->with($notification);
                } else {
                    $notification = array([
                        'message' => 'Message Has been marked as Read',
                        'alert-type' => 'error'
                    ]);
                    return redirect()->back()->with($notification);
                }
            } catch (\Exception $ex) {
                return redirect()->back()->to('/');
            }
        }
    }

    public function manageGuest(Request $request)
    {
        $loggedInUser = $request->session()->get('admin');
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            $allGuest = UserAccount::where('guest', 'GUEST')->orderBy('username', 'ASC')->paginate(10);
            //total message unread
            $unreadMessage = AdminIbox::where('status', 'notRead')->count();
            //get new notification
            $AdminInboxs = AdminIbox::where('status', 'notRead')->orderBy('created_at', 'desc')->paginate(2);
            return view::make('admin/manageAllGuest')->with([
                'unreadMessage' => $unreadMessage,
                'AdminInboxs' => $AdminInboxs,
                'allGuest' => $allGuest,
                'admin' => $admin
            ]);
        }
    }

    public function suspendUser(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('admin');
        // get user data
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            UserAccount::where('id_number', $id)->update([
                'status' => 'suspended'
            ]);
            $notification = array(
                'message' => 'Account Suspended Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function activateUser(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('admin');
        // get user data
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            UserAccount::where('id_number', $id)->update([
                'status' => 'active'
            ]);
            $notification = array(
                'message' => 'Account Activated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function suspension(Request $reques)
    {
        try {
            return view::make('admin/suspension');
        } catch (\Exception $ex) {
        }
    }

    public function complaintFromUser(Request $request)
    {
        $rules = [
            'Myname' => 'Required|',
            'email' => 'Required|',
            'reason' => 'Required|',
        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // collat data here
            $Myname = $request->Myname;
            $email = $request->email;
            $reason = $request->reason;
            try {
                AdminIbox::Create([
                    'from_who' => $Myname,
                    'email' => $email,
                    'type_of_issue' => $reason,
                ]);
                $success = session::flash('success', 'Complaint Recieved, Please Wait while system reactivate your Account Asap!');
                return redirect()->back()->with($success);
            } catch (\Exception $ex) {
                dd($ex);
                $error = session::flash('error', ' Error occured while trying to File a Complaint, try again later and you can call on the number below');
                return redirect()->back()->with($error);
            }
        }
    }

    public function deleteMessage(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('admin');
        // get user data
        $admin = AdminAccount::where('AdminName', $loggedInUser)->first();
        if ($admin) {
            try {
                AdminIbox::where('id', $id)->delete();

                $notification = array(
                    'message' => 'Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

            }catch(\Exception $ex){

                $notification = array(
                    'message' => 'Error, Can not Delete Message Please Try Latter',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }
}
