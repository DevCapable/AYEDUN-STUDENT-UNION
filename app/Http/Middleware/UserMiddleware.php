<?php

namespace App\Http\Middleware;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\UserAccount;
use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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
        $loggedInUser = $request->session()->get('user');
        
       
        if ($user = UserAccount::where('email', $loggedInUser)->check())
         {
             $expiresAt = Carbon::now()->addMinutes(1);
             Cache::put('user-is-online'. $user->id, true, $expiresAt);
         }
        return $next($request);
    }
}
