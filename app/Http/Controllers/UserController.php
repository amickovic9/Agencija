<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Redirector;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
       $fields= $request->validate([
        'name' => ['required','min:3', Rule::unique('users','name')],
        'email' => ['required','email', Rule::unique('users','email')],
        'password' => ['required','min:8'],
       ]);
       $fields['password'] = bcrypt($fields['password']);
       $user = User::create($fields);
       return redirect('/login')->with('success', 'Uspesno ste se registrovali!');


    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function login(Request $request){
        $fields = $request->validate([
            'loginname' =>'required',
            'loginpassword' =>'required'
        ]);
        if(auth()->attempt(['name' => $fields['loginname'], 'password' => $fields['loginpassword']])){
            $request->session()->regenerate();
        }
        else{
            return redirect('/login');
        }
               return redirect('/')->with('success', ' Uspesno ste se ulogovali!');

    }
}
