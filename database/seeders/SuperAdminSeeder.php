<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Ian Okonu',
            'email' => 'ianyakundi015@gmail.com',
            'password' => Hash::make('password')
        ]);

        $superAdmin->assignRole('Super Admin');

        $admin = User::create([
            'name' => 'Hub Admin',
            'email' => 'foundershubafrica@gmail.com',
            'password' => Hash::make('password')
        ]);

        $admin->assignRole('Admin');

        $manager = User::create([
            'name' => 'Hub Manager',
            'email' => 'okonuian@gmail.com',
            'password' => Hash::make('password')
        ]);

        $manager->assignRole('Manager');

    }
}
