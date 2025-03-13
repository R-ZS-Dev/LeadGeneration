<?php

namespace App\Http\Controllers;

use App\Models\CaseEquipment;
use App\Models\CaseProcedures;
use App\Models\CaseStaff;
use App\Models\CaseSupply;
use App\Models\CoronaryArteryBypass;
use App\Models\Equipment;
use App\Models\EquipmentGroup;
use App\Models\Hospital;
use App\Models\NonCardic;
use App\Models\Patient;
use App\Models\PatientHistory;
use App\Models\Procedures;
use App\Models\Staff;
use App\Models\SupplyGroup;
use App\Models\ValveSurgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseController extends Controller
{
    public function viewCase()
    {
        $hospital = Hospital::where('status', '1')->where('close', '1')->get();
        $patients = Patient::where('status', '1')->where('close', '1')->get();
        $patient = Patient::where('status', '1')->where('close', '1')->get();
        $staffs = Staff::where('status', '1')->where('close', '1')->get();
        $equipmentGroups = EquipmentGroup::where('status', '1')->where('close', '1')->get();
        $equipments = Equipment::where('status', '1')->where('close', '1')->get();
        $caseEquipments = CaseEquipment::where('status', '1')->where('close', '1')->get();
        $supplyGroups = SupplyGroup::where('status', '1')->where('close', '1')->get();
        $caseSupplys = CaseSupply::where('status', '1')->where('close', '1')->get();
        $procedure = Procedures::where('status', '1')->where('close', '1')->get();
        $del_cabs = CoronaryArteryBypass::where('status', '1')->where('close', '1')->get();


        $caseStaffs = CaseStaff::with([
            'surgeonDetail',
            'secondSurgeonDetail',
            'paFirstAssistantDetail',
            'anesthesiologistDetail',
            'crnaResDetail',
            'cardiologistDetail',
            'familyMdDetail',
            'perfusionistDetail',
            'perfusionistStatusDetail',
            'secondPerfusionistDetail'
        ])->where('status', '1')
            ->where('close', '1')
            ->get();

        return view('cases.case', compact('hospital', 'patients','patient', 'staffs', 'caseStaffs', 'equipmentGroups', 'equipments', 'caseEquipments', 'supplyGroups', 'caseSupplys', 'procedure', 'del_cabs'));
    }
    public function caseProcedure()
    {
        $procedure = Procedures::where('status', '1')->where('close', '1')->get();
        return view('cases.procedure-modals', compact('procedure'));
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
        session(['pat_id' => $patient->pat_id]);
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
        if ($history) {
            return redirect()->back()->with('success', 'Patient History Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Faild to add patient history!');
        }
    }


    public function addCaseStaff(Request $request)
    {
        // return $request->all();
        try {
            $addcs = new CaseStaff();
            $addcs->surgeon = $request->surgeon;
            $addcs->second_surgeon = $request->second_surgeon;
            $addcs->pa_first_assistant = $request->pa_first_assistant;
            $addcs->anesthesiologist = $request->anesthesiologist;
            $addcs->crna_res = $request->crna_res;
            $addcs->cardiologist = $request->cardiologist;
            $addcs->family_md = $request->family_md;
            $addcs->perfusionist = $request->perfusionist;
            $addcs->perfusionist_category = $request->perfusionist_category;
            $addcs->perfusionist_status = $request->perfusionist_status;
            $addcs->second_perfusionist = $request->second_perfusionist;
            $addcs->second_perfusionist_category = $request->second_perfusionist_category;
            $addcs->cs_insertby = Auth::user()->name;
            $addcs->save();
            return redirect()->back()->with('success', 'Case staff added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function editcasestaff(Request $request)
    {
        // return $request->all();
        $id = $request->cs_id;
        $addcs = CaseStaff::find($id);
        try {
            $addcs->surgeon = $request->surgeon;
            $addcs->second_surgeon = $request->second_surgeon;
            $addcs->pa_first_assistant = $request->pa_first_assistant;
            $addcs->anesthesiologist = $request->anesthesiologist;
            $addcs->crna_res = $request->crna_res;
            $addcs->cardiologist = $request->cardiologist;
            $addcs->family_md = $request->family_md;
            $addcs->perfusionist = $request->perfusionist;
            $addcs->perfusionist_category = $request->perfusionist_category;
            $addcs->perfusionist_status = $request->perfusionist_status;
            $addcs->second_perfusionist = $request->second_perfusionist;
            $addcs->second_perfusionist_category = $request->second_perfusionist_category;
            $addcs->save();
            return redirect()->back()->with('success', 'Case staff updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deletecasestaff($id)
    {
        $result = CaseStaff::find($id);
        $result->close = '0';
        $result->status = '0';
        $result->save();
        return redirect()->back()->with('success', 'Case staff deleted Successfully!');
    }

    /* -------------------------- Case Equipment module functions ------------------------- */
    public function viewCEquipment()
    {
        $equipmentGroups = EquipmentGroup::where('status', '1')->where('close', '1')->get();
        $equipments = Equipment::where('status', '1')->where('close', '1')->get();
        $caseEquipments = CaseEquipment::where('status', '1')->where('close', '1')->get();

        return view('cases.case', compact('equipmentGroups', 'equipments', 'caseEquipments'));
    }

    public function addCEquipment(Request $request)
    {
        try {
            $addce = new CaseEquipment();
            $addce->e_group = $request->e_group;
            $addce->e_configure = $request->e_configure;
            $addce->e_type = $request->e_type;
            $addce->e_manufacturer = $request->e_manufacturer;
            $addce->e_name = $request->e_name;
            $addce->serial_number = $request->serial_number;
            $addce->last_service_date = $request->last_service_date;
            $addce->next_service_date = $request->next_service_date;
            $addce->billing_code = $request->billing_code;
            $addce->note = $request->note;
            $addce->ce_insertby = Auth::user()->name;
            $addce->save();
            return redirect()->back()->with('success', 'Case equipment added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteCaseEquipment($id)
    {
        $result = CaseEquipment::find($id);
        $result->close = '0';
        $result->status = '0';
        $result->save();
        return redirect()->back()->with('success', 'Case equipment deleted Successfully!');
    }

    public function editCEquipment(Request $request)
    {
        // return $request->all();
        $id = $request->ce_id;
        $addce = CaseEquipment::find($id);
        try {
            $addce = new CaseEquipment();
            $addce->e_group = $request->e_group;
            $addce->e_configure = $request->e_configure;
            $addce->e_type = $request->e_type;
            $addce->e_manufacturer = $request->e_manufacturer;
            $addce->e_name = $request->e_name;
            $addce->serial_number = $request->serial_number;
            $addce->last_service_date = $request->last_service_date;
            $addce->next_service_date = $request->next_service_date;
            $addce->billing_code = $request->billing_code;
            $addce->note = $request->note;
            $addce->ce_insertby = Auth::user()->name;
            $addce->save();
            return redirect()->back()->with('success', 'Case equipment updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    //

    public function addCaseSupply(Request $request)
    {

        $request->validate([
            'csu_group' => 'required',
            'pet_id' => 'nullable',
            'csu_type' => 'nullable|string|max:255',
            'csu_name' => 'nullable|string|max:255',
            'csu_lot_number' => 'nullable|string|max:255',
            'csu_ex_date' => 'nullable|string|max:255',
            'csu_billing_code' => 'nullable|string|max:255',
            'csu_number_used' => 'nullable|string|max:255',
            'csu_note' => 'nullable|string|max:255',
        ]);
        $cs_supply = new CaseSupply();
        $cs_supply->csu_group = $request->csu_group;
        $cs_supply->csu_type = $request->csu_type;
        $cs_supply->csu_manufacturer = $request->csu_manufacturer;
        $cs_supply->csu_name = $request->csu_name;
        $cs_supply->csu_lot_number = $request->csu_lot_number;
        $cs_supply->csu_ex_date = $request->csu_ex_date;
        $cs_supply->csu_billing_code = $request->csu_billing_code;
        $cs_supply->csu_number_used = $request->csu_number_used;
        $cs_supply->csu_note = $request->csu_note;
        $cs_supply->cs_insertby = Auth::user()->name;
        $cs_supply->save();
        return redirect()->back()->with('success', 'Case Supply Added Successfully!');
    }

    public function editCaseSupply(Request $request)
    {

        $id = $request->csu_id;
        $edit_csu = CaseSupply::find($id);
        try {
            $edit_csu->csu_group = $request->csu_group;
            $edit_csu->csu_type = $request->csu_type;
            $edit_csu->csu_manufacturer = $request->csu_manufacturer;
            $edit_csu->csu_name = $request->csu_name;
            $edit_csu->csu_lot_number = $request->csu_lot_number;
            $edit_csu->csu_ex_date = $request->csu_ex_date;
            $edit_csu->csu_billing_code = $request->csu_billing_code;
            $edit_csu->csu_number_used = $request->csu_number_used;
            $edit_csu->csu_note = $request->csu_note;
            $edit_csu->cs_insertby = Auth::user()->name;
            $edit_csu->save();
            return redirect()->back()->with('success', 'Case equipment updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteCaseSupply($id)
    {
        $result = CaseSupply::find($id);
        $result->close = '0';
        $result->status = '0';
        $result->save();
        return redirect()->back()->with('success', 'Case supply deleted Successfully!');
    }
    /* ---------------- Coronary Artery ByPasses module functions --------------- */
    public function addCABypasses(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'pet_id' => 'required',
            'cab_arterial' => 'required|string|max:255',
        ]);

        $cab_bypass = new CoronaryArteryBypass();
        $cab_bypass->pet_id = $request->pet_id;

        $cab_bypass->cab_arterial = $request->cab_arterial;
        $cab_bypass->cab_venous = $request->cab_venous;
        $cab_bypass->cab_htechniques = $request->cab_htechniques;
        $cab_bypass->cab_htime = $request->cab_htime;
        $cab_bypass->cab_ima_options = $request->cab_ima_options;
        $cab_bypass->cab_ima_anastomoses = $request->cab_ima_anastomoses;
        $cab_bypass->cab_ima_htechniques = $request->cab_ima_htechniques;
        $cab_bypass->cab_ima_preson = $request->cab_ima_preson;
        $cab_bypass->cab_radial_arteries = $request->cab_radial_arteries;
        $cab_bypass->cab_radial_distal = $request->cab_radial_distal;
        $cab_bypass->cab_radial_time = $request->cab_radial_time;
        $cab_bypass->cab_distal_anastomoses = $request->cab_distal_anastomoses;
        $cab_bypass->cab_proximal = $request->cab_proximal;
        $cab_bypass->cab_ins_distal = $request->cab_ins_distal;
        $cab_bypass->cab_ins_proximal = $request->cab_ins_proximal;
        $cab_bypass->cab_ins_conduit = $request->cab_ins_conduit;
        $cab_bypass->cab_ins_position = $request->cab_ins_position;
        $cab_bypass->cab_ins_end = $request->cab_ins_end;

        $cab_bypass->note = $request->note;
        $cab_bypass->cab_insertby = Auth::user()->name;
        $cab_bypass->save();
        return redirect()->back()->with('success', 'Coronary Artery Bypass Added Successfully!');
    }

    public function deleteCABypasses($id)
    {
        $del_cab = CoronaryArteryBypass::find($id);
        $del_cab->close = '0';
        $del_cab->status = '0';
        $del_cab->save();
        return redirect()->back()->with('success', 'Coronary Artery Bypass deleted Successfully!');
    }


    /* -------------------- case procedure insertion function ------------------- */

    public function addcaseProcedure(Request $request)
    {
        // return $request->all();
        $case = CaseProcedures::create([
            'casep_insertby' => Auth::user()->name, // Assign logged-in user's name
        ] + $request->all());
        return redirect()->back()->with('success','Procedure added successfully!');
    }

    public function addvalveProcedure(Request $request)
    {
        $case = ValveSurgery::create($request->all());
        return redirect()->back()->with('success','Valve Surgery added successfully!');
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Valve Surgery added successfully!',
        //     'data' => $case
        // ]);
    }

    public function addNoncardicProcedure(Request $request)
    {
        // return $request->all();
        NonCardic::create($request->all());
        return redirect()->back()->with('success','Non Cardic added successfully!');

    }
}
