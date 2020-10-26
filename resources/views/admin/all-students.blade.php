@extends('admin.layouts.main')
@section('content')
    <div class="container">
        @foreach($years as $year)
            <a href="{{route('admin.show-year-students',$year->id)}}" class="btn btn-primary">{{$year->name}}</a>
        @endforeach
    </div>

@endsection
