<div>
    @section('title')
        Formulaire d'ajout de coopérative
    @endsection
    <div class="col-xl-12 ">

        <div class="card card-primary">
            <div class="card-header ">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire de modification de coopérative</h3>
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
                                                class="form-control @error('editCooperative.nom') 'is-invalid' @enderror"
                                                id="nom_coop" wire:model='editCooperative.nom' />
                                            @error('editCooperative.nom')
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
                                                class="form-control @error('editCooperative.date_creation')
                                    'is-invalid' @enderror"
                                                id="" wire:model='editCooperative.date_creation' />
                                            @error('editCooperative.date_creation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date de fin d'activité *</label>
                                            <input type="date"
                                                class="form-control @error('editCooperative.date_fin_activite')
                                    'is-invalid' @enderror"
                                                id="" wire:model='editCooperative.date_fin_activite' />
                                            @error('editCooperative.date_fin_activite')
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
                                                class="form-control @error('editCooperative.secteur_id')
                                    'is-invalid' @enderror"
                                                id="" wire:model='editCooperative.secteur_id'>
                                                <option value="">Choisir un secteur</option>
                                                @foreach ($secteurs as $secteur)
                                                    <option value="{{ $secteur }}">{{ showSecteurName($secteur) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('editCooperative.secteur_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Type *</label>
                                            <select type="text"
                                                class="form-control @error('editCooperative.type_coop')
                                'is-invalid' @enderror"
                                                id="" wire:model='editCooperative.type_coop'>
                                                <option value="">Choisir un type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type }}">{{ showTypeName($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('editCooperative.type_coop')
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
                                                class="form-control @error('editCooperative.adresse')
                                    'is-invalid' @enderror"
                                                id="" wire:model='editCooperative.adresse' />
                                            @error('editCooperative.adresse')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre d'adhérent *</label>
                                            <input type="number"
                                                class="form-control @error('editCooperative.nb_adherant')
                                    'is-invalid' @enderror"
                                                id="" wire:model='editCooperative.nb_adherant' />
                                            @error('editCooperative.nb_adherant')
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
                                                class="form-control @error('editCooperative.localite_id')
                                        'is-invalid' @enderror"
                                                id="" wire:model='editCooperative.localite_id'>
                                                <option value="">Choisir une localité</option>
                                                @foreach ($localites as $localite)
                                                    <option value="{{ $localite->id }}">{{ $localite->nom }}</option>
                                                @endforeach

                                            </select>
                                            @error('editCooperative.localite_id')
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
                                                class="form-control @error('editBureau.date_mandant')'is-invalid'@enderror"
                                                wire:model='editBureau.date_mandant' />
                                            @error('editBureau.date_mandant')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Date de fin *</label>
                                            <input type="date"
                                                class="form-control @error('editBureau.date_fin')'is-invalid'@enderror"
                                                wire:model='editBureau.date_fin' />
                                            @error('editBureau.date_fin')
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
                                                                class="form-control @error('editMembreBureau1.nom') 'is-invalid' @enderror"
                                                                id="nom_coop_confirm"
                                                                wire:model='editMembreBureau1.nom'>
                                                            @error('editMembreBureau1.nom')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Poste *</label>
                                                            <input type="text"
                                                                class="form-control @error('editMembreBureau1.poste')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='editMembreBureau1.poste' />
                                                            @error('editMembreBureau1.poste')
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
                                                                class="form-control @error('editMembreBureau1.email')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='editMembreBureau1.email' />
                                                            @error('editMembreBureau1.email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Téléphone *</label>
                                                            <input type="text"
                                                                class="form-control @error('editMembreBureau1.tel')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='editMembreBureau1.tel' />
                                                            @error('editMembreBureau1.tel')
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
                                                                class="form-control @error('editMembreBureau2.nom') 'is-invalid' @enderror"
                                                                id="nom_coop_confirm"
                                                                wire:model='editMembreBureau2.nom'>
                                                            @error('editMembreBureau2.nom')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Poste *</label>
                                                            <input type="text"
                                                                class="form-control @error('editMembreBureau2.poste')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='editMembreBureau2.poste' />
                                                            @error('editMembreBureau2.poste')
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
                                                                class="form-control @error('editMembreBureau2.email')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='editMembreBureau2.email' />
                                                            @error('editMembreBureau2.email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Téléphone *</label>
                                                            <input type="text"
                                                                class="form-control @error('editMembreBureau2 .tel')
                                                    'is-invalid' @enderror"
                                                                id="" wire:model='editMembreBureau2.tel' />
                                                            @error('editMembreBureau2.tel')
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
                    <button type="button" wire:click.prevent='updateCooperative' class="btn bg-primary">Modifier la coopérative</button>
                    <button type="button" class="btn bg-danger" wire:click.prevent="updateView('liste',0)">Retour à la liste</button>
                </div>

        </div>
    </div>
</div>














