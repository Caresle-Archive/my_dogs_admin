<?php

namespace Database\Seeders;

use App\Models\RoleHasPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleHasPermission::create([
            'id' => 1,
            'role_id' => 1,
            'permission_id' => 1,
        ]);
    }
}
