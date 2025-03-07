<?php

namespace App\Http\Controllers;

use App\Models\Cardioplegia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CardioplegiaController extends Controller
{
    public function viewCardioplegias()
    {
        $card = Cardioplegia::where('status','1')->where('close','1')->get();
        return view('config.cardioplegias',compact('card'));
    }

    // public function addCardioplegias(Request $request)
    // {
    //     // return $request->all();
    // }

    public function addCardioplegias(Request $request)
    {
        try {
            $validated = $request->validate([
                'card_name' => 'required|string|max:100|unique:cardioplegias,card_name',
                'card_desc' => 'nullable|string',
                'card_blood' => 'nullable|string|max:5',
                'card_solution' => 'nullable|string|max:5',
                'card_solcon' => 'nullable|string',
                'card_display' => 'nullable|string',
                'card_cpgtype' => 'nullable|string',
                'card_dose' => 'nullable|string|max:5',
                'card_temp' => 'nullable|string|max:5',
                'card_active' => 'required|in:0,1',
                'card_quick' => 'required|in:0,1',
                'card_insertby' => 'nullable|string|max:50',
            ]);

            $cardioplegia = new Cardioplegia();
            $cardioplegia->card_name = $request->card_name;
            $cardioplegia->card_desc = $request->card_desc;
            $cardioplegia->card_blood = $request->card_blood;
            $cardioplegia->card_solution = $request->card_solution;
            $cardioplegia->card_solcon = $request->card_solcon;
            $cardioplegia->card_display = $request->card_display;
            $cardioplegia->card_cpgtype = $request->card_cpgtype;
            $cardioplegia->card_dose = $request->card_dose;
            $cardioplegia->card_temp = $request->card_temp;
            $cardioplegia->card_active = $request->card_active;
            $cardioplegia->card_quick = $request->card_quick;
            $cardioplegia->card_insertby = Auth::user()->name;
            $cardioplegia->save();

            return redirect()->back()->with('success', 'Cardioplegia added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function editCardioplegias(Request $request)
    {
        $id = $request->card_id;
        $card = Cardioplegia::find($id);
        $card->card_name = $request->card_name;
        $card->card_desc = $request->card_desc;
        $card->card_blood = $request->card_blood;
        $card->card_solution = $request->card_solution;
        $card->card_solcon = $request->card_solcon;
        $card->card_display = $request->card_display;
        $card->card_cpgtype = $request->card_cpgtype;
        $card->card_dose = $request->card_dose;
        $card->card_temp = $request->card_temp;
        $card->card_active = $request->card_active;
        $card->card_quick = $request->card_quick;
        $card->save();
        return redirect()->back()->with('success','Cardioplegia updated successfully!');
    }

    public function deleteCardioplegias($id)
    {
        $card = Cardioplegia::find($id);
        $card->close = '0';
        $card->status = '0';
        $card->save();
        return redirect()->back()->with('success','Cardiopledia deleted successfully');
    }

}
