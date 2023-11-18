<?php

use App\Models\Offer;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ReservationController;

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

Route::get('/about',function(){
    return view('about');
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
Route::get('reserve/{offer}',[OfferController::class,'showOffer']);
Route::post('reserve/{offer}',[ReservationController::class,'reserve']);
Route::get('myReservations', [ReservationController::class,'showMyReservations']);
Route::delete('delete-reservation/{reservation}',[ReservationController::class,'deleteReservation']);
Route::get('reservations/{offer}',[OfferController::class,'showReservations']);
Route::get('offers/search',[OfferController::class,'offersSearch']);
Route::get('my-offers/search',[OfferController::class,'myOffersSearch']);
Route::get('reservations/search/{offer}',[OfferController::class,'reservationsSearch']);

//admini
Route::get('/admin',[AdminController::class,'showAdminPanel']);
Route::get('/admin/users',[AdminController::class,'showUsers']);
Route::get('/admin/delete-user/{user}',[AdminController::class,'deleteUser']);
Route::get('/admin/edit-user/{user}',[AdminController::class,'showEditUser']);
Route::post('/admin/edit-user/{user}',[AdminController::class,'updateUser']);

