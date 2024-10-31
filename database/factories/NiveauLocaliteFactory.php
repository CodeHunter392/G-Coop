<?php

namespace Database\Factories;

use App\Models\NiveauLocalite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NiveauLocalite>
 */
class NiveauLocaliteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = NiveauLocalite::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,  // Par exemple, "Région", "Province", "Commune"
            'niveau' => $this->faker->unique()->numberBetween(1, 10),  // Niveau hiérarchique entre 1 et 10
        ];
    }
}
