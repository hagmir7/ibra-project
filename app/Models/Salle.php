<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'number', 'cinema_id', 'first', 'second'];

    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }

    public function films(){
        return $this->hasMany(Film::class);
    }
}
