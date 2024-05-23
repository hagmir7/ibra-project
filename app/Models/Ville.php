<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cinemas(){
        return $this->hasMany(Cinema::class);
    }

    public function films(){
        return $this->belongsToMany(Film::class, 'film_ville');
    }
}
