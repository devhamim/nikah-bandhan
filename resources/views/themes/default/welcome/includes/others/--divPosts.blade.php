<img class="img-responsive" src="{{asset('img/top_of_details.png')}}" alt="{{$div->title}}">

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">হোম</a></li>
  <li class="active">{{$div->title}} বিভাগ</li>        
</ol>





<div class="box box-widget" style="padding: 0;">
  <div class="box-body" style="min-height: 500px;padding: 0;">

@if($divPosts->count())
  @foreach($divPosts->chunk(3) as $post3)
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