<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;


class SettingsController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone_number' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('uploads');

            if ($user->profile_photo && $user->profile_photo != 'default.jpg') {
                $oldImagePath = $destinationPath . $user->profile_photo;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file->move($destinationPath, $fileName);

            $user->profile_photo = $fileName;
        }

        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phoneno = $request->phoneno;

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->numbers()->symbols(),
            ],
        ]);

        $user = User::findOrFail(Auth::id());

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }

    public function checkPassword(Request $request)
    {
        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            return response()->json(['valid' => true]); // Correct password
        } else {
            return response()->json(['valid' => false]); // Incorrect password
        }
    }
}
