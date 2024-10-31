$(document).ready(function () {
  //* Init log alert placeholder
  initlogAlertMessage()

  //* By defaut check the option to erase the old PV
  $('input[name="ecraserAncienPv"]').prop("checked", true)

  //* init select2 elements
  $(".select2_input").select2()

  //* hide filiere input by default and keep only classe one
  $("#filiere-colomn").addClass("hide")

  // global variables
  var typeDossier, moyenneGeneration, anneeId, filiereId
  var documentAlreadyRequested = false

  //* Initial values
  anneeId = $('select[name="annee"]').find("option:selected").val()
  classeId = $('select[name="classe"]').find("option:selected").val()
  filiereId = $('select[name="filiere"]').find("option:selected").val()
  moyenneGeneration = $('select[name="moyenne-generation"]')
    .find("option:selected")
    .val()

  //* Change the form action based on user operation request
  $('select[name="type_dossier"]').change(function () {
    typeDossier = $(this).find("option:selected").val()

    if (typeDossier == "pv") {
      $("#document-list-placeholder").addClass("hide")

      $("#force-pv-creation-option").removeClass("hide")
      $("#download-dossier-meme-temps").addClass("hide")

      // Uncheck download en meme temps
      $('input[name="downloadMemeTemp"]').prop("checked", false)

      $("#type-generation").html("le PV ")

      //* Request only classes that require pv access
      requestClassesRequiredPV(anneeId)
    } else {
      $("#document-list-placeholder").removeClass("hide")
      $("#force-pv-creation-option").addClass("hide")

      $("#download-dossier-meme-temps").removeClass("hide")

      $("#type-generation").html("le dossier d'acceptation ")

      // Uncheck the option to erase pv
      // $('input[name="ecraserAncienPv"]').prop("checked", false)

      //* all classes
      //requestAllClasses()

       //* Request only classes that require pv access
       requestClassesRequiredAcceptation(anneeId)
    }
  })

  //! This has been disabled temporary
  // // Cheking type d'impression
  // $('select[name="moyenne-generation"]').change(function () {
  //   moyenneGeneration = $(this).find("option:selected").val()

  //   if (moyenneGeneration == "par-classe") {
  //     $("#classe-column").removeClass("hide")
  //     $("#filiere-colomn").addClass("hide")
  //   } else if (moyenneGeneration == "par-filiere") {
  //     $("#classe-column").addClass("hide")
  //     $("#filiere-colomn").removeClass("hide")
  //   }
  // })

  //* Request student list
  $(
    'select[name="annee"], select[name="classe"], select[name="filiere"]'
  ).change(function () {
    anneeId = $('select[name="annee"]').find("option:selected").val()
    classeId = $('select[name="classe"]').find("option:selected").val()
    filiereId = $('select[name="filiere"]').find("option:selected").val()

    if (anneeId && (classeId || filiereId) && moyenneGeneration) {
      requestStudentList(
        anneeId,
        classeId,
        filiereId,
        moyenneGeneration,
        typeDossier
      )
    }
  })

  //* check all students option
  $(document).on("change", 'input[name="check-all-students"]', function () {
    checkAllStudents($(this).is(":checked"))
  })

  $(document).on("change", 'input[name="check-all-documents"]', function () {
    checkAllDocuments($(this).is(":checked"))
  })

  //* Show message to user after form submit
  $("#pv_form").submit(function () {
    $(this).find('button[name="submit"]').attr("disabled", "disabled")

    //* personalizing the messages based on user choice
    if (typeDossier == "pv") {
      $message = `<center><h4>Les PVs des étudiants sont en cours de génération ... Veuillez patienter</h4>
      <h4>Merci de ne pas fermer la page ou l'ordinateur</h4>
      <button class="btn btn-success" data-dismiss="modal">OK</button>
      </center>`
    } else {
      $message = `<center>
        <h4>Le dossier d'accepatation est encours de Génération ...</h4>
        <h4>Merci de ne pas fermer la page ou l'ordinateur</h4>
        <button class="btn btn-success" data-dismiss="modal">OK</button>
      </center>`
    }

    $("#pv-generation-modal .modal-body").html($message)
    $("#pv-generation-modal").modal("show")
  })
})
