<div class="row p-4 pt-5">
    @section('title')
    Ajouter un stage
    @endsection
    <div class="col-md-12">

        <div class="card card-olive">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire d'ajout de
                    stage 2</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Filière</label>
                            <select class="form-control"
                                wire:model.live='filierefiltre1'>
                                <option value=""></option>
                                @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->fil_id }}">{{
                                    $filiere->fil_nom }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Classe</label>
                            <select class="form-control"
                                wire:model.live='classefiltre1'>
                                <option value=""></option>

                                @foreach ($classes as $classe)
                                <option value="{{ $classe->classe_id }}">{{
                                    $classe->classe_nom_court }}</option>
                                @endforeach

                            </select>
                          
                        </div>
                    </div>
                </div>





                <div class="form-group">
                    <label>Sujet</label>
                    <input type="text" class="form-control @error('editStage2.sujet') is-invalid @enderror"
                        wire:model="editStage2.sujet" value="{{old('editStage2.sujet')}}">
                    @error("editStage2.sujet")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Ville</label>
                            <input type="text" class="form-control @error('editStage2.ville') is-invalid @enderror"
                                wire:model='editStage2.ville' value="{{old('editStage2.ville')}}">
                            @error("editStage2.ville")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Entreprise</label>
                            <input type="text" class="form-control @error('editStage2.entreprise') is-invalid @enderror"
                                wire:model='editStage2.entreprise'value="{{old('editStage2.entreprise')}}">
                            @error("editStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Coordinateur</label>
                            <select class="form-control @error('editStage2.cordinateur_id') is-invalid @enderror"
                                wire:model='editStage2.cordinateur_id'value="{{old('editStage2.cordinateur')}}">
                                <option value=""></option>
                                @foreach ($profs as $prof)
                                <option value="{{ $prof->prof_id }}">{{$prof->prof_nom }} {{$prof->prof_prenom }}
                                </option>
                                @endforeach
                            </select>
                            @error("editStage2.cordinateur_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Encadrant</label>
                            <select class="form-control @error('editStage2.encadrant_id') is-invalid @enderror"
                                wire:model='editStage2.encadrant_id'value="{{old('editStage2.encadrant_id')}}">
                                <option value=""></option>
                                @foreach ($profs as $prof)
                                <option value="{{ $prof->prof_id }}">{{$prof->prof_nom }} {{$prof->prof_prenom }}
                                </option>
                                @endforeach
                            </select>
                            @error("editStage2.encadrant_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Etudiant</label>
                            <select class="form-control @error('editStage2.ins_id') is-invalid @enderror"
                                wire:model='editStage2.ins_id' value = "{{old('editStage2.ins_id')}}">
                                <option value=""></option>
                                @foreach ($inscriptions as $inscription)
                                <option value="{{ $inscription->ins_id }}">{{
                                    $inscription->etudiant_nom2($inscription->ins_etudiant_id) }}</option>
                                @endforeach
                            </select>
                            @error("editStage2.ins_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Binome</label>
                            <select class="form-control @error('editStage2.binome_id') is-invalid @enderror"
                                wire:model='editStage2.binome_id'value="{{old('editStage2.binome_id')}}">
                                <option value=0>Pas de binome</option>
                                @foreach ($inscriptions as $inscription)
                                <option value="{{ $inscription->ins_id }}">{{
                                    $inscription->etudiant_nom2($inscription->ins_etudiant_id) }}</option>
                                @endforeach
                            </select>
                            @error("editStage2.binome_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Date de début</label>
                            <input type="date" class="form-control @error('editStage2.date_debut') is-invalid @enderror"
                                wire:model='editStage2.date_debut'value="{{old('editStage2.date_debut')}}">
                            @error("editStage2.date_debut")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Date de fin</label>
                            <input type="date" class="form-control @error('editStage2.date_fin') is-invalid @enderror"
                                wire:model='editStage2.date_fin'value="{{old('editStage2.date_fin')}}">
                            @error("editStage2.date_fin")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Date de soutenance</label>
                            <input type="date"
                                class="form-control @error('editStage2.date_soutenance') is-invalid @enderror"
                                wire:model='editStage2.date_soutenance'value="{{old('editStage2.date_soutenance')}}">
                            @error("editStage2.date_soutenance")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control @error('editStage2.cordinateur_id') is-invalid @enderror"
                                wire:model='editStage2.type'value="{{old('editStage2.type')}}">
                                <option value="simple">Simple</option>
                                <option value="Rémunéré">Rémunéré</option>
                                <option value="pré-embauche">Pré-embauche</option>
                                @error("editStage2.type")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>     

                        </div>
                    </div>
                </div>
                
                <label>Tuteur d'entreprise</label>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control @error('editTuteur.nom') is-invalid @enderror"
                                wire:model='editTuteur.nom'value="{{old('editTuteur.nom')}}">
                            @error("editStage2.lieu")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" class="form-control @error('editStage2.entreprise') is-invalid @enderror"
                                wire:model='editTuteur.prenom'value="{{old('editTuteur.prenom')}}">
                            @error("editStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('editStage2.entreprise') is-invalid @enderror"
                                wire:model='editTuteur.email'value="{{old('editTuteur.email')}}">
                            @error("editStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Poste</label>
                            <input type="text" class="form-control @error('editStage2.entreprise') is-invalid @enderror"
                                wire:model='editTuteur.poste'value="{{old('editTuteur.poste')}}">
                            @error("editStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success" wire:click.prevent='updateStage2'>Modifier</button>
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