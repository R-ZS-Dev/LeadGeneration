<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StsController extends Controller
{
    public function viewSts()
    {
        return view('cases.sts');
    }
}
