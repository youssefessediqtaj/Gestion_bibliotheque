<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auteur;

class AuteurSeeder extends Seeder
{
    public function run()
    {
        $auteurs = [
            [
                'nom' => 'Hugo',
                'prenom' => 'Victor',
            ],
            [
                'nom' => 'Dumas',
                'prenom' => 'Alexandre',
            ],
            [
                'nom' => 'Rowling',
                'prenom' => 'J.K.',
            ],
            [
                'nom' => 'Tolkien',
                'prenom' => 'J.R.R.',
            ],
            [
                'nom' => 'Orwell',
                'prenom' => 'George',
            ],
        ];

        foreach ($auteurs as $auteur) {
            Auteur::create($auteur);
        }
    }
}
