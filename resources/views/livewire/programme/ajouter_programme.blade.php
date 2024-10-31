<div >
    @section('title')
    Formulaire de création d'programme
    @endsection
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-window-restore fa-2x"></i>Formulaire d'ajout de programme</h3>
            </div>
            <form role="form" wire:submit.prevent="addProgramme">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom du programme *</label>
                        <input type="text" class="form-control @error('newProgramme.nom') is-invalid @enderror"
                            wire:model='newProgramme.nom'>
                        @error("newProgramme.nom")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de début *</label>
                                <input type="date" wire:model='newProgramme.date_debut' class="form-control @error('newProgramme.date_debut') is-invalid @enderror"/>
                                @error("newProgramme.date_debut")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de fin *</label>
                                <input type="date" wire:model='newProgramme.date_fin' class="form-control @error('newProgramme.date_fin') is-invalid @enderror"/>
                                @error("newProgramme.date_fin")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sous la tutelle de  *</label>
                                <select wire:model='newProgramme.tutelle' class="form-control @error('newProgramme.tutelle')is-invalid @enderror">
                                    <option value="">Choisir un organisme tutelle </option>
                                    @foreach($tutelles as $tutelle)
                                    <option value="{{$tutelle->id}}">{{$tutelle->nom}}</option>
                                    @endforeach
                                </select>
                                @error("newProgramme.tutelle")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Montant  *</label>
                                <input wire:model='newProgramme.montant' class="form-control @error('newProgramme.montant')is-invalid @enderror"/>
                                @error("newProgramme.montant")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title text-center">Financé par  :</label>

                                </div>
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 45%">Organisme</th>
                                                <th style="width: 45%">Montant</th>
                                                <th style="width: 10%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                    <td><select  wire:model='organisme'placeholder="Organisme" style="width: 100%;" >
                                                        <option >Choisir un organisme</option>
                                                        @foreach($tutelles as $tutelle)
                                                        <option value="{{$tutelle->id}}">{{$tutelle->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                        @error('organisme')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>

                                                    <td><input type="number" wire:model ='montant' placeholder="Montant (MAD)" style="width: 100%;" />
                                                        @error('montant')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </td>

                                                    <td><button type="button" wire:click.prevent = 'addFinance' class="btn btn-primary">Ajouter</button></td>

                                            </tr>
                                             @foreach ($newFinances as $index => $item)
                                                <tr>
                                                    <td>{{showOrganismeName($item['organisme']) }}</td>
                                                    <td>{{ $item['montant'] }} MAD</td>
                                                    <td><button wire:click="deleteObjectifs()"
                                                            class="btn btn-danger">Supprimer</button></td>
                                                </tr>
                                             @endforeach

                                        </tbody>
                                    </table>


                                </div>
                            </div>

                        </div>



                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter le programme</button>
                    <button type="button" class="btn btn-danger" wire:click="updateView('liste','0')">Retourner à la liste</button>
                </div>
            </form>
        </div>



    </div>

</div>

