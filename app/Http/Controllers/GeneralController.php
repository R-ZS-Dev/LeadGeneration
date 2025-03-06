<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistGroup;
use App\Models\CheckListItem;
use App\Models\GeneralEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function viewgeneralevents()
    {
        $showevents = GeneralEvent::where('status', '1')->where('close', '1')->get();
        return view('config.general-event', compact('showevents'));
    }

    // public function deleteGevent($id)
    // {
    //     $gevent = GeneralEvent::find($id);
    //     $gevent->close = '0';
    //     $gevent->status = '0';
    //     $gevent->save();
    //     return redirect()->back()->with('success', 'General Event deleted successfully!');
    // }

    public function deleteGevent($id)
    {
        $gevent = GeneralEvent::find($id);
        if ($gevent) {
            $gevent->close = '0';
            $gevent->status = '0';
            $gevent->save();
            return response()->json(['success' => true, 'message' => 'General Event deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'General Event not found.']);
        }
    }

    public function addGevent(Request $request)
    {
        $validated = $request->validate([
            'note' => 'required|string|max:100',
            'g_description' => 'required|string',
            'g_display' => 'required|string',
            'g_active' => 'nullable|string',
            'g_quick' => 'nullable|string',
        ]);
        $user = Auth::user();

        GeneralEvent::create([
            'note' => $validated['note'],
            'g_description' => $validated['g_description'],
            'g_display' => $validated['g_display'],
            'g_active' => $request->g_active,
            'g_quick' => $request->g_quick,
            'g_insertby' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'General event saved successfully!');
    }

    public function editGeneralEvent(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'note' => 'required|string|max:100',
            'g_description' => 'required|string',
            'g_display' => 'required|string',
        ]);

        $id = $request->g_id;
        $editgevent = GeneralEvent::findOrFail($id);
        $editgevent->update([
            'note' => $validated['note'],
            'g_description' => $validated['g_description'],
            'g_display' => $validated['g_display'],
            'g_active' => $request->g_active,
            'g_quick' => $request->g_quick,
        ]);
        return redirect()->back()->with('success', 'General event updated successfully!');
    }

    /* ------------------------ CheckList Item functions ----------------------- */

    public function viewClitem()
    {
        $viewClitems = CheckListItem::where('status', '1')->where('close', '1')->get();
        return view('config.checklist-items', compact('viewClitems'));
    }

    public function deleteClitem($id)
    {
        $clitem = CheckListItem::find($id);
        $clitem->close = '0';
        $clitem->status = '0';
        $clitem->save();
        return redirect()->back()->with('success', 'Check list item deleted successfully!');
    }

    public function addClitem(Request $request)
    {
        $validated = $request->validate([
            'cl_name' => 'required|string|max:100',
            'cl_description' => 'required|string',
            'cl_active' => 'nullable|string',
        ]);
        $user = Auth::user();

        CheckListItem::create([
            'cl_name' => $validated['cl_name'],
            'cl_description' => $validated['cl_description'],
            'cl_active' => $request->cl_active,
            'cl_insertby' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Check list item saved successfully!');
    }

    public function editClitem(Request $request)
    {
        $validated = $request->validate([
            'cl_name' => 'required|string|max:100',
            'cl_description' => 'required|string',
            'cl_active' => 'nullable|string',
        ]);

        $id = $request->cl_id;
        $editgevent = CheckListItem::findOrFail($id);
        $editgevent->update([
            'cl_name' => $validated['cl_name'],
            'cl_description' => $validated['cl_description'],
            'cl_active' => $request->cl_active,
        ]);
        return redirect()->back()->with('success', 'Check list item updated successfully!');
    }

    /* ------------------------ CheckList functions ----------------------- */
    public function viewClist()
    {
        $viewClists = Checklist::where('status', '1')->where('close', '1')->get();
        return view('config.checklists', compact('viewClists'));
    }

    public function deleteClist($id)
    {
        $clist = Checklist::find($id);
        $clist->close = '0';
        $clist->status = '0';
        $clist->save();
        return redirect()->back()->with('success', 'Check list deleted successfully!');
    }

    public function addClist(Request $request)
    {
        $validated = $request->validate([
            'l_name' => 'required|string|max:100',
            'l_description' => 'required|string',
            'l_active' => 'nullable|string',
            'rowboxes' => 'nullable|array',
            'rowboxes.*' => 'string|max:255',
        ]);
        $user = Auth::user();

        Checklist::create([
            'l_name' => $validated['l_name'],
            'l_description' => $validated['l_description'],
            'rowboxes' => json_encode($validated['rowboxes'] ?? []),
            'l_active' => $request->l_active,
            'l_insertby' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Check list item saved successfully!');
    }

    public function editClist($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'Checklist ID is missing.');
        }
        $checklist = Checklist::findOrFail($id);
        return view('edit-clist', compact('checklist'));
    }

    // Update checklist
    public function updateClist(Request $request)
    {
        $validated = $request->validate([
            'c_id' => 'required|exists:checklists,c_id',
            'l_name' => 'required|string|max:100',
            'l_description' => 'required|string',
            'l_active' => 'nullable|string',
            'rowboxes' => 'nullable|array',
            'rowboxes.*' => 'string|max:255',
        ]);

        $checklist = Checklist::findOrFail($validated['c_id']);
        $checklist->update([
            'l_name' => $validated['l_name'],
            'l_description' => $validated['l_description'],
            'rowboxes' => json_encode($validated['rowboxes'] ?? []),
            'l_active' => $validated['l_active'] ?? '1',
        ]);

        return redirect()->back()->with('success', 'Checklist updated successfully!');
    }


    /* ------------------------ CheckList Group functions ----------------------- */
    public function viewCLG(){
        $viewClgroups = ChecklistGroup::where('status', '1')->where('close', '1')->get();
        return view('config.checklist-groups', compact('viewClgroups'));
    }

    public function addCLG(Request $request)
    {
        $validated = $request->validate([
            'clg_name' => 'required|string|max:100',
            'clg_description' => 'required|string',
            'rowboxes' => 'nullable|array',
            'rowboxes.*' => 'string|max:255',
        ]);
        $user = Auth::user();

        ChecklistGroup::create([
            'clg_name' => $validated['clg_name'],
            'clg_description' => $validated['clg_description'],
            'rowboxes' => json_encode($validated['rowboxes'] ?? []),
            'clg_active' => $request->clg_active,
            'clg_insertby' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Check list group saved successfully!');
    }

    public function deleteCLG($id)
    {
        $clgroup = ChecklistGroup::find($id);
        $clgroup->close = '0';
        $clgroup->status = '0';
        $clgroup->save();
        return redirect()->back()->with('success', 'Check list group deleted successfully!');
    }

    public function editCLGroup($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'Checklist ID is missing.');
        }
        $checklistg = ChecklistGroup::findOrFail($id);
        return view('edit-cgroup', compact('checklistg'));
    }

    // Update checklist
    public function updateCLGroup(Request $request)
    {
        $validated = $request->validate([
            'clg_id' => 'required|exists:checklist_groups,clg_id',
            'clg_name' => 'required|string|max:100',
            'clg_description' => 'required|string',
            'clg_active' => 'nullable|string',
            'rowboxes' => 'nullable|array',
            'rowboxes.*' => 'string|max:255',
        ]);

        $checklist = ChecklistGroup::findOrFail($validated['clg_id']);
        $checklist->update([
            'clg_name' => $validated['clg_name'],
            'clg_description' => $validated['clg_description'],
            'rowboxes' => json_encode($validated['rowboxes'] ?? []),
            'clg_active' => $validated['clg_active'] ?? '1',
        ]);

        return redirect()->back()->with('success', 'Checklist Group updated successfully!');
    }

}
