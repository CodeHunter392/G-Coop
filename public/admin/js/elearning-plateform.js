$(document).ready(function () {
  // get account data
  $(document).on("click", ".fa-laptop", function () {
    $etud_id = $(this)[0].getAttribute("etud_id")

    $.ajax({
      url: "./requests/plateforme/get-info.php",
      type: "POST",
      data: {etudiantId: $etud_id},
      success: function (response) {
        $("#account-situation-modal .modal-body").html(response)
        $("#account-situation-modal").modal("show")
      },
    })
  })
})
