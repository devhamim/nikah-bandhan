      @foreach($catsAll->chunk(2) as $cat2)
      <div class="row">

        @foreach($cat2 as $cat)
        <div class="col-sm-6">

          <div class="box box-widget">
            <div class="box-header w3-panel w3-leftbar w3-border-green">
              <h3 class="box-title">
                {{$cat->title}}
              </h3>
            </div>
            <div class="box-body">

              <div class="row">
            <div class="col-sm-6">
              <a class="text-muted"  href="{{route('welcome.postDetails',['post'=>$cat->latestPost(), 'excerpt'=>str_slug($cat->latestPost()->excerpt)])}}">
              <img class="img-responsive" src="{{asset($cat->latestPost()->fi())}}" alt="">
                <div class="w3-container w3-light-gray">
                  <p style="font-weight: bold;font-size: 16px;">{{$cat->latestPost()->title}}</p>
                  <p>{{str_limit($cat->latestPost()->excerpt, 60,'..')}}
                    <?php $post = $cat->latestPost(); ?>
                    @include('welcome.includes.others.readCommentCount')

                  </p>
                </div>
              </a>
            </div>

            <div class="col-sm-6">
              {{--  <ul class="w3-ul w3-light-gray"> --}}
              @foreach($cat->latestPosts() as $post)              
              {{-- <li>
                <a class="text-muted" title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
                {{str_limit($post->title, 50,'..')}}
                </a>
              </li>  --}}

              @include('welcome.includes.others.sidebarPostForFront')           
              @endforeach
              {{-- </ul> --}}
            </div>
          </div>
              
            </div>
          </div>

          
          
          
        </div>
        @endforeach        
      </div>
      @endforeach