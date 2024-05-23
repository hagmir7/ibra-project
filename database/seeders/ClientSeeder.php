<?php

namespace Database\Seeders;

use App\Models\client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        client
        DB::table('clients')->insert([
            ['name' => 'Client 1', 'email' => 'client1@example.com', 'password' => Hash::make('password1'), 'id_role' => 1],
            ['name' => 'Client 2', 'email' => 'client2@example.com', 'password' => Hash::make('password2'), 'id_role' => 2]
        ]);
    }


}
