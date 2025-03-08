<?php

namespace App\Http\Controllers;

use App\Models\CaseEquipment;
use App\Models\CaseStaff;
use App\Models\Equipment;
use App\Models\EquipmentGroup;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseController extends Controller
{

    /* -------------------------- Case Staff module functions ------------------------- */

    public function viewCstaff()
    {
        $staffs = Staff::where('status', '1')->where('close', '1')->get();

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
        ])->get();

        return view('cases.case-staff', compact('staffs', 'caseStaffs'));
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

        return view('cases.case-equipment', compact('equipmentGroups', 'equipments', 'caseEquipments'));
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
}
