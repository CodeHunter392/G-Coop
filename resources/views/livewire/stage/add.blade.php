<div class="row p-4 pt-5">
    @section('title')
    Ajouter un stage
    @endsection
    <div class="col-md-12">

        <div class="card card-olive">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire d'ajout de
                    stage</h3>
            </div>
            <div class="card-body">
                 <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Filière</label>
                            <select class="form-control @error('newStage.ins_id') is-invalid @enderror"
                                wire:model.live='filierefiltre1'>
                                <option value=""></option>
                                @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->fil_id }}">{{
                                    $filiere->fil_nom }}</option>
                                @endforeach
                            </select>
                            @error("newStage.ins_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Classe</label>
                            <select class="form-control @error('newStage.binome_id') is-invalid @enderror"
                                wire:model.live='classefiltre1'>
                                <option value=""></option>

                                @foreach ($classes as $classe)
                                <option value="{{ $classe->classe_id }}">{{
                                    $classe->classe_nom_court }}</option>
                                @endforeach

                            </select>
                            @error("newStage.binome_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> 



                

                    <div class="form-group">
                        <label>Sujet</label>
                        <input type="text" class="form-control @error('newStage.sujet') is-invalid @enderror"
                            wire:model='newStage.sujet'>
                        @error("newStage.sujet")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Lieu</label>
                                <input type="text" class="form-control @error('newStage.lieu') is-invalid @enderror"
                                    wire:model='newStage.lieu'>
                                @error("newStage.lieu")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Entreprise</label>
                                <input type="text"
                                    class="form-control @error('newStage.entreprise') is-invalid @enderror"
                                    wire:model=''>
                                @error("newStage.entreprise")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Etudiant</label>
                                <select class="form-control @error('newStage.ins_id') is-invalid @enderror"
                                    wire:model='newStage.ins_id'>
                                    <option value=""></option>
                                    @foreach ($inscriptions as $inscription)
                                    <option value="{{ $inscription->ins_id }}">{{
                                        $inscription->etudiant_nom2($inscription->ins_etudiant_id) }}</option>
                                    @endforeach
                                </select>
                                @error("newStage.ins_id")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Binome</label>
                                <select class="form-control @error('newStage.binome_id') is-invalid @enderror"
                                    wire:model='newStage.binome_id'>
                                    <option value="null">Optionnel</option>
                                    @foreach ($inscriptions as $inscription)
                                    <option value="{{ $inscription->ins_id }}">{{
                                        $inscription->etudiant_nom2($inscription->ins_etudiant_id) }}</option>
                                    @endforeach
                                </select>
                                @error("newStage.binome_id")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Coordinateur</label>
                                <select class="form-control @error('newStage.cordinateur_id') is-invalid @enderror"
                                    wire:model='newStage.cordinateur_id'>
                                    <option value=""></option>
                                    @foreach ($profs as $prof)
                                    <option value="{{ $prof->prof_id }}">{{$prof->prof_nom }} {{$prof->prof_prenom }}
                                    </option>
                                    @endforeach
                                </select>
                                @error("newStage.cordinateur_id")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Encadrant</label>
                                <select class="form-control @error('newStage.encadrant_id') is-invalid @enderror"
                                    wire:model='newStage.encadrant_id'>
                                    <option value=""></option>
                                    @foreach ($profs as $prof)
                                    <option value="{{ $prof->prof_id }}">{{$prof->prof_nom }} {{$prof->prof_prenom }}
                                    </option>
                                    @endforeach
                                </select>
                                @error("newStage.encadrant_id")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Date du stage</label>
                                <input type="date"
                                    class="form-control @error('newStage.date_stage') is-invalid @enderror"
                                    wire:model='newStage.date_stage'>
                                @error("newStage.date_stage")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Date de soutenance</label>
                                <input type="date"
                                    class="form-control @error('newStage.date_soutenance') is-invalid @enderror"
                                    wire:model='newStage.date_soutenance'>
                                @error("newStage.date_soutenance")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success" wire:click.prevent='addStage'>Ajouter</button>
                <button type="button" class="btn btn-danger" wire:click='goToListStage'>Annuler</button>
            </div>
          
        </div>



    </div>

</div>
<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('showSuccessMessage', (event) => {
        Swal.fire({
            position: "top-end",
            icon: "success",
            toast:true,
            title: event.message,
            showConfirmButton: false,
            timer: 2500
                    });
       });
    });
</script>