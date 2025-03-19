<?php

namespace App\Http\Controllers;

use App\Models\AtrialFibrillation;
use App\Models\CardicAssistDevice;
use App\Models\CaseCheckList;
use App\Models\CaseEquipment;
use App\Models\CaseGeneralEvent;
use App\Models\CaseProcedures;
use App\Models\CaseStaff;
use App\Models\CaseSupply;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use App\Models\CoronaryArteryBypass;
use App\Models\Equipment;
use App\Models\EquipmentGroup;
use App\Models\GeneralEvent;
use App\Models\Hospital;
use App\Models\Lab;
use App\Models\NonCardic;
use App\Models\OtherAorticLocation;
use App\Models\OtherCardiacProcedure;
use App\Models\Patient;
use App\Models\PatientHistory;
use App\Models\PatientLabResult;
use App\Models\PreviousIntervention;
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

        return view('cases.case', compact('hospital', 'patients', 'patient', 'staffs', 'caseStaffs', 'equipmentGroups', 'equipments', 'caseEquipments', 'supplyGroups', 'caseSupplys', 'procedure', 'del_cabs'));
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
            $addcs->pet_id = $request->pet_id;
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
            $addcs->pet_id = $request->pet_id;
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
            $addce->pet_id = $request->pet_id;
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
            $addce->pet_id = $request->pet_id;
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
        $cs_supply->pet_id = $request->pet_id;
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
            $edit_csu->pet_id = $request->pet_id;
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

        return response()->json([
            'status' => 'success',
            'message' => 'Coronary Artery Bypass Added Successfully!'
        ]);
        // return redirect()->back()->with('success', 'Coronary Artery Bypass Added Successfully!');
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
        return redirect()->back()->with('success', 'Procedure added successfully!');
    }

    public function addvalveProcedure(Request $request)
    {
        $case = ValveSurgery::create($request->all());
        return redirect()->back()->with('success', 'Valve Surgery added successfully!');
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
        return redirect()->back()->with('success', 'Non Cardic added successfully!');
    }

    public function addOtherCarPro(Request $request)
    {
        OtherCardiacProcedure::create([
            'ocp_insertby' => Auth::user()->name,
        ] + $request->all());
        return redirect()->back()->with('success', 'Other Cardiac Procedure Added Successfully!');

        // $request->validate([
        //     'pat_id' => 'required'
        // ]);

        // $add_ocp = new OtherCardiacProcedure();
        // $add_ocp->pat_id = $request->pat_id;
        // $add_ocp->afib_el = $request->afib_el;
        // $add_ocp->asd_pfo = $request->asd_pfo;
        // $add_ocp->aap_raa = $request->aap_raa;
        // $add_ocp->arr_dev_sur = $request->arr_dev_sur;
        // $add_ocp->lead_in = $request->lead_in;
        // $add_ocp->msc_therapy = $request->msc_therapy;
        // $add_ocp->tl_rev = $request->tl_rev;
        // $add_ocp->afib_il = $request->afib_il;
        // $add_ocp->asd_sv = $request->asd_sv;
        // $add_ocp->arr_correction_ext = $request->arr_correction_ext;
        // $add_ocp->lva = $request->lva;
        // $add_ocp->pt_acute = $request->pt_acute;
        // $add_ocp->ss_res = $request->ss_res;
        // $add_ocp->ssr_type = $request->ssr_type;
        // $add_ocp->sv_res = $request->sv_res;
        // $add_ocp->tumor_select = $request->tumor_select;
        // $add_ocp->card_tx = $request->card_tx;
        // $add_ocp->cardiac_t = $request->cardiac_t;
        // $add_ocp->p_congenital = $request->p_congenital;
        // $add_ocp->p_other = $request->p_other;
        // $add_ocp->vsd_con = $request->vsd_con;
        // $add_ocp->ocp_insertby = Auth::user()->name;
        // $add_ocp->save();
        // return redirect()->back()->with('success', 'Other Cardiac Procedure Added Successfully!');
    }

    public function addAtrialFibrillation(Request $request)
    {
        $request->validate([
            'pat_id' => 'required'
        ]);

        $add_af = new AtrialFibrillation();
        $add_af->pat_id = $request->pat_id;

        $add_af->epicardial_radio = $request->epicardial_radio;
        $add_af->mlc_doc = $request->mlc_doc;
        $add_af->radio_frequency = $request->radio_frequency;
        $add_af->rf_bipolar = $request->rf_bipolar;
        $add_af->cut_sew = $request->cut_sew;
        $add_af->cryo = $request->cryo;
        $add_af->procedures = $request->procedures;

        $add_af->af_insertby = Auth::user()->name;
        $add_af->save();
        return redirect()->back()->with('success', 'Atrial Fibrillation Added Successfully!');
    }

    public function addAorticProcedure(Request $request)
    {
        OtherAorticLocation::create([
            'oal_insertby' => Auth::user()->name,
        ] + $request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Aortic Procedure Added Successfully!'
        ]);

        // $request->validate([
        //     'pat_id' => 'required'
        // ]);

        // $add_oal = new OtherAorticLocation();
        // $add_oal->pat_id = $request->pat_id;

        // $add_oal->root = $request->root;
        // $add_oal->ascending = $request->ascending;
        // $add_oal->hemi_arch = $request->hemi_arch;
        // $add_oal->total_arch = $request->total_arch;
        // $add_oal->descending_proximal = $request->descending_proximal;
        // $add_oal->descending_mid = $request->descending_mid;
        // $add_oal->thoracoabdominal = $request->thoracoabdominal;
        // $add_oal->apsg_use = $request->apsg_use;
        // $add_oal->iv_ri = $request->iv_ri;
        // $add_oal->csf_du = $request->csf_du;
        // $add_oal->el_trunk = $request->el_trunk;
        // $add_oal->ceaf_lumen = $request->ceaf_lumen;
        // $add_oal->ap_other = $request->ap_other;
        // $add_oal->ap_tevar = $request->ap_tevar;

        // $add_oal->oal_insertby = Auth::user()->name;
        // $add_oal->save();
        // return redirect()->back()->with('success', 'Atrial Fibrillation Added Successfully!');
    }

    public function addCardicAssistDev(Request $request)
    {
        CardicAssistDevice::create([
            'cad_insertby' => Auth::user()->name,
        ] + $request->all());
        return redirect()->back()->with('success', 'Cardic Assist Devices Added Successfully!');

        // $request->validate([
        //     'pat_id' => 'required'
        // ]);
        // $ca_dev = new CardicAssistDevice();
        // $ca_dev->pat_id = $request->pat_id;

        // $ca_dev->iab_pump = $request->iab_pump;
        // $ca_dev->iabp_insertion = $request->iabp_insertion;
        // $ca_dev->iabp_reason = $request->iabp_reason;
        // $ca_dev->cbad_use = $request->cbad_use;
        // $ca_dev->cbad_type = $request->cbad_type;
        // $ca_dev->cbad_inserted = $request->cbad_inserted;
        // $ca_dev->cbad_reason = $request->cbad_reason;
        // $ca_dev->ecmo_sel = $request->ecmo_sel;
        // $ca_dev->ecmo_initiated = $request->ecmo_initiated;
        // $ca_dev->ecmo_clinical = $request->ecmo_clinical;
        // $ca_dev->wpa_vad = $request->wpa_vad;
        // $ca_dev->piaf_vad = $request->piaf_vad;
        // $ca_dev->vad_date_ins = $request->vad_date_ins;
        // $ca_dev->vad_dev_model = $request->vad_dev_model;
        // $ca_dev->vad_udi = $request->vad_udi;
        // $ca_dev->vad_indication = $request->vad_indication;
        // $ca_dev->vad_type = $request->vad_type;
        // $ca_dev->peda_vad = $request->peda_vad;
        // $ca_dev->vad_timing = $request->vad_timing;
        // $ca_dev->vad_date = $request->vad_date;
        // $ca_dev->vadid_hos = $request->vadid_hos;
        // $ca_dev->vadidh_timing = $request->vadidh_timing;
        // $ca_dev->vadidh_indication = $request->vadidh_indication;
        // $ca_dev->vadidh_type = $request->vadidh_type;
        // $ca_dev->vadidh_device = $request->vadidh_device;
        // $ca_dev->vadidh_initial_date = $request->vadidh_initial_date;
        // $ca_dev->vadidh_udi = $request->vadidh_udi;
        // $ca_dev->vadidh_vad_exp = $request->vadidh_vad_exp;
        // $ca_dev->vadidh_reason = $request->vadidh_reason;
        // $ca_dev->vadidh_date = $request->vadidh_date;
        // $ca_dev->sec_di = $request->sec_di;
        // $ca_dev->sec_timing = $request->sec_timing;
        // $ca_dev->sec_indication = $request->sec_indication;
        // $ca_dev->sec_type = $request->sec_type;
        // $ca_dev->sec_device = $request->sec_device;
        // $ca_dev->sec_implant_date = $request->sec_implant_date;
        // $ca_dev->sec_udi = $request->sec_udi;
        // $ca_dev->sec_vad_expl = $request->sec_vad_expl;
        // $ca_dev->sec_reason = $request->sec_reason;
        // $ca_dev->sec_date = $request->sec_date;
        // $ca_dev->th_dev_imp = $request->th_dev_imp;
        // $ca_dev->th_timing = $request->th_timing;
        // $ca_dev->th_indication = $request->th_indication;
        // $ca_dev->th_type = $request->th_type;
        // $ca_dev->th_device = $request->th_device;
        // $ca_dev->th_implant_date = $request->th_implant_date;
        // $ca_dev->th_udi = $request->th_udi;
        // $ca_dev->th_vad_expla = $request->th_vad_expla;
        // $ca_dev->th_reason = $request->th_reason;
        // $ca_dev->th_date = $request->th_date;
        // $ca_dev->crma_dev = $request->crma_dev;
        // $ca_dev->first_complication = $request->first_complication;
        // $ca_dev->second_complication = $request->second_complication;
        // $ca_dev->third_complication = $request->third_complication;

        // $ca_dev->cad_insertby = Auth::user()->name;
        // $ca_dev->save();
        // return redirect()->back()->with('success', 'Cardic Assist Devices Added Successfully!');
    }

    // Case General Event
    public function viewCGEvent()
    {
        $patients = Patient::where('status', '1')->where('close', '1')->get();
        $cgevents = GeneralEvent::where('status', '1')->where('close', '1')->get();
        $caseGeneralEvents = CaseGeneralEvent::where('status', '1')->where('close', '1')->with('note')->get();

        return view('cases.general-events', compact('patients', 'cgevents', 'caseGeneralEvents'));
    }

    public function addCGEvent(Request $request)
    {
        $request->validate([
            'pat_id' => 'required'
        ]);
        $case_ge = new CaseGeneralEvent();
        $case_ge->pat_id = $request->pat_id;
        $case_ge->cge_date = $request->cge_date;
        $case_ge->cge_time = $request->cge_time;
        $case_ge->cge_note = $request->cge_note;
        $case_ge->cge_insertby = Auth::user()->name;
        $case_ge->save();
        return redirect()->back()->with('success', 'Case General Event Added Successfully!');
    }

    public function deleteCGEvent($id)
    {
        $del_cge = CaseGeneralEvent::find($id);
        $del_cge->close = '0';
        $del_cge->status = '0';
        $del_cge->save();
        return redirect()->back()->with('success', 'Case General Event deleted Successfully!');
    }

    public function editCGEvent(Request $request)
    {
        $id = $request->cge_id;
        $ed_cge = CaseGeneralEvent::find($id);
        try {
            $ed_cge->pat_id = $request->pat_id;
            $ed_cge->cge_date = $request->cge_date;
            $ed_cge->cge_time = $request->cge_time;
            $ed_cge->cge_note = $request->cge_note;
            $ed_cge->save();
            return redirect()->back()->with('success', 'Case General Event updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Case CheckList
    public function viewCList()
    {
        $patients = Patient::where('status', '1')->where('close', '1')->get();
        $cchecklists = Checklist::where('status', '1')->where('close', '1')->get();
        $ccheckgroup = ChecklistGroup::where('status', '1')->where('close', '1')->get();
        $viewCListrecords = CaseCheckList::where('status', '1')->where('close', '1')->get();

        return view('cases.check-list', compact('patients', 'cchecklists', 'ccheckgroup', 'viewCListrecords'));
    }

    public function deleteCCList($id)
    {
        $del_ccl = CaseCheckList::find($id);
        $del_ccl->close = '0';
        $del_ccl->status = '0';
        $del_ccl->save();
        return redirect()->back()->with('success', 'Case Check List deleted Successfully!');
    }

    public function getRowboxesWithGroups(Request $request)
    {
        // ✅ Check if Checklist ID is provided
        if (!$request->has('c_id')) {
            return response()->json([
                'success' => false,
                'message' => 'Checklist ID is required'
            ]);
        }

        // ✅ Find the selected checklist
        $checklist = Checklist::find($request->c_id);

        if (!$checklist) {
            return response()->json([
                'success' => false,
                'message' => 'Checklist not found'
            ]);
        }

        // ✅ Fetch only related ChecklistGroups where status = 1 and close = 1
        $groups = ChecklistGroup::where('status', '1')
            ->where('close', '1')
            ->where('clg_id', $request->c_id) // 🔥 Fetch groups related to selected checklist
            ->get();

        $formattedGroups = [];

        foreach ($groups as $group) {
            $formattedGroups[] = [
                'clg_id' => $group->clg_id,
                'clg_name' => $group->clg_name,
                'rowboxes' => json_decode($group->rowboxes, true) ?? []
            ];
        }

        return response()->json([
            'success' => true,
            'rowboxes' => json_decode($checklist->rowboxes, true) ?? [], // ✅ Correct rowboxes
            'groups' => $formattedGroups // ✅ Filtered groups
        ]);
    }

    public function addCClist(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'pat_id' => 'required',
        ]);

        CaseCheckList::create([
            'pat_id' => $validated['pat_id'],
            'cl_id' => $request['cl_id'],
            'cg_id' => $request['cg_id'],
            'cl_items' => json_encode($request['cl_items'] ?? []),

            'cl_insertby' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Check list item saved successfully!');
    }

    // Patient Lab Results
    public function viewPLResults()
    {
        $patients = Patient::where('status', '1')->where('close', '1')->get();
        $viewLabs = Lab::where('status', '1')->where('close', '1')->get();
        $viewPLRs = PatientLabResult::where('status', '1')->where('close', '1')->get();

        return view('cases.patient-lab-result', compact('patients', 'viewLabs', 'viewPLRs'));
    }

    public function addPLResults(Request $request)
    {
        PatientLabResult::create([
            'plr_insertby' => Auth::user()->name,
        ] + $request->all());
        return redirect()->back()->with('success', 'Other Aortic Procedure Added Successfully!');
    }

    public function deletePLResult($id)
    {
        $del_plr = PatientLabResult::find($id);
        $del_plr->close = '0';
        $del_plr->status = '0';
        $del_plr->save();
        return redirect()->back()->with('success', 'Case General Event deleted Successfully!');
    }

    public function editPLResults(Request $request)
    {
        // return $request->all();
        $id = $request->plr_id;
        $e_plr = PatientLabResult::find($id);
        try {
            $e_plr->pat_id = $request->pat_id;
            $e_plr->lab_id = $request->lab_id;
            $e_plr->c_arterial = $request->c_arterial;
            $e_plr->c_temp = $request->c_temp;
            $e_plr->draw_date = $request->draw_date;
            $e_plr->draw_time = $request->draw_time;
            $e_plr->result_date = $request->result_date;
            $e_plr->result_time = $request->result_time;
            $e_plr->billing_code = $request->billing_code;
            $e_plr->note = $request->note;

            // ✅ Updating Section 1 fields
            $e_plr->act_act = $request->act_act;
            $e_plr->act_hep_test_conc = $request->act_hep_test_conc;
            $e_plr->act_hep_bolus_indic = $request->act_hep_bolus_indic;
            $e_plr->act_hep_maint_indic = $request->act_hep_maint_indic;
            $e_plr->act_prot_indic = $request->act_prot_indic;

            // ✅ Updating Section 2 fields
            $e_plr->bg_ph = $request->bg_ph;
            $e_plr->bg_p02 = $request->bg_p02;
            $e_plr->bg_pco2 = $request->bg_pco2;
            $e_plr->bg_ca = $request->bg_ca;
            $e_plr->bg_k = $request->bg_k;
            $e_plr->bg_thb = $request->bg_thb;
            $e_plr->bg_so2 = $request->bg_so2;
            $e_plr->bg_lactate = $request->bg_lactate;
            $e_plr->bg_hct = $request->bg_hct;

            // ✅ Updating Section 3 field
            $e_plr->bs_gluc = $request->bs_gluc;

            // ✅ Updating Section 4 fields
            $e_plr->cbc_wbc = $request->cbc_wbc;
            $e_plr->cbc_hgb = $request->cbc_hgb;
            $e_plr->cbc_hct = $request->cbc_hct;
            $e_plr->cbc_mcv = $request->cbc_mcv;
            $e_plr->cbc_mch = $request->cbc_mch;
            $e_plr->cbc_mchc = $request->cbc_mchc;
            $e_plr->cbc_rdw = $request->cbc_rdw;
            $e_plr->cbc_plt = $request->cbc_plt;
            $e_plr->cbc_mpv = $request->cbc_mpv;
            $e_plr->cbc_rbc = $request->cbc_rbc;

            // ✅ Updating Section 5 fields
            $e_plr->cdi_ph = $request->cdi_ph;
            $e_plr->cdi_paco2 = $request->cdi_paco2;
            $e_plr->cdi_pao2 = $request->cdi_pao2;
            $e_plr->cdi_t = $request->cdi_t;
            $e_plr->cdi_hco3 = $request->cdi_hco3;
            $e_plr->cdi_be = $request->cdi_be;
            $e_plr->cdi_sao2 = $request->cdi_sao2;
            $e_plr->cdi_k = $request->cdi_k;
            $e_plr->cdi_so2 = $request->cdi_so2;
            $e_plr->cdi_hct = $request->cdi_hct;
            $e_plr->cdi_hgb = $request->cdi_hgb;

            // ✅ Updating Section 6 fields
            $e_plr->cp_alt = $request->cp_alt;
            $e_plr->cp_albumin = $request->cp_albumin;
            $e_plr->cp_ag_ratio = $request->cp_ag_ratio;
            $e_plr->cp_alp = $request->cp_alp;
            $e_plr->cp_ast = $request->cp_ast;
            $e_plr->cp_tbi = $request->cp_tbi;
            $e_plr->cp_bun = $request->cp_bun;
            $e_plr->cp_bun_crea = $request->cp_bun_crea;
            $e_plr->cp_ca = $request->cp_ca;
            $e_plr->cp_cl = $request->cp_cl;
            $e_plr->cp_creatinine = $request->cp_creatinine;
            $e_plr->cp_gluc = $request->cp_gluc;
            $e_plr->cp_phosphorus = $request->cp_phosphorus;
            $e_plr->cp_k = $request->cp_k;
            $e_plr->cp_na = $request->cp_na;

            // ✅ Updating Section 7 fields
            $e_plr->cbcr_Hct = $request->cbcr_Hct;
            $e_plr->cbcr_Hgb = $request->cbcr_Hgb;
            $e_plr->cbcr_MCV = $request->cbcr_MCV;
            $e_plr->cbcr_MCHC = $request->cbcr_MCHC;
            $e_plr->cbcr_RDW = $request->cbcr_RDW;
            $e_plr->cbcr_PLT = $request->cbcr_PLT;
            $e_plr->cbcr_MPV = $request->cbcr_MPV;
            $e_plr->cbcr_WBC_leukocyte = $request->cbcr_WBC_leukocyte;
            $e_plr->cbcr_WBC_differential_Monocytes = $request->cbcr_WBC_differential_Monocytes;
            $e_plr->cbcr_WBC_differential_Eosinophils = $request->cbcr_WBC_differential_Eosinophils;
            $e_plr->cbcr_WBC_differential_Basophils = $request->cbcr_WBC_differential_Basophils;
            $e_plr->cbcr_WBC_differential_Neutrophils = $request->cbcr_WBC_differential_Neutrophils;
            $e_plr->cbcr_WBC_differential_Lymphocytes = $request->cbcr_WBC_differential_Lymphocytes;
            $e_plr->cbcr_RBC_erythrocyte_count = $request->cbcr_RBC_erythrocyte_count;

            // ✅ Updating Section 8 fields
            $e_plr->cmp_gluc = $request->cmp_gluc;
            $e_plr->cmp_bun = $request->cmp_bun;
            $e_plr->cmp_creatinine = $request->cmp_creatinine;
            $e_plr->cmp_ca = $request->cmp_ca;
            $e_plr->cmp_tbi = $request->cmp_tbi;
            $e_plr->cmp_alp = $request->cmp_alp;
            $e_plr->cmp_tp = $request->cmp_tp;
            $e_plr->cmp_alt = $request->cmp_alt;
            $e_plr->cmp_ast = $request->cmp_ast;
            $e_plr->cmp_a_g_ratio = $request->cmp_a_g_ratio;
            $e_plr->cmp_bun_crea = $request->cmp_bun_crea;
            $e_plr->cmp_glob = $request->cmp_glob;
            $e_plr->cmp_na = $request->cmp_na;
            $e_plr->cmp_k = $request->cmp_k;
            $e_plr->cmp_cl = $request->cmp_cl;
            $e_plr->cmp_eco2 = $request->cmp_eco2;
            $e_plr->cmp_a_gap = $request->cmp_a_gap;
            $e_plr->cmp_egfr = $request->cmp_egfr;

            // ✅ Updating Section 9 fields
            $e_plr->lp_cholesterol = $request->lp_cholesterol;
            $e_plr->lp_hdl = $request->lp_hdl;
            $e_plr->lp_ldl = $request->lp_ldl;
            $e_plr->lp_trigyl_tot = $request->lp_trigyl_tot;
            $e_plr->lp_ast = $request->lp_ast;
            $e_plr->lp_alt = $request->lp_alt;

            // ✅ Updating Section 10 fields
            $e_plr->lpr_cholesterol = $request->lpr_cholesterol;
            $e_plr->lpr_trigyl_tot = $request->lpr_trigyl_tot;
            $e_plr->lpr_hdl = $request->lpr_hdl;
            $e_plr->lpr_ldl = $request->lpr_ldl;
            $e_plr->lpr_total_cholesterol_hdl_ratio = $request->lpr_total_cholesterol_hdl_ratio;

            // ✅ Updating Section 11 fields
            $e_plr->nbg_ph = $request->nbg_ph;
            $e_plr->nbg_pao2 = $request->nbg_pao2;
            $e_plr->nbg_hco3 = $request->nbg_hco3;
            $e_plr->nbg_paco2 = $request->nbg_paco2;
            $e_plr->nbg_be = $request->nbg_be;
            $e_plr->nbg_sao2 = $request->nbg_sao2;

            // ✅ Updating Section 12 fields
            $e_plr->ract_ph = $request->ract_ph;
            $e_plr->ract_pco2 = $request->ract_pco2;
            $e_plr->ract_po2 = $request->ract_po2;
            $e_plr->ract_hco3 = $request->ract_hco3;
            $e_plr->ract_be_b = $request->ract_be_b;
            $e_plr->ract_hct = $request->ract_hct;
            $e_plr->ract_thb = $request->ract_thb;
            $e_plr->ract_so2 = $request->ract_so2;
            $e_plr->ract_na = $request->ract_na;
            $e_plr->ract_k = $request->ract_k;
            $e_plr->ract_ca = $request->ract_ca;
            $e_plr->ract_glu = $request->ract_glu;

            // ✅ Updating Section 13 fields
            $e_plr->ract_glu = $request->ract_glu;
            $e_plr->ract_pH = $request->ract_pH;
            $e_plr->ract_pCO2 = $request->ract_pCO2;
            $e_plr->ract_pO2 = $request->ract_pO2;
            $e_plr->ract_HCO3 = $request->ract_HCO3;

            // ✅ Updating Section 14 fields
            $e_plr->thy_TSH = $request->thy_TSH;
            $e_plr->thy_TotalT4 = $request->thy_TotalT4;
            $e_plr->thy_FreeT4 = $request->thy_FreeT4;
            $e_plr->thy_TotalT3 = $request->thy_TotalT3;
            $e_plr->thy_FreeT3 = $request->thy_FreeT3;

            // ✅ Updating Section 15 fields
            $e_plr->vitamin_d = $request->vitamin_d;

            $e_plr->save();
            return redirect()->back()->with('success', 'Patient Lab Result updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // 
    public function viewPreInv()
    {
        $patients = Patient::where('status', '1')->where('close', '1')->get();
        $cprocedures = CaseProcedures::where('status', '1')->where('close', '1')->get();

        return view('cases.previous-intervention', compact('patients', 'cprocedures'));
    }

    public function addPreInv(Request $request)
    {
        PreviousIntervention::create([
            'pi_insertby' => Auth::user()->name,
        ] + $request->all());
        return redirect()->back()->with('success', 'Previous Intervention Added Successfully!');
    }
}
