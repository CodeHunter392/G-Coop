function loadPermissionFile(permissionType, roleId, roleNom) {

    var roleId = document.getElementById('roleid').value;
    var roleNom = document.getElementById('rolenom').value;

    switch (permissionType) {
        case "Menu":
            $.ajax({
                type: "POST",
                url: "./permissions/prm_Menu.php",
                data: {
                    roleid: roleId,
                    rolenom: roleNom
                },
                success: function(response) {
                    $("#contenuPermission").html(response);
                }
            });
            break;
        case "Action":
            $.ajax({
                type: "POST",
                url: "./permissions/prm_Action.php",
                data: {
                    roleid: roleId,
                    rolenom: roleNom
                },
                success: function(response) {
                    $("#contenuPermission").html(response);
                }
            });
            break;
        case "Option":
            $.ajax({
                type: "POST",
                url: "./permissions/prm_Option.php",
                data: {
                    roleid: roleId,
                    rolenom: roleNom
                },
                success: function(response) {
                    $("#contenuPermission").html(response);
                }
            });
            break;
            // Ajoutez des cas pour d'autres types de permission si nécessaire
        default:
            console.log("Type de permission inconnu.");
    }
};

document.addEventListener('DOMContentLoaded', function() {
    var roleId = $('#roleid').val();
    var roleNom = $('#rolenom').val();
    loadPermissionFile("Menu", roleId, roleNom);
});

$(document).ready(function() {
        
    $(document).on('change', '.check-perm', function() {
        var $this = $(this);
        var permissionId = $this.data('permission-id');
        var p = {
            false: 'error',
            true: 'success'
        };
        var checked = $(this).is(':checked');
        var role = $('#roleid').val();
    
        $.post('', {
                role_id: role,
                task: 'one',
                permission_id: permissionId,
                action: (checked ? 'allow' : 'deny')
            },
            function(result) {
                if (result.trim() == 'OK') {
                    $this.parent().attr('class', p[checked]);
                    $.toast({
                        heading: "Ajoutement avec succès",
                        text: "la permission est ajouté avec succès",
                        showHideTransition: "slide",
                        icon: "success",
                        hideAfter: 5000,
                    })
                } else {
                    $.toast({
                        heading: "Retirement avec succès",
                        text: "la permission est retiré avec succès",
                        showHideTransition: "slide",
                        icon: "warning",
                        hideAfter: 5000,
                    })
                }
            });
    });

    
});




