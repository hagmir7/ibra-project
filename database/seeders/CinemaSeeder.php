<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cinema::create([
            'name' => 'Cinema 1',
            'image' => 'cinema1.jpg',
            'address' => '123 Main St',
            'description' => 'A great place to watch movies',
            'ville_id' => 1,
        ]);

        Cinema::create([
            'name' => 'Cinema 2',
            'image' => 'cinema2.jpg',
            'address' => '456 Elm St',
            'description' => 'A cozy neighborhood cinema',
            'ville_id' => 2,
        ]);

        Cinema::create([
            'name' => 'Cinema 3',
            'image' => 'cinema3.jpg',
            'address' => '789 Oak St',
            'description' => 'A modern cinema with the latest technology',
            'ville_id' => 3,
        ]);
    }
}
