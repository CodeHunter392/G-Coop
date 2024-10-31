<?php

namespace Database\Factories;

use App\Models\Secteur;
use App\Models\Localite;
use App\Models\TypeCoop;
use App\Models\Cooperative;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cooperative>
 */
class CooperativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cooperative::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->company, // Nom de la coopérative
            'secteur_id' => $this->faker->numberBetween(1, 10),// Associe la coopérative à un secteur
            'nb_adherant' => $this->faker->numberBetween(10, 1000), // Nombre aléatoire d'adhérents
            'date_creation' => $this->faker->date(), // Date de création aléatoire
            'date_fin_activite' => $this->faker->date(), // Date de fin d'activité, optionnelle
            'type_coop' => $this->faker->numberBetween(1, 7), // Associe la coopérative à un type de coopérative
            'localite_id' =>$this->faker->numberBetween(1, 20), // Associe la coopérative à une localité
            'adresse' => $this->faker->address, // Adresse aléatoire
            'statut' => $this->faker->numberBetween(0, 1), // Statut aléatoire
        ];
    }
}
