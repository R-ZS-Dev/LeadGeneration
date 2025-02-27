<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Models\EmailSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmailSettingsController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        $settings = $user->settings ?? new EmailSetting(); // Fetch or create new settings

        return view('settings.email', compact('settings'));
    }


    public function updateEmailConfig(Request $request)
    {
        $user = Auth::user();

        // Retrieve or create a new settings record for the user
        $settings = $user->settings ?? new EmailSetting();
        $settings->user_id = $user->id; // Ensure the user ID is set

        // Assign values from the form
        $settings->mail_from_name = $request->mail_from_name;
        $settings->email = $request->email;
        $settings->password = Hash::make($request->password);
        $settings->port = $request->port;
        $settings->smtp = $request->smtp;

        // Save settings
        $settings->save(); // Use `$settings->save()` instead of `$user->settings()->save($settings)`

        return back()->with('success', 'Email configuration updated successfully!');
    }



    // ✅ Function to update .env safely
    protected function setEnvironmentValue(array $values)
    {
        $envFile = base_path('.env');

        if (File::exists($envFile)) {
            $envContent = File::get($envFile);

            foreach ($values as $key => $value) {
                // Convert null values to an empty string to remove from .env
                if (is_null($value) || $value === '') {
                    $pattern = "/^{$key}=.*/m";
                    $envContent = preg_replace($pattern, '', $envContent);
                    continue;
                }

                // Update or add key-value pairs
                $pattern = "/^{$key}=.*/m";
                $replacement = "{$key}=\"{$value}\"";

                if (preg_match($pattern, $envContent)) {
                    $envContent = preg_replace($pattern, $replacement, $envContent);
                } else {
                    $envContent .= "\n{$key}=\"{$value}\"";
                }
            }

            File::put($envFile, $envContent);
        }
    }
}
