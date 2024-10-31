<div>

    @if ($liste_programme == true)
        @include('livewire.programme.liste')
    @endif
    @if ($ajouter_programme == true)
        @include('livewire.programme.ajouter_programme')
    @endif
    @if ($modifier_programme == true)
        @include('livewire.programme.modifier_programme')
    @endif
    @if ($supprimer_programme == true)
        @include('livewire.programme.supprimer_programme')
    @endif
    @if ($detailler_programme == true)
        @include('livewire.programme.detailler_programme')
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
                @this.deleteProgramme(event.message.programme_id)
            }
        });
    });
});
</script>
