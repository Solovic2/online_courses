@extends('layouts.app')

@section('content')
    <div class="container">

        <div> {{$month->contains->first()->video}}</div>
        <div>
            @if(Auth::user()->exams->find($month->contains->first()->exam)->pivot->grade ?? '' > 1)
                <div  class="btn btn-success">{{$month->contains->first()->exam->name}}</div>
            @else
            <a href="#" class="btn btn-secondary">{{$month->contains->first()->exam->name}}</a>
            @endif
                @if(Auth::user()->homeworks->find($month->contains->first()->homework)->pivot->grade ?? '' > 1 )
                    <a  href="#" class="btn btn-success"> {{$month->contains->first()->homework}}</a>

                @else
                    <a  href="#" class="btn btn-secondary"> {{$month->contains->first()->homework}}</a>
                @endif
        </div>

        @for($i=1;$i<COUNT($month->contains) ;$i++)
            @if(Auth::user()->exams->find($month->contains[$i-1]->exam)->pivot->grade ?? '' > 1)
                <div> {{$month->contains[$i]->video}}</div>
            <div>
                @if(Auth::user()->homeworks->find($month->contains[$i]->homework)->pivot->grade ?? ''  > 1 )
                    <a  href="#" class="btn btn-success"> {{$month->contains[$i]->homework->name ?? '' }}</a>
                @else
                    <a  href="{{route('show.homework',['month_id'=>$month->id,'homework_id'=>$month->contains[$i]->homework->id ?? 0])}}" class="btn btn-secondary"> {{$month->contains[$i]->homework->name ?? ''}}</a>

                @endif
            </div>
                <div>
                    @if(Auth::user()->exams->find($month->contains[$i]->exam)->pivot->grade ?? '' > 1)
                        <a  href="#" class="btn btn-success"> {{$month->contains[$i]->exam->name}}</a>
                    @else
                        <a href="{{URL::temporarySignedRoute('show.exam', now()->addMinutes(1),['month_id'=>$month->id,'exam_id'=>$month->contains[$i]->exam->id])}}" class="btn btn-secondary">
                            {{$month->contains[$i]->exam->name}}
                        </a>
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
