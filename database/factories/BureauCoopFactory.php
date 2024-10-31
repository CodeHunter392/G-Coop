<?php

namespace Database\Factories;

use App\Models\BureauCoop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BureauCoop>
 */
class BureauCoopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BureauCoop::class;

    public function definition()
    {
        return [

            'date_mandant' => $this->faker->date(), // Date de création aléatoire
            'date_fin' => $this->faker->date(), // Date de fin d'activité, optionnelle
            'cooperative_id' => $this->faker->numberBetween(1, 20), // Associe la coopérative à un type de coopérative


            'en_cours' => $this->faker->numberBetween(0, 1), // Statut aléatoire
        ];
    }
}
