<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("films")->insert([

            [
                "image"=>"products/product-img-2.jpg",
                "title"=>"Casablanca",
                "description"=>"description 2",
                "start_at"=> "2024-05-25 01:25:00",
                "duree" => 2,
                "category"=>"comedy",
                "salle_id"=> 3
            ],
            [
                "image"=>"products/product-img-3.jpg",
                "titre"=>"Schindler's List (1993)",
                "description"=>"description 3",
                "start_at"=>"2024-05-03 02:00:00",
                "duree" => 2,
                "category" => "drama",
                "salle_id"=> 2
            ]
            ]);
    }
    }

