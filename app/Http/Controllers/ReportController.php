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
        $reports = Report::where('status', '1')
            ->where('close', '1')
            ->get();
        return view('config.report', compact('reports'));
    }

    public function addReport(Request $request)
    {
        $request->validate([
            'report_name' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
        ]);

        if ($request->hasFile('rep_headimage')) {
            $file = $request->file('rep_headimage');
            $timestamp = now()->format('YmdHis');
            $extension = $file->getClientOriginalExtension();
            $headImagePath = 'header_'.$timestamp . '.' . $extension;
            $file->move(public_path('uploads'), $headImagePath);
        }
        if ($request->hasFile('rep_footimage')) {
            $profile = $request->file('rep_footimage');
            $timestamp = now()->format('YmdHis');
            $extension = $profile->getClientOriginalExtension();
            $footImagePath = 'footer_'.$timestamp . '.' . $extension;
            $profile->move(public_path('uploads'), $footImagePath);
        }

        $report = new Report();
        $report->report_name = $request->report_name;
        $report->rep_address1 = $request->address1;
        $report->rep_address2 = $request->address2;
        $report->rep_headimage = $headImagePath;
        $report->rep_footimage = $footImagePath;
        $report->rep_active = $request->rep_active;

        $report->rep_insertby = Auth::user()->name;
        $report->save();
        return redirect()->back()->with('success', 'Report added successfully!');
    }

    public function deleteReport($id)
    {
        $report = Report::find($id);
        $report->close = '0';
        $report->status = '0';
        $report->save();
        return redirect()->back()->with('success', 'Report deleted successfully!');
    }

    public function editReport(Request $request)
    {
        $request->validate([
            'report_name' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
        ]);

        $headImagePath = null;
        $footImagePath = null;
        $id = $request->rep_id;
        $report = Report::find($id);
        if ($request->hasFile('rep_headimage')) {
            if ($report->rep_headimage && file_exists(public_path('uploads/' . $report->rep_headimage))) {
                unlink(public_path('uploads/' . $report->rep_headimage));
            }
            $file = $request->file('rep_headimage');
            $timestamp = now()->format('YmdHis');
            $extension = $file->getClientOriginalExtension();
            $headImagePath = 'header_'.$timestamp . '.' . $extension;
            $file->move(public_path('uploads'), $headImagePath);
        }else{
            $headImagePath = $report->rep_headimage;
        }
        if ($request->hasFile('rep_footimage')) {
            if ($report->rep_footimage && file_exists(public_path('uploads/' . $report->rep_footimage))) {
                unlink(public_path('uploads/' . $report->rep_footimage));
            }
            $profile = $request->file('rep_footimage');
            $timestamp = now()->format('YmdHis');
            $extension = $profile->getClientOriginalExtension();
            $footImagePath = 'footer_'.$timestamp . '.' . $extension;
            $profile->move(public_path('uploads'), $footImagePath);
        }else{
            $footImagePath = $report->rep_footimage;
        }

        $report->report_name = $request->report_name;
        $report->rep_address1 = $request->address1;
        $report->rep_address2 = $request->address2;
        $report->rep_headimage = $headImagePath;
        $report->rep_footimage = $footImagePath;
        $report->rep_active = $request->rep_active;
        $report->save();
        return redirect()->back()->with('success', 'Report updated successfully!');
    }
}
