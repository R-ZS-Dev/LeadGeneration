<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentGroup;
use App\Models\Hospital;
use App\Models\Procedures;
use App\Models\Staff;
use App\Models\Supply;
use App\Models\SupplyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Sudo;

class ConfigController extends Controller
{

    public function viewHospital()
    {
        $hospital = Hospital::where('status', '1')->where('close', '1')->get();
        return view('config.hospital', compact('hospital'));
    }

    public function addHospital(Request $request)
    {

        // return $request->all();
        $validated = $request->validate([
         'hos_name' => 'required|string|max:255|unique:hospitals,hos_name',
            'zip_code' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'national_pro_id' => 'required|string|max:255',
            'active' => 'nullable|string',
        ]);


        Hospital::create([
            'hos_name' => $validated['hos_name'],
            'zip_code' => $validated['zip_code'],
            'region' => $validated['region'],
            'national_pro_id' => $validated['national_pro_id'],
            'active' => $request->active,
            'hos_insertby' =>  Auth::user()->name,

        ]);

        return redirect()->back()->with('success', 'Hospital saved successfully!');
    }

    public function editHospital(Request $request)
    {
        $validated = $request->validate([
            'hos_name' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'national_pro_id' => 'required|string|max:255',
            'active' => 'nullable|string',
        ]);

        $id = $request->hos_id;
        $hospital = Hospital::findOrFail($id);
        $hospital->update([
            'hos_name' => $validated['hos_name'],
            'zip_code' => $validated['zip_code'],
            'region' => $validated['region'],
            'national_pro_id' => $validated['national_pro_id'],
            'active' => $request->has('active') ? 1 : 0,
        ]);
        return redirect()->back()->with('success', 'Hospital updated successfully!');
    }


    public function deleteHospital($id)
    {
        $hos = Hospital::find($id);
        $hos->close = '0';
        $hos->status = '0';
        $hos->save();
        return redirect()->back()->with('success', 'Hospital deleted successfully!');
    }

    /* ------------------------ equipment group functions ----------------------- */

    public function viewEquipmentGroup()
    {
        $equipments = EquipmentGroup::where('status', '1')->where('close', '1')->get();
        return view('config.equipment-group', compact('equipments'));
    }

    public function addEquipmentGroup(Request $request)
    {
        $validated = $request->validate([
            'eqg_name' => 'required|string|max:255|unique:equipment_groups,eqg_name',
            'eqg_active' => 'required|in:0,1',
        ]);

        $user = Auth::user();
        try {
            EquipmentGroup::create([
                'eqg_name' => $validated['eqg_name'],
                'eqg_active' => $validated['eqg_active'],
                'eqg_insertby' => Auth::user()->name,
            ]);

            return redirect()->back()->with('success', 'Equipment Group added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add Equipment Group.');
        }
    }

    public function editEquipmentGroup(Request $request)
    {
        $validated = $request->validate([
            'eqg_name' => 'required|string|max:255',
            'eqg_active' => 'required|in:0,1',
        ]);
        $id = $request->eqg_id;
        $eqg = EquipmentGroup::findOrFail($id);
        try {
            $eqg->update([
                'eqg_name' => $validated['eqg_name'],
                'eqg_active' => $validated['eqg_active'],
            ]);
            return redirect()->back()->with('success', 'Equipment Group updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Equipment Group.');
        }
    }

    public function deleteEquipmentGroup($id)
    {
        $eqg = EquipmentGroup::findOrFail($id);
        try {
            $eqg->update([
                'close' => '0',
                'status' => '0',
            ]);
            return redirect()->back()->with('success', 'Equipment Group Deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to Delete Equipment Group.');
        }
    }

    /* ----------------------- equipment module functions ----------------------- */

    public function viewEquipment()
    {
        $eqg = EquipmentGroup::where('status', '1')->where('close', '1')->get();
        $eq = Equipment::where('status','1')->where('close','1')
        ->with('equipmentGroup')
        ->get();
        return view('config.equipment', compact('eqg','eq'));
    }

