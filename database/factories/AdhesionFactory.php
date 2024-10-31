<?php

namespace Database\Factories;

use App\Models\Membre;
use App\Models\Adhesion;
use App\Models\Organisme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adhesion>
 */
class AdhesionFactory extends Factory
{
    protected $model = Adhesion::class;

    public function definition()
    {
        return [
            'organisme_id' => Organisme::factory(),
            'membre_id' => Membre::factory(),
            'date_adhesion' => $this->faker->date,
            'role' => $this->faker->randomElement(['Président', 'Trésorier', 'Secrétaire']),
        ];
    }
}
