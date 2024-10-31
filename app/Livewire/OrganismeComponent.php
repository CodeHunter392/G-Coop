<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Organisme;
use Livewire\WithPagination;

class OrganismeComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $type = '';
    public $perPage = 10;

    public  $liste_organisme;
    public  $ajouter_organisme;
    public  $modifier_organisme;
    public  $supprimer_organisme;
    public  $detailler_organisme;
    public  $detail_organisme;
    public  $newOrganisme = [];
    public  $editOrganisme = [];
    protected $updatesQueryString = ['search', 'type', 'perPage'];


    public function mount()
    {
        $this->liste_organisme = true;
        $this->ajouter_organisme = false;
        $this->modifier_organisme = false;
        $this->supprimer_organisme = false;
        $this->detailler_organisme = false;
        //$this->detail_organisme = Organisme::find(3);
    }
    public function render()
    {
        // $organismeqs = Organisme::where('type','=','Ministère')->get();
        // $op = 1;
        // foreach($organismeqs as $item){
        //     $item->nom = "Ministère $op";
        //     $item->save();
        //     $op++;


        // }
        //dd( $this->detail_organisme->finances->where('type','depense')->sum('montant'));
        $query = Organisme::query();

        if ($this->search) {
            $query->where('nom', 'like', '%' . $this->search . '%');
        }

        if ($this->type) {
            $query->where('type', $this->type);
        }

        $organismes = $query->paginate($this->perPage);

        return view('livewire.organisme.index', [
            'organismes' => $organismes,
            'types' => Organisme::select('type')->distinct()->pluck('type')
        ])->extends('layouts2.master')
            ->section('content');
    }
    public function updateView($param, $id)
    {
        $organisme = Organisme::find($id);

        //dd( $this->editOrganisme = $organisme->toArray());

        switch ($param) {
            case 'ajouter':

                $this->ajouter_organisme = true;
                $this->liste_organisme = false;
                $this->modifier_organisme = false;
                $this->supprimer_organisme = false;
                break;
            case 'modifier':

                $this->modifier_organisme = true;
                $this->editOrganisme = $organisme->toArray();
                $this->liste_organisme = false;
                $this->ajouter_organisme = false;
                $this->supprimer_organisme = false;
                break;
            case 'supprimer':
                $this->supprimer_organisme = false;
                $this->liste_organisme = true;
                $this->ajouter_organisme = false;
                $this->modifier_organisme = false;
                $this->dispatch('confirmMessage', message: ["titre" => $organisme->nom, "organisme_id" => $organisme->id]);
                break;
            case 'detailler':

                $this->detailler_organisme = true;
                $this->modifier_organisme = false;
                $this->liste_organisme = false;
                $this->ajouter_organisme = false;
                $this->supprimer_organisme = false;
                $this->detail_organisme = $organisme;
                break;
            default:

                $this->liste_organisme = true;
                $this->ajouter_organisme = false;
                $this->modifier_organisme = false;
                $this->supprimer_organisme = false;
                $this->detailler_organisme = false;
                $this->reset('newOrganisme');
                $this->reset('editOrganisme');
                $this->reset('detail_organisme');
                break;
        }
    }
    public function addOrganisme()
    {
        $this->validate([
            'newOrganisme.nom' => 'required',
            // 'newOrganisme.adresse' => 'required',
            // 'newOrganisme.telephone' => 'required',
            // 'newOrganisme.email' => 'required',
            // 'newOrganisme.date_creation' => 'required',
            'newOrganisme.type' => 'required',
        ]);
        Organisme::create($this->newOrganisme);
        $this->dispatch('showSuccessMessage', message: "L'organisme a été ajouté avec succès !");
        $this->reset('newOrganisme');
        $this->updateView('liste', 0);
    }
    public function modifierOrganisme()
    {

        $organisme = Organisme::find($this->editOrganisme['id']);
        $organisme->update($this->editOrganisme);
        $this->dispatch('showSuccessMessage', message: "L'organisme a été modifié avec succès !");
        $this->reset('editOrganisme');
        $this->updateView('liste', 0);
    }
    public function deleteOrganisme($id)
    {
        $organisme = Organisme::find($id);

        $organisme->delete();
        $this->dispatch('showSuccessMessage', message: "L'organisme a été supprimé !");
    }
}
