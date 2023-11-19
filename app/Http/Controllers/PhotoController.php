<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function showPhotos(){
        $photos = Photo::all();
        return view('gallery',['photos' => $photos]);
    }
    public function upload(Request $request){
        if(Auth::check()){
            $fields = $request->validate([
            'photo' =>'required'
            ]);
            $fields['user_id'] = auth()->id();
            $extension = $request->file('photo')->getClientOriginalExtension();
            
            $imageName = time() . '.' . $extension;
            $image = $request->file('photo');
            $image->storeAs('public/gallery', $imageName);
            $fields['photo'] = $imageName;
            Photo::create($fields);
            return redirect('/gallery/uploaded');
        }
        return redirect('/login');
        
    }
    public function showUploadedView(){
        return view('galleryUploaded');
    }
}
