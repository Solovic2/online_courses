@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="text-center"><h1>إضافة واجب جديد </h1></div>
        <form action="{{route('admin.store-homework')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$content->id}}" name="id">
            <input class="form-control" type="text" name="homeworkName" required>
            <input type="submit">
        </form>
    </div>

@endsection
