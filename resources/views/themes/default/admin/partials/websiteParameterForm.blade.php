<div class="box box-widget">
  <div class="box-header with-border">
   <h3 class="box-title">
    Website Parameter Update 
  </h3>
</div>

<form method="post" action="{{route('admin.websiteParameterUpdate')}}" enctype="multipart/form-data">
  <div class="box-body" style="background-color: #ccc;">
    <div class="row">
     <div class="col-md-6">

      <div class="box box-widget">
        <div class="box-body">

         {{csrf_field()}}



         <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
          <label for="title" class="  control-label">Title in Head Tag</label>

          <input type="text" name="title" class="form-control" value="{{old('title') ?: $post->title}}" id="title" placeholder="Title of HTML Head Part <title>Title Here</title>" autocomplete="off">
          @if ($errors->has('title'))
          <span class="help-block">
           <strong>{{ $errors->first('title') }}</strong>
         </span>
         @endif

       </div>

       <div class="form-group {{ $errors->has('h1') ? ' has-error' : '' }}">
        <label for="h1" class="  control-label">h1</label>

        <input type="text" name="h1" class="form-control" value="{{old('h1') ?: $post->h1}}" id="h1" placeholder="Main Heading (h1)" autocomplete="off">
        @if ($errors->has('h1'))
        <span class="help-block">
          <strong>{{ $errors->first('h1') }}</strong>
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



      <div class="form-group {{ $errors->has('slogan') ? ' has-error' : '' }}">
        <label for="slogan" class="  control-label">Slogan</label>

        <input type="text" name="slogan" class="form-control" value="{{old('slogan') ?: $post->slogan}}" id="slogan" placeholder="Main Heading (slogan)" autocomplete="off">
        @if ($errors->has('slogan'))
        <span class="help-block">
          <strong>{{ $errors->first('slogan') }}</strong>
        </span>
        @endif

      </div>


<div class="form-group {{ $errors->has('google_analytics_code') ? ' has-error' : '' }}">
        <label for="google_analytics_code" class="control-label"> Google Analytics (Tracking) Code </label>

        <textarea  name="google_analytics_code" class="form-control" rows="10" id="google_analytics_code" placeholder="Google Analytics Code (Tracking Code)">{!! old('google_analytics_code') ?: $post->google_analytics_code !!}</textarea>

        @if ($errors->has('google_analytics_code'))
        <span class="help-block">
         <strong>{{ $errors->first('google_analytics_code') }}</strong>
       </span>
       @endif
     </div>

     <div class="form-group {{ $errors->has('facebook_pixel_code') ? ' has-error' : '' }}">
        <label for="facebook_pixel_code" class="control-label"> Facebook (Pixel) Code </label>

        <textarea  name="facebook_pixel_code" class="form-control" rows="9" id="facebook_pixel_code" placeholder="Facebook Pixel Code (Tracking Code)">{!! old('facebook_pixel_code') ?: $post->facebook_pixel_code !!}</textarea>

        @if ($errors->has('facebook_pixel_code'))
        <span class="help-block">
         <strong>{{ $errors->first('facebook_pixel_code') }}</strong>
       </span>
       @endif
     </div>

      
     


    {{-- <div class="form-group {{ $errors->has('google_map_code') ? ' has-error' : '' }}">
      <label for="google_map_code" class="control-label">Code for Google Map</label>

      <textarea  name="google_map_code" class="form-control" rows="9" id="google_map_code" placeholder="Code for Google Map in contact-us area">{{ old('google_map_code') ?: $post->google_map_code }}</textarea>
      @if ($errors->has('google_map_code'))
      <span class="help-block">
        <strong>{{ $errors->first('google_map_code') }}</strong>
      </span>
      @endif
    </div> --}}

    {{-- <div class="form-group {{ $errors->has('youtube_code') ? ' has-error' : '' }}">
      <label for="youtube_code" class="control-label">Code for youtube</label>

      <textarea  name="youtube_code" class="form-control" rows="9" id="youtube_code" placeholder="Code for youtube in homepage area">{{ old('youtube_code') ?: $post->youtube_code }}</textarea>
      @if ($errors->has('youtube_code'))
      <span class="help-block">
        <strong>{{ $errors->first('youtube_code') }}</strong>
      </span>
      @endif
    </div> --}}

    

    {{-- <div class="form-group {{ $errors->has('addthis_url') ? ' has-error' : '' }}">
      <label for="addthis_url" class="  control-label">Addthis URL Code</label>

      <input type="text" name="addthis_url" class="form-control" value="{{old('addthis_url') ?: $post->addthis_url}}" id="addthis_url" placeholder="addthis url for fb,twitter, linkedin, print... etc " autocomplete="off">
      @if ($errors->has('addthis_url'))
      <span class="help-block">
        <strong>{{ $errors->first('addthis_url') }}</strong>
      </span>
      @endif                       
    </div> --}}




  </div>
