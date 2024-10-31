<?php

namespace Database\Factories;

use App\Models\TypeCoop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeCoop>
 */
class TypeCoopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = TypeCoop::class;

     public function definition()
     {
         $typesCooperatives = [
             'Coopérative Agricole',
             'Coopérative Artisanale',
             'Coopérative de Services',
             'Coopérative Énergétique',
             'Coopérative de Femmes',
             'Coopérative Halieutique',
             'Coopérative de Consommation',
         ];

         return [
             'nom' => $this->faker->unique()->randomElement($typesCooperatives),
         ];
     }
}
