

<div class="w3-bar w3-green">
  <a href="{{url('/')}}" class="w3-bar-item w3-button"><i class="fa fa-home"></i> হোম</a>
  @foreach($catsAll as $cat)
  <a href="{{route('welcome.postCategory',[$cat,$cat->title])}}" class="w3-bar-item w3-button w3-hide-small">{{$cat->title}}</a>
  @endforeach
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
</div>

<div id="topmenu" class="w3-bar-block w3-green w3-hide w3-hide-large w3-hide-medium">
  <a href="{{url('/')}}" class="w3-bar-item w3-button"><i class="fa fa-home"></i> হোম</a>
  @foreach($catsAll as $cat)
  <a href="{{route('welcome.postCategory',[$cat, $cat->title])}}" class="w3-bar-item w3-button">{{$cat->title}}</a>
  @endforeach
</div>