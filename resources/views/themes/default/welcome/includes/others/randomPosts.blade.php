@if(count($randomPosts))
<div class="box box-widget">
  <div class="box-body" style="padding: 0;">

  @foreach($randomPosts as $post)

  @include('welcome.includes.others.sidebarPost')

  @endforeach

  </div>
    </div>
@endif