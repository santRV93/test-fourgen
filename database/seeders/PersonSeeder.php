<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        People::factory(5)->create();
    }
}
