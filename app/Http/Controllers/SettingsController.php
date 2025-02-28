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
    // update profile
    public function updateProfile(Request $request)
    {
        // Fetch the currently authenticated user
        $user = User::findOrFail(Auth::id());

        // Validate request data
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone_number' => 'nullable|string|max:20',
        ]);

        // Handle the profile photo upload
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
        
            // Generate unique file name
            $fileName = time() . '.' . $file->getClientOriginalExtension();
        
            // Define the storage path
            $destinationPath = storage_path('app/public/uploads/');
        
            // Delete old image if it exists and is not 'default.jpg'
            if ($user->profile_photo && $user->profile_photo !== 'default.jpg') {
                $oldImagePath = $destinationPath . $user->profile_photo;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Remove the old file
                }
            }
        
            // Move new file to the folder
            $file->move($destinationPath, $fileName);
        
            // Save the new file name to the database
            $user->profile_photo = $fileName;
        }

        // Update user details
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        // Save changes to the database
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
}
