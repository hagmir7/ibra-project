<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'film_place_id', 'number_place'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function filmPlace(){
        return $this->belongsTo(FilmPlace::class);
    }
}
