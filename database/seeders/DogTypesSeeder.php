<?php

namespace Database\Seeders;

use App\Models\DogType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DogTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DogType::factory()->count(20)->create();
    }
}
