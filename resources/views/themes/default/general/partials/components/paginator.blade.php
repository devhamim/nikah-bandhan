@if(method_exists($paginable, 'perPage'))
@if($paginable->total()>$paginable->perPage())
<div class="perfect-center">
    <div class="d-inline-block">
        {{$paginable->links()}}
    </div>
</div>
@endif
@endif
