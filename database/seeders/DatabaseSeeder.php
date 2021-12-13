<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ApuntesGastos;
use App\Models\CategoriasGastos;
use App\Models\SubCategoriasGastos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'role' => 2
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('secret'),
            'role' => 1
        ]);
        User::create([
            'name' => 'Infinety Admin',
            'email' => 'erickfernando_20@hotmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1
        ]);
        //\App\Models\User::factory(10)->create();
        CategoriasGastos::factory(5)->create();
        SubCategoriasGastos::factory(5)->create();
        GestionIngresos::factory(25)->create();
        ApuntesGastos::factory(1000)->create();
    }
}
