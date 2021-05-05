<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::User();
            if($user->role == 'admin'){
                return $next($request);
            }
            else{
                return redirect()->route('home')->with('message' , 'Unauthorized!');
            }
        }
        else{
            return redirect('login');
        }
    }
}