</div>







{{--   <div class="box box-widget">
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
  </div>
 --}}





</div>


<div class="col-sm-6">

<div class="box box-widget">
  <div class="box-body">


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

    </div>


    {{-- <div class="form-group {{ $errors->has('footer_address') ? ' has-error' : '' }}">
      <label for="footer_address" class="control-label">Footer Address</label>


      <textarea  name="footer_address" class="form-control" rows="6" id="footer_address" placeholder="Website address in footer area">{{ old('footer_address') ?: $post->footer_address }}</textarea>
      @if ($errors->has('footer_address'))
      <span class="help-block">
        <strong>{{ $errors->first('footer_address') }}</strong>
      </span>
      @endif

    </div> --}}

    {{-- <div class="form-group {{ $errors->has('footer_copyright') ? ' has-error' : '' }}">
      <label for="footer_copyright" class="control-label">Footer Copyright Text</label>


      <textarea  name="footer_copyright" class="form-control" rows="4" id="footer_copyright" placeholder="Copyright text in footer area">{{ old('footer_copyright') ?: $post->footer_copyright }}</textarea>
      @if ($errors->has('footer_copyright'))
      <span class="help-block">
        <strong>{{ $errors->first('footer_copyright') }}</strong>
      </span>
      @endif

    </div> --}}

    <div class="form-group {{ $errors->has('fb_url') ? ' has-error' : '' }}">
      <label for="fb_url" class="  control-label">Facebook Page Url</label>

      <input type="text" name="fb_url" class="form-control" value="{{old('fb_url') ?: $post->fb_url}}" id="fb_url" placeholder="https://facebook.com/taslimamediabd" autocomplete="off">
      @if ($errors->has('fb_url'))
      <span class="help-block">
        <strong>{{ $errors->first('fb_url') }}</strong>
      </span>
      @endif                       
    </div>

    <div class="form-group {{ $errors->has('linkedin_url') ? ' has-error' : '' }}">
      <label for="linkedin_url" class="  control-label">LinkedIn Url</label>

      <input type="text" name="linkedin_url" class="form-control" value="{{old('linkedin_url') ?: $post->linkedin_url}}" id="linkedin_url" placeholder="LinkedIn url" autocomplete="off">
      @if ($errors->has('linkedin_url'))
      <span class="help-block">
        <strong>{{ $errors->first('linkedin_url') }}</strong>
      </span>
      @endif                       
    </div>

    <div class="form-group {{ $errors->has('twitter_url') ? ' has-error' : '' }}">
      <label for="twitter_url" class="  control-label">Twitter Url</label>

      <input type="text" name="twitter_url" class="form-control" value="{{old('twitter_url') ?: $post->twitter_url}}" id="twitter_url" placeholder="Twitter url" autocomplete="off">
      @if ($errors->has('twitter_url'))
      <span class="help-block">
        <strong>{{ $errors->first('twitter_url') }}</strong>
      </span>
      @endif                       
    </div>

    <div class="form-group {{ $errors->has('pinterest_url') ? ' has-error' : '' }}">
      <label for="pinterest_url" class="  control-label">Pinterest Url</label>

      <input type="text" name="pinterest_url" class="form-control" value="{{old('pinterest_url') ?: $post->pinterest_url}}" id="pinterest_url" placeholder="Pinterest url" autocomplete="off">
      @if ($errors->has('pinterest_url'))
      <span class="help-block">
        <strong>{{ $errors->first('pinterest_url') }}</strong>
      </span>
      @endif                       
    </div>

    <div class="form-group {{ $errors->has('youtube_url') ? ' has-error' : '' }}">
      <label for="youtube_url" class="  control-label">Youtube Url</label>

      <input type="text" name="youtube_url" class="form-control" value="{{old('youtube_url') ?: $post->youtube_url}}" id="youtube_url" placeholder="Youtube url" autocomplete="off">
      @if ($errors->has('youtube_url'))
      <span class="help-block">
        <strong>{{ $errors->first('youtube_url') }}</strong>
      </span>
      @endif                       
    </div>    

    <div class="form-group {{ $errors->has('google_plus_url') ? ' has-error' : '' }}">
      <label for="google_plus_url" class="  control-label">Google Plus Url</label>

      <input type="text" name="google_plus_url" class="form-control" value="{{old('google_plus_url') ?: $post->google_plus_url}}" id="google_plus_url" placeholder="Google plus url" autocomplete="off">
      @if ($errors->has('google_plus_url'))
      <span class="help-block">
        <strong>{{ $errors->first('google_plus_url') }}</strong>
      </span>
      @endif                       
    </div>
    
  </div>
