<?php

namespace App\Livewire;

use App\Models\Localite;
use App\Models\Secteur;
use App\Models\TypeCoop;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $types;
    public $secteurs;
    public $localites;
    public $newCoop = [];
    public $newCoopBureau = [];
    public $newCoopBureau1 = [];

    public function mount(){
        $this->types = TypeCoop::all();
        $this->secteurs = Secteur::all();
        $this->localites = Localite::all();
    }
    public function render()
    {
        return view('livewire.inscription.index')->extends('layoutsWelcome.master')->section('content');
    }
    public function addCoop(){
        dd($this->newCoop,$this->newCoopBureau,$this->newCoopBureau1);
    }
}
