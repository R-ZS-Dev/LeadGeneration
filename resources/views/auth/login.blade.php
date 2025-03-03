{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- @extends('layouts.app') --}}
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
        <p class="login-subtitle">Please login here</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <strong for="">Email Address</strong>
            <div class="custom-input-group">
                <span class="input-icon"><i class="far fa-envelope"></i></span>
                <input type="email" name="email" placeholder="abc@example.com" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <strong for="">Password</strong>
            <div class="custom-input-group">
                <span class="input-icon"><i class="icon-lock"></i> </span>
                <input type="password" name="password" placeholder="•••••" required>
            </div>

            <div class="login-links mt-2">
                <label><input type="checkbox"> Remember me</label>
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>

            <button type="submit" class="login-button mt-3">Login</button>
        </form>
    </div>
</div>
</div>
@endsection
