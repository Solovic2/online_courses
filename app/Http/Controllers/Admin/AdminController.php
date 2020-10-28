<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Answerexam;
use App\Models\Answerhomework;
use App\Models\Contain;
use App\Models\Exam;
use App\Models\Homework;
use App\Models\Month;
use App\Models\Questionexam;
use App\Models\Questionhomework;
use App\Models\Subject;
use App\Models\Year;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    // Admin Login

    public function login(){
        return view('admin.login');
    }
    public function loginPass(Request $request){
        if(auth()->guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->withErrors(['failed'=>'عذراً تأكد من الحساب الخاص بك']);
        }
    }

    //  Start Main Page //
    public function dashboard(){
        $teacher = Auth::guard('admin')->user();
        $years = $teacher->years;
        return view('admin.home',compact('years'));
    }

    public function AllStudents(){
        $teacher = Auth::guard('admin')->user();
        $years = $teacher->years;
        return view('admin.all-students',compact('years'));
    }
    public function showYearStudents($id){
        $year = Year::with('students')->findOrFail($id);
        return view('admin.show-year-students',compact('year'));
    }
    /************* Videos (Add) ******************/
    public function videoIndex(){
        $teacher = Auth::guard('admin')->user();
         $years = $teacher->years;
          $month = $years->first()->subjects->where('admin_id',Auth::guard('admin')->id())->first()->months;
        return view('admin.show-video-index',['years'=>$years,'months'=>$month]);
    }
    public function showIndex(Request $request){
         $year =Year::with(['subjects'=>function ($q){
            $q->where('admin_id',Auth::guard('admin')->id());
        }])->findOrFail($request->id);

        $months = $year->subjects->first()->months;
        return $months;
    }
    public function videoAdd(Request $request){
       $month = Month::findOrFail($request->input('month'))->id;
       Contain::create([
           'name' =>$request->input('name'),
           'video'=>$request->input('video'),
           'branch'=>$request->input('branch'),
           'month_id'=>$month
       ]);

    return redirect()->route('admin.year-months-content',$month);
    }
