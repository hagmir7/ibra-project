<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("villes")->insert([
        [ "titre"=>"Fes"],
        [ "titre"=>"tanger"],
        [ "titre"=>"Casablanca"],
        ["titre"=>"Marrakech"]
    ]);
    }
}