</div>





</div>
</div>

<div class="row">
  <div class="col-sm-6">
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



  </div>
  <div class="col-sm-6">
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
              <span class="help-block">Image Dimention 100px X 100px or larger and Ratio 100/100 is better.</span>

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

  </div>

</div>





<div class="row">
  <div class="col-sm-6">
    <div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title">Update Sub Image of  About Page </h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group {{ $errors->has('about_sub_img') ? ' has-error' : '' }}">
            <label for="about_sub_img" class="col-sm-3 control-label">About Sub Image</label>
            <div class="col-sm-9">
              <input type="file" name="about_sub_img" class="" id="about_sub_img">
              <span class="help-block">Image Dimention 1920px X 600px.</span>

              @if ($errors->has('about_sub_img'))
              <span class="help-block">
                <strong>{{ $errors->first('about_sub_img') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          @if($post->about_sub_img)
          <div class="w3-display-container" style="height:110px;">
            <img class="img-responsive" src="{{asset('storage/media/image/'. $post->about_sub_img)}}" alt="">
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>



  </div>
  <div class="col-sm-6">
    <div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title">Update Sub Image of  Story Page </h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group {{ $errors->has('story_sub_img') ? ' has-error' : '' }}">
            <label for="story_sub_img" class="col-sm-3 control-label">Story Sub Image</label>
            <div class="col-sm-9">
              <input type="file" name="story_sub_img" class="" id="story_sub_img">
              <span class="help-block">Image Dimention 1920px X 600px.</span>

              @if ($errors->has('story_sub_img'))
              <span class="help-block">
                <strong>{{ $errors->first('story_sub_img') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          @if($post->story_sub_img)
          <div class="w3-display-container" style="height:110px;">
            <img class="img-responsive" src="{{asset('storage/media/image/'. $post->story_sub_img)}}" alt="">
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title">Update Sub Image of  Contact Page </h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group {{ $errors->has('contact_sub_img') ? ' has-error' : '' }}">
            <label for="contact_sub_img" class="col-sm-3 control-label">Contact Sub Image</label>
            <div class="col-sm-9">
              <input type="file" name="contact_sub_img" class="" id="contact_sub_img">
              <span class="help-block">Image Dimention 1920px X 600px.</span>

              @if ($errors->has('contact_sub_img'))
              <span class="help-block">
                <strong>{{ $errors->first('contact_sub_img') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          @if($post->contact_sub_img)
          <div class="w3-display-container" style="height:110px;">
            <img class="img-responsive" src="{{asset('storage/media/image/'. $post->contact_sub_img)}}" alt="">
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>



  </div>
  <div class="col-sm-6">
    <div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title">Update Sub Image of  Package Page </h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group {{ $errors->has('package_sub_img') ? ' has-error' : '' }}">
            <label for="package_sub_img" class="col-sm-3 control-label">Package Sub Image</label>
            <div class="col-sm-9">
              <input type="file" name="package_sub_img" class="" id="package_sub_img">
              <span class="help-block">Image Dimention 1920px X 600px.</span>

              @if ($errors->has('package_sub_img'))
              <span class="help-block">
                <strong>{{ $errors->first('package_sub_img') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          @if($post->package_sub_img)
          <div class="w3-display-container" style="height:110px;">
            <img class="img-responsive" src="{{asset('storage/media/image/'. $post->package_sub_img)}}" alt="">
          </div>
          @endif
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