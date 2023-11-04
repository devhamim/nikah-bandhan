<div class="row">
  <div class="col-sm-8">
    <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Ad Space</h3>
  </div>
    <div class="box-body">

      @include('alerts')

      <form class="form-horizontal" method="post" action="{{route('admin.updateAd',$ad)}}">
      
        {{csrf_field()}}

 

                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" value="{{old('title') ?: $ad->title}}" id="title" placeholder="Title of the ad space" autocomplete="off">
                    @if ($errors->has('title'))
                    <span class="help-block">
                     <strong>{{ $errors->first('title') }}</strong>
                   </span>
                   @endif
                 </div>                  
               </div>

               <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label for="description" class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea name="description" class="form-control" placeholder="Ad Image or Code or Text" id="description" cols="30" rows="10">{!! old('description') ?: $ad->description !!}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                     <strong>{{ $errors->first('description') }}</strong>
                   </span>
                   @endif
                 </div>                  
               </div>

               <button type="submit" class="btn btn-primary pull-right submit-btn">Update</button>
 
               
      </form>
    </div> 
    </div>
  </div>
  <div class="col-sm-4">
    

    <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Media Gallery</h3>

    <div class="box-tools pull-right">
                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
                <a href="{{route('admin.mediaAll')}}" class="w3-btn btn-sm w3-round w3-white w3-border w3-border-blue"> <i class="fa fa-image"></i>Upload Image</a>
              </div>
  </div>
  <div class="box-body slim-media">

  <div class="box box-widget">
    <div class="box-body" style="background-color: #ccc;">

      @include('blogAdmin.posts.includes.others.mediaAllForPost')
    
    </div>
  </div>

</div>
</div>

  </div>
</div>
