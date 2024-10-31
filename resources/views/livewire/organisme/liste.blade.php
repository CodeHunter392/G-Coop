<div class="col-12">
    <section class="content">
        <div class="card card-primary">
            <div class="card-header bg-gradient-primary d-flex flex-column flex-md-row align-items-center justify-content-between">
                <h3 class="card-title flex-grow-1 mb-2 mb-md-0"><i class="fas fa-folder fa-2x"></i> Liste des organismes</h3>
                <div class="card-tools d-flex flex-column flex-md-row align-items-center justify-content-end w-100 w-md-auto">
                    <a class="btn btn-link text-white mb-2 mb-md-0 mr-0 mr-md-4 d-block" wire:click="updateView('ajouter','0')">
                        <i class="fas fa-folder-plus"></i> Ajouter un organisme
                    </a>
                    <select wire:model.live.debounce.250ms="type" class="mb-2 mb-md-0 ml-0 ml-md-4 px-4 py-2 mr-0 mr-md-4 d-block border rounded-md" style="color: #000000; width: 100%; max-width: 160px;">
                        <option value="">Tous les types</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
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

            {{-- <div class="card-header bg-gradient-primary d-flex align-items-center ">
                <h3 class="card-title flex-grow-1"><i class="fas fa-folder fa-2x"></i>Liste des organismes</h3>
                <div class="card-tools d-flex align-items-center ">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click="updateView('ajouter','0')"><i
                            class="fas fa-folder-plus"></i>
                        Ajouter un organisme</a>
                    <select wire:model.live.debounce.250ms="type" class="ml-4 px-4 py-2 mr-4 d-block border rounded-md "
                        style="color: #000000; width: 160px;">
                        <option value="">Tous les types</option>
                        @foreach($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    <select wire:model.live.debounce.250ms="perPage"
                        class="ml-4 px-4 py-2 border mr-4 d-block rounded-md" style="color: #000000; width: 150px;">
                        <option value="5">5 par page</option>
                        <option value="10">10 par page</option>
                        <option value="15">15 par page</option>
                        <option value="20">20 par page</option>
                    </select>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.live.debounce.250ms="search"
                            class="form-control float-right" placeholder="Rechercher par nom">

                    </div>
                </div>
            </div> --}}
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>

                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Type</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organismes as $organisme)
                            <tr>
                                <td>{{ $organisme->nom }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $organisme->type }}</td>


                                <td class="py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        {{-- <a  class="btn btn-primary"
                                            wire:click="updateView('detailler','{{ $organisme->id }}')">
                                            <i class="fas fa-tasks"></i>
                                        </a> --}}
                                        <a  class="btn btn-warning"
                                            wire:click="updateView('modifier','{{ $organisme->id }}')">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a  class="btn btn-danger"
                                            wire:click="updateView('supprimer','{{ $organisme->id }}')">
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
                    {{ $organismes->links() }}
                </div>
            </div>

        </div>

    </section>
</div>

@section('title')
Liste des Organismes
@endsection
