@extends('layouts.app')

@section('content')
    <div class="container">

        <div> {{$month->contains->first()->video}}</div>
        <div><a href="#" class="btn btn-secondary">{{$month->contains->first()->exam->name}}</a> </div>

        @for($i=1;$i<COUNT($month->contains) ;$i++)
            @if(Auth::user()->exams->find($month->contains[$i-1]->exam)->pivot->grade ?? '' > 1   )
                <div> {{$month->contains[$i]->video}}</div>
                <div><a href="#" class="btn btn-secondary">{{$month->contains[$i]->exam->name}}</a> </div>
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
