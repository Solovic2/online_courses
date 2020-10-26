@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1>إضافة فيديو جديد</h1>
        <hr>
        <form action="{{route('admin.add-videos')}}" method="post">
            @csrf
        <select name="year" id="selectYear">
            @foreach($years as $year)
                <option value="{{$year->id}}">{{$year->name}}</option>
            @endforeach
        </select>
        <select name="month" id="select-month">
            @foreach($months as $month)
                <option value="{{$month->id}}">{{$month->name}}</option>

            @endforeach
        </select>
        <hr>
            <label> Name </label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name Of Video" required>
            <label> Video </label>
            <input type="text" class="form-control" name="video" placeholder="Enter Video Link" required>
            <label> Branch </label>
            <input type="text" class="form-control" name="branch" placeholder="Enter Branch name" required>
        <input type="submit" class="btn btn-primary">
        </form>

    </div>

@endsection

@section('script')
    <script>
        $("#selectYear").change(function() {
            $.ajax({
                url:'{{route('admin.show-video-months')}}',
                method: 'GET',
                data:{
                    'id':$('#selectYear option:selected').val()
                },
                success:function (data){
                    $('#select-month option').remove();
                    $.each(data ,function (index , value){
                        $('#select-month').append(' <option value=" ' + data[index]['id'] + ' ">' + data[index]['name']+ ' </option>');
                    });
                }

            });
            // $.ajax({
            //     url:'@Url.Action("showIndex","AdminController")',
            //     method: 'GET',
            //     data:{
            //         'id':
            //     },
            //
            // });
        });
    </script>
@endsection
