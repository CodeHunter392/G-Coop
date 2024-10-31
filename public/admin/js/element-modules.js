$(document).ready(function () {
  //   $(".close").click(function () {
  //     $(".alert-success").addClass("hide")
  //   })

  //   $("#classe_filtre").change(function () {
  //     $("#filtre-form").submit()
  //   })

  var classeId = $('select[name="classe"]').find("option:selected").val()
  var centreId = $('select[name="centre"]').find("option:selected").val()
  var trRemoved = null

  //* Initializing classeId
  $('select[name="classe"], select[name="centre"]').change(function () {
    classeId = $('select[name="classe"]').find("option:selected").val()
    centreId = $('select[name="centre"]').find("option:selected").val()

    //? request semestre by classe
    $.ajax({
      url: "./requests/semestre/request-semestre-by-classe.php",
      type: "POST",
      data: {classeId: classeId},
      success: function (res) {
        $('select[name="semestre"]').html(res)
      },
    })
  })

  //* Request module and element data
  $(".module-modification").click(function () {
    var moduleId = $(this)[0].getAttribute("module")
    var emoId = $(this)[0].getAttribute("emoid")

    $.ajax({
      url: "./requests/module/module-data.php",
      type: "POST",
      data: {
        module_id: moduleId,
        classeId: classeId,
        centreId: centreId,
        emoId: emoId,
        type: "update",
      },
      success: function (response) {
        // console.log(response)
        $(".module-modification-body").html(response)
      },
    })
  })

  $(".module-supprission").click(function () {
    $moduleId = $(this)[0].getAttribute("module")
    $emoId = $(this)[0].getAttribute("emoid")

    trRemoved = $(this).parent().parent().parent().parent().parent()

    $.ajax({
      url: "./requests/module/module-data.php",
      type: "POST",
      data: {
        module_id: $moduleId,
        emoId: $emoId,
        centreId: centreId,
        type: "delete",
      },
      success: function (response) {
        $(".module-sup-body").html(response)
      },
    })
  })

  $("#delete-matiere-module").click(function () {
    $elementId = $("#suppElementForm").find('input[name="elementId"]').val()

    if ($elementId) {
      $.ajax({
        url: "./requests/module/supprimer_element_module.php",
        type: "POST",
        data: {elementId: $elementId},
        success: function (res) {
          if (res == 1) {
            $("#module_sup_mdl").modal("hide")
            $(trRemoved).remove()

            $.toast({
              heading: "Success",
              text: "élement module a été supprimé",
              showHideTransition: "fade",
              icon: "success",
              hideAfter: 6000,
            })
          }
          // location.reload()
        },
      })
    }
  })

  $(".select2-input").select2({
    style: {height: "30px"},
  })

  $(".module-tranfert").click(function () {
    $moduleId = $(this)[0].getAttribute("module")
    $("#moduleIdInput").val($moduleId)
  })

  //* check classe url parameter and sibmit the form
  const urlParams = new URLSearchParams(window.location.search)
  const classeIdParam = urlParams.get("classe")

  if (classeIdParam) {
    $('select[name="classe"]').val(classeIdParam)

    // setTimeout(function () {
    //   $("#filtre-form").submit()
    // }, 2000)
  }

  //- display emo parent id
  $(document).on("change", ".emo_visible", function () {
    if ($(this).val() == 0) {
      //- hide emo parent
      $(".emo_parent_col").removeClass("hide")
    } else {
      //- hide emo parent
      $(".emo_parent_col").addClass("hide")

      //- reset the value after hiding emo parent select
    }
  })

  //- Searching for an element module
  var typingTimer
  var doneTypingInterval = 600
  var elementModuleText = null

  $(".emo_dropdown").addClass("hide")

  $(document).on("keyup", ".emo_search_filter", function () {
    clearTimeout(typingTimer)
    if ($(".emo_search_filter").val()) {
      elementModuleText = $(".emo_search_filter").val()
      typingTimer = setTimeout(requestElementModule, doneTypingInterval)
    }
  })

  function requestElementModule() {
    // Perform your action here
    if (elementModuleText != "") {
      $.ajax({
        url: "./requests/element-modules/elements-module-by-name.php",
        type: "POST",
        data: {emoText: elementModuleText},
        success: function (response) {
          try {
            var res = JSON.parse(response)

            if (res.statusCode == 200) {
              $(".emo_dropdown").removeClass("hide")
            } else if (res.statusCode == 404) {
              $(".emo_dropdown").addClass("hide")
              $(".emo_dropdown").html(res.data)
            }

            $(".emo_dropdown").html(res.data)
          } catch (err) {
            console.log(err)
          }
        },
      })
    }
  }
})
