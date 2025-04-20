<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $breeds = [
            'Dog' => ['Labrador Retriever', 'Poodle', 'Bulldog', 'Golden Retriever'],
            'Cat' => ['Siamese', 'Persian', 'Maine Coon', 'Bengal'],
            'Hamster' => ['Syrian', 'Roborovski', 'Russian Dwarf'],
        ];
        $species = $this->faker->randomElement(['Dog', 'Cat', 'Hamster']);

        return [
            'name' => $this->faker->firstName,
            'species' => $species,
            'age' => $this->faker->numberBetween(0, 15),
            'person_id' => People::factory(),
            'breed' => $this->faker->randomElement($breeds[$species]),
        ];
    }
}
