$(document).ready(function(){

    var tag_id,etud_id,element;

    $('.unassoc_tag_id').click(function(){
        tag_id=$(this)[0].getAttribute('target')
        etud_id=$('input[name="unassoc_etud_id"]').val()
        element=$(this)

        console.log(element)
    })
    
    $('#unassociated').click(function(){
        $.ajax({
            url:'./requests/tag/unassoc-tag.php',
            type: 'POST',
            data:{tag_id:tag_id, etud_id:etud_id},
            success:function(response){
                console.log(response)
                if(response=="success"){
                    $("#unsociate-modal").modal('hide');
                    $(element).remove()
                }
            }
        })
    })
})