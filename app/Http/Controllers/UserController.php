<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status', 1)->get();
        return view('all-users', compact('users'));
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized access.'], 403);
        }

        $user = User::findOrFail($id);
        return response()->json($user);
    }


    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        $user = User::findOrFail($id);

        // Validate form data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|numeric',
            'address' => 'nullable|string',
            'gender' => 'required|in:Male,Female',
            'role' => 'required|in:admin,user',
            'password' => 'nullable|min:6|confirmed' // Only validate if provided
        ]);

        // Update user details
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->phone_number = $validatedData['phone_number'];
        $user->address = $validatedData['address'];
        $user->gender = $validatedData['gender'];
        $user->role = $validatedData['role'];

        // Only update password if it's provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('all-users')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        $loggedInUser = Auth::user();

        if ($loggedInUser->role === 'user') {
            return redirect()->route('all-users')->with('error', 'You are not allowed to delete users.');
        }

        $user = User::findOrFail($id);

        if ($loggedInUser->id == $id) {
            return redirect()->route('all-users')->with('error', 'You cannot delete your own account!');
        }

        $user->update(['status' => 0]);

        return redirect()->route('all-users')->with('success', 'User deleted successfully!');
    }
}
