<div>

    @if ($liste_LigneProgramme == true)
        @include('livewire.ligneprogramme.liste')
    @endif
    @if ($ajouter_LigneProgramme == true)
        @include('livewire.ligneprogramme.ajouter_ligneProgramme')
    @endif
    @if ($modifier_LigneProgramme == true)
        @include('livewire.ligneprogramme.modifier_ligneProgramme')
    @endif
    @if ($supprimer_LigneProgramme == true)
        @include('livewire.ligneprogramme.supprimer_ligneProgramme')
    @endif
    @if ($detailler_LigneProgramme == true)
        @include('livewire.ligneprogramme.detailler_ligneProgramme')
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
                @this.deleteLigneProgramme(event.message.LigneProgramme_id)
            }
        });
    });
});
</script>
<script>
document.addEventListener('livewire:init', () => {
    Livewire.on('confirmMessage2', (event) => {
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
                @this.deleteObjectifss(event.message.objectifs_id)
            }
        });
    });
});
</script>
