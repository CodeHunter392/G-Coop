$(document).ready(function() {
  var classe, _anneeformation, etude_id, type_releve;
  etude_id = $("#etude_id").val();
  _anneeformation = $("#releve_anneeformation").val();
  type_releve = $("#type_relv").val();
  classe = $("#relev_class_att2").val();

  $("#date_print").on("focusin", function() {
    $.ajax({
      url: "../admin/attestations/releve_notes/requests/releve_permession.php",
      type: "POST",
      data: {
        classe: classe,
        releveAnneeformation: _anneeformation,
        etudiant_id: etude_id,
        typeReleve: type_releve
      },
      success: function(data) {
        $("#is_uploaded").val(data);
      }
    });
  });

  $("#relev_class_att2").on("change", function() {
    classe = $(this).val();
    $("#print_error").addClass("hide");
    //
    $.ajax({
      url: "../admin/attestations/releve_notes/requests/releve_permession.php",
      type: "POST",
      data: {
        classe: classe,
        releveAnneeformation: _anneeformation,
        etudiant_id: etude_id,
        typeReleve: type_releve
      },
      success: function(data) {
        $("#is_uploaded").val(data);
      }
    });
  });

  $("#releve_anneeformation").on("change", function() {
    _anneeformation = $(this).val();
    $("#print_error").addClass("hide");
    //ajax request to chack if file is already printed
    $.ajax({
      url: "../admin/attestations/releve_notes/requests/releve_permession.php",
      type: "POST",
      data: {
        classe: classe,
        releveAnneeformation: _anneeformation,
        etudiant_id: etude_id,
        typeReleve: type_releve
      },
      success: function(data) {
        $("#is_uploaded").val(data);
      }
    });
  });

  $("#type_relv").change(function() {
    type_releve = $(this).val();
    $("#print_error").addClass("hide");
    $.ajax({
      url: "../admin/attestations/releve_notes/requests/releve_permession.php",
      type: "POST",
      data: {
        classe: classe,
        releveAnneeformation: _anneeformation,
        etudiant_id: etude_id,
        typeReleve: type_releve
      },
      success: function(data) {
        $("#is_uploaded").val(data);
      }
    });
  });

  $("#releve-form").submit(function(event) {
    var status;
    status = $("#is_uploaded").val();
    if (status === "1") {
      event.preventDefault();
      $("#print_error").removeClass("hide");
    }
  });
});
