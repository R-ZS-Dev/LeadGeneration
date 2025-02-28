<?php

namespace App\Http\Controllers;

use App\Models\LabResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    public function viewlabResults()
    {
        return view('config.lab-results');
    }

    public function addlabResults(Request $request)
    {
        return 
        $user = Auth::user();
        // $request->validate([
        //     'lr_name' => 'required|string|max:255',
        //     'lr_abbrivat' => 'required|string|max:10',
        //     'unit_of_measure' => 'required|string|max:15',
        // ]);

        $lab = new LabResult();
        $lab->lr_name = $request->lr_name;
        $lab->lr_abbrivat = $request->lr_abbrivate;
        $lab->unit_of_measure = $request->unit_of_measure;
        $lab->show_unit = $request->show_unit;
        $lab->lr_desc = $request->lr_desc;
        $lab->expected_low = $request->expected_high;
        $lab->high_critical = $request->high_critical;
        $lab->high_warn = $request->high_warn;
        $lab->lr_rangefrom = $request->lr_rangefrom;
        $lab->lr_rangeto = $request->lr_rangeto;
        $lab->minimum = $request->minimum;
        $lab->low_critical = $request->low_critical;
        $lab->low_warn = $request->low_warn;
        $lab->lr_active = $request->has('lr_active') ? '1' : '0';
        $lab->lr_insertby = $user->first_name;
        $lab->save();
        return redirect()->back()->with('success', 'Lab Result added successfully.');


    }
}
