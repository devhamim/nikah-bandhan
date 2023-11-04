@foreach ($chatto as $chatable)

@if($chatable->user())
<?php $user = $chatable->chatBy; ?>
@if ($user)

@if (Auth::user()->isBlockedByMe($user) || $user->isBlockedByMe(Auth::user()))
@else

<li class="item w3-padding {{$chatable->autoload ? 'list-selected' : ''}} {{ $chatable->unseenCount() ? 'w3-border w3-border-light-gray' : '' }}" style="border-bottom: 1px solid #f4f4f4;">
<a class="chatSingle " href="{{route('chatSingle',['chatable'=>$chatable])}}">
  <div class="product-img">
    <img class="img-rounded" src="{{asset($user->latestCheckedPP())}}" alt="User Image">
  </div>
  </a>
  <div class="product-info">
    <a class="product-title" href="{{route('welcome.username', [$user->username])}}">
    {{$user->username}}
    </a>
    <a class="chatSingle " href="{{route('chatSingle',['chatable'=>$chatable])}}">
    <span class="product-description">
    <span class="single-slim">{{$chatable->latestMessage()}}</span> 
       
 
    <span class="help-block w3-tiny ">{{$chatable->unseenCount() ? $chatable->updated_at->diffForHumans() : ''}} <span class="pull-right">{{$chatable->unseenCount() ? $chatable->unseenCount() . ' New' : ''}}</span></span>
      
    </span>
    </a>    
      
  </div>
</li><!-- /.item -->


@endif


@endif


@endif
@endforeach