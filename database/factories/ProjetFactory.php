<?php

namespace Database\Factories;

use App\Models\Projet;
use App\Models\Organisme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projet>
 */
class ProjetFactory extends Factory
{
    protected $model = Projet::class;

    public function definition()
    {
        return [
            'organisme_id' => Organisme::factory(),
            'nom' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date_debut' => $this->faker->date,
            'date_fin' => $this->faker->date,
            'budget' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}
