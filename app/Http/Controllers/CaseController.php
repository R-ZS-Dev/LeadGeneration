<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseController extends Controller
{

    /* -------------------------- Case Staff module functions ------------------------- */
    public function viewCstaff(){
        return view('case.case-staff');
    }
    
}
