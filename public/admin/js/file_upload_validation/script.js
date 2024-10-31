$(document).ready(function () {
  var classe, filiere, anneeScolaire, file_status
  //file upload validation
  $("#fileUploadForm").submit(function (event) {
    //asigning values
    classe = $("#classe").val()
    session = $("#session").val()

    anneeScolaire = $("#annee_scolaire").val()
    file_status = $("#status_check").val()
    //checking values
    if (classe == "0") {
      event.preventDefault()
      $("#classe_tooltip").tooltip("show")
    }

    if (session == "0") {
      event.preventDefault()
      $("#session_tooltip").tooltip("show")
    }

    // if (filiere == "0") {
    //   event.preventDefault()
    //   $("#filiere_tooltip").tooltip("show")
    // }

    //checking if user choose the file that he wants to upload or not
    if (document.getElementById("notes_file").files.length == 0) {
      event.preventDefault()
      $("#update_warn").addClass("hide")
      $("#file_tooltip").tooltip("show")
    } else {
      //file
      var filename = $("#notes_file").val()
      // Use a regular expression to trim everything before final dot
      var extension = filename.replace(/^.*\./, "")
      if (extension == filename) {
        extension = ""
      } else {
        if (extension != "xlsx") {
          event.preventDefault()
          $("#file_tooltip").tooltip("show")
        }
      }
    }
    //status = 1 means that the file has been already uploaded
    if (file_status == "1") {
      event.preventDefault()
      $("#update_warn").removeClass("hide")
    }
  })
  //listening for filiere change event and sending ajax request  to get the appropriat classes
  // $("#filiere").change(function() {
  //   if ($(this).val() != "0") {
  //     //hide error notions
  //     $("#filiere_tooltip").tooltip("hide");
  //     $("#update_warn").addClass("hide");
  //     var _class = $("#filiere").val();
  //     $.ajax({
  //       url: "../admin/upload-notes/requests/classes.php",
  //       type: "POST",
  //       data: { filiereID: _class },
  //       success: function(data) {
  //         $("#classe").html(data);
  //       }
  //     });
  //     //if user selected the class (0 is the first valeu =null)
  //     //update check status based on filiere ,class, and year getted from user(status is 0 or 1)
  //     if ($("#classe").val() != "0") {
  //       classe = $("#classe").val();
  //       filiere = $("#filiere").val();
  //       anneeScolaire = $("#annee_scolaire").val();

  //       $.ajax({
  //         url: "../admin/upload-notes/requests/is_already_uploaded.php",
  //         type: "POST",
  //         data: {
  //           filiere: filiere,
  //           class_annee: classe,
  //           annee_Scolaire: anneeScolaire
  //         },
  //         success: function(data) {
  //           $("#status_check").val(data);
  //           console.log("Status : " + data);
  //         }
  //       });
  //     }
  //   }
  // });

  $("#note_classe, #note_annee_scolaire, #note_session").change(function () {
    if ($(this).val() != "0") {
      $("#classe_tooltip").tooltip("hide")
      $("#update_warn").addClass("hide")

      classe = $("#note_classe option:selected").val()
      session = $("#note_session option:selected").val()
      anneeScolaire = $("#note_annee_scolaire option:selected").val()

      $.ajax({
        url: "../admin/upload-notes/requests/is_already_uploaded.php",
        type: "POST",
        data: {
          classe: classe,
          session: session,
          annee_Scolaire: anneeScolaire,
        },
        success: function (data) {
          $("#status_check").val(data)
          console.log(data)
        },
      })
    }
  })
})
