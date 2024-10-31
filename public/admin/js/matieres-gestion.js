// Filter pour l'affichage de la liste des matières
// $('.filtre-matiere').on('input', function () {
//   var filterValue = $(this).val().toLowerCase();
//   console.log("Filter Value:", filterValue);

//   var rows = $('#Matieres-list tr');

//   rows.each(function () {
//     var abbr = $(this).find('td:eq(0)').text().toLowerCase();
//     var nom = $(this).find('td:eq(1)').text().toLowerCase();

//     console.log("Abbr:", abbr, "Nom:", nom);

//     if (abbr.includes(filterValue) || nom.includes(filterValue)) {
//       $(this).show();
//     } else {
//       $(this).hide();
//     }
//   });
// });


  //*-----------------------------------Ajouter  sur le matieres-----------------------------------
  
// Fermer le modal et soumettre le formulaire pour ajouter une matière
$('#AjouterMatiere').click(function () {
  $('#matiere_add').modal('hide');
  $('.AjouterForm').submit();
});

// Soumettre le formulaire
// $(".AjouterForm").submit(function (event) {
//   event.preventDefault();
//   $.ajax({
//     type: "POST",
//     url: "Add_matieres.php",
//     data: $(this).serialize(),
//     success: function (response) {
//       console.log(response);
//       var heading, text, icon;

//       if (response.trim() === "true") {
//         // L'ajout a réussi
//         heading = "Ajout validé";
//         text = "La matière a été ajoutée avec succès";
//         icon = "success";
        
//       } else {
//         // L'ajout a échoué
//         heading = "L'ajout a échoué";
//         text = "La matière existe déjà";
//         icon = "info";
//       }
    
//       $.toast({
//         heading: heading,
//         text: text,
//         showHideTransition: "fade",
//         icon: icon,
//         hideAfter: false,
//       });
//     },
//     error: function (error) {
//       console.log("AJAX error:", error);
//     },
//   });
// });
$(".AjouterForm").submit(function (event) {
  event.preventDefault();
  var form = $(this);

  $.ajax({
    type: "POST",
    url: "Add_matieres.php",
    data: form.serialize(),
    success: function (response) {
      console.log(response);
      var heading, text, icon;

      if (response.trim() === "true") {
        // L'ajout a réussi
        heading = "Ajout validé";
        text = "La matière a été ajoutée avec succès";
        icon = "success";
        
        // Afficher le toast
        $.toast({
          heading: heading,
          text: text,
          showHideTransition: "fade",
          icon: icon,
          hideAfter: false,
        });

        // Attendre 1 seconde avant de recharger la page
        setTimeout(function () {
          location.reload();
        }, 1000);
      } else {
        // L'ajout a échoué
        heading = "L'ajout a échoué";
        text = "La matière existe déjà";
        icon = "info";

        // Afficher le toast
        $.toast({
          heading: heading,
          text: text,
          showHideTransition: "fade",
          icon: icon,
          hideAfter: false,
        });
      }
    },
    error: function (error) {
      console.log("AJAX error:", error);
    },
  });
});


  //*-----------------------------------modification sur le matieres-----------------------------------

  // Gérer le clic sur le lien de modification
$('#matiere_update').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); 
  var modeleId = button.data('modele-id'); // Utiliser data-modele-id pour récupérer id du matieres

  // Remplir les champs du formulaire avec les données actuelles
  $('#modele_id_update').val(modeleId);
  var abbr = button.closest('tr').find('td:nth-child(1)').text().trim();
  var nom = button.closest('tr').find('td:nth-child(2)').text().trim();
  $('#abbr_update').val(abbr);
  $('#nom_update').val(nom);
});


// Gérer le clic sur le bouton Modifier
$('#ModifierMatiere').on('click', function () {
  var modeleId = $('#modele_id_update').val();
  var abbr = $('#abbr_update').val();
  var nom = $('#nom_update').val();

  // Envoyer les données 
  $.ajax({
    type: 'POST',
    url: 'modification-matieres.php',
    data: { modele_id: modeleId, abbr: abbr, nom: nom },
    success: function (response) {
      console.log(response);
    
      $('#matiere_update').modal('hide');

      var heading, text, icon;

      if (response.trim() === "il a des notes") {
        // Afficher le modal de confirmation
        $('#confirmationModal').modal('show');
      }else if (response.trim() === "true") {
        // L'ajout a réussi
        heading = "modification est validé";
        text = "La matière a été modifié avec succès";
        icon = "success";
      } else {
        // L'ajout a échoué
        heading = "La modification a échoué";
        text = "La matière n'a pas été modifier ";
        icon = "info";
      }

      $.toast({
        heading: heading,
        text: text,
        showHideTransition: "fade",
        icon: icon,
        hideAfter: false,
      });
    },
    error: function (error) {
      console.error(error);
    }
  });
});

$('#confirmModification').on('click', function () {
  $('#confirmationModal').modal('hide');
  proceedWithModification();
});

function proceedWithModification() {
  var modeleId = $('#modele_id_update').val();
  var abbr = $('#abbr_update').val();
  var nom = $('#nom_update').val();
  var forcer = 1;

  // Envoyer les données 
  $.ajax({
      type: 'POST',
      url: 'modification-matieres.php',
      data: { modele_id: modeleId, abbr: abbr, nom: nom , forcer : forcer},
      success: function (response) {
          console.log(response);

          if (response.trim() === "true") {
              // La modification a réussi
              $.toast({
                  heading: "Modification validée",
                  text: "La matière a été modifiée avec succès",
                  showHideTransition: "fade",
                  icon: "success",
                  hideAfter: false,
              });
          } else  if (response.trim() === "false"){
              // La modification a échoué
              $.toast({
                  heading: "La modification a échoué",
                  text: "Une erreur s'est produite lors de la modification",
                  showHideTransition: "fade",
                  icon: "error",
                  hideAfter: false,
              });
          }
      },
      error: function (error) {
          console.error(error);
      }
  });
}
  //*-----------------------------------suppression sur le matieres-----------------------------------

var matiereId;

  // Gérer le clic sur le lien de modification
  $('#confirmationDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); 
    var matiereId = button.data('modele-id'); // Utiliser data-modele-id pour récupérer id du matieres
  console.log(matiereId);
    // envoyer la id de matiere
    $('#modele_id_delete').val(matiereId);
    
  });

$('#confirmDeletion').on('click', function () {
    $('#confirmationDeleteModal').modal('hide');
    var matiereId = $('#modele_id_delete').val();
    // Envoyer les données 
    $.ajax({
        type: 'POST',
        url: 'suppression-matieres.php',
        data: { matiere_id: matiereId },
        success: function (response) {

            var heading, text, icon;

          if (response.trim() === "true") {
                // La suppression a réussi
                heading = "Suppression validée";
                text = "La matière a été supprimée avec succès";
                icon = "success";
                setTimeout(function () {
                  location.reload();
                }, 1000);
            } else {
                // La suppression a échoué
                heading = "Action non authorisé";
                text = "il a des notes";
                icon = "info";
            }

            $.toast({
                heading: heading,
                text: text,
                showHideTransition: "fade",
                icon: icon,
                hideAfter: false,
            });
        },
        error: function (error) {
            console.error(error);
        }
    });
});






