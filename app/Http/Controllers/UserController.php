<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status', '1')->where('close','1')->where('role','user')->get();
        return view('all-users', compact('users'));
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|in:Male,Female,Other',
            'phoneno' => 'required|string|max:20',
            'role' => 'required|in:admin,user',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors' , $validator->errors(), 422);
        }
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'phoneno' => $request->phoneno,
            'role' => $request->role,
            'address' => $request->address,
        ]);
        return redirect()->back()->with('success','User Added successfully!',201);
    }

    public function editUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'phoneno' => 'required|string|max:20',
            'role' => 'required|in:admin,user',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors' , $validator->errors(), 422);
        }
        $id = $request->id;
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phoneno' => $request->phoneno,
            'role' => $request->role,
            'address' => $request->address,
        ]);
        return redirect()->back()->with('success','User updated successfully!',201);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->status = '0';
        $user->close = '0';
        $user->save();
        return redirect()->back()->with('success','User deleted successfully!');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            return response()->json([
                'success' => false,
                'message' => 'This email is already taken.',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Email is available.',
        ]);
    }
}
