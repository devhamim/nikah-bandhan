    <section class="content-header">
      <h1>
        Advertisement Spaces
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-plus"></i> Advertisement Spaces</a></li>
        <li class="active">All</li>
      </ol>
    </section>

    <section class="content">

      <div class="row">
        <div class="col-sm-8">
          
          <div class="box box-widget">
            <div class="box-header">
              <h3 class="box-title">Ad Spaces All</h3>
            </div>
            <div class="box-body" style="background-color: #ccc;min-height: 500px;">
              @include('alerts')

                @foreach($ads as $ad)

                <div class="box box-widget">
                  <div class="box-header with-border">
                    <h3 class="box-title">
                      <b>ID: {{$ad->id}}</b> &nbsp; <span>{{$ad->title}} </span>
                    </h3>
                    <div class="box-tools pull-right">
                       <a class="btn btn-xs btn-primary" href="{{route('admin.editAd',$ad)}}">edit</a> &nbsp; 
                       {{-- <a class="btn btn-xs btn-warning " href="#">Delete</a> --}}
                    </div>
                  </div>
                  <div class="box-body">

                    {!! $ad->description !!}
                    
                  </div>
                </div>

                @endforeach
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

    </section>


