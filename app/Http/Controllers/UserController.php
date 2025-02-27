<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('status', 1)->get();
        return view('all-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ensure only authenticated users can delete
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        // Get the logged-in user
        $loggedInUser = Auth::user();

        // Prevent users with "user" role from deleting any record
        if ($loggedInUser->role === 'user') {
            return redirect()->route('all-users')->with('error', 'You are not allowed to delete users.');
        }

        // Find the user to be deleted
        $user = User::findOrFail($id);

        // Prevent self-deletion
        if ($loggedInUser->id == $id) {
            return redirect()->route('all-users')->with('error', 'You cannot delete your own account!');
        }

        // Perform soft delete (set status to 0)
        $user->update(['status' => 0]);

        return redirect()->route('all-users')->with('success', 'User deleted successfully!');
    }
}
