<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'admin',
            'get_user',
            'post_user',
            'put_user',
            'delete_user',
            'get_rol',
            'post_rol',
            'put_rol',
            'delete_rol',
            'get_dog',
            'post_dog',
            'put_dog',
            'delete_dog',
            'get_dog_breed',
            'post_dog_breed',
            'put_dog_breed',
            'delete_dog_breed',
        ];

        foreach ($permissions as $ind => $permission) {
            Permission::create([
                'id' => $ind + 1,
                'name' => $permission,
            ]);
        }
    }
}
