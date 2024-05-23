<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    use HasFactory;

    protected $fillable = ["name"];


    public function palces(){
        return $this->hasMany(Place::class);
    }

    public function film_places(){
        return $this->hasMany(FilmPlace::class);
    }


}
