<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            ['reserve' => true, 'id_client' => 1, 'id_film' => 1],
            ['reserve' => false, 'id_client' => 2, 'id_film' => 2],
        ]);
    }
}
