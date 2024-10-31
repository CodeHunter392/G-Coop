<div class="col-12">
    <section class="content">
        <div class="card card-primary">
            <div class="card-header bg-gradient-primary d-flex flex-column flex-md-row align-items-center justify-content-between">
                <h3 class="card-title flex-grow-1 mb-2 mb-md-0"><i class="fas fa-users fa-2x"></i> Liste des cooperatives</h3>
                <div class="card-tools d-flex flex-column flex-md-row align-items-center justify-content-end w-100 w-md-auto">
                    <a class="btn btn-link text-white mb-2 mb-md-0 mr-0 mr-md-4 d-block" wire:click="updateView('ajouter','0')">
                        <i class="fas fa-user-plus"></i> Ajouter une cooperative
                    </a>
                    <select wire:model.live.debounce.250ms="type" class="mb-2 mb-md-0 ml-0 ml-md-4 px-4 py-2 mr-0 mr-md-4 d-block border rounded-md" style="color: #000000; width: 100%; max-width: 160px;">
                        <option value="">Tous les types</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ showTypeName($type) }}</option>
                        @endforeach
                    </select>
                    <select wire:model.live.debounce.250ms="secteur" class="mb-2 mb-md-0 ml-0 ml-md-4 px-4 py-2 mr-0 mr-md-4 d-block border rounded-md" style="color: #000000; width: 100%; max-width: 160px;">
                        <option value="">Tous les secteurs</option>
                        @foreach($secteurs as $secteur)
                            <option value="{{ $secteur }}">{{ showSecteurName($secteur) }}</option>
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

                                <th>Nom</th>
                                <th>Secteur</th>
                                <th>Type</th>
                                <th>Nombre adhérent</th>
                                <th>Date de création / Date de fin d'activité</th>
                                <th>Adresse</th>
                                <th>Localité</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cooperatives as $cooperative)
                            <tr>
                                <td>{{ $cooperative->nom }}</td>
                                <td>{{ $cooperative->secteur->nom }}</td>
                                <td>{{ $cooperative->type_coops->nom }}</td>
                                <td>{{ $cooperative->nb_adherant }}</td>
                                <td>{{ $cooperative->date_creation }} / {{ $cooperative->date_fin_activite }}</td>
                                <td>{{ $cooperative->adresse }}</td>
                                <td>{{ $cooperative->localite->nom }}</td>
                                <td>{{ $cooperative->statut }}</td>

                                <td class="py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a  class="btn bg-primary"
                                            wire:click="updateView('detailler','{{ $cooperative->id }}')">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a  class="btn bg-yellow"
                                            wire:click="updateView('modifier','{{ $cooperative->id }}')">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a  class="btn bg-red"
                                            wire:click="updateView('supprimer','{{ $cooperative->id }}')">
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
                    {{ $cooperatives->links() }}
                </div>
            </div>

        </div>

    </section>
</div>

