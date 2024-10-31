<?php

namespace Database\Factories;

use App\Models\MembreBureau;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MembreBureau>
 */
class MembreBureauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = MembreBureau::class;

     public function definition()
     {
         return [
             'bureau_id' => \App\Models\BureauCoop::factory(),
             'nom' => $this->faker->name,
             'poste' => $this->faker->jobTitle,
             'tel' => $this->faker->phoneNumber,
             'user_id' => \App\Models\User::factory(),
         ];
     }
}
