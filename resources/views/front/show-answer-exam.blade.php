@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center"><h1>إجابة الإمتحان ( {{$exam->name}} )</h1> </div>
        <div class="header"></div>
        @foreach($exam->question as $question)
        <div class="card mb-3">
            <div class="card-header">{{$question->name}}</div>
            <div class="card-body">
                <ul class="answer-list list-group">
                    @foreach($question->answer as $answer)
                        @if($answer->answers == $question->correct)
                            <li class="list-group-item list-group-item-success">
                                {{$answer->answers}}
                                <span class="text-success float-right">Correct</span>
                            </li>
                        @else
                             <li class="list-group-item">{{$answer->answers}}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>
@endsection
