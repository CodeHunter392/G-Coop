<div>
    @if($currentPage == PAGECREATEFORM )
        @include('livewire.offrestage.add')
    @endif    
    @if ($currentPage == PAGEEDITFORM)
          @include('livewire.offrestage.edit')
    @endif
    @if ($currentPage == PAGELIST)
          @include('livewire.offrestage.liste')
    @endif
</div>