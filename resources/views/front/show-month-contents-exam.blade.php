@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('correct',$exam->contain->month->id)}}" method="post">
            @csrf
            <h1>{{$exam->name}}</h1>
            <div class="card">
                @foreach($exam->question as $question)
                    <div class="card-header"><h3>{{$question->name}}</h3></div>
                    <div class="radio-group card-body">
                        @foreach($question->answer as $answer)
                            <div>
                                <input type="radio" name="answers[{{$question->id}}]" class="answers" value="{{$answer->answers}}">
                                <label>{{$answer->answers}}</label><br>
                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" value="{{$exam->id}}" name="exam_id" >
                @endforeach
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
@endsection

