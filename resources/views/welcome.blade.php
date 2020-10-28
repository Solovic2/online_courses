<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Courses</title>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="{{asset('assets/admin/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/front/css/hover.css') }}">
        <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}">
    </head>
    <body>
        <div class="flex-center position-ref full-height overlayer">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="active">الصفحة الرئيسية</a>
                    @else

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">التسجيل</a>
                        @endif

                        <a href="{{ route('login') }}" class="active">تسجيل الدخول</a>

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md ">
                    <div class="head-body">
                        أهلاً بك في موقعنا
                    </div>
                    <div class="body  wow bounceIn" data-wow-duration="2s">
                        <div>موقع سنتر السامي يرحب بكم</div>
                    </div>
                    <div class="body-link">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary bt2 wow bounceInUp" data-wow-duration="1s">شاهد الآن </a>

                        @else
                        <a href="{{ route('register') }}" class="btn btn-primary bt2 wow bounceInUp hvr-icon-forward" data-wow-duration="1s">   سجل الآن    <span "><i class="fas fa-arrow-circle-right"></i></span>  </a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="{{ asset('assets/front/js/wow.min.js') }}"></script>
        <script>new WOW().init();</script>
    </body>
</html>
