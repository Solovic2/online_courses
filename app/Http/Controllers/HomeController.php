<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Homework;
use App\Models\Month;
use App\Models\Questionexam;
use App\Models\Questionhomework;
use App\Models\Subject;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
    /** Exam **/
    public function examShow(Request $request){
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        Auth::user()->in_exam = 1;
//        if(!session()->has('end')){
//            Auth::user()->end_exam_time = Carbon::now()->addMinutes(1) ;
//            session(['end'=>Auth::user()->end_exam_time]);
//        }
        Auth::user()->save();


          $exam = Exam::with('question')->findOrFail($request->exam_id);
        return view('front.show-month-contents-exam',['exam'=>$exam,'end'=>Auth::user()->end_exam_time]);

    }
    public function endTime(Request $request){
        $end =  $request->end_exam_time;
        if($end == Carbon::now()  || $end < Carbon::now()){
            return 1;
        }
        return 0;
    }
    public function correctExam(Request $request){
        Auth::user()->in_exam = 0;
        Auth::user()->save();
//        session()->remove('end');
        $count = 0;
        if(!empty($request->answers)) {
            foreach ($request->answers as $key => $answer) {
                $question = Questionexam::findOrFail($key);
                if ($answer == $question->correct) {
                    $count++;
                }
            }
        }
        if($count>1){
                if(Auth::user()->exams->contains($request->exam_id)){
                    $pivot = Auth::user()->exams->find($request->exam_id)->pivot;
                    $pivot->grade = $count;
                    $pivot->save();
                }else{
                    Auth::user()->exams()->attach($request->exam_id,['grade'=>$count]);
                }
            $sms= HTTP::get('https://eg.apisms.link/api/points',['username'=>'3679663','password'=>'5f88c75a45f8f5f88c75a45f92']);
//            return $request['status'];
        }else{
            $sms = HTTP::get('https://eg.apisms.link/api/points',['username'=>'3679663','password'=>'5f88c75a45f8f5f88c75a45f92']);
//            return $request['status'];
        }
        return redirect()->route('show.months',$request->month_id);
    }
    public function studentAnswerExam($month_id,$exam_id){
        $exam = Exam::with('question')->findOrFail($exam_id);
        return view('front.show-answer-exam',compact('exam'));
    }

    /** Homework  */
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
        if(Auth::user()->homeworks->contains($request->homework_id)){
            $pivot = Auth::user()->homeworks->find($request->homework_id)->pivot;
            $pivot->grade = $homework_count;
            $pivot->save();
        }else{
            Auth::user()->homeworks()->attach($request->homework_id,['grade'=>$homework_count]);
        }
        return redirect()->route('show.months',$request->month_id);
    }
    public function studentAnswerhomework($month_id,$homework_id){
        $homework = Homework::with('question')->findOrFail($homework_id);
        return view('front.show-answer-homework',compact('homework'));
    }
}
