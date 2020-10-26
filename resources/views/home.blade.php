@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach($subjects as $subject)
                        <a href="{{route('show.subject.months',$subject->id)}}"class="btn btn-primary">{{$subject->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
