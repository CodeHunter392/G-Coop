
<div class="row p-4 pt-5">
   
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-olive d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-window-restore fa-2x"></i>Liste des offres de
                    stages</h3>


                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click='goToAddOffreStage'><i
                            class="fas fa-folder-plus"></i>
                        Nouvelle offre de stage</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.live.debounce.250ms='search'
                            class="form-control float-right" placeholder="Rechercher par titre">
                        
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0 table-striped" style="height: 500px;">
                <table class="table table-head-fixed ">
                    <thead>
                        <tr>
                            <th style="width:5%;"></th>
                            <th style="width:15%;">Titre</th>
                            <th style="width:20%;">Entreprise</th>
                            <th style="width:15%;">Ville</th>
                            <th style="width:15%;" class="text-center">Date de publication</th>
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
                            <td></td>
                            <td>{{ $stage->titre }}</td>
                            <td>{{ $stage->entreprise }}</td>
                            <td>{{ $stage->lieu }}</td>
                            <td> {{ date_format(date_create($stage->date_publication),'d/m/Y')}}
                               </td>

                            {{--
                            <td class="text-center">
                                <span class="tag tag-success">
                                    {{ $user->created_at->diffForHumans() }}
                                </span>
                            </td>
                            --}}
                            <td class="text-center">
                                <button class="btn btn-warning" wire:click="goToEditOffreStage('{{ $stage->id }}')">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" wire:click="confirmDelete('{{ $stage->titre }}',{{ $stage->id }})">
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
Liste des offres de stages
@endsection