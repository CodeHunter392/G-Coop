<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LigneProgramme;
use App\Models\Objectif;
use App\Models\ObjectifLigneProgramme;
use App\Models\Programme;

class LigneProgrammeComponent extends Component
{
    public $search = '';
    public $tutelles;

    public $perPage = 10;
    public  $liste_LigneProgramme;
    public  $ajouter_LigneProgramme;
    public  $modifier_LigneProgramme;
    public  $supprimer_LigneProgramme;
    public  $detailler_LigneProgramme;
    public  $detail_LigneProgramme;

    public  $newObjectifs  = [];
    public  $echeance;
    public  $objectif;
    public  $editObjectifs  = [];
    public  $edit_echeance;
    public  $edit_objectif;

    public  $newLigneProgramme = [];
    public  $editLigneProgramme = [];
    protected $updatesQueryString = ['search', 'type', 'perPage'];


    public function mount()
    {
        $this->liste_LigneProgramme = true;
        $this->ajouter_LigneProgramme = false;
        $this->modifier_LigneProgramme = false;
        $this->supprimer_LigneProgramme = false;
        $this->detailler_LigneProgramme = false;
        $this->objectif = '';
        $this->echeance = '';
        //$this->detail_LigneProgramme = LigneProgramme::find(3);
    }
    public function render()
    {


        $query = LigneProgramme::query();

        if ($this->search) {
            $query->where('nom', 'like', '%' . $this->search . '%');
        }
        $LigneProgrammes = $query->paginate($this->perPage);
        return view('livewire.ligneprogramme.index', [
            'ligneProgrammes' => $LigneProgrammes,
        ])->extends('layouts2.master')->section('content');
    }

    public function updateView($param, $id)
    {
        $LigneProgramme = LigneProgramme::find($id);
        //$objectifLigne = $LigneProgramme->objectifs;

        //dd( $this->editLigneProgramme = $LigneProgramme->toArray());

        switch ($param) {
            case 'ajouter':

                $this->ajouter_LigneProgramme = true;
                $this->liste_LigneProgramme = false;
                $this->modifier_LigneProgramme = false;
                $this->supprimer_LigneProgramme = false;
                break;
            case 'modifier':

                $this->modifier_LigneProgramme = true;
                $this->editLigneProgramme = $LigneProgramme->toArray();
                $this->editObjectifs = $LigneProgramme->objectifs->toArray();
                $this->liste_LigneProgramme = false;
                $this->ajouter_LigneProgramme = false;
                $this->supprimer_LigneProgramme = false;
                break;
            case 'supprimer':
                $this->supprimer_LigneProgramme = false;
                $this->liste_LigneProgramme = true;
                $this->ajouter_LigneProgramme = false;
                $this->modifier_LigneProgramme = false;
                $this->dispatch('confirmMessage', message: ["titre" => $LigneProgramme->libelle, "LigneProgramme_id" => $LigneProgramme->id]);
                break;
            case 'detailler':

                $this->detailler_LigneProgramme = true;
                $this->modifier_LigneProgramme = false;
                $this->liste_LigneProgramme = false;
                $this->ajouter_LigneProgramme = false;
                $this->supprimer_LigneProgramme = false;
                $this->detail_LigneProgramme = $LigneProgramme;
                break;
            default:

                $this->liste_LigneProgramme = true;
                $this->ajouter_LigneProgramme = false;
                $this->modifier_LigneProgramme = false;
                $this->supprimer_LigneProgramme = false;
                $this->detailler_LigneProgramme = false;
                $this->reset('newLigneProgramme');
                $this->reset('editLigneProgramme');
                $this->reset('detail_LigneProgramme');
                $this->reset('echeance');
                $this->reset('objectif');
                $this->reset('newObjectifs');
                break;
        }
    }

    public function addObjectifs()
    {

        $this->validate([
            'echeance' => 'required',
            'objectif' => 'required'
        ]);

        $this->newObjectifs[] = [
            'echeance' => $this->echeance,
            'objectif' => $this->objectif
        ];


        // Réinitialiser les champs de saisie
        $this->echeance = '';
        $this->objectif = '';
    }
    public function deleteObjectifs($index)
    {
        unset($this->newObjectifs[$index]);
        $this->newObjectifs = array_values($this->newObjectifs); // Réindexation du tabl
    }
    public function confirmDeleteObjectif($index)
    {
        $this->dispatch('confirmMessage2', message: ['titre' => nameObjectif($this->editObjectifs[$index]['objectif_id']), 'objectifs_id' => $index]);
    }
    public function deleteObjectifss($index)
    {
        $m = $this->editObjectifs[$index]['id'];
        //dd(ObjectifLigneProgramme::find($m));
        unset($this->editObjectifs[$index]);
        $this->editObjectifs = array_values($this->editObjectifs); // Réindexation du tabl
        $confObjectif = ObjectifLigneProgramme::find($m);
        $confObjectif->delete();
    }

    public function addLigneProgramme()
    {
        $this->validate([
            'newLigneProgramme.libelle' => 'required|string',
            'newLigneProgramme.echeance' => 'required',
            'newLigneProgramme.montant' => 'required'


        ]);
        $ligne_prog = LigneProgramme::create($this->newLigneProgramme);

        foreach ($this->newObjectifs as $obj) {
            $objec = Objectif::create([
                'nom' => $obj['objectif']
            ]);

            ObjectifLigneProgramme::create([
                'echeance' => $obj['echeance'],
                'objectif_id' => $objec->id,
                'ligne_programme_id' => $ligne_prog->id,
            ]);
        }

        $this->dispatch('showSuccessMessage', message: "La Ligne de Programme a été ajouté avec succès !");
        $this->updateView('liste', 0);
        $this->reset('newLigneProgramme');
        $this->reset('newObjectifs');
    }

    public function updateLigneProgramme()
    {

        $prog = LigneProgramme::find($this->editLigneProgramme['id']);
        $prog->update($this->editLigneProgramme);
        foreach ($this->newObjectifs as $obj) {
            $objec = Objectif::create([
                'nom' => $obj['objectif']
            ]);

            ObjectifLigneProgramme::create([
                'echeance' => $obj['echeance'],
                'objectif_id' => $objec->id,
                'ligne_programme_id' => $this->editLigneProgramme['id'],
            ]);
        }
        $this->dispatch('showSuccessMessage', message: "La Ligne de Programme a été modifié avec succès !");
        $this->updateView('liste', 0);
        $this->reset('editLigneProgramme');
        $this->reset('newObjectifs');
        $this->reset('editObjectifs');
    }
    public function deleteLigneProgramme($id)
    {
        $prog = LigneProgramme::find($id);
        $prog->delete();
        $this->dispatch('showSuccessMessage', message: "La Ligne de Programme a été supprimé avec suucès !");
    }
}
