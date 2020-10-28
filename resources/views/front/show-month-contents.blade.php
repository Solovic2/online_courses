@extends('layouts.app')

@section('content')
<main class="py-5">
    <div class="container">
        <div class="all">
            <div class="content-video">
                <div class="card text-center">
                    <div class="card-header video">
                        <div>{{$month->contains->first()->video}}</div>
                        <img  width="100%" src="{{asset('assets/images/4.jpg')}}">
                    </div>
                    <div class="card-body">
                        <div>
                    <span>
                        @if(Auth::user()->exams->find($month->contains->first()->exam)->pivot->grade ?? '' > 1)
                            <a  class="btn btn-success" href="{{route('show.exam.correct.answer',['month_id'=>$month->id,'exam_id'=>$month->contains->first()->exam->id])}}">إجابتك للإمتحان </a>
                        @else
                            <a href="{{URL::temporarySignedRoute('show.exam', now()->addMinutes(15),['month_id'=>$month->id,'exam_id'=>$month->contains->first()->exam->id])}}" class="btn btn-secondary">{{$month->contains->first()->exam->name}}</a>
                        @endif
                    </span>
                            <span>
                        @if(Auth::user()->homeworks->find($month->contains->first()->homework)->pivot->grade ?? '' > 1 )
                                    <a href="{{route('show.homework.correct.answer',['month_id'=>$month->id,'homework_id'=>$month->contains->first()->homework->id])}}" class="btn btn-success" > إجابتك للواجب </a>
                                @else
                                    @if(!empty($month->contains->first()->homework))
                                        <a  href="{{route('show.homework',['month_id'=>$month->id,'homework_id'=>$month->contains->first()->homework->id ])}}" class="btn btn-secondary"> {{$month->contains->first()->homework}}</a>
                                    @endif
                                @endif
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card text-right contents">
                <div class="card-body">
                  <span>{{$month->contains->first()->name}}</span>
                    <div class="float-left"><span><i class="fas fa-arrow-circle-up"></i> </span></div>
                </div>
            </div>
        </div>
        @for($i=1;$i<COUNT($month->contains) ;$i++)
            @if(Auth::user()->exams->find($month->contains[$i-1]->exam)->pivot->grade ?? '' > 1)
                <div class="all">
                    <div class="content-video">
                        <div class="card text-center">
                            <div class="card-header video">
{{--                                <div>{{$month->contains[$i]->video}}</div>--}}
                                <img  width="100%" src="{{asset('assets/images/4.jpg')}}">
                            </div>
                            <div class="card-body">
                                <div>
                                    <span class="content-exam">
                                        @if(Auth::user()->exams->find($month->contains[$i]->exam)->pivot->grade ?? '' > 1)
                                            <a  href="{{route('show.exam.correct.answer',['month_id'=>$month->id,'exam_id'=>$month->contains[$i]->exam->id])}}" class="btn btn-success"> إجابتك للإمتحان </a>
                                        @else
                                            @if(Auth::user()->in_exam != 1)
                                                <a href="{{URL::temporarySignedRoute('show.exam', now()->addMinutes(15),['month_id'=>$month->id,'exam_id'=>$month->contains[$i]->exam->id])}}" class="btn btn-secondary exam-time">
                                                    {{$month->contains[$i]->exam->name}}
                                                </a>
                                            @endif
                                        @endif
                                    </span>
                                    <span class="content-homework">
                                        @if(Auth::user()->homeworks->find($month->contains[$i]->homework)->pivot->grade ?? ''  > 1 )
                                            <a  href="{{route('show.homework.correct.answer',['month_id'=>$month->id,'homework_id'=>$month->contains[$i]->homework->id])}}" class="btn btn-success"> إجابتك للواجب </a>
                                        @else
                                            @if(!empty($month->contains[$i]->homework))
                                                <a  href="{{route('show.homework',['month_id'=>$month->id,'homework_id'=>$month->contains[$i]->homework->id])}}" class="btn btn-secondary"> {{$month->contains[$i]->homework->name ?? ''}}</a>
                                            @endif
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card text-right contents">
                        <div class="card-body">
                            {{$month->contains[$i]->name}}
                            <div class="float-left"><span><i class="fas fa-arrow-circle-up"></i> </span></div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
    </div>
</main>
@endsection

@section('script')
    <script>
        $('.exam-time').on('click',function (){
            @php
                Auth::user()->end_exam_time = \Carbon\Carbon::now()->addMinutes(1);
                Auth::user()->save();
            @endphp
        });
        @if(Auth::user()->in_exam == 1)
            window.history.forward();
        @endif
    </script>
@endsection
