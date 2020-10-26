<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
