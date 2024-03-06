<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-founder',
            'edit-founder',
            'delete-founder',
            'create-investor',
            'edit-investor',
            'delete-investor',
            'create-professional',
            'edit-professional',
            'delete-professional',
        ]);

        $manager->givePermissionTo([
            'edit-user',
            'edit-founder',
            'edit-investor',
            'edit-professional',
        ]);
    }
}
