<?php

namespace Database\Seeders;

use App\Models\Pets;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pets::factory(5)->create();
    }
}
