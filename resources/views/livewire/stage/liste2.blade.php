
<div class="row p-4 pt-5">
   
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-olive d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-window-restore fa-2x"></i>Liste des
                    stages 2</h3>


                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click='goToAddStage'><i
                            class="fas fa-folder-plus"></i>
                        Nouveau stage</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.live.debounce.250ms='search'
                            class="form-control float-right" placeholder="Rechercher">
                        
                    </div>
                </div>
            </div>
            {{-- <div class="row">
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
            </div>  --}}
            <div class="card-body table-responsive p-0 table-striped" style="height: 500px;">
                <table class="table table-head-fixed ">
                    
                    <thead>
                        <tr>
                            {{-- <th style="width:5%;"></th> --}}
                            <th style="width:30%;">Sujet</th>
                            <th style="width:20%;">Etudiant<br>Binome</th>
                            <th style="width:20%;">Encadrant</th>
                            <th style="width:20%;" >Filiere</th>
                            <th style="width:30%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stages as $stage)
                        <tr>
                            {{-- <td>
                                @if ($user->sexe == "F")
                                <img src="" width="24" />

                                @else
                                <img src="" width="24" />
                                @endif
                            </td> --}}
                            {{-- <td></td> --}}
                            <td>{{ $stage->sujet }}</td>
                            <td>{{ $stage->nometudiant($stage->ins_id)}}
                                @if($stage->binome_id)
                                <br>
                                {{ $stage->nometudiant($stage->binome_id)}}
                                @endif
                            </td>
                           
                          
                               
                               
                            <td>{{ $stage->nomprof($stage->encadrant_id) }}</td>
                            <td>{{ $stage->nomfili($stage->filiere_id) }}</td>

                            {{--
                            <td class="text-center">
                                <span class="tag tag-success">
                                    {{ $user->created_at->diffForHumans() }}
                                </span>
                            </td>
                            --}}
                            <td class="text-center">
                                <button class="btn btn-warning" wire:click="goToEditStage2('{{ $stage->id }}','{{ $stage->tuteur_id }}')">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" wire:click="confirmDeleteStage2('{{ $stage->sujet }}','{{ $stage->id }}','{{ $stage->tuteur_id }}')">
                                    {{-- wire:click="deleteUser('{{ $user->id }}')"> --}}
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            {{-- <div class="card-footer">
                <div class="float-right">
                    {{ $stages->links() }}

                </div>
            </div> --}}

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

<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('confirmMessage', (event) => {
        Swal.fire({
  title: "Êtes-vous sûr de continuer  ",
  text: "Vous êtes sur le point de supprimer "+event.message.sujet+" des stages",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Continuer",
  cancelButtonText: "Annuler"
}).then((result) => {
  if (result.isConfirmed) {
    @this.deleteStage(event.message.stage_id,event.message.tuteur)
  }
});
       });
    });
</script>


@section('title')
Liste des stages 2
@endsection