<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'address', 'description', 'ville_id'];

    public function ville() : BelongsTo {
        return $this->belongsTo(Ville::class);
    }

    public function salles(){
        return $this->hasMany(Salle::class);
    }



}
