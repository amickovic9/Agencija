<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function addContact(Request $request){
        if(Auth::check()){
            $fields = $request->validate([
                'name' =>'required',
                'email' => 'required',
                'message' => 'required'
            ]);
            $fields['user_id'] = auth()->id();
            
            ContactUs::create($fields);
            return redirect('/')->with('success', ' Uspesno ste nas kontaktirali!');                
        }
            return redirect('/login')->with('success', 'Morate se ulogovati prvo!');                

    }
    public function showReply(ContactUs $contactUs){
        if(Auth::check() && auth()->user()->is_admin){
             return view('adminReply',['contact'=>$contactUs]);

        }
        else return redirect('/');
    }
    
}
