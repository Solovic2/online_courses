@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form action="{{route('admin.update-question')}}" method="post">
            @csrf
            <input type="hidden"value="{{$question->id}}" name="questionID">
            <h3>Question is:</h3>
            <input class="form-control" type="text" placeholder="Question" name="question" value="{{$question->name}}">
            <div class="radio-group">
                @foreach($question->answer as $answer)
                    <div class="first">
                        <input type="radio" name="radio"class="radio checks"  @if($answer->answers == $question->correct) checked value="{{$answer->answers}}" @endif >
                        <label>
                            <input type="text" class="form-control" name="ans[]" value="{{$answer->answers}}" required >
                        </label>
                    </div>
                @endforeach
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>

@endsection
