<?php

namespace Database\Factories;

use App\Models\GestionIngresos;
use Illuminate\Database\Eloquent\Factories\Factory;

class GestionIngresosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GestionIngresos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_tipo_entradas' => $this->faker->name,
            'estado'               => $this->faker->randomElement(['Positivo', 'Negativo']),
            'tipo_ingreso'         => $this->faker->randomElement(['Unico', 'Multiple Mensual']),
            'created_at'           => now()
        ];
    }
}
