<div class="col-12">
    <section class="content">
        <div class="card card-primary">
            <div class="card-header bg-gradient-olive d-flex flex-column flex-md-row align-items-center justify-content-between">
                <h3 class="card-title flex-grow-1 mb-2 mb-md-0"><i class="fas fa-folder fa-2x"></i> Liste des projets</h3>
                <div class="card-tools d-flex flex-column flex-md-row align-items-center justify-content-end w-100 w-md-auto">
                    <a class="btn btn-link text-white mb-2 mb-md-0 mr-0 mr-md-4 d-block" wire:click="updateView('ajouter','0')">
                        <i class="fas fa-folder-plus"></i> Ajouter un projet
                    </a>
                    <select wire:model.live.debounce.250ms="organismes" class="mb-2 mb-md-0 ml-0 ml-md-4 px-4 py-2 mr-0 mr-md-4 d-block border rounded-md" style="color: #000000; width: 100%; max-width: 160px;">
                        <option value="">Tous les organismes</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $this->nomOrganisation($type) }}</option>
                        @endforeach
                    </select>
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
                                <th></th>
                                <th>Nom</th>
                                <th>Organisme</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Budget </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projets as $projet)
                            <tr>
                                <td></td>
                                <td>{{ $projet->nom }}</td>
                                <td>{{ $projet->organisme->nom }}</td>
                                <td>{{ $projet->date_debut }}</td>
                                <td>{{ $projet->date_fin }}</td>
                                <td>{{ $projet->budget }} MAD</td>

                                <td class="py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a  class="btn btn-success"
                                            wire:click="updateView('detailler','{{ $projet->id }}')">
                                            <i class="fas fa-tasks"></i>
                                        </a>
                                        <a  class="btn btn-warning"
                                            wire:click="updateView('modifier','{{ $projet->id }}')">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a  class="btn btn-danger"
                                            wire:click="updateView('supprimer','{{ $projet->id }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer clearfix">
                <div class="float-right">
                    {{ $projets->links() }}
                </div>
            </div>

        </div>

    </section>
</div>

@section('title')
Liste des projets
@endsection
