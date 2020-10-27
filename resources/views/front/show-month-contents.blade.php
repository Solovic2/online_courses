@extends('layouts.app')

@section('content')
    <div class="container">

        <div> {{$month->contains->first()->video}}</div>
        <div>
            @if(Auth::user()->exams->find($month->contains->first()->exam)->pivot->grade ?? '' > 1)
                <a  class="btn btn-success" href="{{route('show.exam.correct.answer',['month_id'=>$month->id,'exam_id'=>$month->contains->first()->exam->id])}}">إجابتك للإمتحان </a>
            @else
                <a href="{{URL::temporarySignedRoute('show.exam', now()->addMinutes(15),['month_id'=>$month->id,'exam_id'=>$month->contains->first()->exam->id])}}" class="btn btn-secondary">{{$month->contains->first()->exam->name}}</a>
            @endif
                @if(Auth::user()->homeworks->find($month->contains->first()->homework)->pivot->grade ?? '' > 1 )
                    <a href="{{route('show.homework.correct.answer',['month_id'=>$month->id,'homework_id'=>$month->contains->first()->homework->id])}}" class="btn btn-success" > إجابتك للواجب </a>

                @else
                    @if(!empty($month->contains->first()->homework))
                        <a  href="{{route('show.homework',['month_id'=>$month->id,'homework_id'=>$month->contains->first()->homework->id ])}}" class="btn btn-secondary"> {{$month->contains->first()->homework}}</a>
                    @endif
                @endif
        </div>

        @for($i=1;$i<COUNT($month->contains) ;$i++)
            @if(Auth::user()->exams->find($month->contains[$i-1]->exam)->pivot->grade ?? '' > 1)
                <div> {{$month->contains[$i]->video}}</div>
            <div>
                @if(Auth::user()->homeworks->find($month->contains[$i]->homework)->pivot->grade ?? ''  > 1 )
                    <a  href="{{route('show.homework.correct.answer',['month_id'=>$month->id,'homework_id'=>$month->contains[$i]->homework->id])}}" class="btn btn-success"> إجابتك للواجب </a>
                @else
                    @if(!empty($month->contains[$i]->homework))
                        <a  href="{{route('show.homework',['month_id'=>$month->id,'homework_id'=>$month->contains[$i]->homework->id])}}" class="btn btn-secondary"> {{$month->contains[$i]->homework->name ?? ''}}</a>
                    @endif
                @endif
            </div>
                <div>
                    @if(Auth::user()->exams->find($month->contains[$i]->exam)->pivot->grade ?? '' > 1)
                        <a  href="{{route('show.exam.correct.answer',['month_id'=>$month->id,'exam_id'=>$month->contains[$i]->exam->id])}}" class="btn btn-success"> إجابتك للإمتحان </a>
                    @else
                        @if(Auth::user()->in_exam != 1)
                            <a href="{{URL::temporarySignedRoute('show.exam', now()->addMinutes(15),['month_id'=>$month->id,'exam_id'=>$month->contains[$i]->exam->id])}}" class="btn btn-secondary exam-time">
                                {{$month->contains[$i]->exam->name}}
                            </a>
                        @endif
                    @endif
                </div>
            @endif
        @endfor



{{--        @foreach($month->contains as $index =>$content )--}}

{{--            @if(Auth::user()->exams->find($content->exam)->pivot->grade ?? '' > 1   )--}}
{{--                <div> {{$content->video}}</div>--}}
{{--                <div><a href="#" class="btn btn-secondary">{{$content->exam->name}}</a> </div>--}}
{{--            @endif--}}
{{--                <div> {{$content->video}}</div>--}}
{{--                <div><a href="#" class="btn btn-secondary">{{$content->exam->name}}</a> </div>--}}
{{--            <br>--}}
{{--        @endforeach--}}
    </div>
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

        // $.ajax({
        //     'url':,
        //     'method':
        // })
    </script>
@endsection
