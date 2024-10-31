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
                    <input type="text" class="form-control @error('newStage2.sujet') is-invalid @enderror"
                        wire:model="newStage2.sujet" value="{{old('newStage2.sujet')}}">
                    @error("newStage2.sujet")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label>Entreprise</label>
                            <input type="text" class="form-control @error('newStage2.entreprise') is-invalid @enderror"
                                wire:model='newStage2.entreprise'value="{{old('newStage2.entreprise')}}">
                            @error("newStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Ville</label>
                            <input type="text" class="form-control @error('newStage2.ville') is-invalid @enderror"
                                wire:model='newStage2.ville' value="{{old('newStage2.ville')}}">
                            @error("newStage2.ville")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Etudiant</label>
                            <select class="form-control @error('newStage2.ins_id') is-invalid @enderror"
                                wire:model='newStage2.ins_id' value="{{old('newStage2.ins_id')}}">
                                <option value=""></option>
                                @foreach ($inscriptions as $inscription)
                                <option value="{{ $inscription->ins_id }}">{{
                                    $inscription->etudiant_nom2($inscription->ins_etudiant_id) }}</option>
                                @endforeach
                            </select>
                            @error("newStage2.ins_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Binome</label>
                            <select class="form-control @error('newStage2.binome_id') is-invalid @enderror"
                                wire:model='newStage2.binome_id'value="{{old('newStage2.binome_id')}}">
                                <option value=0>Optionnel</option>
                                @foreach ($inscriptions as $inscription)
                                <option value="{{ $inscription->ins_id }}">{{
                                    $inscription->etudiant_nom2($inscription->ins_etudiant_id) }}</option>
                                @endforeach
                            </select>
                            @error("newStage2.binome_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Coordinateur</label>
                            <select class="form-control @error('newStage2.cordinateur_id') is-invalid @enderror"
                                wire:model='newStage2.cordinateur_id'value="{{old('newStage2.cordinateur')}}">
                                <option value=""></option>
                                @foreach ($profs as $prof)
                                <option value="{{ $prof->prof_id }}">{{$prof->prof_nom }} {{$prof->prof_prenom }}
                                </option>
                                @endforeach
                            </select>
                            @error("newStage2.cordinateur_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Encadrant</label>
                            <select class="form-control @error('newStage2.encadrant_id') is-invalid @enderror"
                                wire:model='newStage2.encadrant_id'value="{{old('newStage2.encadrant_id')}}">
                                <option value=""></option>
                                @foreach ($profs as $prof)
                                <option value="{{ $prof->prof_id }}">{{$prof->prof_nom }} {{$prof->prof_prenom }}
                                </option>
                                @endforeach
                            </select>
                            @error("newStage2.encadrant_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Date de début</label>
                            <input type="date" class="form-control @error('newStage2.date_debut') is-invalid @enderror"
                                wire:model='newStage2.date_debut'value="{{old('newStage2.date_debut')}}">
                            @error("newStage2.date_debut")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Date de fin</label>
                            <input type="date" class="form-control @error('newStage2.date_fin') is-invalid @enderror"
                                wire:model='newStage2.date_fin'value="{{old('newStage2.date_fin')}}">
                            @error("newStage2.date_fin")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Date de soutenance</label>
                            <input type="date"
                                class="form-control @error('newStage2.date_soutenance') is-invalid @enderror"
                                wire:model='newStage2.date_soutenance'value="{{old('newStage2.date_soutenance')}}">
                            @error("newStage2.date_soutenance")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control @error('newStage2.cordinateur_id') is-invalid @enderror"
                                wire:model='newStage2.type'value="{{old('newStage2.type')}}">
                                <option value="simple">Simple</option>
                                <option value="Rémunéré">Rémunéré</option>
                                <option value="pré-embauche">Pré-embauche</option>
                                @error("newStage2.type")
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
                            <input type="text" class="form-control @error('newTuteur.nom') is-invalid @enderror"
                                wire:model='newTuteur.nom'value="{{old('newTuteur.nom')}}">
                            @error("newStage2.lieu")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" class="form-control @error('newStage2.entreprise') is-invalid @enderror"
                                wire:model='newTuteur.prenom'value="{{old('newTuteur.prenom')}}">
                            @error("newStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('newStage2.entreprise') is-invalid @enderror"
                                wire:model='newTuteur.email'value="{{old('newTuteur.email')}}">
                            @error("newStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Poste</label>
                            <input type="text" class="form-control @error('newStage2.entreprise') is-invalid @enderror"
                                wire:model='newTuteur.poste'value="{{old('newTuteur.poste')}}">
                            @error("newStage2.entreprise")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success" wire:click.prevent='addStage2'>Ajouter</button>
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