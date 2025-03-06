<?php

namespace App\Http\Controllers;

use App\Models\FluidDrugs;
use App\Models\FluidLocations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FluidController extends Controller
{
    /* --------------------- fluid location module functions -------------------- */

    public function viewFluidLocation()
    {
        $fluid = FluidLocations::where('status','1')->where('close','1')->get();
        return view('config.fluid-location',compact('fluid'));
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

        return redirect()->back()->with('success','Fluid location added successfully!');
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

        return redirect()->back()->with('success','Fluid location updated successfully!');
    }

    public function deleteFluidLocation($id)
    {
        $fluid = FluidLocations::find($id);
        $fluid->status = '0';
        $fluid->close = '0';
        $fluid->save();
        return redirect()->back()->with('success','Fluid location deleted successfully!');

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
}
