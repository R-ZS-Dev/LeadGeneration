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
            'view-hospital' => 'All Hospitals List',
            'view-equipment-group' => 'All Equipment Groups',
            'view-equipment' => 'All Equipments',
            'view-supply-group' => 'All Supply groups',
            'view-supplies' => 'All Supplies',
            'view-staff' => 'All Staff Memebers',
            'view-procedure' => 'All Procedures',
            'view-lab-results' => 'All Lab Reports',

        ];
    @endphp

    <title>{{ $titles[Route::currentRouteName()] ?? 'Default Title' }}</title>
</head>



