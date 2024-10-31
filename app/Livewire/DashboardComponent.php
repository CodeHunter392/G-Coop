<?php

namespace App\Livewire;

use App\Models\Membre;
use App\Models\Projet;
use App\Models\Finance;
use Livewire\Component;
use App\Models\Activite;
use App\Models\Organisme;
use App\Models\Programme;
use App\Models\Cooperative;
use Illuminate\Support\Facades\DB;

class DashboardComponent extends Component
{
    // public $nombre_orga;
    // //public $nombre_membre;
    // public $nombre_projet;
    // public $nombre_activi;
    // public $revenusParOrganisme;
    // public $depensesParOrganisme;
    // public $balanceParOrganisme;
    // public $organismesParType;
    // public $datastotal;
    public $nombre_coop;
    public $nombre_coop_fem;
    public $nombre_coop_adhe;
    public $testData;
    public $testData2;
    public $testData3;
    public $programmeNom;
    public $regionn;
    public $programmes;
    public $nombre_programmes;
    public $nombre_programmes_encours;
    public $cooperatives;
    public $cooperativesLocalite;
    public $cooperativesNom;
    public $cooperativeParSecteur;

    public $nomVille;
    public $showModal;
    public $departement;
    //protected $listeners = ['regionSelected'];
    public function regionSelected($regionName)
    {
        // Charger les données de la région sélectionnée depuis la base de données
         $this->regionn = $regionName;

        // Vous pouvez également déclencher l'ouverture du modal ici si nécessaire
    }
    public function mount()
    {


        $this->testData = [4,3,14,7,8,1,0,11,9,8,7,3];
        $this->testData2 = [147,865,1488];
        $this->testData3 = [47,88,23];
       // $this->region = 'daKar';
        $this->nombre_coop = Cooperative::count();
        $this->nombre_programmes = Programme::count();
        $this->nombre_coop_adhe = Cooperative::sum('nb_adherant');
        $this->nombre_coop_fem = Cooperative::where('type_coop','=',2)->count();
        $this->nombre_programmes_encours = Programme::where('statut','=',1)->count();
        $this->programmes = Programme::where('statut','=',1)->get();
        $this->programmeNom = $this->programmes->pluck('nom')->toArray();
        $this->cooperatives = Cooperative::where('statut','=',1)->get();
        $this->cooperativesLocalite = Cooperative::where('localite_id','=',1)->get();
        $this->cooperativesNom = $this->cooperativesLocalite->pluck('nom')->toArray();
        $this->cooperativeParSecteur = Cooperative::select('secteur_id', DB::raw('count(*) as total'))
            ->where('localite_id','=',1)
            ->groupBy('secteur_id')
            ->with('secteur:id,nom')
             ->get();
        //$this->cooperativeParSecteur = Cooperative::select('secteur_id')->where('localite_id','=',1)->groupBy('secteur_id')->with('secteur:id,nom')->get();
       // dd( $this->cooperativeParSecteur);
            // ->where('type', 'revenu')
            // ->groupBy('organisme_id')
            // ->with('organisme:id,nom') // Récupère les noms des organismes
            // ->get();
       // $this->nombre_orga = Organisme::count();
        //$this->nombre_membre = Membre::count();
        //$this->nombre_projet = Projet::where('date_fin', '>=', now())->count();
        //$this->nombre_activi = Activite::count();
        //$this->organismesParType = Organisme::select('type', DB::raw('count(*) as total'))
            // ->groupBy('type')
            // ->get();
        // $this->revenusParOrganisme = Finance::select('organisme_id', DB::raw('SUM(montant) as total_revenus'))
        //     ->where('type', 'revenu')
        //     ->groupBy('organisme_id')
        //     ->with('organisme:id,nom') // Récupère les noms des organismes
        //     ->get();
        // $this->depensesParOrganisme = Finance::select('organisme_id', DB::raw('SUM(montant) as total_depenses'))
        //     ->where('type', 'depense')
        //     ->groupBy('organisme_id')
        //     ->with('organisme:id,nom')
        //     ->get();
        // $this->balanceParOrganisme = Organisme::select('id', 'nom')
        // ->withSum(['finances as total_revenus' => function ($query) {
        //     $query->where('type', 'revenu');
        // }], 'montant')
        // ->withSum(['finances as total_depenses' => function ($query) {
        //     $query->where('type', 'dépense');
        // }], 'montant')
        // ->get()
        // ->map(function ($organisme) {
        //     $organisme->balance = $organisme->total_revenus - $organisme->total_depenses;
        //     return $organisme;
        // });

    }


    public function render()
    {
        //dd(Cooperative::sum('nb_adherant'));
       //dd( $this->organismesParType->pluck('total')->toArray());
        return view('livewire.dashboard-component')->extends('layouts2.master')->section('content');
    }
}
