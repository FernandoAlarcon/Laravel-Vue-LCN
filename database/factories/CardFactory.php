<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\BoardList;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


$factory->define(Card::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'board_list_id' => BoardList::all()->random()->id,
        'order' => random_int(0, 10000),
        'description' => $faker->paragraph,
    ];
});

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

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
