<?php

namespace Database\Factories;

use App\Models\BoardList;
use App\Models\Board;
use Faker\Generator as Faker; 
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(BoardList::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'board_id' => Board::all()->random()->id,
        'order' => random_int(0, 10000),
    ];
});

class BoardListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BoardList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
