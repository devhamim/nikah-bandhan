<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Districts <small>All</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Districts</a></li>
            <li class="breadcrumb-item active">All</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="container">

    <div class="row">
        <div class="col-sm-12">

        	@include('alerts.alerts')


          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">All Divisions & Districts</h3>

              <div class="card-tools">

                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" href="#">Add New District</a>

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 50px;">SL</th>
                    <th style="width: 50px;">ID</th>
                    <th >Division</th>
                    <th style="width: 150px;">Action</th>
                  </tr>
                </thead>
              </table>

              </div>
            <!-- /.card-body -->

          </div>
          <!-- /.box -->

              @foreach($divs as $div)
              <div class="card card-widget">
                <div class="card-body">

                  <table class="table table-service">
                    <tbody>
                        <tr>
                          <th style="width: 50px;">SL</th>
                          <th style="width: 50px;">{{$div->id}}</th>
                          <th >{{$div->name}}</th>
                          <th style="width: 150px;"></th>
                        </tr>
                      </tbody>
                  </table>
                  @foreach($div->districts as $district)

                    <table class="table table-condensed table-cat">
                      @include('blogAdmin.divisions.ajax.districtTBody')
                    </table>

                  @endforeach
                </div>
              </div>


              @endforeach


        </div>
      </div>

	</section>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New District</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{route('admin.districtAddNewPost')}}">



                {{csrf_field()}}


                <div class="form-group {{ $errors->has('division') ? ' has-error' : '' }}">
                  <label for="division" class="col-sm-3 control-label">Division</label>
                  <div class="col-sm-9">
                    <select name="division" id="division" class="form-control" required>
                      @if(old('division'))
                      <option>{{old('division')}}</option>
                      @else
                      <option value="">Select Division</option>
                      @endif

                      @foreach($divs as $div)
                        <option>{{$div->name}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('division'))
                      <span class="help-block">
                          <strong>{{ $errors->first('division') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>




                <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
                  <label for="district" class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                    <input type="text" name="district" class="form-control" value="{{old('district')}}" id="district" placeholder="New District" autocomplete="off">
                    @if ($errors->has('district'))
                      <span class="help-block">
                          <strong>{{ $errors->first('district') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="reset" class="btn btn-default">Cancel</button>

                  <button type="submit" class="btn btn-primary pull-right">Create</button>

                  </div>
                </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
