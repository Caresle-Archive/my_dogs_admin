<?php

namespace Database\Seeders;

use App\Models\DogBreed;
use Illuminate\Database\Seeder;

class DogBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DogBreed::factory()->count(20)->create();
    }
}
