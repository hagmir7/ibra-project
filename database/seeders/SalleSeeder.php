<?php

namespace Database\Seeders;

use App\Models\Salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salle::create([
            'name' => 'Salle 1',
            'number' => 1,
            'first' => 100,
            'second' => 50,
            'cinema_id' => 1,
        ]);

        Salle::create([
            'name' => 'Salle 2',
            'number' => 2,
            'first' => 150,
            'second' => 75,
            'cinema_id' => 1,
        ]);

        Salle::create([
            'name' => 'Salle 3',
            'number' => 3,
            'first' => 200,
            'second' => 100,
            'cinema_id' => 1,
        ]);
    }
}
