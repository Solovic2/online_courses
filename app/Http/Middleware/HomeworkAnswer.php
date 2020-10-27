<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HomeworkAnswer
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
        $homework = Auth::user()->homeworks->find($request->route('homework_id'));
        if($homework!=null && $homework->pivot->grade > 0  ?? 0){
            return $next($request);
        }else{
         abort(404);
        }

    }
}
