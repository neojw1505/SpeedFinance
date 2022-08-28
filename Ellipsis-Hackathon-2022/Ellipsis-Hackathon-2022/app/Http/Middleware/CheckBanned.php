<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;
//this class checks if user is banned and handle it by logging user out else letting request pass
class CheckBanned
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
      if(auth()->check() && auth()->user()->banned == true){
        $message = 'Your account has been suspended.';
        auth()->logout();
        return redirect('/login')->withMessage($message);
      }
        return $next($request);
    }
}
