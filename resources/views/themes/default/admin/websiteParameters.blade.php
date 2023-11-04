@extends('admin.master.dashboardmaster')
@push('css')
<link rel="stylesheet" type="text/css"
  href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css') }}">
<link rel="stylesheet" type="text/css"
  href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css') }}">

@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Website Parameter</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Website Parameter</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" action="{{ route('admin.websiteParameterUpdate') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="  control-label">Title in Head Tag</label>

                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title') ?: $post->title }}" id="title"
                                    placeholder="Title of HTML Head Part <title>Title Here</title>" autocomplete="off">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('h1') ? ' has-error' : '' }}">
                                <label for="h1" class="  control-label">h1</label>

                                <input type="text" name="h1" class="form-control"
                                    value="{{ old('h1') ?: $post->h1 }}" id="h1" placeholder="Main Heading (h1)"
                                    autocomplete="off">
                                @if ($errors->has('h1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('h1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- <div class="form-group {{ $errors->has('short_title') ? ' has-error' : '' }}">
            <label for="short_title" class="  control-label">Short Title</label>

            <input type="text" name="short_title" class="form-control" value="{{old('short_title') ?: $post->short_title}}" id="short_title" placeholder="Short Title for Admin Left Sidebar" autocomplete="off">
            @if ($errors->has('short_title'))
            <span class="help-block">
              <strong>{{ $errors->first('short_title') }}</strong>
            </span>
            @endif

          </div> --}}



                            {{-- <div class="form-group {{ $errors->has('slogan') ? ' has-error' : '' }}">
            <label for="slogan" class="  control-label">Slogan</label>

            <input type="text" name="slogan" class="form-control" value="{{old('slogan') ?: $post->slogan}}" id="slogan" placeholder="Main Heading (slogan)" autocomplete="off">
            @if ($errors->has('slogan'))
            <span class="help-block">
              <strong>{{ $errors->first('slogan') }}</strong>
            </span>
            @endif

          </div> --}}


                            <div class="form-group {{ $errors->has('google_analytics_code') ? ' has-error' : '' }}">
                                <label for="google_analytics_code" class="control-label"> Google Analytics (Tracking) Code
                                </label>

                                <textarea name="google_analytics_code" class="form-control" rows="5" id="google_analytics_code"
                                    placeholder="Google Analytics Code (Tracking Code)">{!! old('google_analytics_code') ?: $post->google_analytics_code !!}</textarea>

                                @if ($errors->has('google_analytics_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google_analytics_code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('facebook_pixel_code') ? ' has-error' : '' }}">
                                <label for="facebook_pixel_code" class="control-label"> Facebook (Pixel) Code </label>

                                <textarea name="facebook_pixel_code" class="form-control" rows="9" id="facebook_pixel_code"
                                    placeholder="Facebook Pixel Code (Tracking Code)">{!! old('facebook_pixel_code') ?: $post->facebook_pixel_code !!}</textarea>

                                @if ($errors->has('facebook_pixel_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_pixel_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!---Home Page Part--->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Home Page</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="control-label">Home Page - 1st part content</label>

                                <textarea name="home_1st_part_content" cols="30" rows="10" class="form-control summernote" id="summernote"> {!! $post->home_1st_part_content !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label">Home Page - 1st part Image</label>
                                <input type="file" class="form-control" name="home_1st_part_image" >
                            </div>
                            @if($post->home_1st_part_image)
                            <img src="{{ asset('storage/homePage/'.$post->home_1st_part_image) }}" alt="home_1st_part_image" height="100">
                            @endif
                            <hr>
                            <div class="form-group">
                                <label for="title" class="control-label">Home Page - 2nd part content</label>

                                <textarea name="home_2nd_part_content" cols="30" rows="10" class="form-control summernote" id="summernote"> {!! $post->home_2nd_part_content !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label">Home Page - 2nd part Image</label>
                                <input type="file" name="home_2nd_part_image" class="form-control">
                            </div>

                            @if($post->home_2nd_part_image)
                            <img src="{{ asset('storage/homePage/'.$post->home_2nd_part_image) }}" alt="home_2nd_part_image" height="100">
                            @endif


                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!--Home Page Part--->





                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Favicon</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group {{ $errors->has('favicon') ? ' has-error' : '' }}">
                                        <label for="favicon" class="col-sm-3 control-label">favicon</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="favicon" class="" id="favicon">
                                            <span class="help-block">Image Dimention 16px X 16px and Ratio 16/16 is
                                                better.</span>

                                            @if ($errors->has('favicon'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('favicon') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    @if ($post->favicon)
                                        <div class="w3-display-container" style="height:10px;">
                                            <img class="img-fluid" src="{{ asset('storage/favicon/' . $post->favicon) }}"
                                                alt="">


                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">SEO Part</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('meta_author') ? ' has-error' : '' }}">
                                <label for="meta_author" class="  control-label">Meta Author for Website</label>

                                <input type="text" name="meta_author" class="form-control"
                                    value="{{ old('meta_author') ?: $post->meta_author }}" id="meta_author"
                                    placeholder="Meta Author for SEO of website" autocomplete="off">
                                @if ($errors->has('meta_author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meta_author') }}</strong>
                                    </span>
                                @endif

                            </div>



                            <div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                                <label for="meta_description" class="control-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4" id="meta_description"
                                    placeholder="Meta Description for SEO of Website">{{ old('meta_description') ?: $post->meta_description }}</textarea>
                                @if ($errors->has('meta_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meta_description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('meta_keyword') ? ' has-error' : '' }}">
                                <label for="meta_keyword" class="control-label">Meta Keyword</label>


                                <textarea name="meta_keyword" class="form-control" rows="4" id="meta_keyword"
                                    placeholder="Meta Keyword for SEO of Website">{{ old('meta_keyword') ?: $post->meta_keyword }}</textarea>
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

                            <div class="form-group {{ $errors->has('fb_page_link') ? ' has-error' : '' }}">
                                <label for="fb_url" class="  control-label">Facebook Page Url</label>

                                <input type="text" name="fb_url" class="form-control"
                                    value="{{ old('fb_url') ?: $post->fb_page_link }}" id="fb_url"
                                    placeholder="https://facebook.com/taslimamediabd" autocomplete="off">
                                @if ($errors->has('fb_page_link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fb_page_link') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('linkedin_url') ? ' has-error' : '' }}">
                                <label for="linkedin_url" class="  control-label">LinkedIn Url</label>

                                <input type="text" name="linkedin_url" class="form-control"
                                    value="{{ old('linkedin_url') ?: $post->linkedin_url }}" id="linkedin_url"
                                    placeholder="LinkedIn url" autocomplete="off">
                                @if ($errors->has('linkedin_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linkedin_url') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('twitter_url') ? ' has-error' : '' }}">
                                <label for="twitter_url" class="  control-label">Twitter Url</label>

                                <input type="text" name="twitter_url" class="form-control"
                                    value="{{ old('twitter_url') ?: $post->twitter_url }}" id="twitter_url"
                                    placeholder="Twitter url" autocomplete="off">
                                @if ($errors->has('twitter_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter_url') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('instagram_url') ? ' has-error' : '' }}">
                <label for="instagram_url" class="  control-label">Instagram Url</label>

                <input type="text" name="instagram_url" class="form-control" value="{{ old('instagram_url') ?: $post->instagram_url }}" id="instagram_url" placeholder="Pinterest url" autocomplete="off">
                @if ($errors->has('instagram_url'))
    <span class="help-block">
                  <strong>{{ $errors->first('instagram_url') }}</strong>
                </span>
    @endif
              </div>

                            <div class="form-group {{ $errors->has('pinterest_url') ? ' has-error' : '' }}">
                <label for="pinterest_url" class="  control-label">Pinterest Url</label>

                <input type="text" name="pinterest_url" class="form-control" value="{{ old('pinterest_url') ?: $post->pinterest_url }}" id="pinterest_url" placeholder="Pinterest url" autocomplete="off">
                @if ($errors->has('pinterest_url'))
    <span class="help-block">
                  <strong>{{ $errors->first('pinterest_url') }}</strong>
                </span>
    @endif
              </div>

                            <div class="form-group {{ $errors->has('youtube_url') ? ' has-error' : '' }}">
                                <label for="youtube_url" class="  control-label">Youtube Url</label>

                                <input type="text" name="youtube_url" class="form-control"
                                    value="{{ old('youtube_url') ?: $post->youtube_url }}" id="youtube_url"
                                    placeholder="Youtube url" autocomplete="off">
                                @if ($errors->has('youtube_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube_url') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- <div class="form-group {{ $errors->has('google_plus_url') ? ' has-error' : '' }}">
                <label for="google_plus_url" class="  control-label">Google Plus Url</label>

                <input type="text" name="google_plus_url" class="form-control" value="{{ old('google_plus_url') ?: $post->google_plus_url }}" id="google_plus_url" placeholder="Google plus url" autocomplete="off">
                @if ($errors->has('google_plus_url'))
    <span class="help-block">
                  <strong>{{ $errors->first('google_plus_url') }}</strong>
                </span>
    @endif
              </div> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-info testheader">
                        <div class="card-header">
                            <h3 class="card-title">Update Logo</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                        <label for="logo" class="col-sm-3 control-label">Logo</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="logo" class="" id="logo">
                                            <span class="help-block">Image Dimention 100px X 100px or larger and Ratio
                                                100/100 is better.</span>

                                            @if ($errors->has('logo'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('logo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 pt-3">
                                    @if ($post->logo)
                                        <div class="w3-display-container" style="height:10px;">
                                            <img class="img-fluid" src="{{ asset('storage/logo/' . $post->logo) }}"
                                                alt="">


                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <!--package-->
                    <div class="card card-info" id="saifjkk">
                        <div class="card-header">
                            <h3 class="card-title">Package Sogon</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                        <label for="logo" class="col-sm-3 control-label">Package Slogon</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="package_slogan" class="form-control"
                                                value="{{ $post->package_slogan }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a onclick="printDiv('saifjkk')" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
@push("js")
<script type="text/javascript"
  src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js')}}"></script>
<script type="text/javascript"
  src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js')}}"></script>
<script type="text/javascript"
  src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js')}}"></script>

  <script>
    $(function () {
      // Summernote
      $('.summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })

  </script>

<script>
function printDiv(divName)
{ var printContents = document.getElementById(divName).innerHTML; var originalContents = document.body.innerHTML; document.body.innerHTML = printContents; window.print();
// document.body.innerHTML = originalContents;
};
</script>



@endpush
