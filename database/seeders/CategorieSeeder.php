<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nom' => 'Roman'],
            ['nom' => 'Science-Fiction'],
            ['nom' => 'Fantastique'],
            ['nom' => 'Policier'],
            ['nom' => 'Biographie'],
            ['nom' => 'Histoire'],
            ['nom' => 'Philosophie'],
            ['nom' => 'Poésie'],
            ['nom' => 'Théâtre'],
            ['nom' => 'Jeunesse'],
        ];

        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }
    }
} 