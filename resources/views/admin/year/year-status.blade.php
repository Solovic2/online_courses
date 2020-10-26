@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div>
            <h1 class="text-center">الشهور</h1>
            <div class="text-left">
                <a class="btn btn-primary " href="{{route('admin.year-add-month',$subject_id)}}"><span><i class="fas fa-plus-circle"></i></span>   إضافة شهر جديد</a>

            </div>
        </div>
            <hr>
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="row">
        @foreach($months as $month)
            <div class="col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <a class="btn btn-info" href="{{route('admin.year-months-content',$month->id)}}"><span> <i class="fas fa-info-circle"></i>  </span>     {{$month->name}}</a>
                            <span class="mr-5">{{$month->code}}</span>
                        </div>
                        <div class="float-left">
                            <a href="{{route('admin.year-months-students',$month->id)}}" class="btn btn-secondary "><span><i class="fas fa-user-graduate"></i></span>  طلاب هذا الشهر  </a>
                            <a href="{{route('admin.year-pending',['month_id'=>$month,'id'=>$year])}}" class="btn btn-warning"><span><i class="fas fa-chart-line"></i></span> تفعيل الطلاب </a>
                            <a href="{{route('admin.year-edit-month',$month->id)}}" class="btn btn-success"><span><i class="fas fa-edit"></i></span>  تعديل الشهر </a>
                            <a href="{{route('admin.year-delete-month',$month->id)}}" class="btn btn-danger"><span><i class="fas fa-minus-circle"></i></span> حذف هذا الشهر  </a>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach


        </div>

    </div>
@endsection
