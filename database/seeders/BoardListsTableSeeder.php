<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BoardListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BoardList::class, 8)->create();
    }
}
