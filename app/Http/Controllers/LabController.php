<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    public function viewlabResults(Request $request)
    {
        return view('config.lab-results');
    }
}
