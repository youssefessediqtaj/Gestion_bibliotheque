<?php

namespace Database\Seeders;

use App\Models\Emprunt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 30 loans
        Emprunt::factory()->count(30)->create();
    }
}
