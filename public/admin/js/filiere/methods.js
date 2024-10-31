var requestFilieresSignataires = function ($filiereId) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      url: "./requests/filiere/request-filieres-signataire.php",
      type: "POST",
      data: {filiereId: $filiereId},
      success: function (res) {
        resolve(res)
      },
      error: function (err) {
        reject(err)
      },
    })
  })
}

// Save filiere signataire data
var saveFilieresSignataires = function (data) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      url: "./requests/filiere/modify-signataires.php",
      type: "POST",
      data: data,
      success: function (res) {
        resolve(res)
      },
      error: function (err) {
        reject(err)
      },
    })
  })
}
