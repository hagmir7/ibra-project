<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function salle(){
        return $this->belongsTo(Salle::class);
    }


    public function villes(){
        return $this->belongsToMany(Ville::class, 'film_ville');
    }
}
