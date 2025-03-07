<?php

namespace App\Http\Controllers;

use App\Models\FluidDrugs;
use App\Models\FluidDrugMixture;
use App\Models\FluidLocations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FluidController extends Controller
{
    /* --------------------- fluid location module functions -------------------- */

    public function viewFluidLocation()
    {
        $fluid = FluidLocations::where('status', '1')->where('close', '1')->get();
        return view('config.fluid-location', compact('fluid'));
    }

    public function addFluidLocation(Request $request)
    {
        // return $request->all();
        $request->validate([
            'fl_name'   => 'required|string|max:255|unique:fluid_locations,fl_name',
            'fl_active' => 'required|in:0,1',
        ]);

        $fluidLocation = FluidLocations::create([
            'fl_name'   => $request->fl_name,
            'fl_type'   => $request->fl_type,
            'fl_active' => $request->fl_active,
            'fl_insertby' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Fluid location added successfully!');
    }

    public function editFluidLocation(Request $request)
    {
        $id = $request->fl_id;
        $fluidLocation = FluidLocations::find($id);
        $request->validate([
            'fl_name'   => 'required|string|max:255',
            'fl_active' => 'required|in:0,1',
        ]);
        $fluidLocation->update([
            'fl_name'   => $request->fl_name,
            'fl_type'   => $request->fl_type,
            'fl_active' => $request->fl_active,
        ]);

        return redirect()->back()->with('success', 'Fluid location updated successfully!');
    }

    public function deleteFluidLocation($id)
    {
        $fluid = FluidLocations::find($id);
        $fluid->status = '0';
        $fluid->close = '0';
        $fluid->save();
        return redirect()->back()->with('success', 'Fluid location deleted successfully!');
    }

    /* ---------------------- fluid drugs module functions ---------------------- */

    public function viewFluidDrugs()
    {
        $location = FluidLocations::where('status','1')->where('close','1')->get();
        $drugs = FluidDrugs::where('status','1')->where('close','1')
        ->with(['lFrom', 'lTo'])
        ->get();
        return view('config.fluid-drugs',compact('location','drugs'));
    }

    public function addFluidDrugs(Request $request)
    {

        FluidDrugs::create([
            'fd_gname'       => $request->fd_gname,
            'fd_cname'       => $request->fd_cname,
            'fd_desc'        => $request->fd_desc,
            'fd_billcode'    => $request->fd_billcode,
            'fd_billamount'  => $request->fd_billamount,
            'fd_units'       => $request->fd_unit,
            'fd_confrom'     => $request->fd_confrom,
            'fd_conto'       => $request->fd_conto,
            'fd_defaultnote' => $request->fd_defaultnote,
            'fd_from'        => $request->fd_from,
            'fd_to'          => $request->fd_to,
            'fd_prime'       => $request->fd_prime,
            'fd_drug'        => $request->fd_drug,
            'fd_amountforunit' => $request->fd_amountforunit,
            'fd_cardioplegia'  => $request->fd_cardioplegia,
            'fd_blood'         => $request->fd_blood,
            'fd_hematocrit'    => $request->fd_hematocrit,
            'fd_display'       => $request->fd_display,
            'fd_amount'        => $request->fd_amount,
            'fd_active'        => $request->fd_active,
            'fd_quick'         => $request->fd_quick,
            'fd_insertby'      => Auth::user()->name,
        ]);

    return redirect()->back()->with('success', 'Fluid Drug added successfully!');
    }

    public function editFluidDrugs(Request $request)
    {
        $id = $request->fd_id;
        $drug = FluidDrugs::find($id);

        $drug->update([
            'fd_gname'       => $request->fd_gname,
            'fd_cname'       => $request->fd_cname,
            'fd_desc'        => $request->fd_desc,
            'fd_billcode'    => $request->fd_billcode,
            'fd_billamount'  => $request->fd_billamount,
            'fd_units'       => $request->fd_unit,
            'fd_confrom'     => $request->fd_confrom,
            'fd_conto'       => $request->fd_conto,
            'fd_defaultnote' => $request->fd_defaultnote,
            'fd_from'        => $request->fd_from,
            'fd_to'          => $request->fd_to,
            'fd_prime'       => $request->fd_prime,
            'fd_drug'        => $request->fd_drug,
            'fd_amountforunit' => $request->fd_amountforunit,
            'fd_cardioplegia'  => $request->fd_cardioplegia,
            'fd_blood'         => $request->fd_blood,
            'fd_hematocrit'    => $request->fd_hematocrit,
            'fd_display'       => $request->fd_display,
            'fd_amount'        => $request->fd_amount,
            'fd_active'        => $request->fd_active,
            'fd_quick'         => $request->fd_quick,
        ]);

        return redirect()->back()->with('success','Fluid Drugs updated successfully');
    }

    public function deleteFluidDrugs($id)
    {
        $drug = FluidDrugs::find($id);
        $drug->close = '0';
        $drug->status = '0';
        $drug->save();
        return redirect()->back()->with('success','Fluid Drugs deleted successfully!');
    }

    /* --------------------- fluid drug mixture module functions -------------------- */
    public function viewFDMixture()
    {
        $fluidLocations = FluidLocations::where('status', '1')->where('close', '1')->get();
        $fluidDrugMixtures = FluidDrugMixture::with(['fromLocation', 'toLocation'])->where('status', '1')
            ->where('close', '1')
            ->get();;

        return view('config.fluid-drug-mixture', compact('fluidLocations', 'fluidDrugMixtures'));
    }

    public function addFDMixture(Request $request)
    {
        // return $request->all();

        $validated = $request->validate([
            'flm_name' => 'required|string|max:255',
            'flm_cname' => 'nullable|string|max:255',
            'flm_desc' => 'nullable|string',
            'flm_billcode' => 'nullable|string|max:15',
            'flm_dname' => 'nullable|string|max:255',
            'flm_display' => 'nullable|string|max:255',
            'flm_amount' => 'nullable|string|max:15',
            'flm_quick' => 'nullable|string',
            'flm_prime' => 'nullable|string',
            'flm_cardioplegia' => 'nullable|string',
            'rowboxes' => 'nullable|array',
            'rowboxes.*' => 'string|max:255',
        ]);

        FluidDrugMixture::create([
            'flm_name' => $validated['flm_name'],
            'flm_cname' => $validated['flm_cname'] ?? null,
            'flm_desc' => $validated['flm_desc'] ?? null,
            'flm_billcode' => $validated['flm_billcode'] ?? null,
            'flm_dname' => $validated['flm_dname'] ?? null,
            'flm_ftype' => $request['flm_ftype'] ?? null,
            'flm_ttype' => $request['flm_ttype'] ?? null,
            'flm_display' => $validated['flm_display'] ?? null,
            'flm_amount' => $validated['flm_amount'] ?? null,
            'flm_quick' => $request->flm_quick,
            'flm_prime' => $request->flm_prime,
            'flm_cardioplegia' => $request->flm_cardioplegia,
            'sort_order' => json_encode($request['sort_order'] ?? []),
            'amount' => json_encode($request['amount'] ?? []),
            'rowboxes' => json_encode($validated['rowboxes'] ?? []),
            'flm_active' => $request->flm_active,
            'flm_insertby' => Auth::user()->name,
            'status' => $request->input('status', '1'),
            'close' => $request->input('close', '1'),
        ]);

        return redirect()->back()->with('success', 'Fluid drug mixture saved successfully!');
    }

    public function deleteFDmixture($id)
    {
        $fluid = FluidDrugMixture::find($id);
        $fluid->status = '0';
        $fluid->close = '0';
        $fluid->save();
        return redirect()->back()->with('success', 'Fluid drug mixture deleted successfully!');
    }

    public function editFDmixture(Request $request)
    {
        $id = $request->flm_id;
        try {
            $fluidDMix = FluidDrugMixture::find($id);
            $fluidDMix->flm_name = $request->flm_name;
            $fluidDMix->flm_cname = $request->flm_cname;
            $fluidDMix->flm_desc = $request->flm_desc;
            $fluidDMix->flm_billcode = $request->flm_billcode;
            $fluidDMix->flm_dname = $request->flm_dname;
            $fluidDMix->flm_display = $request->flm_display;
            $fluidDMix->flm_amount = $request->flm_amount;

            $fluidDMix->flm_ftype = $request->input('flm_ftype', $fluidDMix->flm_ftype);
            $fluidDMix->flm_ttype = $request->input('flm_ttype', $fluidDMix->flm_ttype);

            $fluidDMix->rowboxes = json_encode($request->rowboxes ?? []);
            $fluidDMix->sort_order = json_encode($request->sort_order ?? []);
            $fluidDMix->amount = json_encode($request->amount ?? []);

            $fluidDMix->flm_quick = $request->flm_quick;
            $fluidDMix->flm_prime = $request->flm_prime;
            $fluidDMix->flm_cardioplegia = $request->flm_cardioplegia;
            $fluidDMix->flm_active = $request->flm_active;
            $fluidDMix->save();
            return redirect()->back()->with('success', 'Fluid Drug Mixture Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // public function updateFDMixture(Request $request)
    // {
    //     $validated = $request->validate([
    //         'flm_id' => 'required|exists:fluid_drug_mixtures,flm_id',
    //         'flm_name' => 'required|string|max:255',
    //         'flm_cname' => 'nullable|string|max:255',
    //         'flm_desc' => 'nullable|string',
    //         'flm_billcode' => 'nullable|string|max:15',
    //         'flm_dname' => 'nullable|string|max:255',
    //         'flm_display' => 'nullable|string|max:255',
    //         'flm_amount' => 'nullable|string|max:15',
    //         'flm_quick' => 'nullable|string',
    //         'flm_prime' => 'nullable|string',
    //         'flm_cardioplegia' => 'nullable|string',
    //         'rowboxes' => 'nullable|array',
    //         'rowboxes.*' => 'string|max:255',
    //     ]);

    //     $id = $request->flm_id;
    //     $checklist = FluidDrugMixture::find($id);

    //     $checklist->update([
    //         'flm_name' => $validated['flm_name'],
    //         'flm_cname' => $validated['flm_cname'] ?? null,
    //         'flm_desc' => $validated['flm_desc'] ?? null,
    //         'flm_billcode' => $validated['flm_billcode'] ?? null,
    //         'flm_dname' => $validated['flm_dname'] ?? null,
    //         'flm_ftype' => $request->input('flm_ftype', $checklist->flm_ftype), // Retain previous value if not provided
    //         'flm_ttype' => $request->input('flm_ttype', $checklist->flm_ttype), // Retain previous value if not provided
    //         'flm_display' => $validated['flm_display'] ?? null,
    //         'flm_amount' => $validated['flm_amount'] ?? null,
    //         'flm_quick' => $request->has('flm_quick') ? 1 : 0,
    //         'flm_prime' => $request->has('flm_prime') ? 1 : 0,
    //         'flm_cardioplegia' => $request->has('flm_cardioplegia') ? 1 : 0,
    //         'sort_order' => json_encode($request->input('sort_order', [])),
    //         'amount' => json_encode($request->input('amount', [])),
    //         'rowboxes' => json_encode($request->input('rowboxes', [])),
    //         'flm_active' => $request->has('flm_active') ? 1 : 0,
    //     ]);

    //     return redirect()->back()->with('success', 'Checklist Group updated successfully!');
    // }
}
