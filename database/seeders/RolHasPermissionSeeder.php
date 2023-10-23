<?php

namespace Database\Seeders;

use App\Models\RoleHasPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleHasPermission::create([
            'rol_id' => 1,
            'permission_id' => 1,
        ]);
    }
}
