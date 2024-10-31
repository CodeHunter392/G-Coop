<div>
    @section('title')
        Formulaire d'ajout de coopérative
    @endsection
    <div class="col-xl-12 ">

        <div class="card card-primary">
            <div class="card-header ">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire d'ajout de coopérative</h3>
            </div>

                <div class="row m-4 pt-4">
                    <div class="col-sm-11 m-auto ">
                        <div class="card card-default" style="background: #eff1f3">
                            <div class="card-header">
                                <h3 class="card-title">Informations sur la coopérative (<span
                                        class="text-danger text-sm">Les
                                        champs en étoiles sont obligatoires</span>)</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nom de la coopérative *</label>
                                            <input type="text"
                                                class="form-control @error('newCooperative.nom') 'is-invalid' @enderror"
                                                id="nom_coop" wire:model='newCooperative.nom' />
                                            @error('newCooperative.nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date de création *</label>
                                            <input type="date"
                                                class="form-control @error('newCooperative.date_creation')
                                    'is-invalid' @enderror"
                                                id="" wire:model='newCooperative.date_creation' />
                                            @error('newCooperative.date_creation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date de fin d'activité *</label>
                                            <input type="date"
                                                class="form-control @error('newCooperative.date_fin_activite')
                                    'is-invalid' @enderror"
                                                id="" wire:model='newCooperative.date_fin_activite' />
                                            @error('newCooperative.date_fin_activite')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Secteur *</label>
                                            <select type="text"
                                                class="form-control @error('newCooperative.secteur_id')
                                    'is-invalid' @enderror"
                                                id="" wire:model='newCooperative.secteur_id'>
                                                <option value="">Choisir un secteur</option>
                                                @foreach ($secteurs as $secteur)
                                                    <option value="{{ $secteur }}">{{ showSecteurName($secteur) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('newCooperative.secteur_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Type *</label>
                                            <select type="text"
                                                class="form-control @error('newCooperative.type_coop')
                                'is-invalid' @enderror"
                                                id="" wire:model='newCooperative.type_coop'>
                                                <option value="">Choisir un type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type }}">{{ showTypeName($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('newCooperative.type_coop')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Adresse de la coopérative *</label>
                                            <input type="text"
                                                class="form-control @error('newCooperative.adresse')
                                    'is-invalid' @enderror"
                                                id="" wire:model='newCooperative.adresse' />
                                            @error('newCooperative.adresse')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre d'adhérent *</label>
                                            <input type="number"
                                                class="form-control @error('newCooperative.nb_adherant')
                                    'is-invalid' @enderror"
                                                id="" wire:model='newCooperative.nb_adherant' />
                                            @error('newCooperative.nb_adherant')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Localité *</label>
                                            <select
                                                class="form-control @error('newCooperative.localite_id')
                                        'is-invalid' @enderror"
                                                id="" wire:model='newCooperative.localite_id'>
                                                <option value="">Choisir une localité</option>
                                                @foreach ($localites as $localite)
                                                    <option value="{{ $localite->id }}">{{ $localite->nom }}</option>
                                                @endforeach

                                            </select>
                                            @error('newCooperative.localite_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="row  px-4">
                    <div class="col-sm-11 m-auto ">
                        <div class="card card-default "style="background: #eff1f3">
                            <div class="card-header">
                                <h3 class="card-title">Informations sur le bureau de la coopérative (<span
                                        class="text-danger text-sm">Les champs en étoiles sont obligatoires</span>)</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date du mandat *</label>
                                            <input type="date"
                                                class="form-control @error('newBureau.date_mandant')'is-invalid'@enderror"
                                                wire:model='newBureau.date_mandant' />
                                            @error('newBureau.date_mandant')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date de fin *</label>
                                            <input type="date"
                                                class="form-control @error('newBureau.date_fin')'is-invalid'@enderror"
                                                wire:model='newBureau.date_fin' />
                                            @error('newBureau.date_fin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12"></div>
                                    <div class="col-md-6">
                                        <div class="card card-default" style="background: #eff1f3">
                                            <div class="card-header">
                                                <label class="card-title">Premier membre </label>

                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Nom Complet *</label>

                                                            <input type="text"
                                                                class="form-control @error('newMembreBureau1.nom') 'is-invalid' @enderror"
                                                                id="nom_coop_confirm"
                                                                wire:model='newMembreBureau1.nom'>
                                                            @error('newMembreBureau1.nom')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Poste *</label>
                                                            <input type="text"
                                                                class="form-control @error('newMembreBureau1.poste')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='newMembreBureau1.poste' />
                                                            @error('newMembreBureau1.poste')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Email *</label>
                                                            <input type="email"
                                                                class="form-control @error('newMembreBureau1.email')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='newMembreBureau1.email' />
                                                            @error('newMembreBureau1.email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Téléphone *</label>
                                                            <input type="text"
                                                                class="form-control @error('newMembreBureau1.tel')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='newMembreBureau1.tel' />
                                                            @error('newMembreBureau1.tel')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-default"style="background: #eff1f3">
                                            <div class="card-header">
                                                <label class="card-title">Second membre </label>

                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Nom Complet *</label>

                                                            <input type="text"
                                                                class="form-control @error('newMembreBureau2.nom') 'is-invalid' @enderror"
                                                                id="nom_coop_confirm"
                                                                wire:model='newMembreBureau2.nom'>
                                                            @error('newMembreBureau2.nom')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Poste *</label>
                                                            <input type="text"
                                                                class="form-control @error('newMembreBureau2.poste')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='newMembreBureau2.poste' />
                                                            @error('newMembreBureau2.poste')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Email *</label>
                                                            <input type="email"
                                                                class="form-control @error('newMembreBureau2.email')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='newMembreBureau2.email' />
                                                            @error('newMembreBureau2.email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Téléphone *</label>
                                                            <input type="text"
                                                                class="form-control @error('newMembreBureau2.tel')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='newMembreBureau2.tel' />
                                                            @error('newMembreBureau2.tel')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>



                    </div>

                </div>
                <div class="card-footer">
                    <button type="button" wire:click.prevent='addCooperative' class="btn bg-primary">Ajouter la coopérative</button>
                    <button type="button" class="btn bg-danger" wire:click.prevent="updateView('liste',0)">Retourner à la liste</button>
                </div>

        </div>
    </div>
</div>














{{-- <form role="form" wire:submit.prevent="addCooperative">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control @error('newCooperative.nom') is-invalid @enderror"
                            wire:model='newCooperative.nom'>
                        @error('newCooperative.nom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('newCooperative.email') is-invalid @enderror"
                            wire:model='newCooperative.email'>
                        @error('newCooperative.email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date de création</label>
                        <input type="date"
                            class="form-control @error('newCooperative.date_creation') is-invalid @enderror"
                            wire:model='newCooperative.date_creation'>
                        @error('newCooperative.date_creation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control @error('newCooperative.type') is-invalid @enderror"
                            wire:model='newCooperative.type'>
                            <option value="">--------------</option>
                            <option value="association">Association</option>
                            <option value="coopérative">Coopérative</option>
                            <option value="entreprise">Entreprise</option>
                        </select>
                        @error('newCooperative.type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('newCooperative.adresse') is-invalid @enderror"
                            wire:model='newCooperative.adresse'>
                        @error('newCooperative.adresse')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                            class="form-control @error('newCooperative.telephone') is-invalid @enderror"
                            wire:model='newCooperative.telephone' />

                        @error('newCooperative.telephone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                    <button type="button" class="btn btn-danger" wire:click="updateView('liste','0')">Annuler</button>
                </div>
            </form> --}}
