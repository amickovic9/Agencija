<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Comment;
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
        if(Auth::check()){
            if(Auth::user()->is_admin){
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
            return redirect('/admin/offers')->with('success', ' Uspesno ste kreirali ponudu!');                

             }
             return redirect('/');
            }
        }
        

    public function updateOffer(Offer $offer, Request $request){
         if(Auth::check()){
            if(Auth::user()->is_admin){
                 $fields = $request->validate([
                    'destinacija' => 'required',
                    'opis' => 'required',
                    'photo' => 'image,required',
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
    }
            }
        }
       
    public function deleteOffer(Offer $offer){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                 $putanjaDoSlike = storage_path('app/public/images/'.$offer['photo']);
                unlink($putanjaDoSlike);
                $offer->delete();
                return redirect('/admin/offers')->with('success', ' Uspesno ste obrisali ponudu!');                
                }
                return redirect('/');

            }
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
    public function showFiveOffers(){
        $ponude = Offer::orderBy('created_at', 'desc')->take(5)->get();
        $comments = Comment::orderBy('created_at', 'desc')->get();
        foreach ($comments as $comment){
            $user = User::where('id', $comment->user_id)->first(); 
            $ime[$comment->id] = $user->name;
        }
        return view('home',['offers' =>$ponude,'comments' => $comments, 'ime' => $ime]);
    }
}