<?php

use App\Models\Film;
use App\Models\PlaceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('film_places', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->foreignIdFor(PlaceType::class);
            $table->foreignIdFor(Film::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_places');
    }
};
