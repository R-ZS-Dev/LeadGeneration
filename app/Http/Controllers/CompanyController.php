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
            'company_email' => 'required|email|unique:companies,company_email,' . (Auth::user()->company->id ?? 'NULL') . ',id',
            'company_phone' => 'required|string|max:20',
            'company_mobile' => 'required|string|max:20',
            'company_address' => 'required|string',
            'company_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'fav_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Find or create the company record for the logged-in user
        $company = Company::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_phone' => $request->company_phone,
                'company_mobile' => $request->company_mobile,
                'company_address' => $request->company_address,
            ]
        );

        $destinationPath = public_path('uploads');

        // Handle company image upload
        if ($request->hasFile('company_image')) {
            $file = $request->file('company_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            if ($company->company_image && $company->company_image !== 'default.jpg') {
                $oldImagePath = $destinationPath . '/' . $company->company_image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file->move($destinationPath, $fileName);

            $company->company_image = $fileName;
        }

        // Handle fav icon upload
        if ($request->hasFile('fav_photo')) {
            $favFile = $request->file('fav_photo');
            $favFileName = time() . '.' . $favFile->getClientOriginalExtension();

            if ($company->fav_photo && $company->fav_photo !== 'default.jpg') {
                $oldFavImagePath = $destinationPath . '/' . $company->fav_photo;
                if (file_exists($oldFavImagePath)) {
                    unlink($oldFavImagePath);
                }
            }

            $favFile->move($destinationPath, $favFileName);

            $company->fav_photo = $favFileName;
        }

        // Save updated image paths if needed
        $company->save();

        return back()->with('success', 'Company details updated successfully!');
    }
}
