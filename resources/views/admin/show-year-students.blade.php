@extends('admin.layouts.main')
@section('content')
    <div class="container">
        @foreach($year->students as $student)
            <div>{{$student->name}}</div>
        @endforeach
    </div>

@endsection
