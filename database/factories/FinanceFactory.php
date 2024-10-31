<?php

namespace Database\Factories;

use App\Models\Finance;
use App\Models\Organisme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Finance>
 */
class FinanceFactory extends Factory
{protected $model = Finance::class;

    public function definition()
    {
        return [
            'organisme_id' => Organisme::factory(),
            'type' => $this->faker->randomElement(['revenu', 'dépense']),
            'montant' => $this->faker->randomFloat(2, 100, 10000),
            'date_transaction' => $this->faker->date,
            'description' => $this->faker->sentence,
        ];
    }
}
