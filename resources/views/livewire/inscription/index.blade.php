@section('titre', 'Inscrivez vous !')
<div class="page-section" style="background-image: url('{{ asset('images/register-img2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10 ">
                <div class="card " style="border-radius: 1rem;">
                    <div class="card-body p-4 text-black">

                        <h3 class="mb-3">Informations sur la coopérative</h3>

                        <form wire:submit='addCoop'>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="coopName" class="form-label">Nom de la coopérative *</label>
                                    <input type="text" id="coopName" wire:model='newCoop.nom' class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Type *</label>
                                    <select id="type" class="form-select" wire:model='newCoop.type_coop'>
                                        <option selected>Choisir un type</option>
                                        @foreach ($types as $type )
                                        <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="members" class="form-label">Nombre d'adhérents *</label>
                                    <input type="number" id="members" class="form-control" wire:model='newCoop.nombre' />
                                </div>
                                <div class="col-md-6">
                                    <label for="sector" class="form-label">Secteur *</label>
                                    <select id="sector" class="form-select" wire:model='newCoop.secteur_id'>
                                        <option selected>Choisir un secteur</option>
                                        @foreach ($secteurs as $secteur)
                                        <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label">Date de création *</label>
                                    <input type="date" id="startDate" class="form-control" wire:model='newCoop.date_creation'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label">Date de fin d'activité *</label>
                                    <input type="date" id="endDate" class="form-control" wire:model='newCoop.date_fin_activite' />
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Adresse de la coopérative *</label>
                                    <input type="text" id="address" class="form-control" wire:model='newCoop.adresse'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="locality" class="form-label">Localité *</label>
                                    <select id="locality" class="form-select" wire:model='newCoop.localite_id'>
                                        <option selected>Choisir une localité</option>
                                        @foreach($localites as $localite)
                                        <option value="{{ $localite->id }}">{{ $localite->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <h3 class="mb-3">Informations sur le bureau de la coopérative</h3>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="mandateStart" class="form-label">Date du mandat *</label>
                                    <input type="date" id="mandateStart" class="form-control" wire:model='newCoopBureau.date_mandant' />
                                </div>
                                <div class="col-md-6">
                                    <label for="mandateEnd" class="form-label">Date de fin *</label>
                                    <input type="date" id="mandateEnd" class="form-control" wire:model='newCoopBureau.date_fin' />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nomcomplet" class="form-label">Nom Complet *</label>
                                    <input type="text" id="nomcomplet" class="form-control" wire:model='newCoopBureau1.nom'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="poste" class="form-label">Poste *</label>
                                    <input type="text" id="poste" class="form-control" wire:model='newCoopBureau1.poste'/>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="adresseEmail" class="form-label">Adresse Email *</label>
                                    <input type="email" id="adresseEmail" class="form-control" wire:model='newCoopBureau1.email'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="mandateEnd" class="form-label">Téléphone *</label>
                                    <input type="tel" id="mandateEnd" class="form-control" pattern="[0-9]{10}" wire:model='newCoopBureau1.tel'/>

                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn text-white  btn-lg btn-block" style="background-color: #284a71; width:50%;">S'inscrire</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <section class="vh-100"
    style="background-image: url('{{ asset('images/register-img2.jpg') }}'); background-size: cover; background-position: center;">

    <div class="container my-5 py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10 ">
                <div class="card " style="border-radius: 1rem;">
                    <div class="card-body p-4 text-black">

                        <h3 class="mb-3">Informations sur la coopérative</h3>

                        <form wire:submit='addCoop'>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="coopName" class="form-label">Nom de la coopérative *</label>
                                    <input type="text" id="coopName" wire:model='newCoop.nom' class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Type *</label>
                                    <select id="type" class="form-select" wire:model='newCoop.type_coop'>
                                        <option selected>Choisir un type</option>
                                        @foreach ($types as $type )
                                        <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="members" class="form-label">Nombre d'adhérents *</label>
                                    <input type="number" id="members" class="form-control" wire:model='newCoop.nombre' />
                                </div>
                                <div class="col-md-6">
                                    <label for="sector" class="form-label">Secteur *</label>
                                    <select id="sector" class="form-select" wire:model='newCoop.secteur_id'>
                                        <option selected>Choisir un secteur</option>
                                        @foreach ($secteurs as $secteur)
                                        <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label">Date de création *</label>
                                    <input type="date" id="startDate" class="form-control" wire:model='newCoop.date_creation'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label">Date de fin d'activité *</label>
                                    <input type="date" id="endDate" class="form-control" wire:model='newCoop.date_fin_activite' />
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Adresse de la coopérative *</label>
                                    <input type="text" id="address" class="form-control" wire:model='newCoop.adresse'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="locality" class="form-label">Localité *</label>
                                    <select id="locality" class="form-select" wire:model='newCoop.localite_id'>
                                        <option selected>Choisir une localité</option>
                                        @foreach($localites as $localite)
                                        <option value="{{ $localite->id }}">{{ $localite->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <h3 class="mb-3">Informations sur le bureau de la coopérative</h3>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="mandateStart" class="form-label">Date du mandat *</label>
                                    <input type="date" id="mandateStart" class="form-control" wire:model='newCoopBureau.date_mandant' />
                                </div>
                                <div class="col-md-6">
                                    <label for="mandateEnd" class="form-label">Date de fin *</label>
                                    <input type="date" id="mandateEnd" class="form-control" wire:model='newCoopBureau.date_fin' />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nomcomplet" class="form-label">Nom Complet *</label>
                                    <input type="text" id="nomcomplet" class="form-control" wire:model='newCoopBureau1.nom'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="poste" class="form-label">Poste *</label>
                                    <input type="text" id="poste" class="form-control" wire:model='newCoopBureau1.poste'/>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="adresseEmail" class="form-label">Adresse Email *</label>
                                    <input type="email" id="adresseEmail" class="form-control" wire:model='newCoopBureau1.email'/>
                                </div>
                                <div class="col-md-6">
                                    <label for="mandateEnd" class="form-label">Téléphone *</label>
                                    <input type="tel" id="mandateEnd" class="form-control" pattern="[0-9]{10}" wire:model='newCoopBureau1.tel'/>

                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
