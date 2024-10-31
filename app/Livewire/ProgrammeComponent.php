<?php

namespace App\Livewire;

use App\Models\Organisme;
use App\Models\Programme;
use App\Models\ProgrammeOrganisme;
use Livewire\Component;

class ProgrammeComponent extends Component
{
    public $search = '';
    public $tutelles ;

    public $perPage = 10;
    public  $liste_programme;
    public  $ajouter_programme;
    public  $modifier_programme;
    public  $supprimer_programme;
    public  $detailler_programme;
    public  $detail_programme;
    public  $newProgramme = [];
    public  $editProgramme = [];

    public  $newFinances  = [];
    public  $organisme;
    public  $montant;
    public  $editFinances  = [];
    public  $edit_organisme;
    public  $edit_montant;

    protected $updatesQueryString = ['search', 'type', 'perPage'];


    public function mount()
    {
        $this->liste_programme = true;
        $this->ajouter_programme = false;
        $this->modifier_programme = false;
        $this->supprimer_programme = false;
        $this->detailler_programme = false;
        $this->tutelles = Organisme::all();

        //$this->detail_programme = programme::find(3);
    }

    public function render()
    {
        // $prog= Programme::find(1);
        // dd($prog->tutelleNom->nom);
       
        $query = Programme::query();

        if ($this->search) {
            $query->where('nom', 'like', '%' . $this->search . '%');
        }



        $programmes = $query->paginate($this->perPage);
        return view('livewire.programme.index',[
            'programmes' => $programmes,
        ])->extends('layouts2.master')->section('content');
    }
    public function addFinance()
    {

        $this->validate([
            'organisme' => 'required',
            'montant' => 'required'
        ]);

        $this->newFinances[] = [
            'organisme' => $this->organisme,
            'montant' => $this->montant
        ];


        // Réinitialiser les champs de saisie
        $this->montant = '';
        $this->organisme = '';
    }
    public function deleteObjectifs($index)
    {
        unset($this->newFinances[$index]);
        $this->newFinances = array_values($this->newFinances); // Réindexation du tabl
    }
    public function updateView($param, $id)
    {
        $programme = programme::find($id);

        //dd( $this->editprogramme = $programme->toArray());

        switch ($param) {
            case 'ajouter':

                $this->ajouter_programme = true;
                $this->liste_programme = false;
                $this->modifier_programme = false;
                $this->supprimer_programme = false;
                break;
            case 'modifier':

                $this->modifier_programme = true;
                $this->editProgramme = $programme->toArray();
                $this->liste_programme = false;
                $this->ajouter_programme = false;
                $this->supprimer_programme = false;
                break;
            case 'supprimer':
                $this->supprimer_programme = false;
                $this->liste_programme = true;
                $this->ajouter_programme = false;
                $this->modifier_programme = false;
                $this->dispatch('confirmMessage', message: ["titre" => $programme->nom, "programme_id" => $programme->id]);
                break;
            case 'detailler':

                $this->detailler_programme = true;
                $this->modifier_programme = false;
                $this->liste_programme = false;
                $this->ajouter_programme = false;
                $this->supprimer_programme = false;
                $this->detail_programme = $programme;
                break;
            default:

                $this->liste_programme = true;
                $this->ajouter_programme = false;
                $this->modifier_programme = false;
                $this->supprimer_programme = false;
                $this->detailler_programme = false;
                $this->reset('newProgramme');
                $this->reset('editProgramme');
                $this->reset('detail_programme');
                break;
        }
    }
    public function addProgramme(){
    $this->validate([
        'newProgramme.nom' => 'required|string',
        'newProgramme.date_debut' => 'required|date',
        'newProgramme.date_fin' => 'required|date',
        'newProgramme.montant' => 'required',
        'newProgramme.tutelle' => 'required',

     ]);
     $programme = programme::create($this->newProgramme);
     foreach ($this->newFinances as $fina) {
        ProgrammeOrganisme::create([
            'programme_id' => $programme->id,
            'organisme_id' => $fina['organisme'],
            'montant_organisme' => $fina['montant'],
        ]);


    }
     $this->dispatch('showSuccessMessage', message: "Le programme a été ajouté avec succès !");
     $this->reset();
     $this->updateView('liste', 0);


    }

    public function updateProgramme(){
        $prog = Programme::find($this->editProgramme['id']);
        $prog->update($this->editProgramme);
        $this->dispatch('showSuccessMessage', message: "Le programme a été modifié avec succès !");
        $this->updateView('liste', 0);
        $this->reset('editProgramme');

    }
    public function deleteProgramme($id){
        $prog = Programme::find($id);
        $prog->delete();
        $this->dispatch('showSuccessMessage', message: "Le programme a été supprimé avec suucès !");

    }
}
