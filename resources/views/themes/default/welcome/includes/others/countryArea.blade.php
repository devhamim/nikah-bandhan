
<div class="box">
  <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#country" data-toggle="tab">সারাদেশ</a></li>
              @foreach($divs as $div)
              <li>
                {{-- <a href="{{route('welcome.postDivision',[$div,$div->title])}}">{{$div->title}}</a> --}}
                <li ><a href="#{{$div->id}}" data-toggle="tab">{{$div->title}}</a></li>
              </li>
              @endforeach
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="country">
              
              @if($divPosts->count())
              @foreach($divPosts->chunk(4) as $p4)
              <div class="row">
                @foreach($p4 as $post)
                  <div class="col-sm-3">
                  <a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
                    <div class="box box-widget" style="padding: 0;margin-bottom: {{$loop->parent->last ? 0 : '10px'}};">
                          <div class="box-body box-profile" style="padding: 0;">
                            <img class="img-responsive" src="{{asset($post->fi())}}" alt="{{$post->title}}">

                            
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <h3 class="profile-username"  style="font-size: 12px;line-height: 1.3;margin-bottom: 0;">{{str_limit($post->title,50,'..')}}</h3>
                            <span class="text-muted" style="font-size: 11px !important;">{{$post->div()}}

                             @include('welcome.includes.others.readCommentCount')

                            </span>
                          </div>
                       </div>
                  </a>
                </div>
                @endforeach
              </div>
              @endforeach

              @endif
              </div>
              @foreach($divs as $div)
              <div class="tab-pane" id="{{$div->id}}">
              
              @if($div->posts()->count())
              @foreach($div->posts->chunk(4) as $p4)
              <div class="row">
                @foreach($p4 as $post)
                  <div class="col-sm-3">
                  <a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
                    <div class="box box-widget" style="padding: 0;margin-bottom: {{$loop->parent->last ? 0 : '10px'}};">
                          <div class="box-body box-profile" style="padding: 0;">
                            <img class="img-responsive" src="{{asset($post->fi())}}" alt="{{$post->title}}">

                            
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <h3 class="profile-username"  style="font-size: 12px;line-height: 1.3;margin-bottom: 0;">{{str_limit($post->title,50,'..')}}</h3>
                            <span class="text-muted" style="font-size: 11px !important;">{{$post->div()}}

                             @include('welcome.includes.others.readCommentCount')

                            </span>
                          </div>
                       </div>
                  </a>
                </div>
                @endforeach
              </div>

              @if($loop->iteration == 2)
                @break
              @endif
              
              @endforeach

              @endif
              </div>
              @endforeach
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
</div>

