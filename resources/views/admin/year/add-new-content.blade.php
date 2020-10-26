@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form action="{{route('admin.store-new-content')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="hidden" name="monthID" value="{{$id}}">
                <label> Name </label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name Of Video" required>
                <label> Video </label>
                <input type="text" class="form-control" name="video" placeholder="Enter Video Link" required>
                <label> Branch </label>
                <input type="text" class="form-control" name="branch" placeholder="Enter Branch name" required>
            </div>

            <input type="submit" class="btn btn-primary">
        </form>
    </div>

@endsection
