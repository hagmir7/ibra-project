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
                "image"=>"litra.png",
                "title"=>"Litra f Marrakech",
                "description"=>"description 5",
                "start_at"=>"2024-06-03 02:00:00",
                "duree" => 2,
                "category" => "comedy",
                "salle_id"=> 2
            ],
            [
                "image"=>"avatar.jpg",
                "title"=>"Avatar",
                "description"=>"description 3",
                "start_at"=>"2024-05-03 02:00:00",
                "duree" => 2,
                "category" => "action",
                "salle_id"=> 1
            ]
            ]);
    }
    }

