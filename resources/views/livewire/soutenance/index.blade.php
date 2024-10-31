<div>
    @if($currentPage == PAGECREATEFORM )
        @include('livewire.soutenance.add')
    @endif    
    @if ($currentPage == PAGEEDITFORM)
          @include('livewire.soutenance.edit')
    @endif
    @if ($currentPage == PAGELIST)
          @include('livewire.soutenance.liste')
    @endif
  
</div>