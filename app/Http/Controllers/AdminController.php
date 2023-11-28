<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\ContactUs;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdminPanel(){
        if(Auth::check()){
            if(Auth::user()->is_admin){}{    
            $reservations = Reservation::count();
            $users = User::count();
            $offers = Offer::count();
            $photos = Photo::where('is_checked',0)->get();
            $contactUs = ContactUs::where('is_handled',0)->count();
            return view('admin',['users' => $users,'offers' =>$offers,'reservations' =>$reservations,'photos'=>$photos,'contactUs' =>$contactUs]);
            }
            

        }
        return redirect('/');
    }
    public function showUsers(Request $request){
        if(Auth::check()){
            if(Auth::user()->is_admin){}{
                    $query = User::query();
            if($request->filled('name')){
                $query->where('name', 'like','%' . $request['name']);
            }
            if($request->filled('email')){
                $query->where('email', 'like','%' . $request['email']);
            }
            $users = $query->get();

            return view('adminUsers',['users' =>$users]);
        }
            }
            
        return redirect('/');
    }
    public function deleteUser(User $user){
        if(Auth::check()){
            if(Auth::user()->is_admin){}{
                $user->delete();
             return redirect('/admin/users')->with('success', 'Uspesno ste obrisali korisnika!');                

            }
            
        }
        return redirect('/');
    }
    public function showEditUser(User $user){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                 return view('adminEditUser',['user' =>$user]);

            }
        }
    }
    public function updateUser(User $user, Request $request){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                $fields = $request->validate([
                'name' =>'',
                'email' =>'',
                'is_admin' =>'',
            ]);
            $user->update($fields);
            return redirect('/admin/users')->with('success', 'Uspesno ste izmenili korisnika!');                

            }
        }
        return redirect('/');
        
    }
    public function showOffers(Request $request){
    if(Auth::check()){
        if(Auth::user()->is_admin){
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
            $zauzeto = [];

            foreach ($offers as $offer) {
                $zauzeto[$offer->id] = Reservation::where('offer_id', $offer->id)->sum('broj_osoba');
            }

            return view('adminOffers', ['offers' => $offers, 'zauzeto' => $zauzeto]);
        }
    }
        return redirect('/');
    }
    public function showEditOffer(Offer $offer){
        if(Auth::check()){
             return view('adminEditOffer',['offer'=>$offer]);
        }
    }
    public function showReservations(Request $request){
        if(Auth::check()){
            if(Auth::user()->is_admin){
            $query = Reservation::query();
            if($request->filled('name')){
                $query->where('user_name','like','%'.$request['name']);
            }
            if($request->filled('email')){
                $query->where('email','like','%' .$request['email']);
            }
            if($request->filled('broj_telefona')){
                $query->where('broj_telefona','like','%' .$request['broj_telefona']);
            }
            $reservations=$query->get();
            return view('adminReservations',['reservations' => $reservations]);
        }
        }
    }
    public function showEditReservation(Reservation $reservation){
        if(Auth::check()){
            if(Auth::user()->is_admin){
            return view('adminEditReservation',['reservation'=>$reservation]);
        }
        }
    }

    public function editReservation(Reservation $reservation,Request $request){
        if(Auth::check()){
            if(Auth::user()->is_admin){
            $fields = $request->validate([
                'user_name'=>'',
                'email'=>'',
                'broj_telefona'=>'',
                'broj_osoba'=>'',
                'napomena'=>'',
            ]);
            $reservation->update($fields);
            return redirect('/admin/reservations')->with('success', 'Uspesno ste izmenili rezervaciju!');                
        }
        }
    }
    public function deleteReservation(Reservation $reservation){
        if(Auth::check()){
            if(Auth::user()->is_admin){
            $reservation->delete();
            return redirect('/admin/reservations')->with('success', 'Uspesno ste obrisali rezervaciju!');                
        }
        }
    }
    public function allowPhoto(Photo $photo){
        if(Auth::check()){
            if(Auth::user()->is_admin){
            $photo['is_allowed'] = 1;
            $photo['is_checked'] = 1;
            $photo->save();
            return redirect('/admin');
        }
        }
    }
    public function declinePhoto(Photo $photo){
         if(Auth::check()){if(Auth::user()->is_admin){
                 $putanjaDoSlike = storage_path('app/public/gallery/'.$photo['photo']);
                 unlink($putanjaDoSlike);
                
                $photo->delete();
                return redirect('/admin');
            }
        }
         return redirect('/');
    }
    public function deletePhoto(Photo $photo){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                 $putanjaDoSlike = storage_path('app/public/gallery/'.$photo['photo']);
                 unlink($putanjaDoSlike);
                 $photo->delete();
            return redirect('/admin/photos')->with('success', 'Uspesno ste obrisali fotografiju!');                
            }
        }
        return redirect("/");
    }

    public function showPhotos(){
    if(Auth::check() && Auth::user()->is_admin){
        $photos = Photo::where('is_checked', 1)->get();
        return view('adminPhotos', ['photos' => $photos]);
    }
    
    return redirect('/');
}

    public function showPhoto(Photo $photo){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                $photo['is_allowed'] = 1;
                $photo->save();
                 return redirect('/admin/photos');
            }
        }    
    }
    public function hidePhoto(Photo $photo){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                 $photo['is_allowed'] = 0;
                 $photo->save();
                 return redirect('/admin/photos');
            }
        }
           
        
    }

    public function reservationsForOffer(Offer $offer, Request $request){
    if(Auth::check()){
        if(Auth::user()->is_admin){
                
            $rezervacije = $offer->reservations();
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('broj_telefona');

            if($name){
                $rezervacije->where('user_name', 'like', '%' .$name. '%');
            }
            if($email){
                $rezervacije->where('email' , 'like', '%'.$email.'%');
            }
            if($phone){
                $rezervacije->where('broj_telefona' ,'like','%'.$phone.'%');
            }

            $filteredReservations = $rezervacije->get(); 

            return view("admin-reservations", ['reservations' => $filteredReservations, 'offer' => $offer]);
            }
        }
    
        return redirect('/');
    }
    public function deleteComment(Comment $comment){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                $comment->delete();
            return redirect('/')->with('success', 'Uspesno ste obrisali komentar!');                

            }
            return redirect('/');
        }
    }

    public function showContactUs(){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                $contactUs = ContactUs::all();
                return view('adminContactUs',['contacts' => $contactUs]);
            }
        }
        return redirect('/');
    }


}
