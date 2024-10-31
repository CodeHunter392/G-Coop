$(document).ready(function () {
  // Preloading classes by annee and centre

  //* Getting by default selected anneeid
  var anneeId = $('select[name="annee_formation_filtre"]')
    .find("option:selected")
    .val()

  //* catching the selected anneeid ro save it to the cookie
  $('select[name="annee_formation_filtre"]').change(function () {
    anneeId = $('select[name="annee_formation_filtre"]')
      .find("option:selected")
      .val()
  })

  document.cookie = "annee_formation=" + anneeId
})
