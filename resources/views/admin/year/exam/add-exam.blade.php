@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="text-center"><h1>إضافة إمتحان </h1></div>

        <form action="{{route('admin.store-exam')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$content->id}}" name="id">
            <input class="form-control" type="text" name="examName" required>
            <input type="submit">
        </form>
    </div>

@endsection
