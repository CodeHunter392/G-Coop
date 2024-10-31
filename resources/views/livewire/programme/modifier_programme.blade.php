<div >
    @section('title')
    Formulaire de création d'programme
    @endsection
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire de modification de programme</h3>
            </div>
            <form role="form" wire:submit.prevent="updateProgramme">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom du programme *</label>
                        <input type="text" class="form-control @error('editProgramme.nom') is-invalid @enderror"
                            wire:model='editProgramme.nom'>
                        @error("editProgramme.nom")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de début *</label>
                                <input type="date" wire:model='editProgramme.date_debut' class="form-control @error('editProgramme.date_debut') is-invalid @enderror"/>
                                @error("editProgramme.date_debut")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de fin *</label>
                                <input type="date" wire:model='editProgramme.date_fin' class="form-control @error('editProgramme.date_fin') is-invalid @enderror"/>
                                @error("editProgramme.date_fin")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sous la tutelle de  *</label>
                                <select wire:model='editProgramme.tutelle' class="form-control @error('editProgramme.tutelle')is-invalid @enderror">
                                    <option value="">Choisir</option>
                                    @foreach($tutelles as $tutelle)
                                    <option value="{{$tutelle->id}}">{{$tutelle->nom}}</option>
                                    @endforeach
                                </select>
                                @error("editProgramme.tutelle")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Montant  *</label>
                                <input wire:model='editProgramme.montant' class="form-control @error('editProgramme.montant')is-invalid @enderror"/>
                                @error("editProgramme.montant")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Modifier le programme</button>
                    <button type="button" class="btn btn-danger" wire:click="updateView('liste','0')">Retourner à la liste</button>
                </div>
            </form>
        </div>



    </div>

</div>

