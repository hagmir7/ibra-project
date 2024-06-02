<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmPlace extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'place_type_id', 'film_id', 'number'];


    public function placeType(){
        return $this->belongsTo(PlaceType::class);
    }

    public function film(){
        return $this->belongsTo(Film::class);
    }
}
