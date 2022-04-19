<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'nombres'     => $this->faker->name,
            'apellidos'   => $this->faker->name,
            'tipos_identificacion'  => $this->faker->randomElement(['T.I']),
            'identificacion'        => $this->faker->randomNumber($nbDigits = NULL), 
           
            'sexo'                  => $this->faker->randomElement(['X']),
            'fecha_nacimiento'      => $this->faker->dateTime(),
            'carrera'               => $this->faker->name,

        ]; 
    }
}
