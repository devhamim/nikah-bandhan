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
          <h1>Story <small>New</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Story</a></li>
            <li class="breadcrumb-item active">New</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>




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
                  <h3 class="box-title"><i class="fa fa-edit"></i> Add New Story</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('admin.newStoryPost')}}">
                {{csrf_field()}}
                  <div class="box-body">


                    <div class="form-group{{ $errors->has('featureImage') ? ' has-error' : '' }}">
                      <label for="title" class="col-sm-2 control-label">Image</label>

                      <div class="col-sm-10">

                    <input type="file" name="featureImage" class="form-control" required>
                    <span class="help-block">
                      {{-- <strong>Image Ratio Need: 800 / 400 </strong> --}}
                            </span>



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
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title" placeholder="New Story Title" required >

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
                        <input type="text" name="location" class="form-control" value="{{ old('location') }}" id="location" placeholder="Marriage Location">
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
                        <input type="date" name="marriage_date" class="form-control" value="{{ old('marriage_date') }}" id="marriage_date" placeholder="Marriage Date">
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
                        <input type="text" name="bride_username" class="form-control" value="{{ old('bride_username') }}" id="bride_username" placeholder="Bride (Female) Username">
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
                        <input type="text" name="groom_username" class="form-control" value="{{ old('groom_username') }}" id="groom_username" placeholder="Groom (Male) Username">
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
                        <textarea class="details" id="content" name="details" placeholder="Write your content here" required style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('details') }}</textarea>


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
          <!-- /.row -->



        </section>




  @endsection
  @push('js')
  <script src="{{asset('cp/bower_components/ckeditor/ckeditor.js')}}"></script>

  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('description');
    });

    $(document).ready(function () {
    $('.select2-tags').select2({
      minimumInputLength: 1,
      tags:true,
      tokenSeparators: [','],
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          // alert(data[0].s);
          var data = $.map(data, function (obj) {
            obj.id = obj.id || obj.title;
            return obj;
          });
          var data = $.map(data, function (obj) {
            obj.text = obj.text || obj.title;
            return obj;
          });
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
    });

    //////////////////




    $(document).on('click','#btn-feature',function(e){
        e.preventDefault();
        $('#my_feature_img').click();
      });
  });


  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.select2-district').select2({
        minimumInputLength: 0,
        ajax: {
          data: function (params) {
            return {
              q: params.term, // search term
              division: $('input[name=division]:checked').val(),
              page: params.page
            };
          },
          processResults: function (data, params) {
            params.page = params.page || 1;
            // alert(data[0].s);
            var data = $.map(data, function (obj) {
              obj.id = obj.id || obj.district;
              return obj;
            });
            var data = $.map(data, function (obj) {
              obj.text = obj.text || obj.district;
              return obj;
            });
            return {
              results: data,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          }
        },
      });


    $('.select2-thana').select2({
        minimumInputLength: 0,
        ajax: {
          data: function (params) {
            return {
              q: params.term, // search term
              district: $('.select2-district').val(),
              page: params.page
            };
          },
          processResults: function (data, params) {
            params.page = params.page || 1;
            // alert(data[0].s);
            var data = $.map(data, function (obj) {
              obj.id = obj.id || obj.thana;
              return obj;
            });
            var data = $.map(data, function (obj) {
              obj.text = obj.text || obj.thana;
              return obj;
            });
            return {
              results: data,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          }
        },
      });
    });
  </script>
  @endpush
