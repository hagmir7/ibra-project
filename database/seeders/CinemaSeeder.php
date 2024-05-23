<?php

namespace Database\Seeders;

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
        DB::table('cinemas')->insert([
            ['name' => 'Rialto Cinema', 'number_salle' => 2],
            ['name' => 'Cinema IMAX Morocco Mall', 'number_salle' => 1],
            ['name' => 'Cinema Le Colisee', 'number_salle' => 4],
            ['name' => 'Cinema Megarama', 'number_salle' => 8],
            ['name' => 'Cinema Roxy', 'number_salle' => 1],
            ['name' => 'Cinematheque de Tanger', 'number_salle' => 2],
            ['name' => 'Cinema Eden Club', 'number_salle' => 1],
        ]);
    }
}
