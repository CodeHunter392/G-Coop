// Request student list
var requestStudentList = function (
  anneeId,
  classeId,
  filiereId,
  moyenneGeneration,
  typeDossier
) {
  studentListComponent = `<Merci class="text-center">Chargement de la liste des étudiants et encours ..., Merci de patienter</h5>`
  $("#student-list-placeholder").removeClass("hide")

  $("#list_etudiant").html(studentListComponent)

  //* Disable submit button
  $('button[type="submit"]').attr("disabled", "disabled")

  $.ajax({
    url: `./requests/etudiant/request-list-for-pv.php`,
    type: "POST",
    data: {moyenneGeneration, anneeId, classeId, filiereId, typeDossier},
    success: function (response) {
      $("#list_etudiant").css({height: 300})
      $("#list_etudiant").html(response)

      $('button[type="submit"]').removeAttr("disabled")
    },
  })
}

// Request doucument
var requestCriteresLists = function () {
  $.ajax({
    url: `./requests/critere/request-critere-list.php`,
    type: "POST",
    success: function (response) {
      // console.log(response)
      $("#list_document").css({height: 300})
      $("#list_document").html(response)
    },
  })
}

// check or uncheck all students
var checkAllStudents = function (toBeCkecked) {
  $(".ins_ids").each(function () {
    $(this).prop("checked", toBeCkecked)
  })
}

// chzck or uncheck all documents
var checkAllDocuments = function (toBeCkecked) {
  $(".ca_ids").each(function () {
    $(this).prop("checked", toBeCkecked)
  })
}

//* request classes that requires PV
var requestClassesRequiredPV = function (anneeId) {
  $.ajax({
    url: "./requests/classe/request-classes-required-pv.php",
    type: "POST",
    data: {anneeId: anneeId},
    success: function (response) {
      // console.log(response)
      $('select[name="classe"]').html(response)
    },
  })
}

//* request classes that requires Dossier Acceptation
var requestClassesRequiredAcceptation = function (anneeId) {
  $.ajax({
    url: "./requests/classe/request-classes-required-dossier-acceptation.php",
    type: "POST",
    data: {anneeId: anneeId},
    success: function (response) {
      // console.log(response)
      $('select[name="classe"]').html(response)
    },
  })
}

//* request all classes
var requestAllClasses = function () {
  $.ajax({
    url: "./requests/classe/request-all-classes.php",
    type: "GET",
    success: function (response) {
      $('select[name="classe"]').html(response)
    },
  })
}

//* Log message init
var initlogAlertMessage = function () {
  $("#pv-generation-modal .modal-body").html(null)
}
