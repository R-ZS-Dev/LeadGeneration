<?php

namespace App\Http\Controllers;

use App\Models\DataDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDeviceController extends Controller
{
    public function viewDataDevices()
    {
        $devices = DataDevice::where('status','1')->where('close','1')->get();
        return view('config.data-devices',compact('devices'));
    }

    public function addDataDevices(Request $request)
    {
    $request->validate([
            'dd_name'       => 'required|string|max:100',
            'dd_desc'       => 'nullable|string',
            'dd_type'       => 'nullable|string|max:100',
            'dd_con'        => 'nullable|string|max:40',
            'dd_handshake'  => 'nullable|string|max:40',
            'dd_baudrate'   => 'nullable|integer',
            'dd_databit'    => 'nullable|integer',
        ]);

        $device = DataDevice::create([
            'dd_name'       => $request->dd_name,
            'dd_desc'       => $request->dd_desc,
            'dd_type'       => $request->dd_type,
            'dd_con'        => $request->dd_con,
            'dd_handshake'  => $request->dd_handshake,
            'dd_baudrate'   => $request->dd_baudrate,
            'dd_databit'    => $request->dd_databit,
            'dd_active'     => $request->dd_active,
            'dd_insertby'   => Auth::user()->name,
        ]);
        return redirect()->back()->with('success', 'Data Device Added Successfully!');
    }

    public function editDataDevices(Request $request)
    {
        $id = $request->dd_id;
        $data = DataDevice::find($id);
        $data->update([
            'dd_name'       => $request->dd_name,
            'dd_desc'       => $request->dd_desc,
            'dd_type'       => $request->dd_type,
            'dd_con'        => $request->dd_con,
            'dd_handshake'  => $request->dd_handshake,
            'dd_baudrate'   => $request->dd_baudrate,
            'dd_databit'    => $request->dd_databit,
            'dd_active'     => $request->dd_active,
        ]);

        return redirect()->back()->with('success','Data Devices updated successfully!');
    }

    public function deleteDataDevices($id)
    {
        $data = DataDevice::find($id);
        $data->close = '0';
        $data->status = '0';
        $data->save();
        return redirect()->back()->with('success','Data Device Deleted Successfully!');
    }
}
