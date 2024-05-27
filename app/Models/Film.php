<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $guarded = ["image", "title", "description", "start_at", "duree", 'category', 'salle_id'];

    public function salle(){
        return $this->belongsTo(Salle::class);
    }

    public function filmPlaces(){
        return $this->hasMany(FilmPlace::class);
    }

}
