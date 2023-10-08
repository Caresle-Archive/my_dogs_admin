<?php

namespace Database\Seeders;

use App\Models\RolHasPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RolHasPermission::create([
            'id' => 1,
            'rol_id' => 1,
            'permission_id' => 1,
        ]);
    }
}
