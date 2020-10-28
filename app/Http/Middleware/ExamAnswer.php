<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ExamAnswer
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
        $exam = Auth::user()->exams->find($request->route('exam_id'));

        if( $exam !=null && $exam->pivot->grade > 0 ){
            return $next($request);
        }else {
            abort(404);
        }
    }
}
