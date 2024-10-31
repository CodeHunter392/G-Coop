<div class="row p-4 pt-5">

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-olive d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-graduation-cap fa-2x"></i>Liste des
                    soutenances</h3>


                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click='goToAddSoutenance'><i
                            class="fas fa-user-graduate"></i>
                        Nouvelle Soutenance</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.live.debounce.250ms='search'
                            class="form-control float-right" placeholder="Rechercher">

                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0 table-striped" style="height: 500px;">
                <table class="table table-head-fixed ">
                    <thead>
                        <tr>
                            {{-- <th style="width:5%;"></th> --}}
                            <th class="text-center" style="width:20%;">Etudiant<br>Binôme</th>
                            <th class="text-center" style="width:25%;">Membre du jury</th>
                            <th class="text-center" style="width:20%;">Encadrant</th>
                            <th class="text-center" style="width:20%;">Date de soutenance</th>
                            <th class="text-center" style="width:15%;" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $stages as $stage )
                        <tr>
                            <td class="text-center">{{ $stage->nometudiant($stage->ins_id)}}
                                @if($stage->binome_id)
                                <br>
                                {{ $stage->nometudiant($stage->binome_id)}}
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($stage->membre_jury($stage->id)))

                                <button class="btn btn-success"
                                    wire:click="goToEdit('{{ $stage->id }}')">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                                @else
                                @foreach ($stage->membre_jury($stage->id) as $item )
                                {{ $item}}<br>
                                @endforeach
                                @endif
                            </td>
                            <td class="text-center">{{ $stage->nomprof($stage->encadrant_id) }}</td>
                            <td class="text-center">
                                @if(is_null($stage->date_soutenance))
                                
                                @else
                                {{ date_format(date_create($stage->date_soutenance),'d/m/Y')}}
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn btn-warning"
                                    wire:click="goToEdit('{{ $stage->id }}')">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-danger"
                                    wire:click="confirmDelete('{{ $stage->id }}')">
                                    {{-- wire:click="deleteUser('{{ $user->id }}')"> --}}
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                            {{-- <td></td>
                            <td>{{ $stage->sujet }}</td>

                            <td>{{ $stage->nometudiant($stage->binome_id)}}</th>

                            <td>{{ $stage->lieu }}</td>
                            <td>{{ $stage->date_soutenance }}</td> --}}

                            {{--
                            <td class="text-center">
                                <span class="tag tag-success">
                                    {{ $user->created_at->diffForHumans() }}
                                </span>
                            </td>
                            --}}
                            {{-- <td class="text-center">
                                <button class="btn btn-warning" wire:click="goToEditOffreStage('{{ $stage->id }}')">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-danger"
                                    wire:click="confirmDelete('{{ $stage->titre }}',{{ $stage->id }})">
                                    wire:click="deleteUser('{{ $user->id }}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        --}}
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
  text: "Vous êtes sur le point de supprimer "+event.message.titre+" des offres de stages",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Continuer",
  cancelButtonText: "Annuler"
}).then((result) => {
  if (result.isConfirmed) {
    @this.deleteOffre(event.message.offre_id)
  }
});
       });
    });
</script>


@section('title')
Liste des soutenances
@endsection