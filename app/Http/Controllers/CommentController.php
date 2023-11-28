<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function dodajOcenu(Request $request){
        if(Auth::check()){
            $fields = $request->validate([
                'komentar' =>'required',
                'ocena' => 'required'
            ]);
            $fields['user_id'] = auth()->id();
            
            Comment::create($fields);
            return redirect('/')->with('success', ' Uspesno ste dodali komentar i ocenu!');                
        }
            return redirect('/login')->with('success', 'Morate se ulogovati prvo!');                
           

    }

        public function showComments(){
        $ime = [];
        $comments = Comment::orderBy('created_at', 'desc')->get();
        foreach ($comments as $comment){
            $user = User::where('id', $comment->user_id)->first(); 
            $ime[$comment->id] = $user->name;
        }
        return view('about', ['comments' => $comments, 'ime' => $ime]);
    }


}
