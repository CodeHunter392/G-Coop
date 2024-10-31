<?php

namespace App\Livewire;

use App\Models\Projet;
use Livewire\Component;

class ProjetComponent extends Component
{
    public $search = '';
    public $organismes = '';
    public $perPage = 10;
    public function render()
    {
        //dd(Projet::select('organisme_id')->distinct()->pluck('organisme_id'));
        $query = Projet::query();

        if ($this->search) {
            $query->where('nom', 'like', '%' . $this->search . '%');
        }

        if ($this->organismes) {
            $query->where('organisme_id', $this->organismes);
        }

        $projets = $query->paginate($this->perPage);

        return view('livewire.projet.index',
         [
            'projets' => $projets,
            'types' => Projet::select('organisme_id')->distinct()->pluck('organisme_id')
         ]
        )->extends('layouts2.master')->section('content');
    }
    public function nomOrganisation($id){
        return Projet::find($id)->organisme->nom;
    }
}
