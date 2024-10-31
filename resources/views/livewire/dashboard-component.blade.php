@section('title')
    Tableau de bord
@endsection
@section('h1')
    <h1 class="m-0" style="font-family: inherit;">Tableau de bord</h1>
@endsection
<section class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        {{-- <h3>{{ $nombre_orga }}</h3> --}}
                        <h3 class="text-center">{{ $nombre_coop }}</h3>
                        <p class="text-center">Nombre des coopératives</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('coop.index') }}" class="small-box-footer">Plus d'info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 class="text-center">{{ $nombre_coop_adhe }}
                            {{-- {{ $nombre_membre }} --}}
                        </h3>
                        <p class="text-center">Adhérents aux coopératives</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('coop.index') }}" class="small-box-footer">Plus d'info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box text-white " style="background-color: #9f0af0;">
                    <div class="inner">
                        <h3 class="text-center">
                             {{ $nombre_programmes }}
                        </h3>
                        <p class="text-center">Programmes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('programme.index') }}" class="small-box-footer">Plus d'info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 class="text-center">{{ $nombre_programmes_encours }}</h3>

                        <p class="text-center">Programmes en cours</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('coop.index') }}" class="small-box-footer">Plus d'info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div id="map" wire:ignore style="height: 50vh;"></div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="modal bg-transparent" wire:ignore.self id="region-chart-modal">
                    <style>
                        .modal-dialog {
                            max-width: 100%;
                            width: 90%;
                        }
                    </style>
                    <div class="modal fade show" id="myModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" style="padding-right: 22.9922px; display: block; "
                        aria-modal="true">
                        <div class="modal-dialog col-10" role="document">
                            <div class="modal-content bg-light">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Région de {{ $regionn }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="false">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class='row'>
                                            <div class="col-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header ">

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                    <div class="card-body ">
                                                        <div class="row">

                                                            <div class="col-12 col-md-6">
                                                                <div class="card card-primary">
                                                                    <div class="card-header ">
                                                                        <h3 class="card-title ">Les programmes en cours
                                                                        </h3>

                                                                    </div>
                                                                    <div class="card-body p-0">
                                                                        <div class="table-responsive">
                                                                            <table class="table ">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="text-sm">Nom du Programme</th>
                                                                                        <th class="text-sm">Budget (MAD)</th>
                                                                                        <th class="text-sm">Tutelle</th>
                                                                                        {{-- <th>Nombre de coopératives </th> --}}
                                                                                        <th class="text-sm">Familles touchées</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($programmes as $prog )


                                                                                    <tr>
                                                                                        <td class="text-sm">{{ $prog->nom }}</td>
                                                                                        <td class="text-sm">{{ $prog->montant }} </td>
                                                                                        <td class="text-sm">{{ $prog->tutelleNom->nom }}</td>

                                                                                        <td class="text-sm">{{ $testData2[$loop->index] }}</td>

                                                                                    </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="card card-secondary">
                                                                    <div class="card-header ">
                                                                        <h3 class="card-title ">Les coopératives </h3>

                                                                    </div>
                                                                    <div class="card-body p-0">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-responsive">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="text-sm">Nom </th>
                                                                                        <th class="text-sm">Type</th>
                                                                                        <th class="text-sm">Secteurs</th>
                                                                                        <th class="text-sm">Nombre d'adhérent</th>


                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($cooperativesLocalite as $cooperative)
                                                                                        <tr>
                                                                                            <td class="text-sm">{{ $cooperative->nom }}
                                                                                            </td>
                                                                                            <td class="text-sm">{{ $cooperative->type_coops->nom }}
                                                                                            </td>
                                                                                            <td class="text-sm">{{ $cooperative->secteur->nom }}
                                                                                            </td>
                                                                                            <td class="text-sm">{{ $cooperative->nb_adherant }}
                                                                                            </td>


                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="card ">
                                                    <div class="card-header">
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12 col-md-4">
                                                                <div class="card card-secondary">
                                                                    <div class="card-header"
                                                                        {{-- style="background-color: #21ba9f;" --}}
                                                                        >
                                                                        <label class="card-title">Nombre de familles
                                                                            touchées par
                                                                            programme</label>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        @include('modal')
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-12 col-md-4">
                                                                <div class="card card-secondary">
                                                                    <div class="card-header">
                                                                        <label class="card-title">Pourcentage de réalisation par programme</label>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        @include('barjs')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-4">
                                                                <div class="card card-secondary">
                                                                    <div class="card-header">
                                                                        <label class="card-title">Nombre de coopératives
                                                                            par
                                                                            secteur d'activité</label>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        @include('piechartjs')
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- <div class="modal" wire:ignore.self id="region-chart-modal">
        //@include('modal')
    </div> --}}

</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
    integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([14.4974, -14.4524], 6);

    // Déclaration de la couche ESRI World Topo Map
    var esriWorldTopo = L.tileLayer(
        'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ'
        });

    // Ajouter la couche ESRI World Topo Map à la carte
    esriWorldTopo.addTo(map);

    // Récupération des données GeoJSON et ajout à la carte
    fetch('/geojson/senegal.geojson')
        .then(response => response.json())
        .then(data => {
            L.geoJSON(data, {
                style: function(feature) {
                    return {
                        color: '#3388ff',
                        weight: 3
                    }; // Style par défaut pour les régions
                },
                onEachFeature: function(feature, layer) {
                    // Afficher le nom de la région directement à partir des propriétés du GeoJSON
                    const regionName = feature.properties.name;

                    // Lier un popup au clic sur la région avec le nom de la région
                    layer.bindPopup("Région : " + regionName);

                    // Changer la couleur et l'épaisseur de la bordure au survol
                    layer.on('mouseover', function() {
                        layer.setStyle({
                            color: '#ff7800',
                            weight: 5
                        });
                        layer.openPopup();
                        // Afficher le popup lors du survol
                    });

                    // Réinitialiser la couleur et la bordure lorsque la souris quitte la région
                    layer.on('mouseout', function() {
                        layer.setStyle({
                            color: '#3388ff',
                            weight: 3
                        });
                        //layer.closePopup(); // Fermer le popup lorsque la souris quitte
                    });

                    //Afficher le pop up
                    layer.on('click', function() {
                        //
                        // Afficher le modal
                        document.getElementById('region-chart-modal').style.display = 'block';

                        //  s

                        @this.regionSelected(regionName);

                    })

                }
            }).addTo(map);
        })
        .catch(error => console.error('Erreur lors de la récupération des données GeoJSON:', error));
    // Fermer la modale lorsqu'on clique sur la croix
    document.querySelector('.close').onclick = function() {
        document.getElementById('region-chart-modal').style.display = "none";

    }

    // Fermer la modale lorsqu'on clique en dehors de la modale
    window.onclick = function(event) {
        if (event.target == document.getElementById('region-chart-modal')) {
            document.getElementById('region-chart-modal').style.display = "none";
        }
    }
</script>
