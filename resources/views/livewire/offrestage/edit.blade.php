<div class="row p-4 pt-5">
    <div class="col-md-12">

        <div class="card card-olive">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire d'édition d'offre de stage</h3>
            </div>
            <form role="form" wire:submit.prevent="updateOffreStage">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" class="form-control @error('editOffre.titre') is-invalid @enderror"
                            wire:model='editOffre.titre'>
                        @error("editOffre.titre")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Entreprise</label>
                        <input type="text" class="form-control @error('editOffre.entreprise') is-invalid @enderror"
                            wire:model='editOffre.entreprise'>
                        @error("editOffre.entreprise")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ville</label>
                        <select class="form-control @error('editOffre.lieu') is-invalid @enderror"
                            wire:model='editOffre.lieu'>
                            <option value="">--------------</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Kénitra">Kénitra</option>
                            <option value="Mohammedia">Mohammedia</option>
                        </select>
                        @error("editOffre.lieu")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Lien / URL</label>
                        <input type="text" class="form-control @error('editOffre.lien') is-invalid @enderror"
                            wire:model='editOffre.lien'>
                        @error("editOffre.lien")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Date de publication</label>
                        <input type="date"
                            class="form-control @error('editOffre.date_publication') is-invalid @enderror"
                            wire:model='editOffre.date_publication'>
                        @error("editOffre.date_publication")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Modifier</button>
                    <button type="button" class="btn btn-danger" wire:click='goToListStage'>Annuler</button>
                </div>
            </form>
        </div>



    </div>

</div>
<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('showSuccessMessage', (event) => {
        Swal.fire({
            position: "top-end",
            icon: "success",
            toast:true,
            title: event.message,
            showConfirmButton: false,
            timer: 2500
                    });
       });
    });
</script>