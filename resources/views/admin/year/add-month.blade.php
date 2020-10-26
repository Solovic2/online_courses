@extends('admin.layouts.main')
@section('content')
    <div class="container">

        <form action="{{route('admin.year.store-month')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="formGroupExampleInput">إسم الشهر</label>

                <input type="text"  id="formGroupExampleInput" placeholder=" أدخل اسم الشهر "  class="text-right form-control"  name="name" required>

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">أدخل الكود</label>

                <input type="text"  id="formGroupExampleInput" placeholder=" أدخل الكود "  class="text-right form-control"  name="code" required>

            </div>
            <input type="hidden" name="subjectID" value="{{$id}}">
            <input type="submit" class="btn btn-primary">
        </form>
    </div>

@endsection
