<?php

namespace App\Modules\Vote\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\MissAyedunApplication;
use App\Models\NationalExecutive;
use App\Models\Post;
use App\Modules\MissAyedun\Repo\MissAsuApplicationRepositoryInterface;
use App\Modules\Vote\Models\Vote;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class VoteController extends BaseController
{
    private $userRepository;


    public function __construct(MissAsuApplicationRepositoryInterface $MissAssuAppRepository, UserRepositoryInterface $userRepository)
    {

        $this->MissAssuAppRepository = $MissAssuAppRepository;
        $this->userRepository = $userRepository;

    }

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Vote::welcome");
    }

    public function index()
    {
        $miss_assu_candidate = MissAyedunApplication::orderBy('fullname','desc')->paginate(8);
        return view::make('vote.vote')->with([
            'miss_assu_candidate' => $miss_assu_candidate,
        ]);
//        return  view("Vote::index")->compack($nationalExec);
    }

    public function voters_reg(Request $request)
    {
        try {
            $rules = [
                'first_name' => 'required|',
                'last_name'=> 'required|',
                'voter_email' => 'required|email|unique:vote',
                'phone' => 'required|',
            ];

                $checkMail = Vote::where('voter_email',$request->voter_email)->first();
                if($checkMail){
                    $error = Session::flash('error', 'The email '  .$checkMail->voter_email.  ' provided has been registered   you can proceed on your session below.');
                    return redirect()->to('vote')->with($error);
                }
                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator);

                } else {

                    $this->data['data'] = $request->all();
                    $vote = Vote::create([
                        'voter_first_name' => $this->data['data']['first_name'],
                        'voter_last_name' => $this->data['data']['last_name'],
                        'voter_email' => $this->data['data']['voter_email'],
                        'phone' => $this->data['data']['phone'],

                    ]);
                    if ($vote){
                        session()->regenerate();
                        $firt_last_name = $this->data['data']['first_name'];
                        $voter_last_name = $this->data['data']['last_name'];
                        $voter_email = $this->data['data']['voter_email'];
                        $phone = $this->data['data']['phone'];
                        Session::put([
                            'voter_first_name'=> $firt_last_name,
                            'voter_last_name'=> $voter_last_name,
                            'voter_email'=> $voter_email,
                            'phone'=> $phone,
                        ]);
//                        $session = Session::get('email');

                        $current_user = Session::get('voter_email');
//                        dd($current_user);
                        $voter = Vote::where('voter_email',$current_user)->first();

                        if ($voter){
                            $success = Session::flash('success', 'Thanks for registering, you may now proceed.');

                            return redirect()->to('vote')->with($success);

                        }else{
                            $error = Session::flash('error', 'submit your email first or login if not registered yet.');
                            return redirect()->back()->withInput()->with($error);
                        }

                    }
                }
        }catch (\Exception $e){
            dd($e);

        }

    }

    public function voterStartSession(Request $request)
    {
      $rules =[
          'voter_email' => 'required|email'
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()){
          return redirect()->back()->withInput()->withErrors($validator);
      }
      $this->data['data'] = $request->all();
      $current_voters = Vote::where('voter_email', $this->data['data']['voter_email'])->first();

      if ($current_voters){
          Session::put([
              'voter_first_name'=> $current_voters->voter_first_name,
              'voter_last_name'=> $current_voters->voter_last_name,
              'voter_email'=> $current_voters->voter_email,
              'phone'=> $current_voters->phone,
          ]);
          $success = Session::flash('success', 'You are welcome, your session start now, you may now proceed');
          $miss_assu_candidate = MissAyedunApplication::orderBy('fullname','desc')->paginate(8);
          $users = $this->userRepository->getModel();
          $MiisAsu = MissAyedunApplication::orderBy('id','desc')->paginate(8);
          return view::make('vote.castVote')->with([
              'MissAsu' => $MiisAsu,
              'user' => $users,
               'miss_assu_candidate' => $miss_assu_candidate,
              $success
          ]);
      }else{
          $error = Session::flash('error', 'You have to register your email account, please click on Not yet register button below!');
          return redirect()->to('vote')->with($error);
      }

    }


    public function castVote(Request $request){
//        $missAsu = $this->userRepository->getModel();
        $missAsu = MissAyedunApplication::all();
//        dd($missAsu);
        $voters= Vote::all();
        $candidate_id = $request->id_number;
//        dd($candidate_id);
        $units_sent = $request->vote;
//        $vote = $request->vote;
        $totalAmount = $units_sent * 100;
//       dd($totalAmount);
        $checkVoter = $request->session()->get('voter_email');
        $currentVoter = Vote::where('voter_email', $checkVoter)->first();
        $totalUnit = ($currentVoter->unit_left - $units_sent);


        if ($currentVoter->unit_left == 0 && $currentVoter->unit_left < $units_sent){
            $error = Session::flash('error', 'Your remaining unit is' . $currentVoter->unit_left . 'please buy more unit' );

            return view('vote.payment')->with([
                'misAsu' => $missAsu,
                'candidate_id' => $candidate_id,
                'totalAmount' => $totalAmount,
//                'vote' => $vote,
                'units_sent' => $units_sent,
            ]);
        }


    }



}
