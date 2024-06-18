<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

          //no hace falta ejectarlo desde el invoie como dije anteriormente porque tenemos la relacion de los modelos desde el mismo customerseeder podemos usar todo
  
        $this -> call([
            CustomerSeeder::class 
        ]);
        }
}
