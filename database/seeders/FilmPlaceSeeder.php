<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('film_places')->insert([
            ['prix' => 100.00, 'id_place_type' => 1, 'id_film' => 1],
            ['prix' => 150.00, 'id_place_type' => 2, 'id_film' => 2],
        ]);
    }
}
