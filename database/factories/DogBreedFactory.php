<?php

namespace Database\Factories;

use App\Models\DogBreed;
use Illuminate\Database\Eloquent\Factories\Factory;

class DogBreedFactory extends Factory
{

    protected $model = DogBreed::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
