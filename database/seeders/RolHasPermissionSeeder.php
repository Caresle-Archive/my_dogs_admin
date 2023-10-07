<?php

namespace Database\Seeders;

use App\Models\RolHasPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RolHasPermission::create([
            'rol_id' => 1,
            'permission_id' => 1,
        ]);
    }
}
