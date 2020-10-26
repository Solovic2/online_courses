@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="text-center">
            <h1>الفيديوهات والإمتحانات </h1>
        </div>
        <div class="text-left mb-3">
            <a href="{{route('admin.add-new-content',$month->id)}}" class="btn btn-primary "><span><i class="fas fa-plus-circle"></i></span>  إضافة مُحتوى جديد</a>
        </div>
        @foreach($month->contains as $content)
            <div class="col-sm-12 mb-3">
                <div class="card">
                    @if(isset($content->video))
                    <iframe height="500px" src="https://www.youtube.com/embed/sdlqq0IahII" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                    <div class="card-body">
                        <div class="float-right">
                            @if(!isset($content->video))
                                <a href="#" class="btn btn-primary">Add New video</a>
                            @endif
                        </div>
                        <div class="float-left">
                            @if(!isset($content->exam))
                                <a href="{{route('admin.add-new-exam',$content->id)}}" class="btn btn-primary">إضافة إمتحان</a>
                            @else
                                <a href="{{route('admin.show-exam',$content->id)}}" class="btn btn-dark">{{$content->exam->name}}</a>
                                <a class="btn btn-success text-right" href="{{route('admin.year.exam-grades',$content->exam->id)}}">درجات الطلاب الذين امتحنوا </a>

                            @endif
                            @if(!isset($content->homework))
                                <a href="{{route('admin.add-new-homework',$content->id)}}" class="btn btn-primary">إضافة واجب</a>
                            @else
                                <a href="{{route('admin.show-homework',$content->id)}}" class="btn btn-secondary">{{$content->homework->name}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
