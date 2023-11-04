<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Media All</h1>
      </div><!-- /.col -->
 
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<!-- Main content -->
<section class="content">



  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-12">


      <div class="card card-widget" style="background-color: #fff;">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-plus"></i> Add New Media</h3>



        </div>

        <div class="card-body" style="background-color: #fff;">

          <form class="form-inline" method="post" action="{{route('admin.mediaUploadPost')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-group {{ $errors->has('files') ? ' has-error' : '' }}">
        <label for="files">Upload One or Multiple Image:</label>
        <input type="file" name="files[]" value="{{old('files')}}" placeholder="File" class="form-control" id="files" style="padding-bottom: 32px;" multiple>
        @if ($errors->has('files'))
        <span class="help-block">
          <strong>{{ $errors->first('files') }}</strong>
        </span>
        @endif
      </div>

      
      <button type="submit" class="w3-btn w3-blue w3-round w3-border w3-border-white">Add Image</button>

    </form>

           
        </div>
      </div>
      <div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-th"></i> All Media</h3>
        </div>

        <div class="card-body">
          <div class="card card-widget mb-0" style="background-color: #fff;">
            <div class="card-body w3-gray ">





















@if($mediaAll->count())
@foreach($mediaAll->chunk(2) as $media2)
<div class="row">
  @foreach($media2 as $media)
    <div class="col-sm-6">
      <div class="card card-default" style="margin-bottom: 5px;">
          <div class="card-body">



<div class="media border ">
  <div class="w3-display-container">
  <img src="{{asset($media->file_url)}}" alt="John Doe" class="mr-1   rounded" style="width:100px;">

 
  <div class="w3-display-topright"><a onclick="return confirm('Do you really want to delete this media?');" style="margin-right: 4px;margin-top: 3px;" class="btn btn-default btn-xs" title="Delete" href="{{ route('admin.mediaDelete', $media) }}"><i class="fa fa-times"></i></a></div>


</div>
  <div class="media-body"   style=" word-wrap: break-word;word-break: break-all;">
    {{-- <h4> <small>{{url('/'.$media->file_url)}}</small></h4> --}}
    <p>
    Orig.Name: {{$media->file_original_name}} <br>
            Size: {{human_filesize($media->file_size)}}, 
            Width: {{$media->width}}px, 
            Height: {{$media->height}}px <br>

            <small> {{url('/'.$media->file_url)}}  </small> <br>

            <button class="copyboard btn btn-primary btn-xs" data-text="{{url('/'.$media->file_url)}}">Copy to Clipboard</button>
        </p>
  </div>
</div>



           
            
          </div>
        </div>
    </div>
  @endforeach
</div>
@endforeach

<div class="pull-right">
  {{$mediaAll->render()}}
</div>

@endif 








               

            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  <!-- /.row -->





</section>
