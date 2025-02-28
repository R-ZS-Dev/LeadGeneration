<head>
    @php
        $titles = [
            'all-users' => 'All Users List',
            'dashboard' => 'Dashboard',
            'profile-setting' => 'User Profile',
            'app-chat' => 'Chat',
            'app-calendar' => 'Calendar',
            'reset-password' => 'Reset Password',
            'forget-password' => 'Forget Password',
            'login' => 'Login',
            'register' => 'Register',
            'report' => 'Report',
        ];
    @endphp

    <title>{{ $titles[Route::currentRouteName()] ?? 'Default Title' }}</title>
</head>



