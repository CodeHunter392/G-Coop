<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Secteur;
use Livewire\Component;
use App\Models\Localite;
use App\Models\BureauCoop;
use App\Models\Cooperative;
use App\Models\MembreBureau;
use Livewire\WithPagination;
use App\Mail\BureauMembreMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CooperativeAdminComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $type = '';
    public $secteur = '';
    public $perPage = 15;

    public $password;
    public $password_confirmation;

    public $localites;
    public  $liste_Cooperative;
    public  $ajouter_Cooperative;
    public  $modifier_Cooperative;
    public  $supprimer_Cooperative;
    public  $detailler_Cooperative;
    public  $detail_Cooperative;
    public  $newCooperative = [];
    public  $editCooperative = [];
    public $newBureau = [];
    public $editBureau = [];
    public $newMembreBureau1 = [];
    public $editMembreBureau1 = [];
    public $newMembreBureau2 = [];
    public $editMembreBureau2 = [];
    protected $updatesQueryString = ['search', 'type_id', 'perPage'];


    public function mount()
    {
        $this->liste_Cooperative = true;
        $this->ajouter_Cooperative = false;
        $this->modifier_Cooperative = false;
        $this->supprimer_Cooperative = false;
        $this->detailler_Cooperative = false;
        $this->localites = Localite::all();
        //$this->detail_Cooperative = Cooperative::find(3);
    }
    public function render()
    {
        //$pp = Cooperative::find(13);
        //dd($pp->bureau->membres);
          //dd( $this->detail_Cooperative->finances->where('type','depense')->sum('montant'));
          $query = Cooperative::query();

          if ($this->search) {
              $query->where('nom', 'like', '%' . $this->search . '%');
          }

          if ($this->type) {
              $query->where('type_coop', $this->type);
          }
          if ($this->secteur) {
            $query->where('secteur_id', $this->secteur);
        }

          $cooperatives = $query->paginate($this->perPage);
        return view('livewire.cooperativeAdmin.index',
         [
            'cooperatives' => $cooperatives,
            'types' => Cooperative::select('type_coop')->distinct()->pluck('type_coop'),
            'secteurs' => Cooperative::select('secteur_id')->distinct()->pluck('secteur_id')
        ])
        ->extends('layouts2.master')
        ->section('content');
    }
    public function updateView($param, $id)
    {
        $cooperative = Cooperative::find($id);


        //dd( $this->editCooperative = $Cooperative->toArray());

        switch ($param) {
            case 'ajouter':

                $this->ajouter_Cooperative = true;
                $this->liste_Cooperative = false;
                $this->modifier_Cooperative = false;
                $this->supprimer_Cooperative = false;
                break;
            case 'modifier':

                $this->modifier_Cooperative = true;
                $this->editCooperative = $cooperative->toArray();
                $this->editBureau = $cooperative->Bureau->toArray();
                $this->editMembreBureau1 = $cooperative->bureau->membres[0]->toArray();
                $this->editMembreBureau1['email'] = findUserEmail( $this->editMembreBureau1['user_id']) ;
                $this->editMembreBureau2 = $cooperative->bureau->membres[1]->toArray();
                $this->editMembreBureau2['email'] = findUserEmail( $this->editMembreBureau2['user_id']) ;
                $this->liste_Cooperative = false;
                $this->ajouter_Cooperative = false;
                $this->supprimer_Cooperative = false;
                break;
            case 'supprimer':
                $this->supprimer_Cooperative = false;
                $this->liste_Cooperative = true;
                $this->ajouter_Cooperative = false;
                $this->modifier_Cooperative = false;
                $this->dispatch('confirmMessage', message: ["titre" => $cooperative->nom, "Cooperative_id" => $cooperative->id]);
                break;
            case 'detailler':

                $this->detailler_Cooperative = true;
                $this->modifier_Cooperative = false;
                $this->liste_Cooperative = false;
                $this->ajouter_Cooperative = false;
                $this->supprimer_Cooperative = false;
                $this->detail_Cooperative = $cooperative;
                break;
            default:

                $this->liste_Cooperative = true;
                $this->ajouter_Cooperative = false;
                $this->modifier_Cooperative = false;
                $this->supprimer_Cooperative = false;
                $this->detailler_Cooperative = false;
                $this->reset('newCooperative');
                $this->reset('editCooperative');
                $this->reset('editBureau');
                $this->reset('editMembreBureau1');
                $this->reset('editMembreBureau2');
                $this->reset('detail_Cooperative');
                break;
        }
        // dd($this->editMembreBureau2);
    }
    public function addCooperative(){

      $validateAttributes =  $this->validate([
            'newCooperative.nom' => 'required',
            'newCooperative.secteur_id' => 'required',
            'newCooperative.nb_adherant' => 'required',
            'newCooperative.date_creation' => 'required',
            'newCooperative.date_fin_activite' => 'required',
            'newCooperative.adresse' => 'required',
            'newCooperative.type_coop' => 'required',
            'newCooperative.localite_id' => 'required',
            'newBureau.date_mandant'=>'required',
            'newBureau.date_fin'=>'required',
            'newMembreBureau1.nom'=>'required',
            'newMembreBureau1.poste'=>'required',
            'newMembreBureau1.tel'=>'required',
            'newMembreBureau1.email'=>'required|email',
            'newMembreBureau2.nom'=>'required',
            'newMembreBureau2.poste'=>'required',
            'newMembreBureau2.tel'=>'required',
            'newMembreBureau2.email'=>'required|email',

        ]);



        $coop = Cooperative::create($this->newCooperative);
        $this->newBureau['cooperative_id'] = $coop->id;
        $bureau = BureauCoop::create($this->newBureau);
        $user1 = User::create([
            "name"=>$this->newMembreBureau1['nom'],
            "email"=>$this->newMembreBureau1['email'],
            "password"=>'password'

        ]);
        $user2 = User::create([
            "name"=>$this->newMembreBureau2['nom'],
            "email"=>$this->newMembreBureau2['email'],
            "password"=>'password'

        ]);
        $this->newMembreBureau1['bureau_id'] = $bureau->id;
        $this->newMembreBureau1['user_id'] = $user1->id;
        $this->newMembreBureau2['bureau_id'] = $bureau->id;
        $this->newMembreBureau2['user_id'] = $user2->id;
        MembreBureau::create($this->newMembreBureau1);
        MembreBureau::create($this->newMembreBureau2);

        //envoi de mails pour confirmer la création
        $details1 = [
            'subject' => "Votre coopérative a été ajoutée ",
            'message' => "Un compte utilisateur a été crée pour vous; nom d'utilisateur : $user1->email
            mot de passe : password ",
            'email' => 'nothing',
        ];
        $details2 = [
            'subject' => "Votre coopérative a été ajoutée ",
            'message' => "Un compte utilisateur a été crée pour vous; nom d'utilisateur : $user2->email
            mot de passe : password ",
            'email' => 'nothing',
        ];
        Mail::to("$user1->email")->send(new BureauMembreMail ($details1));
        Mail::to("$user2->email")->send(new BureauMembreMail ($details2));



        $this->dispatch('showSuccessMessage', message: "La cooperative a été ajouté avec succès !");
        $this->reset();
        $this->updateView('liste', 0);
    }
    public function updateCooperative(){


        $coop = Cooperative::find($this->editCooperative['id']);
        $bureau = BureauCoop::find($this->editBureau['id']);
        $user1 = User::find($this->editMembreBureau1['user_id']);
        $user2 = User::find($this->editMembreBureau2['user_id']);
        $membre1 = MembreBureau::find($this->editMembreBureau1['id']);
        $membre2 = MembreBureau::find($this->editMembreBureau2['id']);
        $coop->update($this->editCooperative);
        $bureau->update($this->editBureau);
        $user1->update([
            'name' => $this->editMembreBureau1['nom'],
            'email' => $this->editMembreBureau1['email'],
            'password' => 'password'
        ]);
        $user2->update([
            'name' => $this->editMembreBureau2['nom'],
            'email' => $this->editMembreBureau2['email'],
            'password' => 'password'
        ]);
        $membre1->update($this->editMembreBureau1);
        $membre2->update($this->editMembreBureau2);
        $this->dispatch('showSuccessMessage', message: "La cooperative a été modifié avec suucès !");
        $this->reset();
        $this->updateView('liste', 0);

    }
    public function deleteCooperative($id){
        $coop = Cooperative::find($id);
        $coop->delete();

    }
}
