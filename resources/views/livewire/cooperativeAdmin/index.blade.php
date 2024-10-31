<div>
    <div>

        @if ($liste_Cooperative == true)
            @include('livewire.cooperativeAdmin.liste')
        @endif
        @if ($ajouter_Cooperative == true)
            @include('livewire.cooperativeAdmin.ajouter_cooperative')
        @endif
        @if ($modifier_Cooperative == true)
            @include('livewire.cooperativeAdmin.modifier_cooperative')
        @endif
        @if ($supprimer_Cooperative == true)
            @include('livewire.cooperativAdmine.supprimer_cooperative')
        @endif
        @if ($detailler_Cooperative == true)
            @include('livewire.cooperativeAdmin.detailler_cooperative')
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

                cancelButtonColor: "#d33",
                confirmButtonText: "Continuer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteCooperative(event.message.Cooperative_id)
                }
            });
        });
    });
</script>

</div>
