<!DOCTYPE html>
<html lang="en">
<head>
    <title>لوحة تسجيل الدخول للأدمن</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/admin/login/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/login/vendor/daterangepicker/daterangepicker.css')}}">--}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('assets/admin/login/images/bg-01.jpg')}}');">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					تسجيل الدخول
				</span>
            @error('failed')
            <div class="alert alert-danger text-center">{{$message}}</div>
            @enderror
            <form class="login100-form validate-form p-b-33 p-t-5" action="{{route('admin.login.pass')}}" method="POST">
                @csrf
                <div class="wrap-input100 validate-input" data-validate = "Enter email">
                    <input class="input100" type="email" name="email" placeholder="Email" >
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" >
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <input type="submit" class="login100-form-btn" value="login">
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('assets/admin/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/admin/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/admin/login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('assets/admin/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/admin/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/admin/login/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/admin/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/admin/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/admin/login/js/main.js')}}"></script>

</body>
</html>
