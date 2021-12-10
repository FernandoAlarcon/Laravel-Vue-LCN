<?php

namespace Database\Factories;

use App\Models\SubCategoriasGastos;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoriasGastosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubCategoriasGastos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'nombresubcategorias' => $this->faker->name,
                'tipogastomensual'    => $this->faker->randomElement(['Fijo', 'Multiple']),
                'created_at' => now()
        ];
       
    }
}
