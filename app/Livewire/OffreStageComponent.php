<?php

namespace App\Livewire;

use App\Models\Stage;
use Livewire\Livewire;
use Livewire\Component;
use App\Models\OffreStage;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;

class OffreStageComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $currentPage = PAGELIST;
    public $newOffre = [];
    public $editOffre = [];

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editOffre.titre' => 'required|min:3',
                'editOffre.entreprise' => 'required|min:3',
                'editOffre.lieu' => 'required|min:3',
                'editOffre.lien' => 'required|min:3',
                'editOffre.date_publication' => 'required|min:10'

            ];
        }
        return [
            'newOffre.titre' => 'required|min:3',
            'newOffre.entreprise' => 'required|min:3',
            'newOffre.lieu' => 'required|min:3',
            'newOffre.lien' => 'required|min:3',
            'newOffre.date_publication' => 'required|min:10'

        ];
    }

    #[On('showSuccessMessage')]
    #[On('confirmMessage')]
    public function render()
    {
        $searchCriteria = "%" . $this->search . "%";
        $data = [
            "offres" => OffreStage::where("titre", "like", $searchCriteria)->get()
        ];

        return view('livewire.offrestage.index', [
            
            "stages" => OffreStage::where("titre", "like", $searchCriteria)->get()
        ])->extends('layouts.master')->section('content');
    }
    public function addOffreStage()
    {
        
        $validateAttributes = $this->validate();
        OffreStage::create($validateAttributes["newOffre"]);
        $this->dispatch('showSuccessMessage', message: "Offre de stage créée avec succès !");
        $this->newOffre = [];
    }
    public function goToAddOffreStage()
    {
        $this->currentPage = PAGECREATEFORM;
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
    public function goToEditOffreStage($id)
    {
        $this->editOffre = OffreStage::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }
    public function updateOffreStage()
    {

        $validateAttributes = $this->validate();
        OffreStage::find($this->editOffre['id'])->update($validateAttributes["editOffre"]);
        $this->dispatch('showSuccessMessage', message: "Offre de stage a été mis à jour avec succès !");
    }
}
