<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Photo;
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
            return view('admin',['users' => $users,'offers' =>$offers,'reservations' =>$reservations,'photos'=>$photos]);
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
            return redirect('admin/users');
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
            return redirect('admin/users');
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
            return view('adminOffers',['offers'=>$offers]);
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
            return redirect('/admin/reservations');
        }
        }
    }
    public function deleteReservation(Reservation $reservation){
        if(Auth::check()){
            if(Auth::user()->is_admin){
            $reservation->delete();
            return redirect('/admin/reservations');
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
                return redirect ('admin/photos');
            }
        }
        return redirect("/");
    }

    public function showPhotos(){
        if(Auth::check()){
            if(Auth::user()->is_admin){
                $photos = Photo::all();
                return view('adminPhotos',['photos' =>$photos]);
            }
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

}
