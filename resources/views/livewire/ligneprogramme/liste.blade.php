<div class="col-12">
    <section class="content">
        <div class="card card-primary">
            <div class="card-header bg-gradient-primary d-flex flex-column flex-md-row align-items-center justify-content-between">
                <h3 class="card-title flex-grow-1 mb-2 mb-md-0"><i class="fas fa-project-diagram fa-2x"></i> Liste des ligne de Programmes</h3>
                <div class="card-tools d-flex flex-column flex-md-row align-items-center justify-content-end w-100 w-md-auto">
                    <a class="btn btn-link text-white mb-2 mb-md-0 mr-0 mr-md-4 d-block" wire:click="updateView('ajouter','0')">
                        <i class="fas fa-project-diagram"></i> Ajouter une ligne de programme
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

                                <th>Libelle</th>
                                <th>Echeance</th>
                                <th>Objectifs</th>

                                <th>Montant (MAD)</th>


                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ( $ligneProgrammes as $programme)
                            <tr>
                                <td>{{ $programme->libelle }}</td>
                                <td>{{ $programme->echeance }}</td>
                                <td>
                                    @foreach ($programme->objectifs as $objectif)
                                    <ul>
                                        <li>{{ $objectif->nameObjectif($objectif->objectif_id) }}</li>
                                    </ul>
                                    @endforeach
                                </td>

                                <td>{{$programme->montant}}</td>
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
                                <td class="text-center" style="font-size:1rem; font-weight:500; font-family:inherit; color:red;" colspan="7" > Pas de ligne de Programmes !</td>
                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer clearfix">
                <div class="float-right">
                    {{ $ligneProgrammes->links() }}
                </div>
            </div>

        </div>

    </section>
</div>

@section('title')
Liste des lignes de Programmes
@endsection
