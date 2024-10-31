<div >
    @section('title')
    Formulaire de création d'organisme
    @endsection
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire de création d'organisme</h3>
            </div>
            <form role="form" wire:submit.prevent="addOrganisme">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom de l'organisme *</label>
                        <input type="text" class="form-control @error('newOrganisme.nom') is-invalid @enderror"
                            wire:model='newOrganisme.nom'>
                        @error("newOrganisme.nom")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email"/>
                                {{-- @error("newOrganisme.email")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tel">Téléphone</label>
                                <input class="form-control" type="tel" name="tel" id="tel"/>
                                {{-- @error("newOrganisme.tel")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control @error('newOrganisme.type') is-invalid @enderror"
                            wire:model='newOrganisme.type' >
                            <option value="">--------------</option>
                            <option value="association">Association</option>
                            <option value="fondation">Fondation</option>

                        </select>
                        @error("newOrganisme.type")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('newOrganisme.adresse') is-invalid @enderror"
                            wire:model='newOrganisme.adresse'>
                        @error("newOrganisme.adresse")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control @error('newOrganisme.telephone') is-invalid @enderror"
                        wire:model='newOrganisme.telephone'  />

                        @error("newOrganisme.telephone")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div> --}}
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter l'organisme</button>
                    <button type="button" class="btn btn-danger" wire:click="updateView('liste','0')">Retourner à la liste</button>
                </div>
            </form>
        </div>



    </div>

</div>

