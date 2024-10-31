<?php

namespace Database\Factories;

use App\Models\Projet;
use App\Models\Activite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activite>
 */
class ActiviteFactory extends Factory
{
    protected $model = Activite::class;

    public function definition()
    {
        return [
            'projet_id' => Projet::factory(),
            'nom' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->date,
            'responsable' => $this->faker->name,
        ];
    }
}
