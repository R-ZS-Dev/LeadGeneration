<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    // update profile
    public function updateProfile(Request $request)
    {
        // dd($request->all());
        // Fetch user as an Eloquent model
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone_number' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $photoName = time() . '_' . $profilePhoto->getClientOriginalName();
        
            // Save file to public/uploads/profile_photos directory
            $profilePhoto->move(public_path('uploads/profile_photos'), $photoName);
        
            // Delete old image if it's not the default
            if ($user->profile_photo && $user->profile_photo !== 'default.jpg') {
                $oldImagePath = public_path('uploads/profile_photos/' . $user->profile_photo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        
            // Save new image name to database
            $user->profile_photo = $photoName;
        }        

        // Update user info using direct property assignment
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save(); // Explicitly save changes

        return back()->with('success', 'Profile updated successfully!');
    }
}
