<?php

namespace Database\Seeders;

use App\Models\Salle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FilmSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            VilleSeeder::class,
            PlaceTypeSeeder::class,
            SalleSeeder::class,
            CinemaSeeder::class,
        ]);
    }
}
