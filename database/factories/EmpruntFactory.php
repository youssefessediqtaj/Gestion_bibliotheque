<?php

namespace Database\Factories;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date_emprunt = fake()->dateTimeBetween('-1 year', 'now');
        $date_retour = fake()->dateTimeBetween($date_emprunt, '+1 month');

        return [
            'livre_id' => Livre::factory(),
            'date_emprunt' => $date_emprunt,
            'date_retour' => $date_retour,
        ];
    }
}
