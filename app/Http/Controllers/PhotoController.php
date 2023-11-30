<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function showPhotos() {
    // Dohvaćanje fotografija gdje je is_allowed jednako 1
    $photos = Photo::where('is_allowed', 1)->get();

    // Pretvaranje kolekcije fotografija u polje
    $photosArray = $photos->toArray();

    // Provjera da li ima barem dvije dozvoljene fotografije
    if (count($photosArray) >= 2) {
        // Miješanje redoslijeda fotografija
        shuffle($photosArray);
    }
        return view('gallery',['photos' => $photosArray]);
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

                return redirect('/gallery')->with('success', 'Slika je uspesno upload-ovana, nas tim proverava da li je prikladna za galeriju!');                

            } 
        }
        return redirect('/login')->with('success', 'Morate se ulogovati prvo!');                

    }


    public function showUploadedView(){
        return view('galleryUploaded');
    }
}
