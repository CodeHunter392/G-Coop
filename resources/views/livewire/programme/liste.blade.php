<div class="col-12">
    <section class="content">
        <div class="card card-primary">
            <div class="card-header bg-gradient-primary d-flex flex-column flex-md-row align-items-center justify-content-between">
                <h3 class="card-title flex-grow-1 mb-2 mb-md-0"><i class="fas fa-project-diagram fa-2x"></i> Liste des programmes</h3>
                <div class="card-tools d-flex flex-column flex-md-row align-items-center justify-content-end w-100 w-md-auto">
                    <a class="btn btn-link text-white mb-2 mb-md-0 mr-0 mr-md-4 d-block" wire:click="updateView('ajouter','0')">
                        <i class="fas fa-project-diagram"></i> Ajouter un programme
                    </a>

                    <select wire:model.live.debounce.250ms="perPage" class="mb-2 mb-md-0 ml-0 ml-md-4 px-4 py-2 border mr-0 mr-md-4 d-block rounded-md" style="color: #000000; width: 100%; max-width: 150px;">
                        <option value="5">5 par page</option>
                        <option value="10">10 par page</option>
                        <option value="15">15 par page</option>
                        <option value="20">20 par page</option>
                    </select>
                    <div class="input-group input-group-md" style="width: 100%; max-width: 250px;">
                        <input type="text" name="table_search" wire:model.live.debounce.250ms="search" class="form-control float-right" placeholder="Rechercher par nom">
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>

                                <th>Nom</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Tutelle</th>
                                <th>Montant (MAD)</th>
                                <th>Statut</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ( $programmes as $programme)
                            <tr>
                                <td>{{ $programme->nom }}</td>
                                <td>{{ $programme->date_debut }}</td>
                                <td>{{ $programme->date_fin }}</td>
                                <td>{{$programme->tutelleNom->nom}}</td>
                                <td>{{$programme->montant}}</td>
                                <td>
                                    @if($programme->statut)
                                        En cours
                                    @else
                                    Terminé
                                    @endif
                                </td>


                                <td class="py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        {{-- <a  class="btn btn-primary"
                                            wire:click="updateView('detailler','{{ $programme->id }}')">
                                            <i class="fas fa-tasks"></i>
                                        </a> --}}
                                        <a  class="btn btn-warning"
                                            wire:click="updateView('modifier','{{ $programme->id }}')">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a  class="btn btn-danger"
                                            wire:click="updateView('supprimer','{{ $programme->id }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" style="font-size:1rem; font-weight:500; font-family:inherit; color:red;" colspan="7" > Pas de programmes !</td>
                            </tr>

                            @endforelse
                            {{-- @foreach($programmes as $programme)
                            <tr>
                                <td>{{ $programme->nom }}</td>
                                <td>{{ $programme->date_debut }}</td>
                                <td>{{ $programme->date_fin }}</td>
                                <td>{{$programme->tutelle}}</td>
                                <td>{{$programme->montant}}</td>
                                <td>{{ $programme->statut }}</td>


                                <td class="py-0 align-middle">
                                    <div class="btn-group btn-group-sm"> --}}
                                        {{-- <a  class="btn btn-primary"
                                            wire:click="updateView('detailler','{{ $programme->id }}')">
                                            <i class="fas fa-tasks"></i>
                                        </a> --}}
                                        {{-- <a  class="btn btn-warning"
                                            wire:click="updateView('modifier','{{ $programme->id }}')">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a  class="btn btn-danger"
                                            wire:click="updateView('supprimer','{{ $programme->id }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer clearfix">
                <div class="float-right">
                    {{ $programmes->links() }}
                </div>
            </div>

        </div>

    </section>
</div>

@section('title')
Liste des Programmes
@endsection
