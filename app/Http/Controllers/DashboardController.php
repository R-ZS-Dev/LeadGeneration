<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('status', 1)->count();
        return view('dashboard', compact('totalUsers'));
    }
}
