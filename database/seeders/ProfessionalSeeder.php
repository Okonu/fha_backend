<?php

namespace Database\Seeders;

use App\Models\Registration\Professional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Professional::factory(10)->create();
    }
}
