<style>
    .carousel-caption-custom{
        margin-bottom: -19px;
    }
</style>

<div class="w3-card-4">
<div class="box box-widget" id="s-story">
<div class="box-header with-border">
<p class="w3-xlarge text-center">Our Success Story</p>
</div>
<div class="box-body" >


<div class="box box-widget " >
<div class="box-body" style="background: #eee;">

<div class="row">
    <div class="col-sm-6">

        @if($stories)

        <!-- Carousel Card -->
        <div class="card card-raised card-carousel" style="margin-top: 0;margin-bottom: 0;">
            <div id="carouselExampleIndicators" class="carousel " data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($stories as $story)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">

                    @foreach ($stories as $story)

                    

                        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                            <a href="{{ route('welcome.successStory', [$story, str_slug($story->title)]) }}">
                            <img class="d-block w-100" src="{{ asset('storage/stories/'. $story->image_name) }}" alt="{{ $story->title }}">
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h4 class="carousel-caption-custom">
                                    <i class="material-icons">location_on</i> {{ $story->location }}, {{ date('d-M-Y', strtotime($story->marriage_date)) }}
                                </h4>
                            </div>
                        </div>
 

                    @endforeach
                    
                    
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <i class="material-icons">keyboard_arrow_left</i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="sr-only">Next</span>


                </a>
            </div>
        </div>
        <!-- End Carousel Card -->

        @endif

    </div>
    <div class="col-sm-6">


        
@if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_success_story')->first())
{!! $pg->content !!}
@endif 


</div>
</div>

</div>
</div>

</div>
</div>
</div>