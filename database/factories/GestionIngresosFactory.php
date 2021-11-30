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
            'Nombre_Tipo_Entradas' => $this->faker->name,
            'Estado'    => $this->faker->randomElement(['Positivo', 'Negativo']),
            'Tipo_Ingreso'  => $this->faker->randomElement(['Unico', 'Multiple Mensual']),
            'created_at' => now()
        ];
    }
}
