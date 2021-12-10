<?php

namespace Database\Factories;

use App\Models\ApuntesGastos;
use App\Models\CategoriasGastos;
use App\Models\SubCategoriasGastos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApuntesGastosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApuntesGastos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  
        return [
            'fecha'             => $this->faker->dateTime(),
            'categoriagasto'    => CategoriasGastos::all()->random()->id,
            'subcategoriagasto' => SubCategoriasGastos::all()->random()->id,
            'importe'           => $this->faker->randomNumber(),            
            'concepto'          => $this->faker->name
            ]; 
    }
}
 