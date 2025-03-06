<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardioplegiaController extends Controller
{
    public function viewCardioplegias()
    {
        return view('config.cardioplegias');
    }
}
