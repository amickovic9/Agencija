<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Reservation;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Offer $offer,Request $request){
        if(auth()->check()){
            $fields = $request ->validate([
            'user_name' => 'required',
            'email' => ['required','email'],
            'broj_telefona' => 'required',
            'broj_osoba' => 'required',
        ]);

        $brojRezervacija = Reservation::where('offer_id',$offer['id'])->sum('broj_osoba');
        if(($brojRezervacija+$fields['broj_osoba'])>$offer['broj_mesta']){
            return redirect('/offers');
        }
        $fields['user_id'] = auth()->id();
        $fields['offer_id'] = $offer['id'];
        Reservation::Create($fields);
        return redirect('/myReservations');
        }
        return redirect('login');
    }
    public function showMyReservations(){
        if(auth()->check()){
            $reservations = auth()->user()->reservations()->get();
            return view('myReservations',['reservations' => $reservations]);
        }
        return redirect('/login');
    }
    public function deleteReservation(Reservation $reservation){
        if(auth()->check()){
            $reservation->delete();
            return redirect('/myReservations');
        }
    }
}
