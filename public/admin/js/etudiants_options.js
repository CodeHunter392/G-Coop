$(document).ready(function () {
  var option = null

  var studentsSelected = [] // array used to hold selected students
  var group_fetched = false // prevent fetching groups more than once

  $("#selected-option").change(function () {
    // enable or disabled continue button based on option selected
    $value = $(this).val()

    if ($value != "") $("#available-options").removeAttr("disabled")
    else $("#available-options").attr("disabled", "disabled")
  })

  $(document).on("change", ".etudiant_selected", function () {
    // detect students selection
    var studentsChecked = $(".etudiant_selected:checked")

    // determin wither to display or hide options
    if (studentsChecked.length != 0)
      $("#select-students-option").removeClass("hide")
    else $("#select-students-option").addClass("hide")

    // adding and removing student selected
    if (this.checked) {
      studentsSelected.push(this.value)
    } else {
      const index = studentsSelected.indexOf(this.value)
      if (index > -1) studentsSelected.splice(index, 1)
    }

    $("#selected_students").html(
      "<span id='delete-selected' class='fa fa-times pointer'></span>    Nombre des étudiants selectionnés : " +
        studentsSelected.length
    )
  })

  $("#option-form").submit(function (e) {
    e.preventDefault()

    $("#available-options").html("en attend...")
    $("#available-options").attr("disabled", "disabled")

    option = $("#selected-option option:selected").val()

    if (option == 139) {
      // option 1 : create elearning accounts
      $.ajax({
        url: "./requests/plateforme/generate-account.php",
        type: "POST",
        data: {etudiants: studentsSelected, type_operation: "create"},
        success: function (response) {
          $("#generated-accounts-form").html(response)

          $("#generate-account-modal").modal("show")
        },
      })
    } else if (option == 140) {
      // option 2 : adapting the 'class' to the groupe
      $.ajax({
        url: "./requests/plateforme/adaptation-inscription.php",
        type: "POST",
        data: {etudiants: studentsSelected},
        success: function (response) {
          console.log(response)
          $("#available-options").html("Continuer")
          $("#available-options").removeAttr("disabled")

          if (response == "process finished") {
            $("#operation-message-mdl").modal("show")
            $("input[name='checkall']:checked,.etudiant_selected").prop(
              "checked",
              false
            )
          }
        },
      })
    } else if (option == 141) {
      // option 3 : reset accounts
      $.ajax({
        url: "./requests/plateforme/generate-account.php",
        type: "POST",
        data: {etudiants: studentsSelected, type_operation: "reset"},
        success: function (response) {
          $("#generated-accounts-form").html(response)

          $("#generate-account-modal").modal("show")
        },
      })
    } else if (option == 142) {
      // option 4 : re-registration
      $.ajax({
        url: "./requests/etudiant/generate-re-inscription.php",
        type: "POST",
        data: {etudiants: studentsSelected},
        success: function (response) {
          $("#generated-preinscriptions-form").html(response)

          $("#generate-pre-inscription-modal").modal("show")
          $("#available-options").html("Continuer")
          $("#available-options").removeAttr("disabled")
        },
      })
    } else if (option == 143 || option == 144) {
      // option 5 , 6 : add and remove from group
      if (group_fetched == false) {
        $.ajax({
          url: "./requests/plateforme/fetch-groups.php",
          type: "POST",
          success: function (response) {
            $("#groupe-modal-body").html(response)
            group_fetched = true
          },
        })
      } else {
        $(".selected-group").prop("checked", false)
      }

      $("#student-group-mdl").modal("show")
    } else if (option == 145) {
      // option 7 : associate a tag
      $("#assoc-tag-mdl").modal("show")
    } else if (option == 146) {
      $("#modify-group-mdl").modal("show")
    } else if (option == 148) {
      // delete from tag
      $("#delete-tag-mdl").modal("show")
    } else if (option == 150) {
      $.ajax({
        url: "./requests/etudiant/request_etat_dossier.php",
        type: "POST",
        data: {etudiants: studentsSelected},
        success: function (response) {
          $("#etudiant_dossier_placeholder").html(response)
          $("#changer_etat_dossier_modal").modal("show")
        },
      })

      $("#available-options").html("Continuer")
      $("#available-options").removeAttr("disabled")
    } else if (option == 149) {
      // changement de la classe
      $("#changement_classes_mdl").modal("show")
    } else if (option == 151) {
      // cree un espace

      if (studentsSelected.length <= 20) {
        $("#processus-encours-mdl").modal("show")

        $.ajax({
          url: "./requests/etudiant/request_full_data.php",
          type: "POST",
          data: {etudiants: studentsSelected},
          success: function (response) {
            $(".request_log_text:first").html("Processus terminé !")
            $(".request_log_text:last").html(null)
            $("#close-request-btn").removeClass("d-none")
            $("#download_request_log").removeClass("d-none")
            console.log(response)
          },
        })
      } else {
        alert("Il faut pas depasser 20 étudiants")
      }

      $("#available-options").html("Continuer")
      $("#available-options").removeAttr("disabled")
    }
  })

  // add or remove users from groups
  $("#user-group-form").submit(function (e) {
    e.preventDefault()

    // determin url request based on selected option
    if (option == 143) $url = "./requests/plateforme/add-users-to-group.php"
    else if (option == 144)
      $url = "./requests/plateforme/delete-users-from-group.php"

    var selectedGroups = []

    $(".selected-group:checked").each(function () {
      selectedGroups.push(this.value)
    })

    $.ajax({
      url: $url,
      type: "POST",
      data: {etudiants: studentsSelected, groupes: selectedGroups},
      success: function () {
        $("#student-group-mdl").modal("hide")
        $("#available-options").html("Continuer")
        $("#available-options").removeAttr("disabled")

        $("#operation-message-mdl").modal("show")
      },
    })
  })

  // associete avec tag
  $("#assoc-tag-form").submit(function (e) {
    e.preventDefault()

    $tagId = $("#assoc-tag-name option:selected").val()

    $.ajax({
      url: "./requests/etudiant/associat-with-tag.php",
      type: "POST",
      data: {etudiants: studentsSelected, tag: $tagId},
      success: function () {
        $("#assoc-tag-mdl").modal("hide")
        $("#available-options").html("Continuer")
        $("#available-options").removeAttr("disabled")

        $("#operation-message-mdl").modal("show")
      },
    })
  })

  // change groupe
  $(document).on("submit", "#modif-groupe-form", function (e) {
    e.preventDefault()

    $groupeId = $("#modif_groupe_id option:selected").val()
    $anneeId = $("#modif_annee_id option:selected").val()

    $.ajax({
      url: "./requests/etudiant/changer-groupe.php",
      type: "POST",
      data: {etudiants: studentsSelected, groupe: $groupeId, annee: $anneeId},
      success: function (response) {
        $("#modify-group-mdl").modal("hide")

        $("#available-options").html("Continuer")
        $("#available-options").removeAttr("disabled")

        $("#operation-message-mdl").modal("show")
      },
    })
  })

  // delete students from tag
  $("#delete-tag-form").submit(function (e) {
    e.preventDefault()

    var tags = []

    $('input[name="supp-tag-id"]:checked').each(function () {
      tags.push(this.value)
    })

    $.ajax({
      url: "./requests/etudiant/tag-delete.php",
      type: "POST",
      data: {etudiants: studentsSelected, tags: tags},
      success: function (response) {
        $("#delete-tag-mdl").modal("hide")

        $("#available-options").html("Continuer")
        $("#available-options").removeAttr("disabled")

        $("#operation-message-mdl").modal("show")

        console.log(response)
      },
    })
  })

  // checking if generate account modal is cloased
  $(document).on("click", "#close-account-modal,.close-btn", function () {
    $("#available-options").html("Continuer")
    $("#available-options").removeAttr("disabled")
  })

  // check all
  $("#selectStudents").change(function () {
    $val = $(this).find("option:selected").val()

    if ($val == 1) {
      $(".etudiant_selected").prop("checked", true)
      $("#select-students-option").removeClass("hide")
    } else {
      $(".etudiant_selected").prop("checked", false)
      $("#select-students-option").addClass("hide")
    }

    studentsSelected = []

    if ($val == 1) {
      $(".etudiant_selected").each(function () {
        studentsSelected.push(this.value)
      })
    }

    $("#selected_students").html(
      "<span id='delete-selected' class='fa fa-times pointer'></span>    Nombre des étudiants selectionnés : " +
        studentsSelected.length
    )
  })

  $(document).on("click", "#delete-selected", function () {
    studentsSelected.length = 0
    $(".etudiant_selected").prop("checked", false)
    $("#select-students-option").addClass("hide")
  })

  // completer le dossier
  $(document).on("change", ".dossier_complete", function () {
    var isChecked = $(this).prop("checked")
    var etudiantId = $(this).val()
    var dossierValue

    if (isChecked) dossierValue = 1
    else dossierValue = 0

    $.ajax({
      url: "./requests/etudiant/change_etat_dossier.php",
      type: "POST",
      data: {etudId: etudiantId, value: dossierValue},
      success: function (response) {
        console.log(response)
      },
    })
  })

  // change student classes
  $("#change-student-group-form").submit(function (e) {
    e.preventDefault()

    var classeId = $(
      'select[name="changeer-etudiants-classe"] option:selected'
    ).val()
    var anneeId = $(
      'select[name="changeer-etudiants-classe-annee"] option:selected'
    ).val()

    $.ajax({
      url: "./requests/etudiant/changer-groupe-classe.php",
      type: "POST",
      data: {etudiants: studentsSelected, classeId: classeId, anneeId: anneeId},
      success: function (response) {
        $("#changement_classes_mdl").modal("hide")

        $("#available-options").html("Continuer")
        $("#available-options").removeAttr("disabled")

        $("#operation-message-mdl").modal("show")

        $('select[name="changeer-etudiants-classe"]').prop("selectedIndex", 0)
        console.log(response)
      },
    })
  })
})
