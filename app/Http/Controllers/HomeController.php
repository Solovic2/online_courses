<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Homework;
use App\Models\Month;
use App\Models\Questionexam;
use App\Models\Questionhomework;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $subjects = Year::findOrFail(Auth::user()->year_id)->subjects;
        return view('home',compact('subjects'));
    }
    public function show($id)
    {
        $subjects = Subject::with('months')->findOrFail($id);
        return view('front.show-months',compact('subjects'));
    }
    public function monthShow($id){
         $month = Month::with('contains')->findOrFail($id);
        return view('front.show-month-contents',compact('month'));

    }
    public function examShow(Request $request){
        if (!$request->hasValidSignature()) {
            abort(401);
        }
          $exam = Exam::with('question')->findOrFail($request->exam_id);
        return view('front.show-month-contents-exam',compact('exam'));

    }
    public function correctExam(Request $request){
        $count = 0;
        foreach($request->answers as $key=>$answer){
            $correct = Questionexam::findOrFail($key)->correct;
            if($answer ==$correct){
                $count++;
            }
        }
        if($count>1){
                Auth::user()->exams()->attach($request->exam_id,['grade'=>$count]);
        }
        return redirect()->route('show.months',$request->month_id);
    }
    public function showHomework($month_id,$homework_id){

        $homework = Homework::with('question')->findOrFail($homework_id);
        return view('front.show-month-contents-homework',compact('homework'));

    }
    public function correctHomework(Request $request){
        $homework_count = 0;
        foreach($request->answers as $key=>$answer){
            $correct = Questionhomework::findOrFail($key)->correct;
            if($answer ==$correct){
                $homework_count++;
            }
        }
//        return $homework_count;
        if($homework_count > 1){
                Auth::user()->homeworks()->attach($request->homework_id,['grade'=>$homework_count]);
        }
        return redirect()->route('show.months',$request->month_id);
    }
}
