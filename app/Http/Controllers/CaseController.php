<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Patient;
use App\Models\PatientHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseController extends Controller
{
    public function viewCase()
    {
        $hospital = Hospital::where('status', '1')->where('close', '1')->get();
        $patient = Patient::where('status', '1')->where('close', '1')->get();
        return view('cases.case', compact('hospital','patient'));
    }

    /* -------------------------- add pateint function -------------------------- */

    public function addPatient(Request $request)
    {

        $request->validate([
            'start_date' => 'required|date',
            'start_time' => 'required',
            'case_id' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'medical_record' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'height' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'blood_type' => 'nullable|string',
            'admit_date' => 'nullable|date',
            'hospital' => 'nullable|string|max:255',
            'room' => 'nullable|string|max:255',
            'bmi' => 'nullable|numeric',
            'surface_area_method' => 'nullable|string|max:50',
            'flow_rate' => 'nullable|numeric',
            'heparin_dose' => 'nullable|integer',
            'admit_source' => 'nullable|string|max:255',
            'discharge_date' => 'nullable|date',
        ]);

        if ($request->is_child == 'yes')
            $child = '1';
        else {
            $child = '0';
        }
        $patient = new Patient();
        $patient->start_date = $request->start_date;
        $patient->start_time = $request->start_time;
        $patient->case_id = $request->case_id;
        $patient->last_name = $request->last_name;
        $patient->first_name = $request->first_name;
        $patient->middle_name = $request->middle_name;
        $patient->medical_record = $request->medical_record;
        $patient->dob = $request->dob;
        $patient->height = $request->height;
        $patient->weight = $request->weight;
        $patient->blood_type = $request->blood_type;
        $patient->admit_date = $request->admit_date;
        $patient->hospital = $request->hospital;
        $patient->room = $request->room;
        $patient->is_child = $child;
        $patient->bmi = $request->bmi;
        $patient->surface_area_method = $request->surface_area;
        $patient->flow_rate = $request->flow_rate;
        $patient->heparin_dose = $request->heparin_dose;
        $patient->sex = $request->sex;
        $patient->admit_source = $request->admit_source;
        $patient->discharge_date = $request->discharge_date;
        $patient->pat_insertby = Auth::user()->name;
        $patient->save();
        return redirect()->back()->with('success', 'Patient Added Successfully!');
    }

    public function addPatientHistory(Request $request)
    {
        $request->validate([
            'ph_userid' => 'required|integer',
            'ph_medicalsum' => 'nullable|string',
            'ph_diagnosis' => 'nullable|string',
            'ph_allergies' => 'nullable|string',
        ]);

        $history = new PatientHistory();
        $history->ph_userid = $request->ph_userid;
        $history->ph_medicalsum = $request->ph_medicalsum;
        $history->ph_diagnosis = $request->ph_diagnosis;
        $history->ph_allergies = $request->ph_allergies;
        $history->ph_insertby = Auth::user()->name;
        $history->save();
        if($history)
        {
            return redirect()->back()->with('success','Patient History Added Successfully!');
        }else
        {
            return redirect()->back()->with('error','Faild to add patient history!');

        }

    }
}
