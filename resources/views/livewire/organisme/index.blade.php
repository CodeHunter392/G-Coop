<div>

        @if ($liste_organisme == true)
            @include('livewire.organisme.liste')
        @endif
        @if ($ajouter_organisme == true)
            @include('livewire.organisme.ajouter_organisme')
        @endif
        @if ($modifier_organisme == true)
            @include('livewire.organisme.modifier_organisme')
        @endif
        @if ($supprimer_organisme == true)
            @include('livewire.organisme.supprimer_organisme')
        @endif
        @if ($detailler_organisme == true)
            @include('livewire.organisme.detailler_organisme')
        @endif
    
</div>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('showSuccessMessage', (event) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                toast: true,
                title: event.message,
                showConfirmButton: false,
                timer: 2500
            });
        });
    });
</script>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('confirmMessage', (event) => {
            Swal.fire({
                title: "Êtes-vous sûr de continuer ?  ",
                text: "Vous êtes sur le point de supprimer " + event.message.titre,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Continuer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteOrganisme(event.message.organisme_id)
                }
            });
        });
    });
</script>
