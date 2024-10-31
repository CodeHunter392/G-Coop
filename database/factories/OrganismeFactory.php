<?php

namespace Database\Factories;

use App\Models\Organisme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisme>
 */
class OrganismeFactory extends Factory
{
    protected $model = Organisme::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->company,
            'type' => $this->faker->randomElement(['coopérative', 'association', 'entreprise']),
            'date_creation' => $this->faker->date,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
        ];
    }
}