    public function addEquipment(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        $validatedData = $request->validate([
            'eq_type' => 'required|string',
            'eq_manufacturer' => 'required|string|max:100',
            'eq_name' => 'required|string|max:100',
            'eq_serial' => 'required|string|max:50',
            'eq_lastservice' => 'required|date',
            'eq_nextservice' => 'required|date',
            'eq_billingcode' => 'nullable|string|max:50',
            'eq_notes' => 'nullable|string',
            'eq_active' => 'required|in:0,1',
        ]);

        try {
            $equipment = Equipment::create([
                'eq_type' => $validatedData['eq_type'],
                'eq_manufacturer' => $validatedData['eq_manufacturer'],
                'eq_name' => $validatedData['eq_name'],
                'eq_serial' => $validatedData['eq_serial'],
                'eq_lastservice' => $validatedData['eq_lastservice'],
                'eq_nextservice' => $validatedData['eq_nextservice'],
                'eq_billingcode' => $validatedData['eq_billingcode'] ?? null,
                'eq_notes' => $validatedData['eq_notes'] ?? null,
                'eq_active' => $validatedData['eq_active'],
                'eq_insertby' => Auth::user()->name,
            ]);

            Log::info('Inserted Equipment ID: ' . $equipment->id);

            return redirect()->back()->with('success', 'Equipment added successfully.');
        } catch (\Exception $e) {
            Log::error('Equipment creation failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to add Equipment. Please try again.');
        }
    }

