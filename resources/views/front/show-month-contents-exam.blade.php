@extends('layouts.app')
@section('content')
    <div class="container">
        <div>Registration closes in <span id="time"></span> minutes!</div>
        {{\Illuminate\Support\Facades\Auth::user()->end_exam_time}}
        <form action="{{route('correct',$exam->contain->month->id)}}" method="post" id="myForm">
            @csrf
            <h1>{{$exam->name}}</h1>
            <div class="card">
                @foreach($exam->question as $question)
                    <div class="card-header"><h3>{{$question->name}}</h3></div>
                    <div class="radio-group card-body">
                        @foreach($question->answer as $answer)
                            <div>
                                <input type="radio" name="answers[{{$question->id}}]" class="answers" value="{{$answer->answers}}">
                                <label>{{$answer->answers}}</label><br>
                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" value="{{$exam->id}}" name="exam_id" >
                @endforeach
            </div>
            <input type="submit" value="submit"  class="btn btn-primary exam_submit">
        </form>
    </div>
@endsection
@section('script')
    <script>
        // window.history.forward();
        // function startTimer(duration,display) {
    //     var timer = duration, minutes, seconds;
        setInterval(function () {
            $.ajax({
               url:'{{route('end.time',$exam->contain->month->id)}}',
                type:'GET',
                data: {
                    'end_exam_time' :'{{$end}}' ,
                    },
                success: function( data ) {
                   if(data==1){
                       document.getElementById("myForm").submit();
                   }
                },
            })
{{--            minutes = parseInt(timer / 60, 10);--}}
{{--            seconds = parseInt(timer % 60, 10);--}}

{{--            minutes = minutes < 10 ? "0" + minutes : minutes;--}}
{{--            seconds = seconds < 10 ? "0" + seconds : seconds;--}}

{{--            display.textContent = minutes + ":" + seconds;--}}
{{--            <?php--}}
{{--              use Carbon\Carbon;--}}
{{--             if(Carbon::now()->isAfter(session('end')) ){?>--}}
{{--                @dd(\Carbon\Carbon::now())--}}
{{--                    // document.getElementById("myform").submit();--}}
{{--             <?php }--}}
{{--             ?>--}}
{{--            if(session('end') === Carbon::now()){--}}

{{--             ?>--}}

{{--            <?php--}}
{{--              }--}}
{{--            ?>--}}
{{--            if (--timer < 0) {--}}
{{--            timer= duration;--}}
{{--                // window.location.href = 'http://localhost/online_courses/'--}}
{{--            }--}}
        }, 1000);
    // }

    // window.onload = function () {
    //     display = document.querySelector('#time');
    //     startTimer(1*60, display);
    // };
    </script>
    @endsection
