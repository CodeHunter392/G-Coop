<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\NEtudiant;
use App\Models\NFiliere;
use App\Models\Prof;
use App\Models\Stage;
use Livewire\Component;
use App\Models\OffreStage;
use App\Models\NInscription;
use App\Models\NStage;
use App\Models\TuteurEntreprise;
use Illuminate\Support\Facades\DB;

class StageComponent extends Component
{   
    protected $etudianttable ="";
    public $search = "";
    public $filierefiltre1 = 2 ;
    public $classefiltre1 = 3;
    public $currentPage = PAGELIST;
    public $newStage = [];
    public $editStage = [];
    
    
    public $newStage2 = [];
    public $editStage2 = [];
    public $newTuteur = [];
    public $editTuteur = [];
    // public function rules()
    // {
    //     if ($this->currentPage == PAGEEDITFORM) {
    //         return [
             

    //         ];
    //     }
    //     return [
    //         'newStage.sujet' => 'required|min:3',
    //         'newStage.lieu' => 'required|min:3',
    //         'newStage.ins_id' => 'required',
    //         'newStage.cordinateur_id' => 'required',
    //         'newStage.binome_id' => 'required',
    //         'newStage.encadrant_id' => 'required',
    //         'newStage.date_soutenance'=>'required',
    //         'newStage.date_stage'=>'required'

           

    //     ];
    // }
//pour la nouvelle table stage
    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editStage2.sujet' => 'required|min:3',
                'editStage2.entreprise' => 'required|min:3',
                'editStage2.ins_id' => 'required',
                'editStage2.cordinateur_id' => 'required',
                'editStage2.binome_id' => '',
                'editStage2.filiere_id' => '',
                'editStage2.ville' => '',
                'editStage2.encadrant_id' => 'required',
                'editStage2.date_soutenance'=>'',
                'editStage2.date_debut'=>'required',
                'editStage2.date_fin'=>'',
                'editStage2.termine'=>'',
                'editStage2.tuteur_id'=>'required',
                'editTuteur.nom'=>'required|min:3',
                'editTuteur.prenom'=>'required|min:3',
                'editTuteur.email'=>'email',
                'editTuteur.poste'=>'',
                'editTuteur.entreprise'=>''

            ];
        }
        return [
            'newStage2.sujet' => 'required|min:3',
            'newStage2.entreprise' => 'required|min:3',
            'newStage2.ins_id' => 'required',
            'newStage2.cordinateur_id' => 'required',
            'newStage2.binome_id' => '',
            'newStage2.filiere_id' => '',
            'newStage2.ville' => '',
           
            'newStage2.encadrant_id' => 'required',
            'newStage2.date_soutenance'=>'',
            'newStage2.date_debut'=>'required',
            'newStage2.date_fin'=>'',
            'newStage2.termine'=>'',
            'newStage2.tuteur_id'=>'required',
            'newTuteur.nom'=>'required|min:3',
            'newTuteur.prenom'=>'required|min:3',
            'newTuteur.email'=>'email',
            'newTuteur.poste'=>'',
            'newTuteur.entreprise'=>''


           

        ];
    }

    #[On('showSuccessMessage')]
    #[On('confirmMessage')]
    public function render()
    {   
        
        //dd(Classe::where('classe_filiere_id','=',1)->get());
        //dd(NFiliere::find())
        // $ins = NInscription::find(2819);
        // $classe_id = $ins->ins_classe_id;
        // $classe_nom = Classe::where('classe_id',$classe_id)->first()->classe_filiere_id;
        // dd($fili_name = NFiliere::find($classe_nom)->fil_nom);
        // // $stage1 = Stage::find(3);
        // $t = 2819;
        // dd($stage1->nometudiant($stage1->ins_id));
        // $etudiant = NEtudiant::find($inscription->ins_etudiant_id);
        // dd($etudiant);
        // dd($stage1->etudiantnamehelp($stage1->ins_id));
       
        $searchCriteria = "%" . $this->search . "%";
        return view('livewire.stage.index2',[
            
            //"stages" => Stage::where("sujet", "like", $searchCriteria)->get(),
            "stages"=> NStage::where("sujet", "like", $searchCriteria)->get(),
            "inscriptions" => NInscription::where('ins_classe_id','=',$this->classefiltre1)->get(),
            "profs" => Prof::all(),
            "filieres" => NFiliere::all(),
            "classes" => Classe::where('classe_filiere_id','=',$this->filierefiltre1)->get()
            //"NStages"=> NStage::where("sujet", "like", $searchCriteria)->get()
        ])->extends('layouts.master')->section('content');
    }

    //l'ancienne table stage
  
    public function goToAddStage()
    {
        $this->currentPage = PAGECREATEFORM;
    }
    public function addStage()
    {
       $validateAttributes = $this->validate();
        Stage::create($validateAttributes["newStage"]);
        $this->dispatch('showSuccessMessage', message: "Offre de stage créée avec succès !");
        $this->newStage = [];
        $this->currentPage = PAGELIST;
    }
    public function goToListStage()
    {
        $this->currentPage = PAGELIST;
    }
    public function confirmDelete($titre, $id)
    {

        $this->dispatch('confirmMessage', message: ["titre" => $titre, "offre_id" => $id]);
    }
    public function deleteOffre($id)
    {
        OffreStage::destroy($id);
        $this->dispatch('showSuccessMessage', message: "Offre de stage a été supprimé avec succès !");
    }
    public function goToeditStageStage($id)
    {
        $this->editStage = OffreStage::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }
    public function updateOffreStage()
    {

        $validateAttributes = $this->validate();
        OffreStage::find($this->editStage['id'])->update($validateAttributes["editStage"]);
        $this->dispatch('showSuccessMessage', message: "Offre de stage a été mis à jour avec succès !");
    }

