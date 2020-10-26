@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div>{{$exam->name}}</div>
        @foreach($questions as $question)
            <div>{{$question->name}} <span><a href="{{route('admin.edit-question',$question->id)}}">Edit</a></span></div>
            @foreach($question->answer as $answer)
                <div>
                    @if($question->correct == $answer->answers)
                        Correct is :
                        @endif
                    {{$answer->answers}}
                </div>
            @endforeach
        @endforeach
        <a href="{{route('admin.add-questions',$exam->id)}}" class="btn btn-primary">Add New Question</a>
    </div>

@endsection
