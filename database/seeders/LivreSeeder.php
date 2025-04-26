<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;
use App\Models\Auteur;
use App\Models\Categorie;

class LivreSeeder extends Seeder
{
    public function run()
    {
        $livres = [
            [
                'titre' => 'Les Misérables',
                'annee_publication' => 1862,
                'nombre_pages' => 1463,
                'auteur_id' => 1, // Victor Hugo
            ],
            [
                'titre' => 'Le Comte de Monte-Cristo',
                'annee_publication' => 1844,
                'nombre_pages' => 1200,
                'auteur_id' => 2, // Alexandre Dumas
            ],
            [
                'titre' => 'Harry Potter à l\'école des sorciers',
                'annee_publication' => 1997,
                'nombre_pages' => 320,
                'auteur_id' => 3, // J.K. Rowling
            ],
            [
                'titre' => 'Le Seigneur des Anneaux',
                'annee_publication' => 1954,
                'nombre_pages' => 1000,
                'auteur_id' => 4, // J.R.R. Tolkien
            ],
            [
                'titre' => '1984',
                'annee_publication' => 1949,
                'nombre_pages' => 328,
                'auteur_id' => 5, // George Orwell
            ],
        ];

        foreach ($livres as $livre) {
            Livre::create($livre);
        }
    }
}
