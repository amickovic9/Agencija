<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function showPhotos(){
        $photos = Photo::where('is_allowed',1)->get();
        return view('gallery',['photos' => $photos]);
    }

public function upload(Request $request){
    if(Auth::check()){
        $user_id = auth()->id();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            
            $imageName = time() . '.' . $extension;

            // Čitanje slike i prilagođavanje dimenzija
            $resizedImage = Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension);

            // Čuvanje prilagođene slike
            $path = 'public/gallery/' . $imageName;
            Storage::put($path, $resizedImage->__toString());

            $photo = new Photo;
            $photo->user_id = $user_id;
            $photo->photo = $imageName;
            $photo->save();

            return redirect('/gallery/uploaded');
        } else {
            return redirect()->back()->with('error', 'Niste izabrali sliku.');
        }
    }
    return redirect('/login');
}


    public function showUploadedView(){
        return view('galleryUploaded');
    }
}
