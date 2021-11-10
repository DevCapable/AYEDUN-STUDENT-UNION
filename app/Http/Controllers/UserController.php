<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use App\Models\Sports;
use App\Models\MissAsu;
use App\Models\AdminIbox;
use App\Models\listofallschool;
use App\Models\NationalPresident;
use App\Models\NationalExecutive;
use App\Models\ChapterPresident;
use App\Models\Compound;
use App\Models\Comment;
use App\Models\AdminPost;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
//use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {
        # validation rules
        $rules = [
            'ID_NUMBER' => 'required|',
            'fullname' => 'required|',
            'username' => 'required|unique:user_accounts',
            'email' => 'required|email|unique:user_accounts',
            'date_of_birth' => 'required|',
            'compound' => 'required|',
            'institution' => 'required|',
            'place_of_residence' => 'required|',
            'marital_status' => 'required|',
            'security_question' => 'required|',
            'answers' => 'required|',
            'phone' => 'required|',
            'gender' => 'required|',
            'password' => 'required|min:8',
        ];
        # validator
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            # collate data
            $ID_NUMBER = $request->ID_NUMBER;
            $fullname = $request->fullname;
            $username = $request->username;
            $email = $request->email;
            $date_of_birth = $request->date_of_birth;
            $compound = $request->compound;
            $institution = $request->institution;
            $place_of_residence = $request->place_of_residence;
            $marital_status = $request->marital_status;
            $security_question = $request->security_question;
            $answers = $request->answers;
            $phone = $request->phone;
            $gender = $request->gender;
            $password = Hash::make($request->password);

            # verify if user email exist
            $verifyUserEmail = UserAccount::where('email', $email)->first();

            if ($verifyUserEmail) {
                $error = Session::flash('error', 'Email already taken.');
                return redirect()->back()->withInput()->with($error);
            } else {

                # verify if username exist
                $verifyUsername = UserAccount::where('username', $username)->first();

                if ($verifyUsername) {
                    $error = Session::flash('error', 'Username already taken.');
                    return redirect()->back()->withInput()->with($error);
                } else {

                    try {
                        # create user data
                        UserAccount::create([
                            'id_number' => $ID_NUMBER,
                            'fullname' => $fullname,
                            'email' => $email,
                            'username' => $username,
                            'date_of_birth' => $date_of_birth,
                            'compound' => $compound,
                            'institution' => $institution,
                            'place_of_residence' => $place_of_residence,
                            'marital_status' => $marital_status,
                            'security_question' => $security_question,
                            'answers' => $answers,
                            'phone' => $phone,
                            'gender' => $gender,
                            'password' => $password
                        ]);


                        $notification = array(
                            'message' => 'Registration completed successfully.!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } catch (\Exception $ex) {
                        dd($ex);
                        $notification = array(
                            'message' => 'Registration Failed!',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->withInput()->withErrors($notification);
                    }
                }
            }
        }
    }

    // reg as Stake holder
    public function registerAsStakeHolder(Request $request)
    {
        # validation rules
        $rules = [
            'ID_NUMBER' => 'required|',
            'fullname' => 'required|',
            'username' => 'required|unique:user_accounts',
            'email' => 'required|email|unique:user_accounts',
            'date_of_birth' => 'required|',
            'compound' => 'required|',
            'institution' => 'required|',
            'place_of_residence' => 'required|',
            'marital_status' => 'required|',
            'security_question' => 'required|',
            'answers' => 'required|',
            'phone' => 'required|',
            'gender' => 'required|',

            'stake_holder' => 'required|',
            'category' => 'required|',
            'tenure_year_from' => 'required|',
            'tenure_year_to' => 'required|',
            'post_held' => 'required|',
            'password' => 'required|min:8',


        ];
        # validator
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            # collate data
            $ID_NUMBER = $request->ID_NUMBER;
            $fullname = $request->fullname;
            $username = $request->username;
            $email = $request->email;
            $date_of_birth = $request->date_of_birth;
            $compound = $request->compound;
            $institution = $request->institution;
            $place_of_residence = $request->place_of_residence;
            $marital_status = $request->marital_status;
            $security_question = $request->security_question;
            $answers = $request->answers;
            $phone = $request->phone;
            $gender = $request->gender;

            $stake_holder = $request->stake_holder;
            $category = $request->category;
            $tenure_year_from = $request->tenure_year_from;
            $tenure_year_to = $request->tenure_year_to;
            $post_held = $request->post_held;

            $password = Hash::make($request->password);

            # verify if user email exist
            $verifyUserEmail = UserAccount::where('email', $email)->first();

            if ($verifyUserEmail) {
                $error = Session::flash('error', 'Email already taken.');
                return redirect()->back()->withInput()->with($error);
            } else {

                # verify if username exist
                $verifyUsername = UserAccount::where('username', $username)->first();

                if ($verifyUsername) {
                    $error = Session::flash('error', 'Username already taken.');
                    return redirect()->back()->withInput()->with($error);
                } else {

                    try {
                        # create user data
                        UserAccount::create([
                            'id_number' => $ID_NUMBER,
                            'fullname' => $fullname,
                            'email' => $email,
                            'username' => $username,
                            'date_of_birth' => $date_of_birth,
                            'compound' => $compound,
                            'institution' => $institution,
                            'place_of_residence' => $place_of_residence,
                            'marital_status' => $marital_status,
                            'security_question' => $security_question,
                            'answers' => $answers,
                            'phone' => $phone,
                            'gender' => $gender,

                            'stakeholder' => $stake_holder,
                            'category' => $category,
                            'tenure_year_from' => $tenure_year_from,
                            'tenure_year_to' => $tenure_year_to,
                            'post_held' => $post_held,

                            'password' => $password
                        ]);


                        $notification = array(
                            'message' => 'Registration completed successfully.!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } catch (\Exception $ex) {
                        $notification = array(
                            'message' => 'Registration Failed!',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->withInput()->withErrors($notification);
                    }
                }
            }
        }
    }

    // reg as Guest
    public function registerAsGuest(Request $request)
    {
        # validation rules
        $rules = [
            'ID_NUMBER' => 'required|',
            'fullname' => 'required|',
            'username' => 'required|unique:user_accounts',
            'email' => 'required|email|unique:user_accounts',
            'date_of_birth' => 'required|',
            'compound',
            'institution' => 'required|',
            'place_of_residence' => 'required|',
            'marital_status' => 'required|',
            'security_question' => 'required|',
            'answers' => 'required|',
            'phone' => 'required|',
            'gender' => 'required|',
            'guest' => 'required|',
            'address' => 'required|',
            'password' => 'required|min:8',


        ];
        # validator
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            # collate data
            $ID_NUMBER = $request->ID_NUMBER;
            $fullname = $request->fullname;
            $username = $request->username;
            $email = $request->email;
            $date_of_birth = $request->date_of_birth;
            $compound = $request->compound;
            $institution = $request->institution;
            $place_of_residence = $request->place_of_residence;
            $marital_status = $request->marital_status;
            $security_question = $request->security_question;
            $answers = $request->answers;
            $phone = $request->phone;
            $gender = $request->gender;
            $guest = $request->guest;
            $address = $request->address;
            $password = Hash::make($request->password);

            # verify if user email exist
            $verifyUserEmail = UserAccount::where('email', $email)->first();

            if ($verifyUserEmail) {
                $error = Session::flash('error', 'Email already taken.');
                return redirect()->back()->withInput()->with($error);
            } else {

                # verify if username exist
                $verifyUsername = UserAccount::where('username', $username)->first();

                if ($verifyUsername) {
                    $error = Session::flash('error', 'Username already taken.');
                    return redirect()->back()->withInput()->with($error);
                } else {

                    try {
                        # create user data
                        UserAccount::create([
                            'id_number' => $ID_NUMBER,
                            'fullname' => $fullname,
                            'email' => $email,
                            'username' => $username,
                            'date_of_birth' => $date_of_birth,
                            'compound' => $compound,
                            'institution' => $institution,
                            'place_of_residence' => $place_of_residence,
                            'marital_status' => $marital_status,
                            'security_question' => $security_question,
                            'answers' => $answers,
                            'phone' => $phone,
                            'gender' => $gender,
                            'guest' => $guest,
                            'address' => $address,
                            'password' => $password
                        ]);
                        $notification = array(
                            'message' => 'Registration completed successfully.!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } catch (\Exception $ex) {
                        $notification = array(
                            'message' => 'Registration Failed!',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->withInput()->withErrors($notification);
                    }
                }
            }
        }
    }

    public function get_compond_name_in_reg_page()
    {
        $getCompound = Compound::all();

        return view::make('/Registration')->with([
            'getCompound' => $getCompound,


        ]);
    }

    public function registerAsGuestPage()
    {
        $getCompound = Compound::all();
        return view::make('registrationGuest')->with([
            'getCompound' => $getCompound,


        ]);
    }
    public function get_compond_name_in_regStakeHolder_page()
    {
        $getCompound = Compound::all();
        return view::make('registrationStakeHolder')->with([
            'getCompound' => $getCompound,


        ]);
    }

    public function home(Request $request)
    {
        try {

            # logged in user
            $loggedInUser = $request->session()->get('user');
            $user = UserAccount::where('email', $loggedInUser)->first();
            if ($user) {
                #set all the comment accordingly
                $All_post = Post::with('likes')->orderBy('id', 'DESC')->paginate(4);
                $comments = Comment::get();
               // get total of who comment per post
                $whoComment = Comment::get();
               // dd($whoComment);
               // $total = Comment::count();
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                return view::make('home')->with([
                    'user' => $user,
                    'whoComment'=>$whoComment,
                    'All_post' => $All_post,
                    'comments'  => $comments,
                    'unreadMessage' => $unreadMessage,

                ]);
            } else {
                return redirect()->to('/');
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function imageUploadPage(Request $request)
    {
        try {

            # logged in user
            $loggedInUser = $request->session()->get('user');
            # get user data
            $user = UserAccount::where('email', $loggedInUser)->first();
            if ($user) {
                return view::make('imageUpload')->with([
                    'user' => $user
                ]);
            } else {
                return redirect()->to('/');
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '_' . $request->image->getClientOriginalName();

        $request->image->move(public_path('images'), $imageName);

        $user = $request->session()->get('user');

        # verify if user email exist
        $verifyUsername = UserAccount::where('email', $user)->first();

        if ($verifyUsername) {
            try {
                # create user data
                 $ToDelete = UserAccount::find($verifyUsername->id);
                 if ($ToDelete){
                      UserAccount::find($verifyUsername->id)->update([
                    'picture' => 'public/images/' . $imageName
                ]);
                 if (!empty($ToDelete->picture)) {
                    unlink($ToDelete->picture);
                }
                 $notification = array(
                    'message' => 'Uploaded successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
                 }else{
                      UserAccount::find($verifyUsername->id)->update([
                    'picture' => 'public/images/' . $imageName
                ]);
                 $notification = array(
                    'message' => 'Uploaded successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
                 }


            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Uploading Failed!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withInput()->withErrors($notification);
            }
        } else {
            $error = Session::flash('error', 'Uploading failed.');
            return redirect()->back()->with($error);
        }
    }

    public function posting(Request $request)
    {
        # logged in user
        $loggedInUser = $request->session()->get('user');
        if ($loggedInUser) {
            # get user data
            $user = UserAccount::where('email', $loggedInUser)->first();
            $userId = $user->id;
            $username = $user->username;
            # validation rules
            $rules = [
                'posting' => 'required|max:2000|min:15',
            ];
            # validator
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                # collate data
                $posting = $request->posting;
                try {
                    # create user data
                    Post::create([
                        'userId' => $userId,
                        'username' => $username,
                        'posting' => $posting,
                    ]);
                    $notification = array(
                        'message' => 'Post created successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $notification = array(
                        'message' => 'Error Cant create this post!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withInput()->withErrors($notification);
                    $error = Session::flash('error', 'Error Can not create this post.', $ex->getMessage());
                    return redirect()->back()->withInput()->withErrors($error);
                }
            }
        } else {
            $notification = array(
                'message' => 'Access Denied, Login first!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function UploadImagePost(Request $request)
    {
        # logged in user
        $loggedInUser = $request->session()->get('user');
        # get user data
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            $userId = $user->id;
            $username = $user->username;
            # validation rules
            $rules = [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'ImageCaption' => 'required|',
            ];
            # validator
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                # collate data
                $imageName = time() . '.' . $request->image->extension();
                // $fileName= $request->file('image')->getClientOriginalName();
                $request->image->move(public_path('ImagePost'), $imageName);
                $ImageCaption = $request->ImageCaption;
                try {
                    # create user data
                    Post::create([
                        'userId' => $userId,
                        'username' => $username,
                        'ImageCaption' => $ImageCaption,
                        'image' => 'public/ImagePost/' . $imageName
                    ]);
                    $notification = array(
                        'message' => 'Post created successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $notification = array(
                        'message' => 'Error Cant create this post!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withInput()->withErrors($notification);
                    $error = Session::flash('error', 'Error Cant create this post.');
                    return redirect()->back()->withInput()->with($error);
                }
            }
        } else {
            return redirect()->back();
        }
    }

    public function UploadVideo(Request $request)
    {
        # logged in user
        $loggedInUser = $request->session()->get('user');
        //  get user account
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            $UserId = $user->id;
            $UserName = $user->username;
            // validation rules
            $rules = [

                'video'          => 'mimes:mpeg,ogg,mp4,webm,jpeg,jpg,3gp,mov,flv,avi,wmv,ts|max:100040|required',
                'VideoCaption' => 'required|max:2000'
            ];
            # validator
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $VideoName = time() . '.' . $request->video->extension();
                $request->video->move(public_path('VideoPost'), $VideoName);
                $VideoCaption = $request->VideoCaption;
                try {
                    Post::create([
                        'userId' => $UserId,
                        'username' => $UserName,
                        'VideoCaption' => $VideoCaption,
                        'video' => 'public/VideoPost/' . $VideoName
                    ]);
                    $notification = array(
                        'message' => 'Post created successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $error = Session::flash('error', 'Error Can not create this post.');
                    return redirect()->back()->withInput()->with($error);
                }
            }
        } else {
            return redirect()->back();
        }
    }
    # to get data passed through Url
    #public function userPage(Request $request, $id)

    public function userPage(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        # get user data
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            try {
                // to search for a user
                $userRequest = $request->question;
                if ($userRequest == '') {
                    $users = UserAccount::orderBy('fullname', 'ASC')->paginate(4);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('all_users')->with([
                        'user' => $user,
                        'users' => $users,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } elseif ($userRequest) {
                    $user = UserAccount::where('email', $loggedInUser)->first();
                    $SearchResult = UserAccount::where('username', 'Like', '%' . $userRequest . '%');
                    $users = $SearchResult->orderBy('id', 'DESC')->paginate(10);
                    // searching logic ends here
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('all_users')->with([
                        'user' => $user,
                        'users' => $users,
                        'unreadMessage' => $unreadMessage,

                    ]);
                } else {
                    $users = UserAccount::orderBy('fullname', 'ASC')->paginate(4);
                    # get user data
                    $user = UserAccount::where('email', $loggedInUser)->first();
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('all_users')->with([
                        'user' => $user,
                        'users' => $users,
                        'unreadMessage' => $unreadMessage,
                    ]);
                }
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            return redirect()->to('/home');
        }
    }

    public function Edit_user_page(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            try {
                #get user data here
                #$userId_to_edit = $id;
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                return view::make('Edit_profile')->with([
                    'user' => $user,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Error Ecountered Please Try again Latter',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'You are not Allowed to Make any changes',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function Edit_profile(Request $request)
    {
        # first of all u need to have a vallidation rules
        $rules = [
            'fullname' => 'required',
            'date_of_birth' => 'required|',
            'compound' => 'required|',
            'institution' => 'required|',
            'place_of_residence' => 'required|',
            'marital_status' => 'required|',
            'security_question' => 'required|',
            'answers' => 'required|',
            'phone' => 'required|',
            'gender' => 'required|',
        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            # now thirdly you COLLATE ALL THE DATA YOU WISH TO ACCEPT FROM INPUT
            $fullname = $request->fullname;

            $date_of_birth = $request->date_of_birth;
            $compound = $request->compound;
            $institution = $request->institution;
            $place_of_residence = $request->place_of_residence;
            $marital_status = $request->marital_status;
            $security_question = $request->security_question;
            $answers = $request->answers;
            $phone = $request->phone;
            $gender = $request->gender;
            # verify if user email exist
            $user = $request->session()->get('user');
            $verifyUsername = UserAccount::where('email', $user)->first();

            if ($verifyUsername) {
                try {
                    # Now final stage since it has passed all test and conditions
                    # we update now
                    # create user data
                    UserAccount::find($verifyUsername->id)->update([
                        'fullname' => $fullname,
                        'date_of_birth' => $date_of_birth,
                        'compound' => $compound,
                        'institution' => $institution,
                        'place_of_residence' => $place_of_residence,
                        'marital_status' => $marital_status,
                        'security_question' => $security_question,
                        'answers' => $answers,
                        'phone' => $phone,
                        'gender' => $gender,
                    ]);
                    $notification = array(
                        'message' => 'Profile Updated Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                    $error = Session::flash('error occured', 'System can not update your profile.');
                    return redirect()->back()->withInput()->with($error);
                }
            } else {
                $notification = array(
                    'message' => 'You are not Allowed to Make any changes',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function view_user_profile(Request $request, $id)
    {
        $loggedInUser = $request->Session()->get('user');
        #set all the comment accordingly
        $current_user = UserAccount::where('email', $loggedInUser)->first();
        if ($current_user) {
            try {
                $UserId = $id;
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $current_user->username)->count();
                $user = UserAccount::where('id', $UserId)->first();
                $All_post = Post::orderBy('id', 'DESC',)->where(['userId' => $user->id])->paginate(4);
                  // get total of who comment per post
                $whoComment = Comment::get();
                return view::make('view_user_profile')->with([
                    'user' => $current_user,
                    'UserId' => $user,
                    'All_post' => $All_post,
                    'unreadMessage' => $unreadMessage,
                     'whoComment'=>$whoComment,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Error Encounterd Try again latter',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'You are not Allowed to Make any changes',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function delete_my_post(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('user');
        #get user data here
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            try {
                $postId = $id;
                # check for the poster
                $checkPOST = Post::where('id', $postId)->where('userId', $user->id)->first();
                #dd($checkPOST);
                if ($checkPOST) {
                    try {
                        // find the exact post to be deleted
                        $toDelete = Post::find($id);
                        // delete the etire post
                        Post::where('id', $postId)->delete();
                        // if it has likes then it delete the likes
                        Like::where('post_id', $postId)->delete();
                        // locaate the path and also delete the file for image
                        if (!empty($toDelete->image)) {
                            unlink($toDelete->image);
                        }
                        // locate the parth and also the delete for video
                        if (!empty($toDelete->video)) {
                            unlink($toDelete->video);
                        }
                        like::where('post_id', $id)->delete();
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
                    $error = Session::flash('error', 'You Are Not Allowed to Delete This Post.');
                    return redirect()->back()->withInput()->with($error);
                }
            } catch (\Exception $ex) {
                return redirect()->back('/');
            }
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {

            $request->session()->forget('user');
            $request->session()->regenerate();
            return redirect()->to('/login');
    }

    public function likeOrUnlikePost(Request $request, $postId)
    {
        try {
            # logged in user
            $loggedInUser = $request->session()->get('user');
            // get user data
            $user = UserAccount::where('email', $loggedInUser)->first();
            if ($user) {
                // check
                $checkIfUserAlreadyLikePost = Like::where('post_id', $postId)->where('user_id', $user->id)->first();
                if ($checkIfUserAlreadyLikePost) {
                    // Delete
                    $isDelete = Like::where('post_id', $postId)->where('user_id', $user->id)->first();
                    if ($isDelete) {
                        $isDelete->delete();
                        $notification = array(
                            'message' => 'You have Unliked this Post successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        return abort(404);
                    }
                } else {
                    // Like post
                    Like::create([
                        'post_id' => $postId,
                        'user_id' => $user->id
                    ]);

                    $notification = array(
                        'message' => 'You have liked this Post successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect('user/home')->with($notification);
                }
            } else {
                return redirect()->to('/');
            }
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

    public function ViewAllSportDirector(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        #get Admin data
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            try {
                $userRequest = $request->question;
                if ($userRequest == '') {
                    #get sports data
                    $sportDetails = Sports::orderBy('full_name', 'desc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllSportDirector')->with([
                        'user' => $user,
                        'sportDetails' => $sportDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } elseif ($userRequest) {
                    $SearchResult = Sports::where('full_name', 'Like', '%' . $userRequest . '%');
                    // searching logic ends here
                    #get sports data
                    $sportDetails =  $SearchResult->orderBy('id', 'DESC')->paginate(10);
                    $notification = array(
                        'message' => 'This are likely results for your search?!',
                        'alert-type' => 'info'
                    );
                    return redirect()->back()->with($notification);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllSportDirector')->with([
                        'user' => $user,
                        'sportDetails' => $sportDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } else {
                    #get sports data
                    $sportDetails = Sports::orderBy('full_name', 'desc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $loggedInUser->username)->count();
                    return view::make('/ViewAllSportDirector')->with([
                        'user' => $user,
                        'sportDetails' => $sportDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function ViewAllNationalPresident(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        #get Admin data
        $user = UserAccount::where('email', $loggedInUser)->first();
        $userRequest = $request->question;
        // dd($loggedInUser);
        if ($user) {
            try {
                if ($userRequest == '') {
                    #get sports data
                    $NationalPresidentDetails = NationalPresident::orderBy('full_name', 'desc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('ViewAllNationalPresident')->with([
                        'verifyUser' => $user,
                        'NationalPresidentDetails' => $NationalPresidentDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } elseif ($userRequest) {

                    $SearchResult = NationalPresident::where('full_name', 'Like', '%' . $userRequest . '%');
                    // searching logic ends here
                    #get sports data
                    $NationalPresidentDetails =  $SearchResult->orderBy('id', 'DESC')->paginate(10);
                    #get Admin data
                    $user = UserAccount::where('username', $user)->first();
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllNationalPresident')->with([
                        'user' => $user,
                        'NationalPresidentDetails' => $NationalPresidentDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } else {
                    #get sports data
                    $NationalPresidentDetails = NationalPresident::orderBy('full_name', 'desc')->paginate(8);
                    #get Admin data

                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllNationalPresident')->with([
                        'user' => $user,
                        'NationalPresidentDetails' => $NationalPresidentDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function ViewAllChapterPresident(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        #get user data with email
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            $userRequest = $request->question;
            try {
                if ($userRequest == '') {
                    #get sports data
                    $ViewAllChapterPresidentDetails = ChapterPresident::orderBy('full_name', 'desc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllChapterPresident')->with([
                        'user' => $user,
                        'ViewAllChapterPresidentDetails' => $ViewAllChapterPresidentDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } elseif ($userRequest) {

                    $SearchResult = ChapterPresident::where('full_name', 'Like', '%' . $userRequest . '%');
                    // searching logic ends here
                    #get sports data
                    $ViewAllChapterPresidentDetails =  $SearchResult->orderBy('id', 'DESC')->paginate(10);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllChapterPresident')->with([
                        'user' => $user,
                        'ViewAllChapterPresidentDetails' => $ViewAllChapterPresidentDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } else {
                    #get sports data
                    $ViewAllChapterPresidentDetails = ChapterPresident::orderBy('full_name', 'desc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllChapterPresident')->with([
                        'user' => $user,
                        'ViewAllChapterPresidentDetails' => $ViewAllChapterPresidentDetails,
                        'unreadMessage' => $unreadMessage,
                    ]);
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function ViewAllCompound(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        #get user data
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            try {
                #get compound data
                $compounds = Compound::orderBy('Name_of_Compound', 'desc')->paginate(8);
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                return view::make('/ViewAllCompound')->with([
                    'user' => $user,
                    'compounds' => $compounds,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access Denied Login Firs!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function ViewCompoundHistory(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {
                $compound = Compound::where('id', $id)->first();
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                return view::make('/ViewCompoundHistory')->with([
                    'compound' => $compound,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access Denied Login First!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function ViewAllRelative(Request $request)
    {
        /**
         * Naming conventions
         */
        // 1. kebab case => $verify_user
        // 2. pascal case => $VerifyUser
        // 3. camel case => $verifyUser
        try {
            $loggedInUser = $request->session()->get('user');
            $VerifyUser = UserAccount::where('email', $loggedInUser)->first();
            if ($VerifyUser) {
                //check relative existence
                $relatives = UserAccount::where('compound', $VerifyUser->compound)->paginate(8);
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $VerifyUser->username)->count();
                return view::make('ViewAllRelative')->with([
                    'user' => $VerifyUser,
                    'relatives' => $relatives,
                    'unreadMessage' => $unreadMessage,
                ]);
            } else {
                $notification = array(
                    'message' => 'Access Denied, Login First',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            $notification = array(
                'message' => 'Internal Error Occurred Please try again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function clientMessage(Request $request)
    {
        $rules = [
            'ClientName' => 'Required|',
            'ClientEmail' => 'Required|',
            'ClientMessage' => 'Required|',
        ];
        # secondly is initiate vallidator
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // collat data here
            $fromWho = $request->ClientName;
            $Email = $request->ClientEmail;
            $Details = $request->ClientMessage;
            #dd($Details);
            try {
                AdminIbox::create([
                    'from_who' => $fromWho,
                    'email' => $Email,
                    'details' => $Details,
                ]);
                $success = session::flash('success', ' Thanks Your message has been sent successfully, wait while we contact you through your mail');
                return redirect()->back()->with($success);
            } catch (\Exception $ex) {

                $error = session::flash('error', ' Error occured while trying to send message, try again later');
                return redirect()->back()->with($error);
            }
        }
    }
    public function executive(Request $request)
    {
        $AdminPosts = AdminPost::orderBy('id', 'DESC')->paginate(3);
        #get sports data
        $NationalExecutives = NationalExecutive::orderBy('full_name', 'desc')->paginate(8);

        return view::make('/index')->with([
            'NationalExecutives' => $NationalExecutives,
            'AdminPosts' => $AdminPosts
        ]);
    }

    public function ViewAllNationalExecutive(Request $request)
    {
        // get session details
        $loggedInUser = $request->session()->get('user');
        // verify user and authenticate
        $user = UserAccount::where('email', $loggedInUser)->first();

        if ($user) {
            try {
                $userRequest = $request->question;
                if ($userRequest == '') {
                    #get sports data
                    $NationalExecutives = NationalExecutive::orderBy('full_name', 'desc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewNationalExecutive')->with([
                        'user' => $user,
                        'NationalExecutives' => $NationalExecutives,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } elseif ($userRequest) {
                    $SearchResult = NationalExecutive::where('full_name', 'Like', '%' . $userRequest . '%');
                    // searching logic ends here
                    #get sports data
                    $NationalExecutives =  $SearchResult->orderBy('id', 'DESC')->paginate(10);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewNationalExecutive')->with([
                        'user' => $user,
                        'NationalExecutives' => $NationalExecutives,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } else {
                    $NationalExecutives = NationalExecutive::orderBy('full_name', 'asc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewNationalExecutive')->with([
                        'NationalExecutives' => $NationalExecutives,
                        'user', $user,
                        'unreadMessage' => $unreadMessage,

                    ]);
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access Denied, Login First!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function ViewAllMissAsu(Request $request)
    {

        // get session details
        $loggedInUser = $request->session()->get('user');
        // verify user and authenticate
        $user = UserAccount::where('email', $loggedInUser)->first();
        if ($user) {
            try {
                $userRequest = $request->question;
                if ($userRequest == '') {
                    #get MISS ASU data
                    $ViewAllMissAsus = MissAsu::orderBy('full_name', 'desc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllMissAsu')->with([
                        'user' => $user,
                        'ViewAllMissAsus' => $ViewAllMissAsus,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } elseif ($userRequest) {
                    $SearchResult = MissAsu::where('full_name', 'Like', '%' . $userRequest . '%');
                    // searching logic ends here
                    #get MISS ASU data
                    $ViewAllMissAsus =  $SearchResult->orderBy('id', 'DESC')->paginate(10);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllMissAsu')->with([
                        'user' => $user,
                        'ViewAllMissAsus' => $ViewAllMissAsus,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } else {
                    $ViewAllMissAsus = MissAsu::orderBy('full_name', 'asc')->paginate(8);
                    //get new messages
                    $unreadMessage = Message::where('status', 'unread')->where('to_who', $user->username)->count();
                    return view::make('/ViewAllMissAsu')->with([
                        'ViewAllMissAsus' => $ViewAllMissAsus,
                        'user', $user,
                        'unreadMessage' => $unreadMessage,

                    ]);
                }
            } catch (\Exception $ex) {
            }
        }
    }

    public function ViewNationalExecutiveProfile(Request $request, $id)
    {
        $loggedInUser = $request->Session()->get('user');
        $current_user = UserAccount::where('email', $loggedInUser)->first();
        if ($current_user) {
            try {
                $UserId = $id;
                $user = NationalExecutive::where('id', $UserId)->first();
                // $All_post = Post::orderBy('id', 'DESC',)->where(['userId' => $user->id])->paginate(4);
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $current_user->username)->count();
                return view::make('/ViewNationalExecutiveProfile')->with([
                    'user' => $current_user,
                    'UserId' => $user,
                    'unreadMessage' => $unreadMessage,

                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access Denied, Login First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function ViewNationalPresidentProfile(Request $request, $id)
    {
        $loggedInUser = $request->Session()->get('user');
        # get current user details
        $current_user = UserAccount::where('email', $loggedInUser)->first();
        if ($current_user) {
            try {
                $UserId = $id;
                $user = NationalPresident::where('id', $UserId)->first();
                //$All_post = Post::orderBy('id', 'DESC',)->where(['userId' => $user->id])->paginate(4);
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $current_user->username)->count();
                return view::make('/ViewNationalPresidentProfile')->with([
                    'user' => $current_user,
                    'UserId' => $user,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access Denied Login First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function ViewChapterPresidentProfile(Request $request, $id)
    {
        $loggedInUser = $request->Session()->get('user');
        # get current user
        $current_user = UserAccount::where('email', $loggedInUser)->first();
        if ($current_user) {
            try {
                $UserId = $id;
                $user = ChapterPresident::where('id', $UserId)->first();
                // $All_post = Post::orderBy('id', 'DESC',)->where(['userId' => $user->id])->paginate(4);
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $current_user->username)->count();
                return view::make('ViewChapterPresidentProfile')->with([
                    'user' => $current_user,
                    'UserId' => $user,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access Denied, Login first!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function map(Request $request)
    {
        try {
            $loggedInUser = $request->session()->get('user');
            $verifyUser = UserAccount::where('email', $loggedInUser)->first();
            //get new messages
            $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
            if ($verifyUser) {
                return view::make('map')->with([
                    'verifyUser' => $verifyUser,
                    'unreadMessage' => $unreadMessage,
                ]);
            } else {
                $notification = array(
                    'message' => 'Access Denied Log in First!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            $notification = array(
                'message' => 'Internal Error Occurred Please try again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function developer(Request $request)
    {
        try {
            $loggedInUser = $request->session()->get('user');
            $verifyUser = UserAccount::where('email', $loggedInUser)->first();
            //get new messages
            $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
            if ($verifyUser) {
                return view::make('developer')->with([
                    'verifyUser' => $verifyUser,
                    'unreadMessage' => $unreadMessage,
                ]);
            } else {
                $notification = array(
                    'message' => 'Access Denied, Login First!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            $notification = array(
                'message' => 'Internal Error Occurred Please try again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function ViewMissAsuProfile(Request $request, $id)
    {
        $loggedInUser = $request->Session()->get('user');
        $current_user = UserAccount::where('email', $loggedInUser)->first();
        if ($current_user) {
            try {
                $UserId = $id;
                #set all the comment accordingly
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $current_user->username)->count();
                $user = MissAsu::where('id', $UserId)->first();
                return view::make('/ViewMissAsuProfile')->with([
                    'user' => $current_user,
                    'UserId' => $user,
                    'unreadMessage' => $unreadMessage,

                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error Occurred Please try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function ViewSPortsProfile(Request $request, $id)
    {
        $loggedInUser = $request->Session()->get('user');
        $current_user = UserAccount::where('email', $loggedInUser)->first();
        if ($current_user) {
            try {
                $UserId = $id;
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $current_user->username)->count();
                $user = Sports::where('id', $UserId)->first();
                return view::make('ViewSPortsProfile')->with([
                    'user' => $current_user,
                    'UserId' => $user,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Error Encounterd, Please try again latter or contact your Admin if error still persist'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function commentPage(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {
                $postId = $id;
                //check the exact post
                $checkPost = Post::where('id', $postId)->first();
                //get the exact comment
                $comments = Comment::where('postId', $id)->orderBy('created_at', 'desc')->paginate(4);
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                if ($checkPost) {
                    return view::make('commentPage')->with([
                        'checkPost' => $checkPost,
                        'verifyUser' => $verifyUser,
                        'comments'  => $comments,
                        'unreadMessage' => $unreadMessage,
                    ]);
                } else {
                    $notification = array(
                        'message' => 'Post is No longer Available!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Sorry please contact your Developer To correct this error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function createComment(Request $request)
    {
        # validation rules
        $rules = [
            'postId' => 'required|',
            'username' => 'required',
            'comment' => 'required|',
            'userId' => 'required|',

        ];
        # validator
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            # collate data
            $postId = $request->postId;
            $username = $request->username;
            $comment = $request->comment;
            $userId = $request->userId;
            try {
                # create user data
                Comment::create([
                    'postId' => $postId,
                    'comment' => $comment,
                    'username' => $username,
                    'userId' => $userId,
                ]);
                $notification = array(
                    'message' => 'You just made a comment on this  post!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Can not comment due to internal error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withInput()->withErrors($notification);
            }
        }
    }

    /**
     * to reder inbox page for user
     */
    public function inbox(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {
                $getMessageForUser = Message::where('to_who', $verifyUser->username)->orderBy('created_at', 'desc')->paginate(4);
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                return view::make('inbox')->with([
                    'verifyUser' => $verifyUser,
                    'getMessageForUser' => $getMessageForUser,
                    'unreadMessage' => $unreadMessage,
                    'unreadMessage' => $unreadMessage
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Error Ecounterd Please Try again later or contact Your Admin if error still persist!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function onlineUsers(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {

                $userDatas = UserAccount::get()->except($verifyUser->username);
                // get message notification in navbar
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                return view::make('onlineUsers')->with([
                    'userDatas' => $userDatas,
                    'verifyUser' => $verifyUser,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Sorry please contact your Developer To correct this error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function startChatting(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {
                $getMessageForUsers = Message::where('to_who', $verifyUser->username)->where('from_who', $id)->OrWhere('from_who', $verifyUser->username)->where('to_who', $id)->orderBy('created_at', 'asc')->paginate(6);
                // fetch current user
                $fetchUserdata = UserAccount::where('username', $id)->first();
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                Message::where('from_who', $id)->update([
                    'status' => 'read'
                ]);
                return view::make('startChatting')->with([
                    //'userDatas' => $userDatas,
                    'verifyUser' => $verifyUser,
                    'fetchUserdata' => $fetchUserdata,
                    'getMessageForUsers' => $getMessageForUsers,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Sorry please contact your Developer To correct this error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Internal Error Please Try Again Latter!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function searchRequest(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {

                $userRequest = $request->question;
                $SearchResult = UserAccount::where('username', 'Like', '%' . $userRequest . '%');
                $searches = $SearchResult->orderBy('id', 'DESC')->paginate(10);
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                return view::make('searchUsers')->with([
                    'searches' => $searches,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Sorry please contact your Developer to correct this error!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access not granted Login in first ',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function sendChat(Request $request)
    {
        $rules = [

            'from_who' => 'required|',
            'message' => 'required|',
            'to_who' => 'required|'
        ];
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with($validator);
        } else {
            //collate chats
            $from_who = $request->from_who;
            $to_who = $request->to_who;
            $message = $request->message;
            // dd($message);
            try {
                # create user data
                Message::create([
                    'from_who' => $from_who,
                    'to_who' => $to_who,
                    'message' => $message,
                ]);
                $notification = array(
                    'message' => 'Message Sent Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error occured!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function editPostPage(Request $request, $id)
    {

        # logged in user
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {
                #set all the comment accordingly
                $fetchPost = Post::where('id', $id)->get();
                # get user data
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                return view::make('editPost')->with([
                    'verifyUser' => $verifyUser,
                    'All_post' => $fetchPost,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                return redirect()->back();
            }
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function updatePosting(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
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

                        Post::where('id', $postId)->update([
                            'posting' => $posting
                        ]);
                        $notification = array(
                            'message' => 'Post Updated successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } elseif ($imageCaption = $request->imageCaption) {

                        Post::where('id', $postId)->update([
                            'imageCaption' => $imageCaption
                        ]);
                        $notification = array(
                            'message' => 'Post Updated successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } elseif ($videoCaption = $request->videoCaption) {

                        Post::where('id', $postId)->update([
                            'videoCaption' => $videoCaption
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
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function editCommentToPost(Request $request, $id)
    {
        # logged in user
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            try {
                $toComment = Comment::where('id', $id)->first();
                //get new messages
                $unreadMessage = Message::where('status', 'unread')->where('to_who', $verifyUser->username)->count();
                return view::make('editCommentToPost')->with([
                    'toComment' => $toComment,
                    'verifyUser' => $verifyUser,
                    'unreadMessage' => $unreadMessage,
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Error Encountered!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function updateCommentToPost(Request $request)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {
            $rules = [
                'commentid',
                'comment',

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $commentid = $request->commentid;
                $comment = $request->comment;
                try {

                    Comment::where('id', $commentid)->update([
                        'comment' => $comment
                    ]);
                    $notification = array(
                        'message' => 'Edited and Updated successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } catch (\Exception $ex) {
                }
            }
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteCommentToPost(Request $request, $id)
    {
        $loggedInUser = $request->session()->get('user');
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
        if ($verifyUser) {

            $commentToDelete = $id;
            try {
                Comment::where('id', $commentToDelete)->delete();
                $notification = array(
                    'message' => 'Comment Deleted successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
            }
        } else {
            $notification = array(
                'message' => 'Login in first! Access not granted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }



    public function historyOfAyedun(Request $request)
    {
        try {
            return view::make('ayedunHistory');
        } catch (\Exception $ex) {

            return redirect()->back()->to('/');
        }
    }
    public function deleteMyMessage(Request $request, $id)
    {
        try {
            Message::where('id', $id)->delete();
            $notification = array(
                'message' => 'Message Deleted Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Exception $ex) {
            $notification = array(
                'message' => 'Error while deleting message Please Try Again Latter!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // This Rednders Reset Password Page
    public function resetPasswordPage(Request $request)
    {
        return view::make('resetPassword');
    }
    // Reset the Password User Provides
    public function resetPassword(Request $request)
    {

        // st the rules
        $rules  = [
            'email' => 'required|',
            'security_question' => 'required|',
            'answers' => 'required|'
        ];
        // now we need to validate the fileds
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // now we collate the data we have validated
            $email = $request->email;
            $security_question = $request->security_question;
            $answers = $request->answers;
            // $User = UserAccount::where('email', $email)->first();
            // dd($User);
            $FindEmail = UserAccount::where('email', $email)->first();
            if ($FindEmail) {
                $FindSecurityQuestion = UserAccount::where('security_question', $security_question)->first();
                if ($FindSecurityQuestion) {
                    $FindAnswers = UserAccount::where('answers', $answers)->first();
                    // dd($FindAnswers);
                    if ($FindAnswers) {
                        return view::make('updatePassword')->with([
                            'FindEmail' => $FindEmail,
                        ]);
                    } else {
                        $error = Session::flash('error', 'Answer Suplied Does not match the current one.');
                        return redirect()->back()->withInput()->withErrors($error);
                    }
                } else {
                    $error = Session::flash('error', 'Security Question Suplied Does not match the current one!.');
                    return redirect()->back()->withInput()->withErrors($error);
                }
            } else {
                $error = Session::flash('error', 'Email Suplied Not Exist/Does not match current one!.');
                return redirect()->back()->withInput()->withErrors($error);
            }
        }
    }

    public function updatePassword(Request $request)
    {
        // st the rules
        $rules  = [
            'email' => 'required|',
            'password' => 'required|'
        ];
        // now we need to validate the fileds
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // now we collate the data we have validated
            $email = $request->email;
            $password = Hash::make($request->password);
            // now we can create
            try {
                UserAccount::where('email', $email)->update([
                    'password' => $password
                ]);
                $success = Session::flash('success', 'Password Retrieved successfully!.');
                return redirect()->back()->withInput()->withErrors($success);
            } catch (\Exception $ex) {
                $error = Session::flash('error', 'Internal Error Occurred!.');
                return redirect()->back()->withInput()->withErrors($error);
            }
        }
    }

    public function ClearCahts(Request $request)
    {
        try {
            $loggedInUser = $request->session()->get('user');
            $verifyUser = UserAccount::where('email', $loggedInUser)->first();
            if ($verifyUser){

                Message::where('to_who', $verifyUser->username)->orWhere('from_who', $verifyUser->username) ->delete();
                $notification = array(
                    'message' => 'Chats Cleared Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $ex) {
            dd($ex);
            $notification = array(
                'message' => 'Error occured while trying to clear your chats please Try Again Latter!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
