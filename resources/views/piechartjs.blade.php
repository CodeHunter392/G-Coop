<canvas id="coopPieChart" width="100%" height="300"></canvas>
<script>
    // Récupération du contexte 2D du canvas
    var ctx = document.getElementById('coopPieChart').getContext('2d');
    const revenusData = @json($cooperativeParSecteur);
        const labelss = revenusData.map(data => data.secteur.nom);
        const totals = revenusData.map(data => data.total);
    // Création du Pie Chart
    var coopPieChart = new Chart(ctx, {
        type: 'pie', // Type de graphique
        data: {
            // 'Agroalimentaire', 'Commerce', 'Environnement', 'Énergie', 'Construction'
            labels:labelss,
            //@json($cooperativeParSecteur->pluck('secteur')), // Secteurs
            datasets: [{
                label: 'Nombre de Coopératives par Secteur',
                data:totals,
                //@json($cooperativeParSecteur->pluck('total')) , // Nombre de coopératives par secteur
                backgroundColor: [
                    '#9f0af0',
                    '#03faf3',
                    '#f95012',
                    '#284a71',
                    '#85b758',
                    'yellow'

                ], // Couleurs pour chaque secteur
                borderWidth: 1
            }]
        },
        options: {
            responsive: true, // Graphique responsive
            plugins: {
                legend: {
                    position: 'top', // Position de la légende
                    label :{
                        font : {
                            size:18
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' coopératives';
                        }
                    }
                }
            }
        }
    });
</script>
