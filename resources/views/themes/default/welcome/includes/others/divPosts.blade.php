<style>
  .lead-post{
    position:relative; 
    margin-bottom:15px; 
    background:#666
  }

  .lead-post-text{
    display: block;
    position: absolute;
    width: 100%;height: 60px;
    bottom: 0px;
    opacity: 0.8;background-color: rgba(0,0,0,.5);

      font-size: 22px;
      color: #fff;
      line-height: 2.5;
  }
</style>


{{-- top of details 1 ad --}}
    @include('welcome.includes.adv.topOfDetails1')


{{-- <img class="img-responsive" src="{{asset('img/top_of_details.png')}}" alt="{{$div->title}}"> --}}

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">হোম</a></li>
  <li><a href="{{route('welcome.postDivision',[$div, $div->title])}}">{{$div->title}} বিভাগ</a></li> 
  @if($dist)
   <li><a href="#">{{$dist->title}} জেলা</a></li>
  @endif 
  @if($thana)
  <li><a href="#">{{$thana->title}} উপজেলা</a></li>
  @endif          
</ol>



<div class="box box-widget" style="padding: 0;">
  <div class="box-body" style="min-height: 500px;padding: 0;">


    @include('welcome.includes.search.divSearchInDivPage')




 @if($divPosts->count())
 @foreach($divPosts->chunk(2) as $posts2)
  <div class="row">
    @foreach($posts2 as $post)
      @if($loop->first)
      <div class="col-sm-8">
         <a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
         <div class="text-center lead-post" style="">
                    <img class="img-responsive" border="0" style="width: 100%;" alt="{{$post->title}}" title="{{$post->title}}" src="{{asset($post->fi())}}">
                    <div class="lead-post-text" style="">
             {{str_limit($post->title,45,'..')}} 
        </div>                        
    </div>
  </a>

        @else
    <div class="col-sm-4">



      <a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
    <div class="box box-widget" style="padding: 0;">
          <div class="box-body box-profile" style="padding: 0;">
            <img class="img-responsive" src="{{asset($post->fi())}}" alt="User profile picture">

            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <h3 class="profile-username"  style="font-size: 18px;line-height: 1.3;">{{str_limit($post->title,50,'..')}}</h3>

            <p class="text-muted">{{str_limit($post->excerpt,110,'..')}}
              @include('welcome.includes.others.readCommentCount')
            </p>
          </div>
       </div>
  </a>



      @endif
    </div>
    @endforeach
  </div>
  @if($loop->first)
    @break
  @endif
 @endforeach
 @endif




@if($divPosts->count())
  @foreach($divPosts->chunk(3) as $post3)

  @if($loop->first)
  @continue
  @else

  <div class="row">
    @foreach($post3 as $post)
  <div class="col-sm-4">



 <a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
    <div class="box box-widget" style="padding: 0;">
          <div class="box-body box-profile" style="padding: 0;">
            <img class="img-responsive" src="{{asset($post->fi())}}" alt="User profile picture">

            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <h3 class="profile-username"  style="font-size: 18px;line-height: 1.3;">{{str_limit($post->title,50,'..')}}</h3>

            <p class="text-muted">{{str_limit($post->excerpt,100,'..')}}</p>
          </div>
       </div>
  </a>
    


  </div>
  @endforeach
  </div>

  @endif
  
  @endforeach
@endif


<div class="pull-right">
  {{$divPosts->render()}}
</div>

    
  </div>
</div>




<h6>
  <blockquote>
    ঢাকা মেট্রো নিউজ
  </blockquote>
  
</h6>