/************************************************************ Start Year **************************************************************/

    public function year($id){
         $year =Year::with(['subjects'=>function ($q){
           $q->where('admin_id',Auth::guard('admin')->id());
        }])->findOrFail($id);
         $months = $year->subjects->first()->months;
//         return $year->subjects;
        return view('admin.year.year-status',['months'=>$months,'subject_id'=>$year->subjects->first()->id,'year'=>$year->id]);
    }
    public function addMonth($id){
        return view('admin.year.add-month',['id'=>$id]);
    }
    public function storeMonth(Request $request){
        Month::create([
            'name'=>$request->input('name'),
            'code'=>$request->input('code'),
            'subject_id'=>$request->input('subjectID'),
        ]);
         $id = Subject::findOrFail($request->subjectID)->year->id;
        return redirect()->route('admin.year',$id)->with('success','تم إضافة شهر بنجاح');
    }
    public function editMonth($id){
        $month = Month::findOrFail($id);
        return view('admin.year.edit-month',compact('month'));
    }
    public function updateMonth(Request $request){
        $month = Month::findOrFail($request->input('monthID'));
        $month->name = $request->input('name');
        $month->code = $request->input('code');
        $month->save();
        $year= $month->subject->year->id;

        return redirect()->route('admin.year',$year)->with('success','تم التعديل بنجاح ');
    }
    public function deleteMonth($id){
        $month = Month::findOrFail($id);
        $year= $month->subject->year->id;
        $month->delete();
        return redirect()->route('admin.year',$year)->with('success','تم الحذف بنجاح ');

    }

    public function yearPending($id,$month_id){
        $month =Month::findOrFail($month_id);
        $students = User::where('year_id',$id)->whereDoesntHave('months',function ($q) use ($month_id) {
           $q->where('months.id',$month_id);
       })->get();
          return view('admin.year.student-pending',['month'=>$month,'students'=>$students]);

    }
    public function yearActivateStudent($id,$student_id){
       $month =  Month::findOrFail($id)->students()->attach($student_id,['activate'=>Carbon::now() ,'deactivate'=>Carbon::now()->addDays(30)]);
        return redirect()->back();
    }
    public function yearDectivateStudent($id,$student_id){
       $month =  Month::findOrFail($id)->students()->detach($student_id);
        return redirect()->back();
    }
    public function yearMonthsStudents($id){
        $month =Month::with('students')->findOrFail($id);
        return view('admin.year.year-students',['month'=>$month]);
    }

    /***********  Start Year Content ********************/

    public function yearMonthsContent($id){
        $month = Month::with('contains')->findOrFail($id);
        return view('admin.year.year-months-contents',compact('month') );
    }
    public function showFormContent($id){
        $month = Month::findOrFail($id)->id;
        return view('admin.year.add-new-content',['id'=>$month] );
    }
    public function addContent(Request $request){
        Contain::create([
            'name'=>$request->input('name'),
            'video'=>$request->input('video'),
            'branch'=>$request->input('branch'),
            'month_id'=>$request->input('monthID'),
        ]);
        $id = $request->input('monthID');
        return redirect()->route('admin.year-months-content',$id);
    }

    /***********  End Year Content ********************/

    /*********** Start Exam ********************/
    public function addExam($id){
        $content= Contain::findOrFail($id);
        return view('admin.year.exam.add-exam',compact('content'));
    }
    public function showExam($id){
        $content= Contain::with('exam')->findOrFail($id);
        $questions = $content->exam->question;
        return view('admin.year.exam.show-exam',['exam'=>$content->exam,'questions'=>$questions]);
    }
    public function showExamStudents($exam){
        $students = Exam::findOrFail($exam)->students;
        return view('admin.year.exam.show-students-grade',compact('students'));
    }
    public function addQuestionsExam($id){
      $exam =  Exam::findOrFail($id);
        return view('admin.year.exam.show-questions',compact('exam'));
    }
    public function storeExam(Request $request){
        $exam = Exam::create([
           'name'=>$request->input('examName'),
            'contain_id'=>$request->input('id'),
        ]);
        return view('admin.year.exam.show-questions',compact('exam'));
    }

    public function AddNewQuestions(Request $request){
        $question=  Questionexam::create([
            'name'=>$request->question,
            'exam_id'=>$request->input('examID'),
            'correct'=>$request->radio,
        ]);
        foreach($request->ans as $ans){
            Answerexam::create([
                'answers'=>$ans,
                'questionexam_id'=>$question->id,
            ]);
        }
        return redirect()->route('admin.show-exam',$question->exam->contain->id)->with(['success'=>' لفد تم إضافة سؤال بنجاح']);
    }
    public function editQuestions($id){
        $question = Questionexam::with('answer')->findOrFail($id);
        return view('admin.year.exam.edit-question',compact('question'));
    }
    public function updateQuestions(Request $request){
        $question = Questionexam::with('answer')->findOrFail($request->input('questionID'));
       $question->name = $request->input('question');
       $question->correct = $request->radio;
        $question->save();
       $answers = $question->answer;
       $i = 0;
        foreach($answers as $answer ){
            $answer->answers = $request->ans[$i++];
            $answer->save();
        }
        return redirect()->back()->with(['successChange'=>'لقد تم التعديل بنجاح']);
    }

    /***********  End Exam ********************/

    /***********  HomeWork  ********************/

    public function addHomework($id){
        $content= Contain::findOrFail($id);
        return view('admin.year.homework.add-homework',compact('content'));
    }
    public function showHomework($id){
        $content= Contain::with('homework')->findOrFail($id);
        $questions = $content->homework->question;
        return view('admin.year.homework.show-homework',['homework'=>$content->homework,'questions'=>$questions]);
    }
    public function addQuestionsHomework($id){
      $homework =  Homework::findOrFail($id);
        return view('admin.year.homework.show-questions',compact('homework'));
    }
    public function storeHomework(Request $request){
        $homework = Homework::create([
           'name'=>$request->input('homeworkName'),
            'contain_id'=>$request->input('id'),
        ]);
        return view('admin.year.homework.show-questions',compact('homework'));
    }
    public function AddNewQuestionsHomework(Request $request){
        $question= Questionhomework::create([
            'name'=>$request->question,
            'homework_id'=>$request->input('homeworkID'),
            'correct'=>$request->radio,
        ]);
        foreach($request->ans as $ans){
            Answerhomework::create([
                'answers'=>$ans,
                'questionhomework_id'=>$question->id,
            ]);
        }
        return redirect()->route('admin.show-homework',$question->homework->contain->id)->with(['success'=>' لفد تم إضافة سؤال بنجاح']);
    }
    public function editQuestionsHomework($id){
        $question = Questionhomework::with('answer')->findOrFail($id);
        return view('admin.year.homework.edit-question',compact('question'));
    }
    public function updateQuestionsHomework(Request $request){
        $question = Questionhomework::with('answer')->findOrFail($request->input('questionID'));
        $question->name = $request->input('question');
        $question->correct = $request->radio;
        $question->save();
        $answers = $question->answer;
        $i = 0;
        foreach($answers as $answer ){
            $answer->answers = $request->ans[$i++];
            $answer->save();
        }
        return redirect()->back()->with(['successChange'=>'لقد تم التعديل بنجاح']);
    }

    /*********** End  HomeWork  ********************/

/************************************************************ End Year **************************************************************/





    // End Main Page




    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
