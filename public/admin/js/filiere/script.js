$(document).ready(function () {
  var defaultFiliereSignataires, filiereId

  // Default filiere signataires form element
  // We use 200 as filiere id that doesn't exist to get the defaukt form element without selected data
  requestFilieresSignataires(200)
    .then(function (res) {
      defaultFiliereSignataires = res
    })
    .catch(function (err) {
      console.log(err)
    })

  // Request filieres signataires for the selected 'filiere'
  $(".modifiy-signataires").click(function () {
    filiereId = $(this)[0].getAttribute("filiere_id")

    requestFilieresSignataires(filiereId)
      .then(function (res) {
        $("#signataire-prof-inject").html(res)
      })
      .catch(function (err) {
        console.log(err)
      })
  })

  // add new prof section
  $(".add-prof").click(function () {
    // append new form element to a row
    $("#modify-signataire-modal")
      .find("#signataire-prof-inject")
      .append(defaultFiliereSignataires)
  })

  // remove prof signatairs section
  $(document).on("click", ".remove-prof", function () {
    $(this).parent().parent().remove()
  })

  // save data
  $("#modifiy-signatures-form").submit(function (e) {
    e.preventDefault()
    $("#modify-signataire-modal").modal("hide")
    var formData = $(this).serialize()
    formData += "&filiereId=" + filiereId

    saveFilieresSignataires(formData).then(function (res) {
      try {
        var response = JSON.parse(res)

        if (response.status == 201) {
          Swal.fire(
            "Succès",
            "les données ont bien été enregistrées",
            "success"
          )
        }
      } catch (err) {
        console.log(res)
      }
    })
  })
})
