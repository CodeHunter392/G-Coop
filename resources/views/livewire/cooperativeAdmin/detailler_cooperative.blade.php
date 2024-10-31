<div class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <button class="card-title btn bg-primary" wire:click="updateView('liste','0')"><i
                        class="fas fa-long-arrow-alt-left fa-2x"></i>
                </button>
            </div>
            <div class="col-sm-6">
                <div class="card  ">
                    <div class="card-header bg-primary flex justify-center">
                        <h3 class="card-title">Détails de la coopérative </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nom : </label>
                                    <span>{{ $detail_Cooperative->nom }}</span>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email : </label>
                                    <span>{{ $detail_Cooperative->email }}</span>
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Secteur : </label>
                                    <span>{{ $detail_Cooperative->secteur->nom }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Type : </label>
                                    <span>{{ $detail_Cooperative->type_coops->nom }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Localité : </label>
                                    <span>{{ $detail_Cooperative->localite->nom }}</span>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-12">
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header ">
                        <h3 class="card-title ">Les membres </h3>
                        <div class="card-tools ">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom Compet</th>
                                    <th>Téléphone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_Cooperative->bureau->membres as $membre)


                                <tr>
                                    <td>{{ $membre->nom }} </td>
                                    <td>{{ $membre->tel }}</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Finances</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Dépenses totales</label>
                            <span class="form-control" ></span>

                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Revenus totaux</label>
                            <span class="form-control" ></span>

                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Revenus - Dépenses</label>
                            <span class="form-control"></span>
                        </div>
                    </div>

                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Les projets</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>Nom</th>
                                    <th>Date de fin</th>
                                    <th>Budget (MAD)</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td> </td>
                                    <td></td>
                                    <td> MAD</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </section>
</div>



@section('title')
Detaille de la coopérative
@endsection
