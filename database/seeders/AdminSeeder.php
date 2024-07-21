<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\AdminRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = AdminRole::create(['name' => 'admin']);
        $superAdminRole = AdminRole::create(['name' => 'superadmin']);
        $staffRole = AdminRole::create(['name' => 'staff']);

        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'adminuser@mail.com',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'user_id' => $adminUser->id,
            'admin_role_id' => $adminRole->id,
            'is_active' => true,
        ]);

        $superAdminUser = User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'superadminuser@mail.com',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'user_id' => $superAdminUser->id,
            'admin_role_id' => $superAdminRole->id,
            'is_active' => true,
        ]);

        $staffUser = User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staffuser@mail.com',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'user_id' => $staffUser->id,
            'admin_role_id' => $staffRole->id,
            'is_active' => false,
        ]);
    }
}
