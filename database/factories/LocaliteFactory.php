<?php

namespace Database\Factories;

use App\Models\Localite;
use App\Models\NiveauLocalite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localite>
 */
class LocaliteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Localite::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->city,  // Nom de la localité, par exemple, une ville ou un village
            'id_parent' => null,  // Vous pouvez initialement laisser ceci à null ou le configurer après en fonction de la hiérarchie
            'niveau_id' => NiveauLocalite::factory(),  // Associe la localité à un niveau de localité
        ];
    }
}
