<?php

namespace Database\Factories;

use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secteur>
 */
class SecteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Secteur::class;

    public function definition()
    {
        $secteurs = [
            'Agriculture',
            'Artisanat',
            'Pêche',
            'Services',
            'Énergie',
            'Tourisme',
            'Agroalimentaire',
            'Commerce',
            'Construction',
            'Environnement',
        ];

        return [
            'nom' => $this->faker->unique()->randomElement($secteurs),
        ];
    }
}
