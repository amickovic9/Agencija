<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'photo' => 'image',
            'opis' => 'required',
            'datum_polaska' => 'required',
            'datum_povratka' => 'required',
            'broj_mesta' => 'required',
            'cena' => 'required'
        ]);
        
        $fields['user_id'] = auth()->id();
        $extension = $request->file('photo')->getClientOriginalExtension();
        
        $imageName = time() . '.' . $extension;
        $image = $request->file('photo');
        $image->storeAs('public/images', $imageName);
        $fields['photo'] = $imageName;
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
            'photo' => 'image',
            'datum_polaska' => 'required',
            'datum_povratka' => 'required',
            'broj_mesta' => 'required',
            'cena' => 'required']);
        if($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image = $request->file('photo');
            $image->storeAs('public/images', $imageName);
            $putanjaDoSlike = storage_path('app/public/images/'.$offer['photo']);
            unlink($putanjaDoSlike);
            $fields['photo'] = $imageName;
        }
        else{
        $fields['photo'] = $offer['photo'];

        }
        $offer->update($fields);
        if(Auth::user()->is_admin){
            return redirect("/admin/offers");
        }
        return redirect('/my-offers');
    }
    public function deleteOffer(Offer $offer){
        if(auth()->user()->id == $offer['user_id']){
        $putanjaDoSlike = storage_path('app/public/images/'.$offer['photo']);
        unlink($putanjaDoSlike);
        $offer->delete();
         if(Auth::user()->is_admin){
            return redirect('/admin/offers');
        }
        return redirect('/my-offers');
        }
       
        return redirect('/');
        
        }
    public function showOffer(Offer $offer){
        $existingReservations = Reservation::where('offer_id', $offer['id'])->sum('broj_osoba');

        $offer['broj_mesta']-=$existingReservations;
            return view('reserve',['offer' =>$offer]);
    }
    public function showReservations(Offer $offer){
        $reservations = $offer->reservations()->get();
        return view('reservations',['reservations' => $reservations,'offer' =>$offer]);
    }
    public function offersSearch(Request $request){
        $query = Offer::query();
        if($request->filled('destinacija')){
            $query->where('destinacija' , 'like' , '%' . $request['destinacija']);
        }

    if ($request->filled('polazak')) {
        $query->whereDate('datum_polaska', '>=', $request->input('polazak'));
    }

    if ($request->filled('povratak')) {
        $query->whereDate('datum_povratka', '<=', $request->input('povratak'));
    }

    $offers = $query->get();
    return view('offers', ['offers' => $offers]);

    }
    public function myOffersSearch(Request $request){
        $query = Offer::where('user_id', auth()->id());
        if($request->filled('destinacija')){
            $query->where('destinacija' , 'like' , '%' . $request['destinacija']);
        }

    if ($request->filled('polazak')) {
        $query->whereDate('datum_polaska', '>=', $request->input('polazak'));
    }

    if ($request->filled('povratak')) {
        $query->whereDate('datum_povratka', '<=', $request->input('povratak'));
    }

    $offers = $query->get();
    return view('myOffers', ['offers' => $offers]);

    }
    public function reservationsSearch(Request $request, Offer $offer){
    $reservations = $offer->reservations();

    $name = $request->input('name');
    $email = $request->input('email');
    $phone = $request->input('broj_telefona');

    if($name){
        $reservations->where('user_name', 'like', '%' .$name. '%');
    }
    if($email){
        $reservations->where('email' , 'like', '%'.$email.'%');
    }
    if($phone){
        $reservations->where('broj_telefona' ,'like','%'.$phone.'%');
    }

    $filteredReservations = $reservations->get(); 

    return view("reservations", ['reservations' => $filteredReservations, 'offer' => $offer]);
}

   
}
