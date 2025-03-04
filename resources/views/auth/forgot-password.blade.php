{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('auth.auth-master')
@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
        style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">

        <div class="login-wrapper">
            <!-- Left Side: Logo Section -->
            <div class="login-left">
                <img src="../assets/images/freedashDark.svg" alt="PDS Perfusion">
            </div>

            <!-- Right Side: Forget Form -->
            <div class="login-right">
                <h2 class="login-title">Forgot Password</h2>
                <p class="login-subtitle">Enter your registered email address. we’ll send you a code
                    to reset your password.</p>

                {{-- @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Custom error message (if you need to pass it explicitly in the controller) -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif --}}
                <!-- Success Message -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Error Messages -->
@if ($errors->any())
<div class="alert alert-danger">

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    
</div>
@endif


                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <strong for="">Email Address</strong>
                    <div class="custom-input-group mt-2">
                        <span class="input-icon"><i class="far fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="abc@example.com" required>
                    </div>

                    <button type="submit" class="login-button mt-3">Email Password Reset Link</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
