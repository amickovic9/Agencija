<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function show(){
        if(Auth::check()){
            return view('oglasiPonudu');
        }
        else{
            return redirect('login');
        }
    }

    public function createOffer(Request $request){
        $fields = $request ->validate([
            'destinacija' => 'required',
            'opis' => 'required',
            'datum_polaska' => 'required',
            'datum_povratka' => 'required',
            'broj_mesta' => 'required',
            'cena' => 'required'
        ]);
        $fields['user_id'] = auth()->id();
        Offer::create($fields);
        return redirect('/my-offers');
    }
    public function showEditScreen(Offer $offer){
        
        if(auth()->check()){
            if(auth()->user()->id ==$offer['user_id']){
                return view('editOffer',['offer' => $offer]);
        }

        }
        return redirect('/offers');

    }

    public function updateOffer(Offer $offer, Request $request){
         if(auth()->user()->id !==$offer['user_id']){
            return redirect('/');
        }
        $fields = $request->validate([
            'destinacija' => 'required',
            'opis' => 'required',
            'datum_polaska' => 'required',
            'datum_povratka' => 'required',
            'broj_mesta' => 'required',
            'cena' => 'required']);
        $offer->update($fields);
        return redirect('/my-offers');
    }
    public function deleteOffer(Offer $offer){
        if(auth()->user()->id == $offer['user_id']){
        $offer->delete();
        }
        return redirect('/my-offers');
    }
}
