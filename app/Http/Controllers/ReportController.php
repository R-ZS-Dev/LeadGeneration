<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('status', 1)->get();
        return view('report', compact('reports'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'report_name' => 'required|string|max:255',
            'address1' => 'required|string|max:500',
            'address2' => 'required|string|max:500',
            'header_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'footer_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        // Create the report
        $report = Report::create([
            'user_id' => Auth::id(),
            'report_name' => $request->report_name,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'header_image' => 'default.jpg',
            'footer_image' => 'default.jpg',
            'active' => $request->has('active') ? 'yes' : 'no',
            'status' => $request->status ?? 1,
        ]);

        // Handle Header Image Upload
        if ($request->hasFile('header_image')) {
            $file = $request->file('header_image');
            $fileName = time() . '_header_' . $file->getClientOriginalName();

            // Delete old image if exists
            if ($report->header_image && $report->header_image !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $report->header_image);
            }

            // Store new file
            $file->storeAs('uploads', $fileName, 'public');

            // Update database with new image filename
            $report->update(['header_image' => $fileName]);
        }

        // Handle Footer Image Upload
        if ($request->hasFile('footer_image')) {
            $file = $request->file('footer_image');
            $fileName = time() . '_footer_' . $file->getClientOriginalName();

            // Delete old image if exists
            if ($report->footer_image && $report->footer_image !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $report->footer_image);
            }

            // Store new file
            $file->storeAs('uploads', $fileName, 'public');

            // Update database with new image filename
            $report->update(['footer_image' => $fileName]);
        }

        return redirect()->route('report')->with('success', 'Report created successfully');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        // Delete images from storage (if not default)
        if ($report->header_image && $report->header_image !== 'default.jpg') {
            Storage::disk('public')->delete('uploads/' . $report->header_image);
        }
        if ($report->footer_image && $report->footer_image !== 'default.jpg') {
            Storage::disk('public')->delete('uploads/' . $report->footer_image);
        }

        $report->update(['status' => 0]);
        return redirect()->route('report')->with('success', 'Report deleted successfully');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return response()->json($report); // Return report data as JSON
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $request->validate([
            'report_name' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'header_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image uploads
        if ($request->hasFile('header_image')) {
            if ($report->header_image && $report->header_image !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $report->header_image);
            }
            $headerImage = time() . '_' . $request->file('header_image')->getClientOriginalName();
            $request->file('header_image')->storeAs('uploads', $headerImage, 'public');
            $report->header_image = $headerImage;
        }

        if ($request->hasFile('footer_image')) {
            if ($report->footer_image && $report->footer_image !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $report->footer_image);
            }
            $footerImage = time() . '_' . $request->file('footer_image')->getClientOriginalName();
            $request->file('footer_image')->storeAs('uploads', $footerImage, 'public');
            $report->footer_image = $footerImage;
        }

        // Update report details
        $report->update([
            'report_name' => $request->report_name,
            'address1' => $request->address1,
            'address2' => $request->address2,
        ]);

        return redirect()->route('report')->with('success', 'Report updated successfully');
    }
}
