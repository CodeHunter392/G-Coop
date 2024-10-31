<div>
    @if($currentPage == PAGECREATEFORM )
        @include('livewire.stage.add2')
    @endif    
    @if ($currentPage == PAGEEDITFORM)
          @include('livewire.stage.edit')
    @endif
    @if ($currentPage == PAGELIST)
          @include('livewire.stage.liste')
    @endif
</div>