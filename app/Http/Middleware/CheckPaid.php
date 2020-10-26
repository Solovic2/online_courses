<?php

namespace App\Http\Middleware;

use App\Models\Month;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPaid
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
      if(Month::findOrFail($request->route('month_id'))->students->contains(Auth::id())){
          return $next($request);
      }
      abort(404);
    }
}
