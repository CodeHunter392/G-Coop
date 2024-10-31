function getBatch() {
    // récupérer les batchs à exécuter aujourd'hui
    $.ajax({
        url: "./requests/batch/batch-execute.php",
        data: {},
        type: "POST",
        success: function (res) {
            console.log(res);

            var responseObj = JSON.parse(res); 
                
            var batchId = responseObj.batch_id;
            var status = responseObj.status;
            var dateExec = responseObj.date_exec;
            var dateFin = responseObj.datefin;

            console.log(batchId,status,dateExec,dateFin);

            var statusCell = document.querySelector('tr[data-batch-id="' + batchId + '"] td[name="status"] .label');
            if (status) {
                statusCell.innerHTML = '<label>' + status + '</label>';
            }
                
            var dateexCell = document.querySelector('tr[data-batch-id="' + batchId + '"] td[name="execute"]');
            
            if (dateExec) {
                dateexCell.innerHTML = '<label>' + dateExec + '</label>';
            }
        
            var datefinCell = document.querySelector('tr[data-batch-id="' + batchId + '"] td[name="fin"]');
            if (dateFin) {
                datefinCell.innerHTML = '<label>' + dateFin + '</label>';
            }   

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Request failed: " + textStatus + ", " + errorThrown);
        }
    });
}

// Exécuter la fonction toutes les 2 minutes
setInterval(getBatch, 120000); 
getBatch(); 