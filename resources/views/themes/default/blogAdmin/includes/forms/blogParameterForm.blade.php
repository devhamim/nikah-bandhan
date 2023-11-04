<div class="box box-widget">
  <div class="box-header with-border">
   <h3 class="box-title">
    Blog Parameter Update 
  </h3>
</div>

<form method="post" action="{{route('admin.blogParameterUpdate')}}" enctype="multipart/form-data">
  <div class="box-body" style="background-color: #ccc;">
    <div class="row">
     <div class="col-md-5">

      <div class="box box-widget">
        <div class="box-body">

         {{csrf_field()}}



         <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
          <label for="title" class="  control-label">Title</label>

          <input type="text" name="title" class="form-control" value="{{old('title') ?: $post->title}}" id="title" placeholder="Title of HTML Head Part <title>Title Here</title>" autocomplete="off">
          @if ($errors->has('title'))
          <span class="help-block">
           <strong>{{ $errors->first('title') }}</strong>
         </span>
         @endif

       </div>

       <div class="form-group {{ $errors->has('short_title') ? ' has-error' : '' }}">
        <label for="short_title" class="  control-label">Short Title</label>

        <input type="text" name="short_title" class="form-control" value="{{old('short_title') ?: $post->short_title}}" id="short_title" placeholder="Short Title for Admin Left Sidebar" autocomplete="off">
        @if ($errors->has('short_title'))
        <span class="help-block">
          <strong>{{ $errors->first('short_title') }}</strong>
        </span>
        @endif

      </div>

      <div class="form-group {{ $errors->has('h1') ? ' has-error' : '' }}">
        <label for="h1" class="  control-label">Main Heading</label>

        <input type="text" name="h1" class="form-control" value="{{old('h1') ?: $post->h1}}" id="h1" placeholder="Main Heading (h1)" autocomplete="off">
        @if ($errors->has('h1'))
        <span class="help-block">
          <strong>{{ $errors->first('h1') }}</strong>
        </span>
        @endif

      </div>



      {{-- <div class="form-group {{ $errors->has('google_analytics_code') ? ' has-error' : '' }}">
        <label for="google_analytics_code" class="control-label"> Google Analytics (Tracking) Code </label>

        <textarea  name="google_analytics_code" class="form-control" rows="9" id="google_analytics_code" placeholder="Google Analytics Code (Tracking Code)">{!! old('google_analytics_code') ?: $post->google_analytics_code !!}</textarea>

        @if ($errors->has('google_analytics_code'))
        <span class="help-block">
         <strong>{{ $errors->first('google_analytics_code') }}</strong>
       </span>
       @endif

     </div>

     <div class="form-group {{ $errors->has('meta_author') ? ' has-error' : '' }}">
      <label for="meta_author" class="  control-label">Meta Author for Website</label>

      <input type="text" name="meta_author" class="form-control" value="{{old('meta_author') ?: $post->meta_author}}" id="meta_author" placeholder="Meta Author for SEO of website" autocomplete="off">
      @if ($errors->has('meta_author'))
      <span class="help-block">
        <strong>{{ $errors->first('meta_author') }}</strong>
      </span>
      @endif

    </div>


    <div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
      <label for="meta_description" class="control-label">Meta Description</label>


      <textarea  name="meta_description" class="form-control" rows="4" id="meta_description" placeholder="Meta Description for SEO of Website">{{ old('meta_description') ?: $post->meta_description }}</textarea>
      @if ($errors->has('meta_description'))
      <span class="help-block">
        <strong>{{ $errors->first('meta_description') }}</strong>
      </span>
      @endif

    </div>

    <div class="form-group {{ $errors->has('meta_keyword') ? ' has-error' : '' }}">
      <label for="meta_keyword" class="control-label">Meta Keyword</label>


      <textarea  name="meta_keyword" class="form-control" rows="4" id="meta_keyword" placeholder="Meta Keyword for SEO of Website">{{ old('meta_keyword') ?: $post->meta_keyword }}</textarea>
      @if ($errors->has('meta_keyword'))
      <span class="help-block">
        <strong>{{ $errors->first('meta_keyword') }}</strong>
      </span>
      @endif

    </div> --}}


    <div class="form-group {{ $errors->has('footer_address') ? ' has-error' : '' }}">
      <label for="footer_address" class="control-label">Footer Address</label>


      <textarea  name="footer_address" class="form-control" rows="6" id="footer_address" placeholder="Website address in footer area">{{ old('footer_address') ?: $post->footer_address }}</textarea>
      @if ($errors->has('footer_address'))
      <span class="help-block">
        <strong>{{ $errors->first('footer_address') }}</strong>
      </span>
      @endif

    </div>

    <div class="form-group {{ $errors->has('footer_copyright') ? ' has-error' : '' }}">
      <label for="footer_copyright" class="control-label">Footer Copyright Text</label>


      <textarea  name="footer_copyright" class="form-control" rows="4" id="footer_copyright" placeholder="Copyright text in footer area">{{ old('footer_copyright') ?: $post->footer_copyright }}</textarea>
      @if ($errors->has('footer_copyright'))
      <span class="help-block">
        <strong>{{ $errors->first('footer_copyright') }}</strong>
      </span>
      @endif

    </div>

    {{-- <div class="form-group {{ $errors->has('fb_url') ? ' has-error' : '' }}">
      <label for="fb_url" class="  control-label">Facebook Page Url</label>

      <input type="text" name="fb_url" class="form-control" value="{{old('fb_url') ?: $post->fb_url}}" id="fb_url" placeholder="https://facebook.com/trustnewsbd " autocomplete="off">
      @if ($errors->has('fb_url'))
      <span class="help-block">
        <strong>{{ $errors->first('fb_url') }}</strong>
      </span>
      @endif                       
    </div> --}}

    <div class="form-group {{ $errors->has('google_map_code') ? ' has-error' : '' }}">
      <label for="google_map_code" class="control-label">Code for Google Map</label>

      <textarea  name="google_map_code" class="form-control" rows="9" id="google_map_code" placeholder="Code for Google Map in footer area">{{ old('google_map_code') ?: $post->google_map_code }}</textarea>
      @if ($errors->has('google_map_code'))
      <span class="help-block">
        <strong>{{ $errors->first('google_map_code') }}</strong>
      </span>
      @endif

    </div>

    <div class="form-group {{ $errors->has('addthis_url') ? ' has-error' : '' }}">
      <label for="addthis_url" class="  control-label">Addthis URL Code</label>

      <input type="text" name="addthis_url" class="form-control" value="{{old('addthis_url') ?: $post->addthis_url}}" id="addthis_url" placeholder="addthis url for fb,twitter, linkedin, print... etc " autocomplete="off">
      @if ($errors->has('addthis_url'))
      <span class="help-block">
        <strong>{{ $errors->first('addthis_url') }}</strong>
      </span>
      @endif                       
    </div>




  </div>
