{{-- top of details 1 ad --}}
    @include('welcome.includes.adv.topOfDetails1')
    
{{-- <img class="img-responsive" src="{{asset('img/top_of_details.png')}}" alt="{{$post->title}}"> --}}

<ol class="breadcrumb">
  <li><a href="{{url('/')}}">হোম</a></li>
  {{-- <li><a href="#">{{$post->title}}</a></li> --}}
  <li class="active">{{$post->title}}</li>        
</ol>

<div>
  <div class="pull-left">
    প্রকাশঃ {{$post->created_at->toDayDateTimeString()}} <br>
    আপডেটঃ {{$post->updated_at->toDayDateTimeString()}}
  </div>
  
</div>

<br>

<hr>



<h1 style="font-size: 28px;">{{$post->title}}</h1>

<h3>
  <blockquote>
    {{$post->addedBy->postStatus()}}
  </blockquote>
  
</h3>



<div class="box box-widget">
  <div class="box-body" style="min-height: 500px;line-height: 1.5;font-size: 18px;text-align: justify;" >

    <img src="{{asset($post->fi())}}" class="img-responsive" style="width: 100%;" alt="{{$post->title}}">

    <hr>

    {!! $post->description !!}



          <!-- Your like button code -->
<div class="fb-like" 
data-href="{{route('welcome.postDetails',[$post])}}" 
data-layout="standard" 
data-action="like" 
data-size="large" 
data-show-faces="true" 
data-share="false"></div>



    <hr>

    @if($post->categories->count())
    <b>ক্যাটেগরিঃ</b> {{$post->cats()}} <br>
    @endif

    @if($post->tags)
    <b>ট্যাগঃ</b> {{$post->tags}} <br>
    @endif

    @if($post->divisions->count())
    <b>বিভাগঃ</b> {{$post->div()}} <br>
    @endif

    @if($post->districts->count())
    <b>জেলাঃ</b> {{$post->dist()}} <br>
    @endif

    @if($post->thanas->count())
    <b>উপজেলাঃ</b> {{$post->thana()}} <br>
    @endif
    সংবাদটি মোট {{$post->read}} বার পড়া হয়েছে।

  </div>
</div>




<h6>
  <blockquote>
    ঢাকা মেট্রো নিউজ



  </blockquote>
  
</h6>



<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_q9y1"></div>


<br>



{{-- @if(Auth::check())

@include('alerts')

<h4> মন্তব্য ({{$post->comments->count()}}) | হ্যলো {{Auth::user()->name}}, আপনার মন্তব্য লিখুন</h4>

<div class="box-footer">
  <form method="post" action="{{route('customer.commentPublish',$post)}}">
    {{csrf_field()}}
    <img class="img-responsive img-circle img-sm" title="{{Auth::user()->name}}" src="{{asset('img/profile.png')}}" alt="{{Auth::user()->name}}">
    <!-- .img-push is used to add margin to elements next to floating images -->
    <div class="img-push {{ $errors->has('comment') ? ' has-error' : '' }}">
    <textarea name="comment" id="comment" class="form-control" cols="30" rows="2" placeholder="হ্যলো {{Auth::user()->name}}, আপনার মন্তব্য লিখুন "></textarea> 
    @if ($errors->has('comment'))
    <span class="help-block">
      <strong>{{ $errors->first('comment') }}</strong>
    </span>
    @endif
    <br>

      <button class="btn btn-primary btn-small" type="submit">মন্তব্য প্রকাশ করুন</button>
    </div>
  </form>
</div>

@else

 <h4> মন্তব্য ({{$post->comments->count()}}) | মন্তব্য করতে <a class="w3-btn w3-blue w3-round" href="{{route('login')}}">লগইন</a> করুন</h4>

@endif

@if($post->comments->count())

<div class="box-footer box-comments">

  @foreach($post->comments as $comment)
    <div class="box-comment">
      <!-- User image -->
      <img title="{{$comment->addedBy->name}}" class="img-circle img-sm" src="{{asset('img/profile.png')}}" alt="User Image">

      <div class="comment-text">
            <span class="username">
              {{$comment->addedBy->name}}
              <span class="text-muted pull-right">{{$comment->created_at->toDayDateTimeString()}} 
              @if(Auth::check())
              @if($comment->deletePermission())
              <a onclick="return confirm('আপনি কি মন্তব্যটি মুছে দিতে চান?');" class="btn btn-xs btn-default" href="{{route('customer.commentDelete',$comment)}}"><i class="fa fa-trash"></i></a>
              @endif
              @endif
              </span>
            </span><!-- /.username -->
        {{$comment->description}}
      </div>
      <!-- /.comment-text -->
    </div>
    <!-- /.box-comment -->

    @if($loop->iteration == 200)
      @break
    @endif
    @endforeach

  </div>

@endif --}}


<div class="fb-comments" 
data-href="{{route('welcome.postDetails',[$post])}}" 
data-numposts="5"
data-width="100%"
></div>



  <br>
