

$(document).ready(function () { 
  $('.input_select2').select2();
  var nationaliteId, classeId, groupeId

  $('select[name="classe"],select[name="Nationalite"]').change(function () {
    classeId = $('select[name="classe"]').val()
    nationaliteId = $('select[name="Nationalite"]').val()

    $.ajax({
      type: "POST",
      url: "get_criteres.php",
      data: {classe_id: classeId, nationalite_id: nationaliteId},
      success: function (data) {
        // catching group critere id
        groupeId = data.groupCritereId

        $("#resultat").html(data.html)
        $("#nom").val(data.nom)
      },
    })
  })

  $(document).on("change", 'input[type="checkbox"]', function () {
    var critereId = $(this).val()
    var critereIsChecked = $(this).is(":checked")

    if (critereIsChecked) $operationType = "insert"
    else $operationType = "delete"

    $.ajax({
      type: "POST",
      url: "update_criteres.php",
      dataType: 'json',
      data: {
        groupeId: groupeId,
        critere_id: critereId,
        operationType: $operationType,
      },
      success: function (data) {
        generateToast(data);
      },
    })

    function generateToast(data) {
      $.toast({
          heading: data.heading,
          text: data.text,
          showHideTransition: 'fade',
          icon: data.icon,
          hideAfter: 'false'
      });
  }
  })
})