</div>


<div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title">Update Favicon </h3>
    </div>
    <div class="box-body">

      <div class="row">
        <div class="col-sm-8">
          <div class="form-group {{ $errors->has('favicon') ? ' has-error' : '' }}">
            <label for="favicon" class="col-sm-3 control-label">favicon</label>
            <div class="col-sm-9">
              <input type="file" name="favicon" class="" id="favicon">
              <span class="help-block">Image Dimention 16px X 16px  and Ratio 16/16 is better.</span>

              @if ($errors->has('favicon'))
              <span class="help-block">
                <strong>{{ $errors->first('favicon') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          @if($post->favicon)
          <div class="w3-display-container" style="height:110px;">
            <img class="img-responsive" src="{{asset('storage/favicon/'. $post->favicon)}}" alt="">


          </div>
          @endif
        </div>
      </div>

    </div>
  </div>


<div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title">Update Logo</h3>
    </div>
    <div class="box-body">

      <div class="row">
        <div class="col-sm-8">
          <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
            <label for="logo" class="col-sm-3 control-label">Logo</label>
            <div class="col-sm-9">
              <input type="file" name="logo" class="" id="logo">
              <span class="help-block">Image Dimention 300px X 150px or larger and Ratio 4/2 is better.</span>

              @if ($errors->has('logo'))
              <span class="help-block">
                <strong>{{ $errors->first('logo') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          @if($post->logo)
          <div class="w3-display-container" style="height:110px;">
            <img class="img-responsive" src="{{asset('storage/logo/'. $post->logo)}}" alt="">


          </div>
          @endif
        </div>
      </div>

    </div>
  </div>




  {{-- <div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title">Update Android App (APK)</h3>
    </div>
    <div class="box-body">

      <div class="row">
        <div class="col-sm-7">
          <div class="form-group {{ $errors->has('android_apk') ? ' has-error' : '' }}">
            <label for="android_apk" class="col-sm-6 control-label">Android App APK</label>
            <div class="col-sm-6">
              <input type="file" name="android_apk" class="" id="android_apk">

              @if ($errors->has('android_apk'))
              <span class="help-block">
                <strong>{{ $errors->first('android_apk') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          @if($post->android_apk)
          <div class="w3-display-container" style="height:100px;">
            <img class="img-responsive" src="{{asset('img/and.png')}}" alt="">


          </div>
          @endif
        </div>
      </div>

    </div>
  </div> --}}




</div>


<div class="col-sm-7">
  


  



  <div class="row">
    <div class="col-sm-4">

<div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Main Color</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
        <div class="radio">
          <label><input type="radio" name="main_color" value="default" {{$post->main_color == 'default' ? 'checked' : ''}}> <i class="fa fa-circle w3-text-gray"></i> Default
          </label>
        </div>
        
        @foreach($colors as $color)

        <div class="radio">
          <label><input type="radio" name="main_color" value="{{$color}}" {{$post->main_color == $color ? 'checked' : ''}}> <i class="fa fa-circle w3-text-{{$color}}"></i> {{$color}}
          </label>
        </div>

        @endforeach
              

    </div>



  </div>
</div>





      
    </div>
    <div class="col-sm-4">



      <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Sub Color</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
        <div class="radio">
          <label><input type="radio" name="sub_color" value="default" {{$post->sub_color == 'default' ? 'checked' : ''}}> <i class="fa fa-circle w3-text-light-gray"></i> Default
          </label>
        </div>

        @foreach($colors as $color)

        <div class="radio">
          <label><input type="radio" name="sub_color" value="{{$color}}" {{$post->sub_color == $color ? 'checked' : ''}}> <i class="fa fa-circle w3-text-{{$color}}"></i> {{$color}}
          </label>
        </div>

        @endforeach
        
        
              

    </div>



  </div>
</div>

      
    </div>
    <div class="col-sm-4">
      <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Header Backgr.</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
        <div class="radio">
          <label><input type="radio" name="header_bg_color" value="default" {{$post->header_bg_color == 'default' ? 'checked' : ''}}> <i class="fa fa-circle w3-text-gray"></i> Default
          </label>
        </div>
        
        @foreach($colors as $color)

        <div class="radio">
          <label><input type="radio" name="header_bg_color" value="{{$color}}" {{$post->header_bg_color == $color ? 'checked' : ''}}> <i class="fa fa-circle w3-text-{{$color}}"></i> {{$color}}
          </label>
        </div>

        @endforeach
              

    </div>



  </div>
</div>
    </div>
  </div>







  <div class="row">
    <div class="col-sm-4">


<div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Header Text Color</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
        <div class="radio">
          <label><input type="radio" name="header_text_color" value="default" {{$post->header_text_color == 'default' ? 'checked' : ''}}> <i class="fa fa-circle w3-text-light-gray"></i> Default
          </label>
        </div>

        @foreach($colors as $color)

        <div class="radio">
          <label><input type="radio" name="header_text_color" value="{{$color}}" {{$post->header_text_color == $color ? 'checked' : ''}}> <i class="fa fa-circle w3-text-{{$color}}"></i> {{$color}}
          </label>
        </div>

        @endforeach
        
        
              

    </div>



  </div>
</div>








      
    </div>
    <div class="col-sm-4">


<div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Footer Backgr.</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
        <div class="radio">
          <label><input type="radio" name="footer_bg_color" value="default" {{$post->footer_bg_color == 'default' ? 'checked' : ''}}> <i class="fa fa-circle w3-text-gray"></i> Default
          </label>
        </div>
        
        @foreach($colors as $color)

        <div class="radio">
          <label><input type="radio" name="footer_bg_color" value="{{$color}}" {{$post->footer_bg_color == $color ? 'checked' : ''}}> <i class="fa fa-circle w3-text-{{$color}}"></i> {{$color}}
          </label>
        </div>

        @endforeach
              

    </div>



  </div>
</div>


      
    </div>

    <div class="col-sm-4">
      <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Footer Text Color</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
        <div class="radio">
          <label><input type="radio" name="footer_text_color" value="default" {{$post->footer_text_color == 'default' ? 'checked' : ''}}> <i class="fa fa-circle w3-text-light-gray"></i> Default
          </label>
        </div>

        @foreach($colors as $color)

        <div class="radio">
          <label><input type="radio" name="footer_text_color" value="{{$color}}" {{$post->footer_text_color == $color ? 'checked' : ''}}> <i class="fa fa-circle w3-text-{{$color}}"></i> {{$color}}
          </label>
        </div>

        @endforeach
        
        
              

    </div>



  </div>
</div>

    </div>
  </div>


</div>
</div>

</div>

<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right">Update</button>
</div>
</form>
</div>