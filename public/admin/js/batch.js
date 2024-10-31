$(document).ready(function () {
    // Fonction pour récupérer les résultats en fonction des critères sélectionnés
    function getResults() {
        var anneeId = $("select[name='annee-scolaire']").val();
        var centreId = $("select[name='centre']").val();

        $.ajax({
            url: "./requests/batch/request-critere-form.php",
            data: {
                anneeId: anneeId,
                centreId: centreId
            },
            type: "POST",
            success: function (res) {

                $("#form-critere-element-placeholder").empty().append(res);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Gérer les erreurs
                console.log("Request failed: " + textStatus + ", " + errorThrown);
            }
        });
    }

    // Appeler getResults() au chargement de la page pour afficher les résultats par défaut
    getResults();

    // Écouter les changements de  l'Année ou Centre
    $("select[name='annee-scolaire'], select[name='centre']").change(function () {
        getResults();
    });


    //* Recuperer Student
    function getStudent() {
        var anneeId = $("select[name='annee-scolaire']").val();
        var centreId = $("select[name='centre']").val();
        var classeId = $("select[name='classe']").val();
        //   console.log(classeId);
        //   console.log(centreId);

        $.ajax({
            url: "./requests/batch/request-student-form.php",
            data: {
                anneeId: anneeId,
                centreId: centreId,
                classeId: classeId
            },
            type: "POST",
            success: function (res) {
                // Vider le contenu actuel avant d'ajouter le nouveau contenu
                $("#student-placeholder").empty().append(res);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Request failed: " + textStatus + ", " + errorThrown);
            }
        });
    }

    function getSemestre() {
        
        var classeId = $("select[name='classe']").val();
        //   console.log(classeId);
        //   console.log(centreId);

        $.ajax({
            url: "./requests/semestre/request-semestre-classe.php",
            data: {
                classeId: classeId
            },
            type: "POST",
            success: function (res) {
                // Vider le contenu actuel avant d'ajouter le nouveau contenu
                $("#semestre-placeholder").empty().append(res);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Request failed: " + textStatus + ", " + errorThrown);
            }
        });
    }

    //* Écouter le changement de classe
    $(document).on("change", "select[name='classe']", function () {
        // functiion pour recuperer liste etudiant
        getStudent();
        // getSemestre();
    })


    //* Removing the form element being added
    $(document).on("click", ".remove-form-element-btn", function () {
        console.log($(this).parent())
        $(this).parent().remove()
    })


    //? submit le formulaire

    $('#create-batch').submit(function (event) {
        // Empêcher le comportement par défaut du formulaire
        event.preventDefault();

        // Récupérer les ID des étudiants sélectionnés
        var studentsIds = [];

        $("input[name='student']:checked").each(function () {
            studentsIds.push($(this).val());
        });
        // console.log(studentsIds); 
        // * Récupérer les valeurs 
        var classeId = $("select[name='classe']").val();
        var job_id = $("select[name='job_id']").val();
        var date_prog = $("input[name='date_prog']").val();
        var desc = $("input[name='desc']").val();
        var semestre = $("select[name='semestre']").val();
        // Créer l'objet à envoyer
        var formData = {};

        // Vérifier s'il y a des étudiants sélectionnés
        if (studentsIds.length > 0) {
            formData.etudiants = studentsIds;
            formData.semestre = semestre;

        } else {
            formData.classe = classeId;
            formData.semestre = semestre;

        }

        // Envoyer les données
        $.ajax({
            url: "./requests/batch/insert-batch.php",
            type: 'POST',
            data: {
                formData: formData,
                job_id: job_id,
                date_prog: date_prog,
                desc : desc,
            },
            success: function (response) {
                console.log(response);
                var response = JSON.parse(response);
                var job_nom = response.job_nom;

                    // Ajouter la nouvelle ligne à la table
                    var newRow = '<tr>' +
                        '<td class="text-center">' + job_nom + '</td>' +
                        '<td class="text-center">' + date_prog + '</td>' +
                        '<td class="text-center">---</td>' +
                        '<td class="text-center">---</td>' +
                        '<td class="text-center">0</td>' +
                        '<td class="text-center"><span class="label label-info">N</span></td>' +
                        '</tr>';
                    $('#dynamic-table tbody').prepend(newRow);
                    // Afficher un message de succès
                    $.toast({
                        heading: 'Success',
                        text: 'Le batch est bien inséré',
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 7000
                    });
                $('#generate-account-modal').modal('hide');
                
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.log(error);
                $.toast({
                    heading: 'Erreur',
                    text: "Une erreur s'est produite lors de l'envoi de la requête",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 7000
                });
            }
        });
        
    });

    //fermer le modal
    $('#closeModalButton').click(function() {
        $('#generate-account-modal').modal('hide');
    });


});



