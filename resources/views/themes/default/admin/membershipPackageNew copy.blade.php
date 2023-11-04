
    @extends('admin.master.dashboardmaster')
    @section('content')
    <section class="content-header">
        <h1>
          Package
          <small>Add New</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Package</a></li>
          <li class="active">Add New</li>
        </ol>
      </section>



      <!-- Main content -->
      <section class="content">




  <!-- Info boxes -->
        <div class="row">
        <div class="col-md-12">

          <div class="box box-widget">
            <div class="box-header">
              <h3 class="box-title">
                Membership Package Add New
              </h3>
            </div>
          </div>



        @include('alerts.alerts')

      <div class="box box-widget">
        <div class="box-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <form class="form-horizontal" action="{{ route('admin.membershipPackageAddNewPost') }}" method="post">

            <div class="form-group">
              <label class="control-label col-sm-3" for="title">Package Title:</label>
              <div class="col-sm-9">
                <input type="text" name="title"  required class="form-control" value="{{ old('title') }}" id="title" placeholder="Package Title">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Package Description:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="description" value="{{ old('description') }}" required name="description" placeholder="Package Description">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Price/Amount:</label>
              <div class="col-sm-9">
                <input type="number" min="1" required max="10000" step="any" class="form-control" id="price" value="{{ old('price') }}" name="price" placeholder="Package Price/Amount">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Currency:</label>
              <div class="col-sm-9">
                <div class="radio">
                    <label><input type="radio" required value="BDT" name="currency">BDT</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" value="USD" name="currency">USD</label>
                  </div>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Duration / Days:</label>
              <div class="col-sm-9">
                <input type="number" min="1" required max="10000" step="1" class="form-control" id="duration" value="{{ old('duration') }}" name="duration" placeholder="Package Duration in Day">
              </div>
            </div>

            {{ csrf_field() }}

            <div class="form-group">

              <div class="col-sm-9 col-sm-offset-3">
                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
              </div>
            </div>





          </form>
            </div>
          </div>

        </div>
      </div>



        </div>
        </div>
        <!-- /.row -->

      </section>
      @endsection
