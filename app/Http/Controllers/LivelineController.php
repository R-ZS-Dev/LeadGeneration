<?php

namespace App\Http\Controllers;

use App\Models\LiveLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivelineController extends Controller
{
    public function viewLiveLine()
    {
        $live = LiveLine::where('status','1')->where('close','1')->get();
        return view('config.live-line',compact('live'));
    }

    public function addLiveLine(Request $request)
    {
        // return $request->all();
        $liveLine = LiveLine::create([
            'll_gname' => $request->ll_gname,
            'll_label' => $request->ll_label,
            'll_displayorder' => $request->ll_displayorder,
            'll_removetime' => $request->ll_removetime,
            'll_showremind' => $request->ll_showremind,
            'll_manuallog' => $request->ll_manuallog,
            'll_pumpoff' => $request->ll_pumpoff,
            'll_linechart' => $request->ll_linechart,
            'll_skip' => $request->ll_skip,
            'll_highlimit' => $request->ll_highlimit,
            'll_highcritical' => $request->ll_highcritical,
            'll_highwarn' => $request->ll_highwarn,
            'll_goodfrom' => $request->ll_goodfrom,
            'll_goodto' => $request->ll_goodto,
            'll_lowlimit' => $request->ll_lowlimit,
            'll_lowcritical' => $request->ll_lowcritical,
            'll_lowwarn' => $request->ll_lowwarn,
            'll_active' => $request->ll_active,
            'll_insertby' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success','Live Line Added Successfully!');
    }

    public function editLiveLine(Request $request)
    {
        $id = $request->ll_id;
        $live = LiveLine::find($id);
        $live->update([
            'll_gname' => $request->ll_gname,
            'll_label' => $request->ll_label,
            'll_displayorder' => $request->ll_displayorder,
            'll_removetime' => $request->ll_removetime,
            'll_showremind' => $request->ll_showremind,
            'll_manuallog' => $request->ll_manuallog,
            'll_pumpoff' => $request->ll_pumpoff,
            'll_linechart' => $request->ll_linechart,
            'll_skip' => $request->ll_skip,
            'll_highlimit' => $request->ll_highlimit,
            'll_highcritical' => $request->ll_highcritical,
            'll_highwarn' => $request->ll_highwarn,
            'll_goodfrom' => $request->ll_goodfrom,
            'll_goodto' => $request->ll_goodto,
            'll_lowlimit' => $request->ll_lowlimit,
            'll_lowcritical' => $request->ll_lowcritical,
            'll_lowwarn' => $request->ll_lowwarn,
            'll_active' => $request->ll_active,
        ]);
        return redirect()->back()->with('success','Live Line updated successfully!');
    }

    public function deleteLiveLine($id)
    {
        $live = LiveLine::find($id);
        $live->close = '0';
        $live->status = '0';
        $live->save();
        return redirect()->back()->with('success','Live Line Deleted Successfully!');
    }
}