    public function editEquipment(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'eq_type' => 'required|string',
            'eq_manufacturer' => 'required|string|max:100',
            'eq_name' => 'required|string|max:100',
            'eq_serial' => 'required|string|max:50',
            'eq_lastservice' => 'required|date',
            'eq_nextservice' => 'required|date',
            'eq_billingcode' => 'nullable|string|max:50',
            'eq_notes' => 'nullable|string',
            'eq_active' => 'required|in:0,1',
        ]);
        $id = $request->eq_id;
        $eq = Equipment::findOrFail($id);
        try {
            $eq->update([
                'eq_type' => $validatedData['eq_type'],
                'eq_manufacturer' => $validatedData['eq_manufacturer'],
                'eq_name' => $validatedData['eq_name'],
                'eq_serial' => $validatedData['eq_serial'],
                'eq_lastservice' => $validatedData['eq_lastservice'],
                'eq_nextservice' => $validatedData['eq_nextservice'],
                'eq_billingcode' => $validatedData['eq_billingcode'] ?? null,
                'eq_notes' => $validatedData['eq_notes'] ?? null,
                'eq_active' => $validatedData['eq_active'],
            ]);
            return redirect()->back()->with('success', 'Equipment updated successfully.');
        } catch (\Exception $e) {
            Log::error('Equipment creation failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to update Equipment. Please try again.');
        }
    }

    public function deleteEquipment($id)
    {
        $hos = Equipment::find($id);
        $hos->close = '0';
        $hos->status = '0';
        $hos->save();
        return redirect()->back()->with('success', 'Equipment deleted successfully!');
    }

    /* ---------------------- supply group module functions --------------------- */

    public function viewSupplyGroup()
    {
        $spg = SupplyGroup::where('status', '1')->where('close', '1')->get();
        return view('config.supply-group', compact('spg'));
    }

    public function addSupplyGroup(Request $request)
    {
        $validated = $request->validate([
            'spg_name' => 'required|string|max:255|unique:supply_groups,spg_name',
            'spg_active' => 'required|in:0,1',
        ]);
        try {
            SupplyGroup::create([
                'spg_name' => $validated['spg_name'],
                'spg_active' => $validated['spg_active'],
                'spg_insertby' => Auth::user()->name,
            ]);

            return redirect()->back()->with('success', 'Supply Group added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add Supply Group.');
        }
    }

    public function editSupplyGroup(Request $request)
    {
        $validated = $request->validate([
            'spg_name' => 'required|string|max:255',
            'spg_active' => 'required|in:0,1',
        ]);
        $id = $request->spg_id;
        $spg = SupplyGroup::findOrFail($id);
        try {
            $spg->update([
                'spg_name' => $validated['spg_name'],
                'spg_active' => $validated['spg_active'],
            ]);
            return redirect()->back()->with('success', 'Supply Group updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Supply Group.');
        }
    }

    public function deleteSupplyGroup($id)
    {
        $eqg = SupplyGroup::findOrFail($id);
        try {
            $eqg->update([
                'close' => '0',
                'status' => '0',
            ]);
            return redirect()->back()->with('success', 'Supply Group Deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to Supply Equipment Group.');
        }
    }

    /* ------------------------ supplies module functions ----------------------- */

    public function viewSupplies()
    {
        $spg = SupplyGroup::where('status', '1')->where('close', '1')->get();
        $sp = Supply::where('status','1')->where('close','1')
        ->with('supplyGroup')
        ->get();
        return view('config.supply', compact('spg','sp'));
    }

    public function addSupplies(Request $request)

    {
        // return $request->all();
        $validatedData = $request->validate([
            'sp_type' => 'required|string',
            'sp_manufacturer' => 'required|string|max:100',
            'sp_name' => 'required|string|max:100',
            'sp_lotno' => 'required|string|max:50',
            'sp_expdate' => 'required|date',
            'sp_billingcode' => 'nullable|string|max:50',
            'sp_notes' => 'nullable|string',
            'eq_active' => 'required|in:0,1',
        ]);
        $spgIdsString = implode(',', $request->spg_ids ?? []);
        try {
            $supply = Supply::create([
                'sp_type' => $validatedData['sp_type'],
                'sp_manufacturer' => $validatedData['sp_manufacturer'],
                'sp_name' => $validatedData['sp_name'],
                'sp_lotno' => $validatedData['sp_lotno'],
                'sp_expdate' => $validatedData['sp_expdate'],
                'sp_billingcode' => $validatedData['sp_billingcode'] ?? null,
                'sp_notes' => $validatedData['sp_notes'] ?? null,
                'sp_groups' => $spgIdsString,
                'sp_active' => $validatedData['eq_active'],
                'sp_insertby' => Auth::user()->name,
            ]);

            return redirect()->back()->with('success', 'Supply Added successfully!');


        } catch (\Exception $e) {
            Log::error('Supply creation failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Faild to add Supply!');

        }
    }

    public function editSupplies(Request $request)
    {
        $validatedData = $request->validate([
            'sp_type' => 'required|string',
            'sp_manufacturer' => 'required|string|max:100',
            'sp_name' => 'required|string|max:100',
            'sp_lotno' => 'required|string|max:50',
            'sp_expdate' => 'required|date',
            'sp_billingcode' => 'nullable|string|max:50',
            'sp_notes' => 'nullable|string',
            'eq_active' => 'required|in:0,1',
        ]);
       $id = $request->sp_id;
        $sp = Supply::findOrFail($id);
        $spgIdsString = implode(',', $request->spg_ids ?? []);

        try {
            $sp->update([
                'sp_type' => $validatedData['sp_type'],
                'sp_manufacturer' => $validatedData['sp_manufacturer'],
                'sp_name' => $validatedData['sp_name'],
                'sp_lotno' => $validatedData['sp_lotno'],
                'sp_expdate' => $validatedData['sp_expdate'],
                'sp_billingcode' => $validatedData['sp_billingcode'] ?? null,
                'sp_notes' => $validatedData['sp_notes'] ?? null,
                'sp_groups' => $spgIdsString,
                'sp_active' => $validatedData['eq_active'],
            ]);
            return redirect()->back()->with('success', 'Supply updated successfully!');


        } catch (\Exception $e) {
            Log::error('Supply creation failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Faild to update Supply!');

        }
    }
    public function deleteSupplies($id)
    {
        $hos = Supply::find($id);
        $hos->close = '0';
        $hos->status = '0';
        $hos->save();
        return redirect()->back()->with('success', 'Supply deleted successfully!');
    }

    /* ------------------------- staff module functions ------------------------- */

    public function viewStaff()
    {
        $staff = Staff::where('status','1')->where('close','1')
        ->get();
        return view('config.staff', compact('staff'));
    }

    public function addStaff(Request $request)
    {
        // Validate incoming request data
        // return $request->all();
        $user = Auth::user();
        $request->validate([
            'st_name' => 'required|string|max:100',
            'st_first_name' => 'required|string|max:100',
            'st_middle_name' => 'nullable|string|max:100',
            'st_last_name' => 'required|string|max:100',
            'st_phone' => 'required|string|max:20',
        ]);

        $staff = new Staff();
        $staff->st_name = $request->st_name;
        $staff->st_first_name = $request->st_first_name;
        $staff->st_middle_name = $request->st_middle_name;
        $staff->st_last_name = $request->st_last_name;
        $staff->st_phone = $request->st_phone;
        $staff->st_insertby = Auth::user()->name;

        $staff->anesthesiologist = $request->anesthesiologist;
        $staff->cardiologist = $request->cardiologist;
        $staff->crna = $request->crna;
        $staff->family_md = $request->family_md;
        $staff->perfusionist = $request->perfusionist;
        $staff->physician_assistant = $request->physician_assistant;
        $staff->surgeon = $request->surgeon;
        $staff->st_active = $request->st_active;
        $staff->save();
        return redirect()->back()->with('success', 'Staff member added successfully!');
    }

    public function editStaff(Request $request)
    {
        $request->validate([
            'st_name' => 'required|string|max:100',
            'st_first_name' => 'required|string|max:100',
            'st_middle_name' => 'nullable|string|max:100',
            'st_last_name' => 'required|string|max:100',
            'st_phone' => 'required|string|max:20',
        ]);
        $id = $request->st_id;
        $staff = Staff::findOrFail($id);
        $staff->st_name = $request->st_name;
        $staff->st_first_name = $request->st_first_name;
        $staff->st_middle_name = $request->st_middle_name;
        $staff->st_last_name = $request->st_last_name;
        $staff->st_phone = $request->st_phone;

        $staff->anesthesiologist = $request->anesthesiologist;
        $staff->cardiologist = $request->cardiologist;
        $staff->crna = $request->crna;
        $staff->family_md = $request->family_md;
        $staff->perfusionist = $request->perfusionist;
        $staff->physician_assistant = $request->physician_assistant;
        $staff->surgeon = $request->surgeon;
        $staff->st_active = $request->st_active;
        $staff->save();
        return redirect()->back()->with('success', 'Staff member updated successfully!');
    }
    public function deleteStaff($id)
    {
        $hos = Staff::find($id);
        $hos->close = '0';
        $hos->status = '0';
        $hos->save();
        return redirect()->back()->with('success', 'Staff deleted successfully!');
    }


    /* ----------------------- procedure modules function ----------------------- */

    public function viewProcedure()
    {
        $pro = Procedures::where('status','1')->where('close','1')->get();
        return view('config.procedure',compact('pro'));
    }

    public function addProcedure(Request $request)
    {
        // return $request->all();
        $user = Auth::user();
        $request->validate([
            'pro_name' => 'required|string|max:100|unique:procedures,pro_name',
        ]);
        $procedure = new Procedures();
        $procedure->pro_name = $request->pro_name;
        $procedure->pro_cptcode = $request->pro_cptcode;
        $procedure->pro_display = $request->pro_display;
        $procedure->pro_desc = $request->pro_desc;
        $procedure->pro_active = $request->pro_active;
        $procedure->pro_insertby = Auth::user()->name;
        $procedure->save();
        return redirect()->back()->with('success','Procedure added successfully.');
    }

    public function editProcedure(Request $request)
    {
        $request->validate([
            'pro_name' => 'required|string|max:100',
        ]);
        $id = $request->pro_id;
        $procedure = Procedures::find($id);
        $procedure->pro_name = $request->pro_name;
        $procedure->pro_cptcode = $request->pro_cptcode;
        $procedure->pro_display = $request->pro_display;
        $procedure->pro_desc = $request->pro_desc;
        $procedure->pro_active = $request->pro_active;
        $procedure->save();
        return redirect()->back()->with('success','Procedure updated successfully.');
    }

    public function deleteProcedure($id)
    {
        $pro = Procedures::find($id);
        $pro->close = '0';
        $pro->status = '0';
        $pro->save();
        return redirect()->back()->with('success', 'Procedure deleted successfully!');
    }


}
