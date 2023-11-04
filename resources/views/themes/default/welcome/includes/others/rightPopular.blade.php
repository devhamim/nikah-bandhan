<div class="box box-widget">
  <div class="box-body" style="padding: 0;">
    <div style="margin-bottom: 12px;" class="w3-bar w3-green">
      <button class="w3-bar-item w3-button" onclick="opentab2('Tokyo2')">সর্বাধিক পঠিত</button>
  </div>

  @foreach($popularPosts as $post)

@include('welcome.includes.others.sidebarPost')

  @endforeach


  </div>
    </div>