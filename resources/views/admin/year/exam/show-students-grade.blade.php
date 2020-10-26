@extends('admin.layouts.main')
@section('content')
<div class="container">
    <div class="text-center mb-3"><h1>درجات الطلاب </h1></div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">إسم الطالب</th>
            <th scope="col">رقم هاتفه</th>

            <th scope="col">درجة الإختبار </th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->name}}</th>
                <td>{{$student->mobile}}</td>
                <td><div class="btn btn-primary">{{$student->pivot->grade}}</div></td>
            </tr>


        @endforeach

        </tbody>
    </table>


</div>

@endsection
