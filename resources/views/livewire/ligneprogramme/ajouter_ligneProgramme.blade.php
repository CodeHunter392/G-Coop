<div>
    @section('title')
        Formulaire de création de ligne de programme
    @endsection
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire d'ajout de ligne de programme</h3>
            </div>


            <div class="card-body">
                <div class="form-group">
                    <label>Libelle *</label>
                    <input type="text" class="form-control @error('newLigneProgramme.libelle') is-invalid @enderror"
                        wire:model='newLigneProgramme.libelle'>
                    @error('newLigneProgramme.libelle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Echeance</label>
                            <input type="date" wire:model='newLigneProgramme.echeance'
                                class="form-control @error('newLigneProgramme.echeance') is-invalid @enderror" />
                            @error('newLigneProgramme.echeance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Montant *</label>
                            <input wire:model='newLigneProgramme.montant'
                                class="form-control @error('newLigneProgramme.montant')is-invalid @enderror" />
                            @error('newLigneProgramme.montant')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title text-center">Les objectifs</label>

                            </div>
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 45%">Echeance</th>
                                            <th style="width: 45%">Objectifs</th>
                                            <th style="width: 10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                                <td><input class ="@error('echeance')is-invalide @enderror" type="date" wire:model='echeance'placeholder="echeance" style="width: 100%;" />
                                                    @error('echeance')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>

                                                <td><input type="text" wire:model ='objectif' placeholder="objectif" style="width: 100%;" />
                                                    @error('objectif')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>

                                                <td><button type="button" wire:click.prevent = 'addObjectifs' class="btn btn-primary">Ajouter</button></td>

                                        </tr>
                                        @foreach ($newObjectifs as $index => $item)
                                            <tr>
                                                <td>{{ $item['echeance'] }}</td>
                                                <td>{{ $item['objectif'] }}</td>
                                                <td><button wire:click="deleteObjectifs({{ $index }})"
                                                        class="btn btn-danger">Supprimer</button></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" wire:click.prevent='addLigneProgramme' class="btn btn-primary">Ajouter la ligne de
                        programme</button>
                    <button type="button" class="btn btn-danger" wire:click="updateView('liste','0')">Retourner à la
                        liste</button>
                </div>

            </div>



        </div>

    </div>
</div>

