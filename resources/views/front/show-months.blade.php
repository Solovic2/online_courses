@extends('layouts.app')

@section('content')
    <main class="py-5 months">
        <div class="container">
            <div class="row justify-content-center">
{{--                <div class="col-md-6 month-logo wow fadeIn" data-wow-duration="2s" >--}}
{{--                    <img src="{{asset('assets/images/study.jpg')}}">--}}
{{--                </div>--}}
                <div class="col-md-8 text-right wow bounceInRight" data-wow-duration="1s">
                    <ul class="list-group">
                    @foreach($subjects->months as $month)
                        @if($month->students->contains(Auth::id()))
                            <li class="list-group-item text-center list-group-item-primary"><a href="{{route('show.months',$month->id)}}" ><div>{{$month->name}}</div></a> </li>
                        @else
                            <li class="list-group-item list-group-item-light"><div>{{$month->name}} + Code </div></li>
                        @endif

                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
