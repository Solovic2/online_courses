@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form action="{{route('admin.add-new-question-homework')}}" method="post">
            @csrf
            <h1>{{$homework->name}}</h1>
            <input type="hidden" value="{{$homework->id}}" name="homeworkID">
            <h3>Question is:</h3>
            <input class="form-control" type="text" placeholder="Question" name="question" required>
            <div class="radio-group">
                <div class="first">
                    <input type="radio" name="radio"class="radio" required disabled>
                    <label>
                        <input type="text" class="form-control" name="ans[]"required>
                    </label>
                </div>
                <div class="first">
                    <input type="radio" name="radio"class="radio" disabled>
                    <label>
                        <input type="text" class="form-control" name="ans[]" required >
                    </label>
                </div>
                <div class="first">
                    <input type="radio" name="radio" class="radio" disabled>
                    <label>
                        <input type="text" class="form-control" name="ans[]" required>
                    </label>
                </div>
                <div class="first">
                    <input type="radio" name="radio"class="radio" disabled>
                    <label>
                        <input type="text" class="form-control" name="ans[]" required>
                    </label>
                </div>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>

@endsection
