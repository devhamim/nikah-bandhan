@extends('admin.master.dashboardmaster')
@push('css')

      <style type="text/css">
    .select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field:focus {
        outline: none !important;
        border: none !important;
      }
  </style>
@endpush

@section('content')<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Story <small>Edit</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Story</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

<section class="content">
    <!-- Info boxes -->
          <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin: 0 auto">

                @include('alerts.alerts')

                <div class="card card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->

                      <div class="card-body">

                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-edit"></i> Edit Story <span class="label label-default">{{ $story->title }}</span></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('admin.editStoryPost', $story)}}">
                {{csrf_field()}}
                  <div class="box-body">

                    @if ($story->image_name)

                    <div class="form-group">
                      <label for="title" class="col-sm-2 control-label">Old Image</label>

                      <div class="col-sm-4">

                      <div class="box box-widget">
                        <div class="box-body">
                          <img class="img-fluid" src="{{ asset('storage/stories/'. $story->image_name) }}" alt="{{ $story->title }}">
                        </div>
                      </div>

                      </div>
                    </div>


                    @endif


                    <div class="form-group{{ $errors->has('featureImage') ? ' has-error' : '' }}">
                      <label for="title" class="col-sm-2 control-label">New Image</label>

                      <div class="col-sm-10">

                    <input type="file" name="featureImage" class="form-control">
                    <span class="help-block">




                        @if ($errors->has('featureImage'))
                            <span class="help-block">
                                <strong>{{ $errors->first('featureImage') }}</strong>
                            </span>
                        @endif

                      </div>
                    </div>



                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                      <label for="title" class="col-sm-2 control-label">Title</label>

                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?: $story->title }}" id="title" placeholder="New Story Title" required >

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                      <label for="location" class="col-sm-2 control-label">Location</label>
                      <div class="col-sm-10">
                        <input type="text" name="location" class="form-control" value="{{ old('location') ?: $story->location }}" id="location" placeholder="Marriage Location">
                        @if ($errors->has('location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('marriage_date') ? ' has-error' : '' }}">
                      <label for="marriage_date" class="col-sm-2 control-label">Marriage Date</label>
                      <div class="col-sm-10">
                        <input type="date" name="marriage_date" class="form-control" value="{{ old('marriage_date') ?: $story->marriage_date }}" id="marriage_date" placeholder="Marriage Date">
                        @if ($errors->has('marriage_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('marriage_date') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('bride_username') ? ' has-error' : '' }}">
                      <label for="bride_username" class="col-sm-2 control-label">Bride Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="bride_username" class="form-control" value="{{ old('bride_username') ?: $story->bride_username }}" id="bride_username" placeholder="Bride (Female) Username">
                        @if ($errors->has('bride_username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bride_username') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('groom_username') ? ' has-error' : '' }}">
                      <label for="groom_username" class="col-sm-2 control-label">Groom Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="groom_username" class="form-control" value="{{ old('groom_username') ?: $story->groom_username }}" id="groom_username" placeholder="Groom (Male) Username">
                        @if ($errors->has('groom_username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('groom_username') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>




                    <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                      <label for="description" class="col-sm-2 control-label">Details</label>

                      <div class="col-sm-10">
                        <textarea class="details" id="content" name="details" placeholder="Write your content here" required style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('details') ?: $story->description }}</textarea>


                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">

                        <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>

                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">

                  </div>
                  <!-- /.box-footer -->
                </form>
            </div>
          </div>

              </div>


            </div>
          </div>
          <!-- /.row -->



        </section>
        <!-- /.content
@endsection
