$(document).ready(() => {
  // Global element
  var anneeId, classeId, mode

  // Selected the data choose by user
  $(
    'select[name="anneeId"], select[name="classeId"], select[name="mode"]'
  ).change(() => {
    anneeId = $('select[name="anneeId"]').find("option:selected").val()
    classeId = $('select[name="classeId"]').find("option:selected").val()
    mode = $('select[name="mode"]').find("option:selected").val()

    // Requesting exams based on 'anneeId' and 'classeId'
    $.ajax({
      url: "./requests/examen/get_exams_by_seance_annee.php",
      type: "POST",
      data: {anneeId, classeId, mode},
      success: function (responseData) {
        // console.log(responseData)
        $('select[name="emploi_unit_id"]').html(responseData)
      },
    })
  })
})
