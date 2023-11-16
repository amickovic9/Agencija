<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
   protected $fillable = [
        'user_id',
        'destinacija',
        'opis',
        'datum_polaska',
        'datum_povratka',
        'broj_mesta',
        'cena',
    ];
    
}
