<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BureauCoop;
use App\Models\Cooperative;
use App\Models\MembreBureau;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CooperativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     $cop1 = Cooperative::create([
    //         'nom' => 'Coopérative Al Amal',
    //         'secteur_id' => 2, // Par exemple, supposez que 1 représente un secteur comme "Agriculture"
    //         'nb_adherant' => 50,
    //         'date_creation' => '2005-05-10',
    //         'date_fin_activite' => null,
    //         'type_coop' => 6,
    //         'localite_id' => 1, // ID de la localité
    //         'adresse' => 'Rue de l\'Agriculture, Casablanca',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop1->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop2 = Cooperative::create([
    //         'nom' => 'Coopérative Ennajah',
    //         'secteur_id' => 1, // Par exemple, supposez que 2 représente un secteur comme "Artisanat"
    //         'nb_adherant' => 30,
    //         'date_creation' => '2010-09-15',
    //         'date_fin_activite' => null,
    //         'type_coop' => 7,
    //         'localite_id' => 2, // ID de la localité
    //         'adresse' => 'Avenue des Artisans, Marrakech',
    //         'statut' => 1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop2->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop3 = Cooperative::create([
    //         'nom' => 'Coopérative Al Karama',
    //         'secteur_id' => 1, // Par exemple, supposez que 3 représ
    //         'nb_adherant' => 30,
    //         'date_creation' => '2010-09-15',
    //         'date_fin_activite' => null,
    //         'type_coop' => 7,
    //         'localite_id' => 2, // ID de la localité
    //         'adresse' => 'Avenue des Artisans, Marrakech',
    //         'statut' => 1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop3->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);
    //    $cop4 = Cooperative::create([
    //         'nom' => 'Coopérative Agricole de Casablanca',
    //         'secteur_id' => 2, // Par exemple, supposez que 1 représente "Agriculture"
    //         'nb_adherant' => 50,
    //         'date_creation' => '2005-06-15',
    //         'date_fin_activite' => null,
    //         'type_coop' => 6,
    //         'localite_id' => 1, // ID de la localité, par exemple Casablanca
    //         'adresse' => '123 Rue des Fermiers, Casablanca',
    //         'statut' =>1,
    //     ]);

    //     $cop5 = Cooperative::create([
    //         'nom' => 'Coopérative Artisanale de Marrakech',
    //         'secteur_id' => 5, // Par exemple, supposez que 2 représente "Artisanat"
    //         'nb_adherant' => 30,
    //         'date_creation' => '2010-11-20',
    //         'date_fin_activite' => null,
    //         'type_coop' => 1,
    //         'localite_id' => 2, // ID de la localité, par exemple Marrakech
    //         'adresse' => '456 Avenue de l’Artisanat, Marrakech',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop5->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop6 = Cooperative::create([
    //         'nom' => 'Association Santé pour Tous',
    //         'secteur_id' => 6, // Par exemple, supposez que 3 représente "Santé"
    //         'nb_adherant' => 20,
    //         'date_creation' => '2018-02-10',
    //         'date_fin_activite' => null,
    //         'type_coop' => 4,
    //         'localite_id' => 2, // ID de la localité, par exemple Rabat
    //         'adresse' => '789 Boulevard de la Santé, Rabat',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop6->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop7 = Cooperative::create([
    //         'nom' => 'Association Éducateurs du Maroc',
    //         'secteur_id' => 7, // Par exemple, supposez que 4 représente "Éducation"
    //         'nb_adherant' => 100,
    //         'date_creation' => '2015-04-25',
    //         'date_fin_activite' => null,
    //         'type_coop' => 1,
    //         'localite_id' => 4, // ID de la localité, par exemple Fès
    //         'adresse' => '321 Route des Écoles, Fès',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop7->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop8 = Cooperative::create([
    //         'nom' => 'Association Environnement et Avenir',
    //         'secteur_id' => 5, // Par exemple, supposez que 5 représente "Environnement"
    //         'nb_adherant' => 25,
    //         'date_creation' => '2020-09-01',
    //         'date_fin_activite' => null,
    //         'type_coop' => 3,
    //         'localite_id' => 5, // ID de la localité, par exemple Agadir
    //         'adresse' => '654 Rue de l’Écologie, Agadir',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop8->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop9 = Cooperative::create([
    //         'nom' => 'Association Culturelle Tangéroise',
    //         'secteur_id' => 6, // Par exemple, supposez que 6 représente "Culture"
    //         'nb_adherant' => 40,
    //         'date_creation' => '2012-07-14',
    //         'date_fin_activite' => null,
    //         'type_coop' => 6,
    //         'localite_id' => 6, // ID de la localité, par exemple Tanger
    //         'adresse' => '987 Rue de la Culture, Tanger',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop9->id,
    //         'date_mandant'=> '2024-08-13',
    //         'date_fin'=> '2024-08-13',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop10 = Cooperative::create([
    //         'nom' => 'Association Sociale et Solidaire',
    //         'secteur_id' => 7, // Par exemple, supposez que 7 représente "Social"
    //         'nb_adherant' => 15,
    //         'date_creation' => '2017-03-08',
    //         'date_fin_activite' => '2023-03-08',
    //         'type_coop' => 7,
    //         'localite_id' => 7, // ID de la localité, par exemple Oujda
    //         'adresse' => '135 Boulevard Social, Oujda',
    //         'statut' => 0,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop10->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-12-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop11 = Cooperative::create([
    //         'nom' => 'Coopérative Touristique d’Essaouira',
    //         'secteur_id' => 8, // Par exemple, supposez que 8 représente "Tourisme"
    //         'nb_adherant' => 60,
    //         'date_creation' => '2019-10-05',
    //         'date_fin_activite' => null,
    //         'type_coop' => 4,
    //         'localite_id' => 8, // ID de la localité, par exemple Essaouira
    //         'adresse' => '246 Rue du Tourisme, Essaouira',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop11->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop12 = Cooperative::create([
    //         'nom' => 'Coopérative du Commerce de Kenitra',
    //         'secteur_id' => 9, // Par exemple, supposez que 9 représente "Commerce"
    //         'nb_adherant' => 80,
    //         'date_creation' => '2008-12-20',
    //         'date_fin_activite' => null,
    //         'type_coop' => 2,
    //         'localite_id' => 9, // ID de la localité, par exemple Kenitra
    //         'adresse' => '369 Avenue du Commerce, Kenitra',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop12->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    //     $cop13 = Cooperative::create([
    //         'nom' => 'Association Technologique de Casablanca',
    //         'secteur_id' => 10, // Par exemple, supposez que 10 représente "Technologie"
    //         'nb_adherant' => 35,
    //         'date_creation' => '2021-05-15',
    //         'date_fin_activite' => null,
    //         'type_coop' => 5,
    //         'localite_id' => 1, // ID de la localité, par exemple Casablanca
    //         'adresse' => '852 Route de la Technologie, Casablanca',
    //         'statut' =>1,
    //     ]);
    //     BureauCoop::create([
    //         'cooperative_id' => $cop12->id,
    //         'date_mandant'=> '2024-10-10',
    //         'date_fin'=> '2024-9-10',
    //         'en_cours'=> 1,
    //     ]);

    $bureaus = BureauCoop::all();
    foreach ($bureaus as $bureau){
        for ($i = 1; $i <= 12; $i++){
            $user1 = User::find($i);
            $user2 = User::find($i+1);
            MembreBureau::create([
                'bureau_id' => $bureau->id,
                'nom' => $user1->name,
                'poste' => 'president',
                'tel' => '0000000000',
                'user_id' => $user1->id
            ]);
            MembreBureau::create([
                'bureau_id' => $bureau->id,
                'nom' => $user2->name,
                'poste' => 'president',
                'tel' => '0000000000',
                'user_id' => $user2->id
            ]);
            break;


        }




    }

    }
}
