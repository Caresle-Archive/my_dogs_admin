<?php

namespace Database\Factories;

use App\Models\Dog;
use App\Models\DogBreed;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dog>
 */
class DogFactory extends Factory
{
    protected $model = Dog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'height' => fake()->randomFloat(2, 1, 1000),
            'weight' => fake()->randomFloat(2, 1, 1000),
            'id_dog_type' => function () {
                return DogBreed::factory()->create()->id;
            }
        ];
    }
}
