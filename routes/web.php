<?php

use App\Models\Offer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/login',function(){
    return view('login');
});
Route::get('/my-offers',function(){
    
    if(auth()->check()){
        $offers = auth()->user()->offers()->get();
        return view('myOffers', ['offers' => $offers]);

    }
    return redirect('login');
});

Route::get('/offers',function(){
    $offers = Offer::all();
    return view('offers', ['offers' => $offers]);
});



Route::post("/register",[UserController::class,'register']);
Route::get("/logout",[UserController::class,'logout']);
Route::post("/login",[UserController::class,'login']);

// Ponude
Route::get('/create-offer',[OfferController::class, 'show']);
Route::post('/create-offer', [OfferController::class , 'createOffer']);
Route::get('/edit-offer/{offer}',[OfferController::class,'showEditScreen']);
Route::put('/edit-offer/{offer}',[OfferController::class,'updateOffer']);
Route::delete('/delete-offer/{offer}',[OfferController::class,'deleteOffer']);
