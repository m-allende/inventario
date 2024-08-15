<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <-- import it at the top
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create()

        /*
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
*/


        DB::table('roles')->insert([
            'name' => "super-admin",
            'guard_name'=> "web",
            'created_at' => now(),
            'updated_at' => now(),
            'description'=> "super administrador",
        ]);



        DB::table('roles')->insert([
            'name' => "user-intranet",
            'guard_name'=> "web",
            'created_at' => now(),
            'updated_at' => now(),
            'description'=> "usuario de la intranet",
        ]);

        DB::table('roles')->insert([
            'name' => "user-client",
            'guard_name'=> "web",
            'created_at' => now(),
            'updated_at' => now(),
            'description'=> "usuario cliente",
        ]);

        //se busca el primer usuario
        $user = User::whereid(1)->first();
        //se le asigan el rol
        $user->assignRole('super-admin');
    }
}
