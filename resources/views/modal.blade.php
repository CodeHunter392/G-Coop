 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="famillesBarChart" width="300" height="300"></canvas>
<script>
    // Récupération du contexte 2D du canvas
    var ctx = document.getElementById('famillesBarChart').getContext('2d');

    // Création du Bar Chart
    var famillesBarChart = new Chart(ctx, {
        type: 'bar', // Type de graphique
        data: {
            //'Programme SupCOOP', 'Programme de soutien aux coopératives agricoles', "Programme d'appui aux coopératives artisanales","Programme d'aide aux coopératives agricoles"
            labels: @json($programmeNom), // Noms des programmes
            datasets: [{
                label: 'Nombre de Familles Touchées',
                data: @json($testData2), // Nombre de familles touchées par programme
                backgroundColor: '#21ba9f' // Couleurs des barres
                // borderColor: [
                //     'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)',
                //     'rgba(255, 206, 86, 1)',
                //     'rgba(75, 192, 192, 1)',
                //     'rgba(153, 102, 255, 1)'
                // ], // Couleurs des bordures
                //borderWidth: 1 // Épaisseur des bordures
            }]
        },
        options: {
            responsive: true, // Graphique responsive

            maintainAspectRatio: false, // Permet d'ajuster la hauteur indépendamment de la largeur
            aspectRatio: 2, // Ajuste le ratio largeur/hauteur du graphique

            scales: {
                y: {
                    beginAtZero: true, // L'axe Y commence à 0
                    ticks:{
                        font:{
                            size:18,
                        }
                    }
                },
                x:{
                    ticks:{
                        font:{
                            //
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Cacher la légende si besoin
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.raw + ' familles';
                        }
                    }
                }
            }
        }
    });
</script>

