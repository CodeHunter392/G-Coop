$(document).ready(function () {
  $actualPage = 1
  $pageSize = null

  // request page size
  $.ajax({
    url: "requests/demande/page-size.php",
    success: function (data) {
      $pageSize = data
    },
  })

  // next page
  $(".next").click(function () {
    // reset page
    $actualPage++

    $.ajax({
      url: "requests/demande/get-following-page.php",
      type: "POST",
      data: {page_number: $actualPage},
      success: function (data) {
        if (data != "no data") {
          $data = JSON.parse(data)
          $(".page-number").html($data.page)
          $("#demande-list").html($data.output)
        }
      },
    })

    // Disable button nex button if page is equal to size
    if ($actualPage == $pageSize) $(this).addClass("menu-disabled")

    if ($actualPage > 1) $(".previous").removeClass("menu-disabled")
  })

  // Previous page
  $(".previous").click(function () {
    $actualPage--
    $.ajax({
      url: "requests/demande/get-following-page.php",
      type: "POST",
      data: {page_number: $actualPage},
      success: function (data) {
        $data = JSON.parse(data)
        $(".page-number").html($data.page)
        $("#demande-list").html($data.output)
      },
    })

    if ($actualPage < $pageSize) $(".next").removeClass("menu-disabled")
    if ($actualPage == 1) $(this).addClass("menu-disabled")
  })

  // Select or remove selection on rows
  $(document).on("click", ".select-demande", function () {
    //console.log($(this).addClass('success'))
    $selectedTr = $(this).parent().parent().parent().parent().parent().parent()
    $demandeId = $(this)[0].getAttribute("demande")

    console.log($selectedTr)

    // check if demande is selected or not
    $.ajax({
      url: "requests/demande/check-select-demande.php",
      type: "POST",
      data: {demande_id: $demandeId},
      success: function (response) {
        if (response == "demende must be selected") {
          // update demande status

          $.ajax({
            url: "requests/demande/select-demande.php",
            type: "POST",
            data: {demande_id: $demandeId, value: 1},
            success: function (response) {
              $($selectedTr).addClass("success")
            },
          })
        } else if (response == "selected") {
          $.ajax({
            url: "requests/demande/select-demande.php",
            type: "POST",
            data: {demande_id: $demandeId, value: 0},
            success: function (response) {
              $($selectedTr).removeClass("success")
            },
          })
        } else {
          $("#demande-error .modal-body").html(response + "ggg")
          $("#demande-error").modal("show")
        }
      },
    })
  })

  //  Validate payment
  $(document).on("click", ".paiement-label", function () {
    $demandeId = $(this)[0].getAttribute("demande")
    $parentElement = $(this).parent()

    // check demandeId value
    if ($demandeId != null && $demandeId != "") {
      $.ajax({
        url: "requests/demande/update-payment.php",
        type: "POST",
        data: {demande_id: $demandeId},
        success: function (response) {
          response = JSON.parse(response)

          if (response.type == "error") {
            $("#demande-error .modal-body").html(response.text)
            $("#demande-error").modal("show")
          } else {
            $($parentElement).html(response.text)
          }
        },
      })
    }
  })

  // dossier validation
  $(document).on("click", ".dossier-label", function () {
    $demandeId = $(this)[0].getAttribute("demande")
    $parentElement = $(this).parent()

    // check demandeId value
    if ($demandeId != null && $demandeId != "") {
      $.ajax({
        url: "requests/demande/update_dossier.php",
        type: "POST",
        data: {demande_id: $demandeId},
        success: function (response) {
          response = JSON.parse(response)

          if (response.type == "error") {
            $("#demande-error .modal-body").html(response.text)
            $("#demande-error").modal("show")
          } else {
            $($parentElement).html(response.text)
          }
        },
      })
    }
  })

  // Demande prete
  $(document).on("click", ".demande-prete", function () {
    $demandeId = $(this)[0].getAttribute("demande")
    $parentElement = $(this).parent()
    $parentTr = $(this).parent().parent().parent()
    $actualDemandeValue = $(this).text()

    if ($demandeId != null && $demandeId != "") {
      $.ajax({
        url: "requests/demande/demande_prete.php",
        type: "POST",
        data: {demande_id: $demandeId},
        success: function (response) {
          response = JSON.parse(response)

          if (response.type == "error") {
            $("#demande-error .modal-body").html(response.text)
            $("#demande-error").modal("show")
          } else {
            $($parentElement).html(response.text)

            if ($actualDemandeValue == "en cours...") {
              $('input[name="demande_pret_demandeid"]').val($demandeId)
              $("#demande-date-pret").modal("show")
            }
          }

          if (response.selection == "remove")
            $($parentTr).removeClass("success")
        },
      })
    }
  })

  $demande_livrer_id = null
  $demande_element = null
  $demandeParentTr = null

    // Demande tirer
    $(document).on("click", ".tirer-label", function () {
      $demandeId = $(this)[0].getAttribute("demande")
      $parentElement = $(this).parent()
  
      // check demandeId value
      if ($demandeId != null && $demandeId != "") {
        $.ajax({
          url: "requests/demande/tirer.php",
          type: "POST",
          data: {demande_id: $demandeId},
          success: function (response) {
            response = JSON.parse(response)
  
            if (response.type == "error") {
              $("#demande-error .modal-body").html(response.text)
              $("#demande-error").modal("show")
            } else {
              $($parentElement).html(response.text)
            }
          },
        })
      }
    })
  

  // Demande Livrer
  $(document).on("click", ".demande-livrer", function () {
    $demande_livrer_id = $(this)[0].getAttribute("demande")
    $demande_element = $(this).parent()
    $demandeParentTr = $(this).parent().parent().parent()

    $("#demande-livrer").modal("show")
  })

  $("#demande-livrer-date").click(function () {
    if ($demande_livrer_id != null && $demande_livrer_id != "") {
      $date_liverement = $("#date_liverement").val()

      $.ajax({
        url: "requests/demande/update_livrement.php",
        type: "POST",
        data: {
          demande_id: $demande_livrer_id,
          date_livrement: $date_liverement,
        },

        success: function (response) {
          response = JSON.parse(response)

          if (response.type == "error") {
            $("#demande-error .modal-body").html(response.text)
            $("#demande-error").modal("show")
          } else {
            $("#demande-livrer").modal("hide")
            $($demande_element).html(response.text)
          }

          console.log(response)
        },
      })
    }
  })

  // Demande detail
  $(document).on("click", ".demande-detail", function () {
    $demandeId = $(this)[0].getAttribute("demande")

    // send request
    $.ajax({
      url: "requests/demande/demande_detail.php",
      type: "POST",
      data: {demande_id: $demandeId},
      success: function (data) {
        console.log(data)
        $(".demende-detail").html(data)
      },
    })
  })

 // Add remarque
 $remarque_demande_id = null
 $(document).on("click", ".demande-remarque", function () {
   $remarque_demande_id = $(this)[0].getAttribute("demande")
   $("#demande_remarque_id").val($remarque_demande_id)
 })

 $("#add-remarque-form").submit(function (e) {
  e.preventDefault();

  $demandeId = $("#demande_remarque_id").val();
  $userId = $("#utilisateur_id").val();
  $remarqueText = $("#remarque-text").val();

  $.ajax({
    url: "requests/demande/add-remarque.php",
    type: "POST",
    data: {
      demande_id: $demandeId,
      user_id: $userId,
      remarque_text: $remarqueText,
    },
    success: function (response) {
      if (response == "success") {
        $("#demande-remarque").modal("hide");
        // Reset the textarea value to an empty string
        $("#remarque-text").val("");
      }
    },
  });
});



  // Search option
  var typingTimer
  var doneTypingInterval = 700
  var $input = $("#demande-search")

  //on keyup, start the countdown
  $input.on("keyup", function () {
    clearTimeout(typingTimer)
    typingTimer = setTimeout(doneTyping, doneTypingInterval)
  })

  //on keydown, clear the countdown
  $input.on("keydown", function () {
    clearTimeout(typingTimer)
  })

  //user is "finished typing," do something
  function doneTyping() {
    $word = $("#demande-search").val()

    if ($word != "") {
      //$('#demande-list').html('<tr><td colspan="11"><center><b>Recherche ...</b></center></td></tr>')
      $.ajax({
        url: "requests/demande/search-demande.php",
        type: "POST",
        data: {word: $word},
        success: function (data) {
          $("#pagination-placeholder").addClass("hide")
          $("#demande-list").html(data)
        },
      })
    } else {
      $.ajax({
        url: "requests/demande/get-following-page.php",
        type: "POST",
        data: {page_number: $actualPage},
        success: function (data) {
          if (data != "no data") {
            $data = JSON.parse(data)
            $("#demande-list").html($data.output)
            $("#pagination-placeholder").removeClass("hide")
          }
        },
      })
    }
  }

  // update demande pret date
  $("#data-pret-form").submit(function (e) {
    e.preventDefault()

    var demandeId = $('input[name="demande_pret_demandeid"]').val()
    var datePret = $("#date_demande_pret").val()

    $.ajax({
      url: "requests/demande/update_date_pret.php",
      type: "POST",
      data: {demandeId: demandeId, datePret: datePret},
      success: function (response) {
        console.log(response)
        $("#demande-date-pret").modal("hide")
      },
    })
  })
})
