@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="text-center mb-3"><h1> الطلاب</h1></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">إسم الطالب</th>
                <th scope="col">رقم هاتفه</th>

                <th scope="col">إلغاء التفعيل</th>
            </tr>
            </thead>
            <tbody>
            @foreach($month->students as $student)
                <tr>
                    <th scope="row">{{$student->name}}</th>
                    <td>{{$student->mobile}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('admin.year.month-de-active-student',['id'=>$month->id,'student_id'=>$student->id])}}">قم بإلغاء التفعيل </a>
                    </td>
                </tr>
                {{--                {{$student->name}} -  {{$month->name}}--}}

            @endforeach

            </tbody>
        </table>


{{--        <a href="{{route('admin.add-student-to-month',$month->id)}}" class="btn btn-primary">Add Student</a>--}}
    </div>

@endsection
