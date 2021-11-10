<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMail;
use App\Models\UserAccount;
use App\Models\AdminSentMail;

class AdminSendMail extends Controller
{
    public function SendMail(Request $request)
    {

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
            'email1' => ['string', 'email', 'max:255'],
            'email2' => ['string', 'email', 'max:255'],
            'email3' => ['string', 'email', 'max:255'],
            'email4' => ['string', 'email', 'max:255'],
            'email5' => ['string', 'email', 'max:255'],
            'email6' => ['string', 'email', 'max:255'],
        ];
        $validator = Validator::make($request->all(), $rules);
        // dd($validator);
        if ($validator) {

            $title = $request->title;
            $email1 = $request->email1;
            $email2 = $request->email2;
            $email3 = $request->email3;
            $email4 = $request->email4;
            $email5 = $request->email5;
            $email6 = $request->email6;
            $message = $request->message;
            $details = [
                'title' => $title,
                //'email2' => $email2,
                // 'email3' => $email3,
                // 'email4' => $email4,
                //   'email5' => $email5,
                'message' => $message
            ];
            // dd($details);
            if ($email1 != '') {
                Mail::To($email1)->send(new SendMail($details));
                 AdminSentMail::create([
                                'email' => $email1,
                                'details' => $message,
                                'type_of_issue' => $title,
                                'from_who' => "Administrator"
                            ]);
                $notification = array(
                    'message' => 'Mail Sent successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } elseif ($email2 != '') {
                Mail::To($email2)->send(new SendMail($details));
                 AdminSentMail::create([
                                'email' => $email2,
                                'details' => $message,
                                'type_of_issue' => $title,
                                'from_who' => "Administrator"
                            ]);
                $notification = array(
                    'message' => 'Mail Sent successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } elseif ($email3 != '') {
                Mail::To($email3)->send(new SendMail($details));
                 AdminSentMail::create([
                                'email' => $email3,
                                'details' => $message,
                                'type_of_issue' => $title,
                                'from_who' => "Administrator"
                            ]);
                $notification = array(
                    'message' => 'Mail Sent successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } elseif ($email4 != '') {
                Mail::To($email4)->send(new SendMail($details));
                 AdminSentMail::create([
                                'email' => $email4,
                                'details' => $message,
                                'type_of_issue' => $title,
                                'from_who' => "Administrator"
                            ]);
                $notification = array(
                    'message' => 'Mail Sent successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } elseif ($email5 != '') {
                Mail::To($email5)->send(new SendMail($details));
                 AdminSentMail::create([
                                'email' => $email5,
                                'details' => $message,
                                'type_of_issue' => $title,
                                'from_who' => "Administrator"
                            ]);
                $notification = array(
                    'message' => 'Mail Sent successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } elseif ($email6 != '') {
                Mail::To($email6)->send(new SendMail($details));
                 AdminSentMail::create([
                                'email' => $email6,
                                'details' => $message,
                                'type_of_issue' => $title,
                                'from_who' => "Administrator"
                            ]);
                $notification = array(
                    'message' => 'Mail Sent successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Error, No email specified ',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }

            //dd($mail1);
            // return notification
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function sendMailToAllUsers(Request $request)
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ];
        $validator = Validator::make($request->all(), $rules);
        //dd($validator);
        if ($validator) {
            $title = $request->title;
            $message = $request->message;
            $details = [
                'title' => $title,
                'message' => $message
            ];
            // dd($details);
            $UserEmail = UserAccount::get('email');
            $Userid = UserAccount::get('email')->count();
            // dd($UserEmail);
            try {
                $k = 1;
                $email = $UserEmail;
                for ($k <= $Userid; $k++;) {
                   
                        if ($Userid<=$k){
                            Mail::To($email)->send(new SendMail($details));
                            AdminSentMail::create([
                                'email' => $email,
                                'details' => $message,
                                'type_of_issue' => $title,
                                'from_who' => "Administrator"
                            ]);
                        }
                        $notification = array(
                            'message' => 'Mail Sent successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    //dd($email);
                }
            } catch (\Exception $e) {
                dd($e);
                $notification = array(
                    'message' => 'Error, Cant send mail at this time you can use single mail platform for now ',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }
}
