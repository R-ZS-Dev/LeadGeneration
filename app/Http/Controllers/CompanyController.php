<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function updateCompany(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|unique:companies,company_email,' . Auth::id() . ',user_id',
            'company_phone' => 'required|string|max:20',
            'company_mobile' => 'required|string|max:20',
            'company_address' => 'required|string',
            'company_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Find or create the company record for the logged-in user
        $company = Company::updateOrCreate(
            ['user_id' => Auth::id()], // Condition to check if the company exists
            [
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_phone' => $request->company_phone,
                'company_mobile' => $request->company_mobile,
                'company_address' => $request->company_address,
            ]
        );

        // Handle company image upload
        if ($request->hasFile('company_image')) {
            $file = $request->file('company_image');
        
            // Get the original filename
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            
            // Generate a unique filename with time()
            $fileName = time() . '_' . $originalFileName . '.' . $file->getClientOriginalExtension();
        
            // Delete the old image if it exists
            if ($company->company_image) {
                Storage::disk('public')->delete('company_images/' . $company->company_image);
            }
        
            // Store the new file in the public disk
            $file->storeAs('company_images', $fileName, 'public');
        
            // Update the database with the new image filename
            $company->update(['company_image' => $fileName]);
        }
        
        

        return back()->with('success', 'Company details updated successfully!');
    }
}
