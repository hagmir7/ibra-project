<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'place_type_id', 'salle_id'];


    public function placeType(){
        return $this->belongsTo(PlaceType::class);
    }

    public function salle(){
        return $this->belongsTo(Salle::class);
    }

}
