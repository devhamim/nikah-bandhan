<section class="" style="margin-top:-35px;margin-bottom: -18px;">
    <div class="row">
        <div class="col-sm-12">
            @foreach ($page->activeItems() as $item)
            {!! $item->content !!}
            @endforeach
        </div>
    </div>
</section>


 