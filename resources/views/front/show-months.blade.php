@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($subjects->months as $month)
            @if($month->students->contains(Auth::id()))
                <div><a href="{{route('show.months',$month->id)}}" class="btn btn-info">{{$month->name}}</a> </div>
            @else
            <div>{{$month->name}} + No </div>
            @endif
        @endforeach
    </div>
@endsection
