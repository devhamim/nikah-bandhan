<div class="container">
  <section class="content">

<div class="row">
  <div class="col-sm-9">
    <h2>{{$post->title}}
    </h2>

    <div class="box-body">
      <img class="img-responsive pad" src="{{asset('img/photo2.png')}}" alt="Photo">

      {!! $post->description !!}

      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted">127 likes - 3 comments</span>
    </div>

  </div>

  <div class="col-sm-3">
    <div class="box">
    <div style="margin-bottom: 12px;" class="w3-bar w3-black">
      <button class="w3-bar-item w3-button" onclick="opentab2('Tokyo2')">সর্বশেষ খবর</button>
  </div>

  @foreach($latestPosts as $post)

  <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>

  @endforeach



    

    <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>

    <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>

    <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>

    <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>

    <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>

    <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>

    <div class="attachment-block clearfix">
      <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="Attachment Image">
      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">text generator</a></h4>
        <p>Description about the attachmente.... <a href="#">more</a></p>
      </div>
    </div>


    </div>
  </div>
</div>

    
</section>

  
</div>
