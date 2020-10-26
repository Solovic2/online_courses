@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('correct-homework',$homework->contain->month->id)}}" method="post">
            @csrf
            <h1>{{$homework->name}}</h1>
            <div class="card">
                @foreach($homework->question as $question)
                    <div class="card-header"><h3>{{$question->name}}</h3></div>
                    <div class="radio-group card-body">
                        @foreach($question->answer as $answer)
                            <div>
                                <input type="radio" name="answers[{{$question->id}}]" class="answers" value="{{$answer->answers}}">
                                <label>{{$answer->answers}}</label><br>
                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" value="{{$homework->id}}" name="homework_id" >
                @endforeach
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
@endsection

