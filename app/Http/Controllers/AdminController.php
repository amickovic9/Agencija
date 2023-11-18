<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdminPanel(){
        if(Auth::user()->is_admin){
            $reservations = Reservation::count();
            $users = User::count();
            $offers = Offer::count();
            return view('admin',['users' => $users,'offers' =>$offers,'reservations' =>$reservations]);

        }
    }
    public function showUsers(){
        if(Auth::user()->is_admin){
            $users = User::all();
            return view('adminUsers',['users' =>$users]);
        }
    }
    public function deleteUser(User $user){
        if(Auth::user()->is_admin){
            $user->delete();
            return redirect('admin/users');
        }
        return redirect('/');
    }
    public function showEditUser(User $user){
        return view('adminEditUser',['user' =>$user]);
    }
    public function updateUser(User $user, Request $request){
        if(Auth::user()->is_admin){
            $fields = $request->validate([
                'name' =>'',
                'email' =>'',
                'is_admin' =>'',
            ]);
            $user->update($fields);
            return redirect('admin/users');
        }
        return redirect('/');
        
    }
}
