<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <-- import it at the top

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create()


        \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'admin@adminlte.com',
             'password' => Hash::make("123456"),
         ]);

         \App\Models\User::factory()->create([
            'name' => 'Paula Guerrero',
            'email' => 'paula@prueba.cl',
            'password' => Hash::make("12345678"),
        ]);

    }
}
