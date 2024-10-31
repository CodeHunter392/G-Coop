<div >
    @section('title')
    Formulaire de modification d'organisme
    @endsection
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire de modification d'organisme</h3>
            </div>
            <form role="form" wire:submit.prevent="modifierOrganisme">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control @error('editOrganisme.nom') is-invalid @enderror"
                            wire:model='editOrganisme.nom'>
                        @error("editOrganisme.nom")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('editOrganisme.email') is-invalid @enderror"
                            wire:model='editOrganisme.email'>
                        @error("editOrganisme.email")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date de création</label>
                        <input type="date" class="form-control @error('editOrganisme.date_creation') is-invalid @enderror"
                            wire:model='editOrganisme.date_creation'>
                        @error("editOrganisme.date_creation")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control @error('editOrganisme.type') is-invalid @enderror"
                            wire:model='editOrganisme.type' >
                            <option value="">--------------</option>
                            <option value="association">Association</option>
                            <option value="coopérative">Coopérative</option>
                            <option value="entreprise">Entreprise</option>
                        </select>
                        @error("editOrganisme.type")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('editOrganisme.adresse') is-invalid @enderror"
                            wire:model='editOrganisme.adresse'>
                        @error("editOrganisme.adresse")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control @error('editOrganisme.telephone') is-invalid @enderror"
                        wire:model='editOrganisme.telephone'  />

                        @error("editOrganisme.telephone")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <button type="button" class="btn btn-danger" wire:click="updateView('liste','0')">Annuler</button>
                </div>
            </form>
        </div>



    </div>

</div>

