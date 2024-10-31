document
  .getElementById("attestationType")
  .addEventListener("change", function () {
    var selectedTypeId = this.value
    var documentRows = document.querySelectorAll("#Attestation-list tr")

    for (var i = 0; i < documentRows.length; i++) {
      var typeId = documentRows[i].getAttribute("data-type-id")

      if (selectedTypeId === "" || selectedTypeId === typeId) {
        documentRows[i].style.display = "table-row"
      } else {
        documentRows[i].style.display = "none"
      }
    }
  })

function deleteDocument(doc_id) {
  $.ajax({
    type: "POST",
    url: "suprimer-modele.php",
    data: { doc_id: doc_id },
    success: function (data) {
      if (data == "true") {
        // La suppression a réussi

        $.toast({
          heading: "Suppression validée",
          text: "Le critère a été bien supprimer",
          showHideTransition: "fade",
          icon: "info",
          hideAfter: false,
        })
        // Supprimer la ligne du tableau
        var ligne = document.querySelector(
          '#Attestation-list tr[data-modele-id="' + doc_id + '"]'
        )
        if (ligne) {
          ligne.parentElement.removeChild(ligne)
        } else {
          console.error(doc_id)
          console.error(ligne)
        }
      } else {
        // La suppression a échoué
        $.toast({
          heading: "La suppression a échoué",
          text: "Le modéle a des demandes en cours",
          showHideTransition: "fade",
          icon: "error",
          hideAfter: false,
        })
      }
    },
  })
}
