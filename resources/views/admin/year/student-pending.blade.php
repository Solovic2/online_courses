@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="text-center mb-3"><h1> تفعيل الطلاب</h1></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">إسم الطالب</th>
                <th scope="col">رقم هاتفه</th>

                <th scope="col">التفعيل</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)

                <tr>
                    <th scope="row">{{$student->name}}</th>
                    <td>{{$student->mobile}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('admin.year.month-active-student',['id'=>$month->id,'student_id'=>$student->id])}}">قم بالتفعيل </a>
                    </td>
                </tr>
{{--                {{$student->name}} -  {{$month->name}}--}}

            @endforeach

            </tbody>
        </table>

    </div>

@endsection
