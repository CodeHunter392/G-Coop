<?php

namespace App\Livewire;

use App\Models\Prof;
use App\Models\Classe;
use App\Models\NStage;
use App\Models\estJury;
use Livewire\Component;
use App\Models\NFiliere;
use App\Models\Soutenance;

class SoutenanceComponent extends Component
{
    public $currentPage = PAGELIST;
    public $search = "";
    public $stageid = "3";
    public $date_soutenance = "";
    public $editdate_soutenance = "";
    public $membre1 = [];
    public $editmembre1 = [];
    public $membre2 = [];
    public $editmembre2 = [];
    public $membre3 = [];
    public $editmembre3 = [];
    // public $filierefiltre1 = 2 ;

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [

                'editdate_soutenance' => 'required',
                'editmembre1.prof_id' => 'required',
                'editmembre1.estPresident' => '',
                'editmembre1.stage_id' => '',
                'editmembre2.prof_id' => 'required',
                'editmembre2.estPresident' => '',
                'editmembre2.stage_id' => '',
                'editmembre3.prof_id' => 'required',
                'editmembre3.estPresident' => '',
                'editmembre3.stage_id' => ''

            ];
        }
        return [

            'date_soutenance' => 'required',
            'membre1.prof_id' => 'required',
            'membre1.estPresident' => '',
            'membre1.stage_id' => '',

            'membre2.prof_id' => 'required',
            'membre2.estPresident' => '',
            'membre2.stage_id' => '',

            'membre3.prof_id' => 'required',
            'membre3.estPresident' => '',
            'membre3.stage_id' => ''



        ];
    }
    public function render()
    {

        //dd($stage = NStage::find(3));
        // dd($stage->membre_jury($stage->id));
        $searchCriteria = "%" . $this->search . "%";

        return view(
            'livewire.soutenance.index',
            [
                "stages" => NStage::where("sujet", "like", $searchCriteria)->get(),
                "profs" => Prof::all(),
                //"filieres" => NFiliere::all(),
                // "classes" => Classe::where('classe_filiere_id','=',$this->filierefiltre1)->get(),
                "soutenance" => Soutenance::all(),
                "lestage" => NStage::find($this->stageid),
                "membrejury" => estJury::all()
            ]

        )->extends('layouts.master')->section('content');
    }

    public function goToAddSoutenance()
    {
        $this->currentPage = PAGECREATEFORM;
    }
    public function addSoutenance()
    {
        $this->membre1['estPresident'] = "0";
        $this->membre1['stage_id'] = $this->stageid;
        $this->membre2['estPresident'] = "0";
        $this->membre2['stage_id'] = $this->stageid;
        $this->membre3['estPresident'] = "1";
        $this->membre3['stage_id'] = $this->stageid;
        $validateAttributes = $this->validate();
        //dd($validateAttributes['membre3']);

        //dd("bonjour");
        estJury::create($validateAttributes["membre1"]);
        estJury::create($validateAttributes["membre2"]);
        estJury::create($validateAttributes["membre3"]);
        $newDateSoutenance = NStage::find($this->stageid);
        $newDateSoutenance->date_soutenance = $this->date_soutenance;
        $newDateSoutenance->save();

        $this->dispatch('showSuccessMessage', message: "La soutenance a été planifiée avec succès !");
        $this->membre1 = [];
        $this->membre2 = [];
        $this->membre2 = [];
        $this->currentPage = PAGELIST;
    }
    public function goToEdit($id)
    {
        $this->stageid = "$id";
        $this->currentPage = PAGEEDITFORM;
    }
    public function updateSoutenance()
    {
        $this->editmembre1['estPresident'] = "0";
        $this->editmembre1['stage_id'] = $this->stageid;
        $this->editmembre2['estPresident'] = "0";
        $this->editmembre2['stage_id'] = $this->stageid;
        $this->editmembre3['estPresident'] = "1";
        $this->editmembre3['stage_id'] = $this->stageid;
        $validateAttributes = $this->validate();
        $newDateSoutenance = NStage::find($this->stageid);
        $newDateSoutenance->date_soutenance = $validateAttributes["editdate_soutenance"];
        $newDateSoutenance->save();
        $juges = estJury::where('stage_id', $this->stageid)->get();
        if(empty($juges)){
            dd('tableau vide');
        }else{
        foreach ($juges as $j) {
            $j->delete();
        }
        }

        estJury::create($validateAttributes["editmembre1"]);
        estJury::create($validateAttributes["editmembre2"]);
        estJury::create($validateAttributes["editmembre3"]);




        $this->dispatch('showSuccessMessage', message: "Les modifications ont été effectuées avec succès !");
        $this->editmembre1 = [];
        $this->editmembre2 = [];
        $this->editmembre2 = [];
        $this->currentPage = PAGELIST;
    }
    public function goToListSoutenance()
    {
        $this->currentPage = PAGELIST;
    }
}
