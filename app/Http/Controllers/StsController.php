<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RiskFactor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StsController extends Controller
{
    public function viewSts()
    {
        return view('cases.sts');
    }

    public function addPatientMedication(Request $request)
    {
        // return $request->all();
        $pat_id = session('pat_id');
        $pat = Patient::find($pat_id);
        if ($pat) {
            $pat->update([

                'aceorarb' => $request->aceorarb,
                'inhibitor' => $request->inhibitor,
                'inhibitor_no' => $request->inhibitor_no,
                'amiod' => $request->amiod,
                'anticoagulant' => $request->anticoagulant,
                'medicat' => $request->medicat,
                'antiplaletes' => $request->antiplaletes,
                'aspirin' => $request->aspirin,
                'beta_blocker' => $request->beta_blocker,
                'blocker_prior' => $request->blocker_prior,
                'calcium_prior' => $request->calcium_prior,
                'coumadin' => $request->coumadin,
                'factorxa' => $request->factorxa,
                'glycoprotein' => $request->glycoprotein,
                'med_name' => $request->med_name,
                'ointravanous' => $request->ointravanous,
                'lipid' => $request->lipid,
                'med_type' => $request->med_type,
                'long_acting' => $request->long_acting,
                'nitrates' => $request->nitrates,
                'antianginal' => $request->antianginal,
                'steroids' => $request->steroids,
                'thrombin' => $request->thrombin,
                'thrombolytics' => $request->thrombolytics,
            ]);

            return redirect()->back()->with('success','Patient medication added successfully.');
        } else {
            return redirect()->back()->with('error','An error occur while adding medications.');

        }
    }

    public function addRiskFactor(Request $request)
    {
        // return $request->all();
        $pat_id = session('pat_id');
        RiskFactor::create([
            'fr_userid' =>$pat_id,
            'rf_insertby' => Auth::user()->name,
        ] + $request->all());
        return redirect()->back()->with('success','Risk Factor added successfully!');
    }

    public function addCardicStatus(Request $request)
    {
        // return $request->all();
        $pat_id = session('pat_id');
        $pat = Patient::find($pat_id);
        if ($pat) {
            $pat->update($request->only([
                'myocardial',
                'mi_when',
                'cardic_sympadmin',
                'cardic_sympsurg',
                'anginal_class',
                'heartfail2w',
                'class_nyha',
                'priorheartf',
                'cardio_shock',
                'resuscit',
                'arrhythmia',
                'vtachfib',
                'sick_sinus',
                'aflutter',
                'sec_heartblock',
                'third_heartblock',
                'paced_rhythm',
                'atrialfib',
                'fib_durate',
            ]));

            return redirect()->back()->with('success','Cardiac Status added successfully.');
        } else {
            return redirect()->back()->with('error','An error occur while adding Cardiac Status.');

        }
    }
}
