$(document).ready(function() {
    $("#e1").select2();
    $("#e9").select2();
    $("#e2").select2({
        placeholder: "Selectionner un utilisteur",
        allowClear: true
    });
    $("#e3").select2({
        minimumInputLength: 2
    });

    $("#classe_select2").select2({
        placeholder: "Selectionner une classe",
        allowClear: true
    })
});