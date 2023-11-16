<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'offer_id',
        'user_name',
        'email',
        'broj_telefona',
        'broj_osoba',
        'napomena',
    ];
}
