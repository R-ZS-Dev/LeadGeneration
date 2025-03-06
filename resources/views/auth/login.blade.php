@extends('auth.auth-master')
@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
    style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">

    <div class="login-wrapper">
        <!-- Left Side: Logo Section -->
        <div class="login-left">
            <img src="../assets/images/freedashDark.svg" alt="PDS Perfusion">
        </div>

        <!-- Right Side: Login Form -->
        <div class="login-right">
            <h2 class="login-title">PDS Perfusion</h2>
            <h2 class="login-title">Welcome 👋</h2>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <strong for="">Email Address</strong>
                <div class="custom-input-group">
                    <span class="input-icon"><i class="far fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="abc@example.com" required>
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <strong for="">Password</strong>
                <div class="custom-input-group">
                    <span class="input-icon"><i class="icon-lock"></i> </span>
                    <input type="password" name="password" placeholder="•••••" required>
                </div>

                <div class="login-links mt-2">
                    <label><input type="checkbox" value="1" name="remember"> Remember me</label>
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>

                <button type="submit" class="login-button mt-3">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection