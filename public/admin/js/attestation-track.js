$(document).ready(function(){

    var inscriptionId, type_demande, confirmationPlaceholder;

    $("#releve-form, #form-diplome, #reussit-form, #scolarite-form, #inscription-form").submit(function(){
        confirmationPlaceholder=$(this).find("#attestation_sortie")
        $(confirmationPlaceholder).removeClass("hide")
    })

    $(".hide-attestation-sortie").click(function(){

        $(this).parent().parent().parent().addClass("hide")
    })

    // if user click on "oui"
    $(".attestation-sortie").click(function(){

        $(this).attr('disabled', 'disabled')

        $typeAttestation=$(this)[0].getAttribute('att_type');

        if($typeAttestation=="releve"){
            
            $form=$(this).parent().parent().parent().parent();

            inscriptionId=$($form).find('select[name="ins_id"] option:selected').val()
            type_demande="Releve de notes";
            
        }else if($typeAttestation=="diplome"){
            $form=$(this).parent().parent().parent().parent().parent().parent().parent()

            inscriptionId=$($form).find('input[name="inscription_id"]').val();
            type_demande="Diplôme";

        }else if($typeAttestation=="reussit"){
            $form=$(this).parent().parent().parent().parent().parent().parent()

            inscriptionId=$($form).find('select[name="ins_att"] option:selected').val();
            type_demande="Attestation de réussite";

        }else if($typeAttestation=="scolarite"){
            $form=$(this).parent().parent().parent().parent().parent().parent()
            inscriptionId=$($form).find('select[name="ins_att"] option:selected').val();

            type_demande="Attestation de scolarité";
            
        }else if($typeAttestation=="inscription"){
            $form=$(this).parent().parent().parent().parent().parent().parent()
            inscriptionId=$($form).find('select[name="ins_att"] option:selected').val();

            type_demande="Attestation d'inscription";

        }

        // else if($typeAttestation=="preinscription"){
        //     $form=$(this).parent().parent().parent().parent().parent().parent()
        //     inscriptionId=$($form).find('select[name="ins_att"] option:selected').val();

        //     type_demande="Attestation de scolarité";
        //     alert(inscriptionId)
        // }

        if(type_demande!=null && inscriptionId!=null){
            $.ajax({
                type:"POST",
                url: "./requests/demande/persist-demand.php",
                data:{"type_demande": type_demande, "inscripiton_id": inscriptionId},
                success:function(response, textStatus, xhr){
                    if(xhr.status==201){
                        $(".attestation-sortie").removeAttr('disabled');
                        $(".attestation-sortie").html('Oui');

                        $(confirmationPlaceholder).addClass("hide")
                    }else{
                        console.log(response)
                    }
                }
            })
        }

        $(this).html("Veuillez patienter ...")
        
    });
})