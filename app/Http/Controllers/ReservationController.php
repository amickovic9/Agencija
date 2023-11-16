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
        $fields['user_id'] = auth()->id();
        $fields['offer_id'] = $offer['id'];
        Reservation::Create($fields);
        return redirect('/rezervacije');
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
}
