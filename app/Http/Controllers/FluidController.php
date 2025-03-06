<?php

namespace App\Http\Controllers;

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
            'fl_name'   => 'required|string|max:255',
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
}
