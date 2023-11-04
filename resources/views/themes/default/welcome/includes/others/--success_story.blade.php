 @if ($page_success_story)

 {{-- <div class="container"> --}}

        {{-- <div class="box box-widget"> --}}

            {{-- @if (!$page_success_story->title_hide)
                <div class="box-header text-center">
                <h3><b>{{ $page_success_story->page_title }}</b></h3>
            </div>
            @endif --}}
            

            {{-- <div class="box-body"> --}}

                {!! $page_success_story->content !!}
        {{-- </div>        --}}
            
        {{-- </div> --}}
{{-- </div> --}}
     
     
 @endif