//----------------------------------------------------------------------------------------------------------------
    //la nouvelle table NStage
    public function addStage2(){
      
        $i=1;
        $tut_id="$i";
      //  $fil_id= $this->filierefiltre1;
        $this->newStage2["filiere_id"] = "$this->filierefiltre1";
        $ent= $this->newStage2['entreprise'];
        $this->newTuteur["entreprise"] = $ent;
        $this->newStage2["tuteur_id"] = $tut_id;
        $validateAttributes = $this->validate();
        TuteurEntreprise::create($validateAttributes["newTuteur"]);
        //dd($validateAttributes["newStage2"]);
        NStage::create($validateAttributes["newStage2"]);
        $this->dispatch('showSuccessMessage', message: "Le stage a été ajouté avec succès !");
        $this->newStage2 = [];
        $i++;
        $this->currentPage = PAGELIST;
    }
    public function goToEditStage2($id,$tuteur){
        $stage23 = NStage::find($id);
        //dd($stage23);
        $this->editStage2 = NStage::find($id)->toArray();
         //dd($this->editStage2);
        $this->editTuteur = TuteurEntreprise::find($tuteur)->toArray();
        $this->filierefiltre1 = $this->editStage2['filiere_id'];
        $this->classefiltre1 =$stage23->nomclasse($stage23->ins_id);
        $this->currentPage = PAGEEDITFORM;
    }
    public function updateStage2(){
       
       
        $validateAttributes = $this->validate();
        TuteurEntreprise::find($this->editTuteur['id'])->update($validateAttributes["editTuteur"]);
        NStage::find($this->editStage2['id'])->update($validateAttributes["editStage2"]);
        $this->dispatch('showSuccessMessage', message: "Le stage a été mis à jour avec succès !");
        $this->currentPage = PAGELIST;
    }
   public function confirmDeleteStage2($sujet,$id,$tuteur){
    $this->dispatch('confirmMessage', message: ["sujet" => $sujet, "stage_id" => $id,"tuteur"=>$tuteur]);
   }
   public function deleteStage($id,$tuteur){

    NStage::destroy($id);
    //TuteurEntreprise::destroy($tuteur);
    $this->dispatch('showSuccessMessage', message: "Le stage a été supprimé avec succès !");
   }

  
 
}
