<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  Illuminate\Support\Carbon;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Cache;


class UserIsOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
            # logged in user
        $loggedInUser = $request->session()->get('user');
        //  get user account
        $verifyUser = UserAccount::where('email', $loggedInUser)->first();
      
            if ($verifyUser){
                $expireTime = Carbon::now()->addMinute(1);
                Cache::put('is_online'. $verifyUser->id, true, $expireTime);
                UserAccount::where('id',$verifyUser->id)->update(['last_seen' => Carbon::now()]);
            }
      
        return $next($request);
    }
}
