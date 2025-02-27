@extends('layouts.app')
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">

            <div class="login-wrapper">
                <!-- Left Side: Logo Section -->
                <div class="login-left">
                    <img src="../assets/images/freedashDark.svg" alt="PDS Perfusion">
                </div>

                <!-- Right Side: Forget Form -->
                <div class="login-right">
                    <h2 class="login-title">PDS Perfusion</h2>
                    <h2 class="login-title">Reset Password</h2>
                    <p class="login-subtitle">Please enter your new password here.</p>

                    @if(session('success'))
                    <div class="alert alert-success m-3">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger m-3">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="token" value="{{ request()->token }}">
                        <input type="hidden" name="email" value="{{ request()->email }}">

                        <strong for="">New password</strong>
                        <div class="custom-input-group">
                            <span class="input-icon"><i class="icon-lock"></i> </span>
                            <input type="password" name="password" placeholder="•••••" required>
                        </div>

                        <strong for="">Confirm password</strong>
                        <div class="custom-input-group">
                            <span class="input-icon"><i class="icon-lock"></i> </span>
                            <input type="password" name="password_confirmation" placeholder="•••••" required>
                        </div>

                        <button type="submit" class="login-button mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>