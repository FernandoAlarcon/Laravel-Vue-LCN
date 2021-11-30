<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


$factory->define(Board::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => User::all()->random()->id,
    ];
});

class BoardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Board::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
