<?php

namespace Database\Factories;

use App\Models\CategoriasGastos; 
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriasGastosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriasGastos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NombreCategorias' => $this->faker->name,
            'TipoCategoria'    => $this->faker->randomElement(['Gasto vital', 'Gasto no vital']),
            'EstadoCategoria'  => $this->faker->randomElement(['Activado', 'Desactivado']),
            'created_at' => now()
        ];
    }
}
