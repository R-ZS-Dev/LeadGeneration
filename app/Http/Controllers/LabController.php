<?php

namespace App\Http\Controllers;

use App\Models\Lab;
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
            $lab->show_unit = $request->show_unit;
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
            $lab->lr_active = $request->lr_active;
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
            $lab->show_unit = $request->show_unit;
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
            $lab->lr_active = $request->lr_active;
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

    /* -------------------------- labs module functions ------------------------- */

    public function viewLab()
    {
        $labs = Lab::where('status','1')->where('close','1')->get();
        return view('config.lab',compact('labs'));
    }

    public function addLab(Request $request)
    {
        // return $request->all();
        try {

            $user = Auth::user();

            $lab = new Lab();
            $lab->l_name = $request->l_name;
            $lab->l_billcode = $request->l_billcode;
            $lab->l_reporttitle = $request->l_reporttitle;
            $lab->l_reportfooter = $request->l_reportfooter;
            $lab->rowboxes = json_encode($request->rowboxes ?? []);
            $lab->show_quick_button = $request->has('show_quick_button');
            $lab->quick_button_text = $request->quick_button_text ?? null;
            $lab->quickboxes = json_encode($request->quickboxes ?? []);
            $lab->l_active = $request->l_active;
            $lab->l_insertby = $user->first_name;
            $lab->save();
            return redirect()->back()->with('success', 'Lab added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

    }

    public function editLab(Request $request)
    {
        $id = $request->l_id;
        // return $request->show_quick_button;
        try {
            $lab = Lab::find($id);
            $lab->l_name = $request->l_name;
            $lab->l_billcode = $request->l_billcode;
            $lab->l_reporttitle = $request->l_reporttitle;
            $lab->l_reportfooter = $request->l_reportfooter;
            $lab->rowboxes = json_encode($request->rowboxes ?? []);
            $lab->show_quick_button = $request->show_quick_button;
            $lab->quick_button_text = $request->quick_button_text;
            $lab->quickboxes = json_encode($request->quickboxes ?? []);
            $lab->l_active = $request->l_active;
            $lab->save();
            return redirect()->back()->with('success', 'Lab Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteLab($id)
    {
        $lab = Lab::find($id);
        $lab->status = '0';
        $lab->close = '0';
        $lab->save();
        return redirect()->back()->with('success','Lab Deleted Successfully!');
    }
}
