<div class="row p-4 pt-5">
    @section('title')
    Planifier une soutenance
    @endsection
    <div class="col-md-12">

        <div class="card card-olive">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-graduate fa-2x"></i>Nouvelle Soutenance</h3>
            </div>
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Filière</label>
                            <select class="form-control" wire:model.live='filierefiltre1'>
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
                            <select class="form-control" wire:model.live='classefiltre1'>
                                <option value=""></option>

                                @foreach ($classes as $classe)
                                <option value="{{ $classe->classe_id }}">{{
                                    $classe->classe_nom_court }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                </div> --}}





                 <div class="form-group">
                    <label>Stage</label>
                    <select type="text" class="form-control " wire:model.live="stageid" value="">
                        
                        @foreach ($stages as $stage)
                        <option value="{{ $stage->id }}">{{
                            $stage->sujet }}</option>
                        @endforeach
                    </select>
                    @error("newStage2.sujet")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Etudiant</label>
                            <input class="form-control" value="{{$lestage->nometudiant($lestage->ins_id)}}" disabled>

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Binome</label>
                            <input class="form-control" value="{{$lestage->nometudiant($lestage->binome_id)}}" disabled>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Encadrant</label>
                            <input class="form-control" value="{{$lestage->nomprof($lestage->encadrant_id)}}" disabled>
                            @error("newStage2.encadrant_id")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label>Date de soutenance</label>
                            <input type="date" class="form-control @error('date_soutenance') is-invalid @enderror"
                                wire:model='date_soutenance' value="{{$lestage->date_soutenance}}">
                            @error("newStage2.date_soutenance")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div> 







                <label>Membre du jury</label>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Membre 1</label>

                            <select class="form-control " wire:model="membre1.prof_id">
                                <option> </option>
                                @foreach ($profs as $prof)
                                <option value="{{ $prof->prof_id }}">{{
                                    $prof->prof_nom }} {{
                                    $prof->prof_prenom }}</option>
                                @endforeach
                            </select>
                            
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Membre 2</label>

                            <select class="form-control " wire:model="membre2.prof_id">
                                <option> </option>
                                @foreach ($profs as $prof)
                                <option value="{{ $prof->prof_id }}">{{
                                    $prof->prof_nom }} {{
                                    $prof->prof_prenom }}</option>
                                @endforeach
                            </select>
                            
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Président du jury</label>

                            <select class="form-control " wire:model="membre3.prof_id">
                                <option> </option>
                                @foreach ($profs as $prof)
                                <option value="{{ $prof->prof_id }}">{{
                                    $prof->prof_nom }} {{
                                    $prof->prof_prenom }}</option>
                                @endforeach
                            </select>
                            
                        </div>

                    </div>
                 

                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success" wire:click.prevent='addSoutenance'>Ajouter</button>
                <button type="button" class="btn btn-danger" wire:click='goToListSoutenance'>Annuler</button>
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