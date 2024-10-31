$(document).ready(function () {
  // Save departement
  $("#save-departement").click(function () {
    $responsablity_name = $('input[name="responsablity_name"]').val()

    if ($responsablity_name != null) {
      // save responsability
      $.ajax({
        url: "./requests/departement/create_departement.php",
        type: "POST",
        data: {departement: $responsablity_name},
        success: function (response) {
          $('select[name="departement_name"]').append(response)
        },
      })
    }
  })

  // Display classes related to departement
  $('select[name="departement_name"]').change(function () {
    $departementId = $('select[name="departement_name"] option:selected').val()

    $.ajax({
      url: "./requests/departement/classes_related_departement.php",
      type: "POST",
      data: {departementId: $departementId},
      success: function (response) {
        // $("#appended_classes").html(response)

        try {
          var data = JSON.parse(response)

          $("#appended_classes").html(data.classes)
          $("#appended_professors").html(data.professors)
        } catch (err) {
          console.log(response)
        }
      },
    })
  })

  // Start departement data save
  $(".save-departement-data").click(function () {
    var departementId = $(
      'select[name="departement_name"] option:selected'
    ).val()
    var classes = []
    var professors = []

    $(".selected-class:checked").each(function () {
      classes.push($(this).val())
    })

    $(".selected-prof:checked").each(function () {
      professors.push($(this).val())
    })

    if (!departementId) {
      alert("ERREUR : Il faut selectionner la responsabilité")
    } else {
      if (classes.length == 0) {
        alert("ERREUR : Il l faut au moins selectionner une classe !")
      } else {
        if (professors.length == 0) {
          alert("ERREUR : Il l faut au moins selectionner un professeur !")
        } else {
          // start saving data
          $.ajax({
            url: "./requests/departement/create_user_responsibility.php",
            type: "POST",
            data: {
              departementId: departementId,
              classes: classes,
              professors: professors,
            },
            success: function (response) {
              // $("#appended_classes").html(response)
              console.log(response)

              if (response == "success") alert("Opération terminée avec succès")
            },
          })
        }
      }
    }
  })
})
