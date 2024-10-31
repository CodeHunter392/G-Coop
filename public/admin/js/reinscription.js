$(document).ready(function () {
  //* Setup stepy plugin
  $(function () {
    $("#default").stepy({
      backLabel: "Précedent",
      block: true,
      nextLabel: "Suivant",
      titleClick: true,
      titleTarget: ".stepy-tab",
    })
  })

  $("#e2").change(function () {
    var etud_id = $("#e2").val()

    //* Requesting "numero d'inscription"
    $.ajax({
      url: "./requests/etudiant/numero_inscription.php",
      type: "POST",
      data: {etud_id: etud_id},
      success: function (data) {
        $(".num_inscription").val(data)
      },
    })

    //* Requesting classe id
    $.ajax({
      url: "./requests/etudiant/classe_etudiant.php",
      type: "POST",
      data: {
        etud_id: etud_id,
      },
      success: function (data) {
        var selectedClassId = data

        $(".classe_id").val(selectedClassId)
        if (selectedClassId == $(".classe_id").val()) {
          $(".classe_id option:not(:selected)").show()
        }
      },
    })

    //* Requesting payment data of the student
    $.ajax({
      url: "./requests/etudiant/frais.php",
      type: "POST",
      data: {
        etud_id: etud_id,
      },
      success: function (data) {
        // console.log(data)
        // console.log(data)
        $(".information_frais").html(data)
        // var selectedtypefrais = data;
      },
    })

    //* Requesting all student "admissions"
    $.ajax({
      url: "./requests/admission/get-admissions-by-etudiant.php",
      type: "POST",
      data: {etud_id: etud_id, fetchingFormat: "text"},
      success: function (res) {
        console.log(res)
        var data = JSON.parse(res)

        $(".admission-placehoder").html(data.admissionComponent)
      },
    })
  })

  // Fixing the previous button in the last step
  $(document).on("click", ".previous-step", function () {
    $("form").stepy("step", 3)
  })
})
