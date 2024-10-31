<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Membre;
use App\Models\Projet;
use App\Models\Finance;
use App\Models\Secteur;
use App\Models\Activite;
use App\Models\Adhesion;
use App\Models\BureauCoop;
use App\Models\Localite;
use App\Models\TypeCoop;
use App\Models\Organisme;
use App\Models\Cooperative;
use App\Models\MembreBureau;
use App\Models\NiveauLocalite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        // Créer 10 organismes
        // Organisme::factory(10)->create()->each(function ($organisme) {
        //     // Créer 5 membres par organisme
        //     $membres = Membre::factory(5)->create();

        //     // Créer adhésions pour chaque membre
        //     $membres->each(function ($membre) use ($organisme) {
        //         Adhesion::factory()->create([
        //             'organisme_id' => $organisme->id,
        //             'membre_id' => $membre->id,
        //         ]);
        //     });

        //     // Créer 10 finances par organisme
        //     Finance::factory(10)->create([
        //         'organisme_id' => $organisme->id,
        //     ]);

        //     // Créer 3 projets par organisme
        //     $projets = Projet::factory(3)->create([
        //         'organisme_id' => $organisme->id,
        //     ]);

        //     // Créer 5 activités par projet
        //     $projets->each(function ($projet) {
        //         Activite::factory(5)->create([
        //             'projet_id' => $projet->id,
        //         ]);
        //     });
        // });
       // TypeCoop::factory()->count(7)->create();
        //Secteur::factory()->count(10)->create();
          // Créer des niveaux de localité
    //     $niveaux = NiveauLocalite::factory()->count(5)->create();

    // // Créer des localités associées à ces niveaux
    //     Localite::factory()->count(20)->create([
    //     'niveau_id' => $niveaux->random()->id,
    //      ]);

         //créer des coopératives
         //Cooperative::factory()->count(20)->create();
        //  User::factory()->count(10)->create();
        //  BureauCoop::factory()->count(20)->create();
        //  MembreBureau::factory()->count(20)->create();

    }

}
