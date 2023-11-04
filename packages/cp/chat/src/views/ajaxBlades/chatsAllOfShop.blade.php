@foreach ($chatto as $chatable)
<?php $user = $chatable->chatBy; ?>
<li class="item {{$chatable->autoload ? 'list-selected' : ''}} " style="border-bottom: 1px solid #f4f4f4;">
<a class="chatSingle " href="{{route('chatSingleAtShop',['chatable'=>$chatable])}}">
  <div class="product-img">
    <img class="img-rounded" src="{{ route( 'imagecache', ['template'=>'ppmd', 'filename' => $user->userProfilePic ]) }}" alt="User Image">
  </div>
  </a>
  <div class="product-info">
    <a class="product-title" href="{{route('userProfile', [$user->username])}}">
    {{$user->selectedName()}}
    </a>
    <a class="chatSingle " href="{{route('chatSingleAtShop',['chatable'=>$chatable])}}">
    <span class="product-description">
    <span class="single-slim">{{$chatable->latestMessage()}}</span> 
       
    
    <span class="help-block w3-tiny">{{$chatable->updated_at->diffForHumans()}} <span class="pull-right">{{$chatable->unseenCount() ? $chatable->unseenCount() . ' New' : ''}}</span></span>
      
    </span>
    </a>
    


    
      
  </div>
</li><!-- /.item -->
@endforeach