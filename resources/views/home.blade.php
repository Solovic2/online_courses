@extends('layouts.app')

@section('content')
<main class="py-5 misters">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 subjects">
                <div class="float-left col-md-6 text-center wow fadeIn" data-wow-duration="2s"><a href="{{route('show.subject.months',$subjects->first()->id)}}"><img class="hvr-shrink" src="{{asset('assets/images/team1.jpg')}}"></a>مستر سامي  </div>
                <div class="float-right col-md-6 text-center wow bounceIn" data-wow-duration="2s"><a href="{{route('show.subject.months',$subjects->last()->id)}}"><img class="hvr-shrink" src="{{asset('assets/images/team2.jpg')}}"></a> مستر عربي  </div>
            </div>
        </div>
    </div>
</main>
@endsection
