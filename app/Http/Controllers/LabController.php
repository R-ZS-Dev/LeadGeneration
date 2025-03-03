<?php

namespace App\Http\Controllers;

use App\Models\LabResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    public function viewlabResults()
    {
        $results = LabResult::where('status', '1')->where('close', '1')->get();
        return view('config.lab-results', compact('results'));
    }

    public function addlabResults(Request $request)
    {
        // return $request->all();
        try {
            $user = Auth::user();

            $lab = new LabResult();
            $lab->lr_name = $request->lr_name;
            $lab->lr_abbrivat = $request->lr_abbrivate;
            $lab->unit_of_measure = $request->unit_of_measure;
            $lab->show_unit = $request->has('show_unit') ? '1' : '0';
            $lab->lr_desc = $request->lr_desc;
            $lab->expected_high = $request->exp_high;
            $lab->expected_low = $request->exp_low;
            $lab->high_critical = $request->high_critical;
            $lab->high_warn = $request->high_warn;
            $lab->lr_rangefrom = $request->good_range_from;
            $lab->lr_rangeto = $request->good_range_to;
            $lab->minimum = $request->minimum;
            $lab->maximum = $request->maximum;
            $lab->low_critical = $request->low_critical;
            $lab->low_warn = $request->low_warn;
            $lab->lr_active = $request->has('lr_active') ? '1' : '0';
            $lab->lr_insertby = $user->first_name;
            $lab->save();
            return redirect()->back()->with('success', 'Lab Result added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function editLabResults(Request $request)
    {
        // return $request->all();
        $id = $request->lr_id;
        $lab = LabResult::find($id);
        try {
            $lab->lr_name = $request->lr_name;
            $lab->lr_abbrivat = $request->lr_abbrivate;
            $lab->unit_of_measure = $request->unit_of_measure;
            $lab->show_unit = $request->has('show_unit') ? '1' : '0';
            $lab->lr_desc = $request->lr_desc;
            $lab->expected_high = $request->exp_high;
            $lab->expected_low = $request->exp_low;
            $lab->high_critical = $request->high_critical;
            $lab->high_warn = $request->high_warn;
            $lab->lr_rangefrom = $request->good_range_from;
            $lab->lr_rangeto = $request->good_range_to;
            $lab->minimum = $request->minimum;
            $lab->maximum = $request->maximum;
            $lab->low_critical = $request->low_critical;
            $lab->low_warn = $request->low_warn;
            $lab->lr_active = $request->has('lr_active') ? '1' : '0';
            $lab->save();
            return redirect()->back()->with('success', 'Lab Result updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deletelabResults($id)
    {
        $result = LabResult::find($id);
        $result->close = '0';
        $result->status = '0';
        $result->save();
        return redirect()->back()->with('success','Lab Result Deleted Successfully!');
    }
}
