
    @extends('admin.master.dashboardmaster')
    @section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Package <small>Add New</small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Package</a></li>
              <li class="breadcrumb-item active">Add New</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Membership Package Add New</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('alerts.alerts')
              <form class="form-horizontal" action="{{ route('admin.membershipPackageAddNewPost') }}" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Package Title:</label>
                    <div class="col-sm-9">
                      <input type="text" name="title"  required class="form-control" value="{{ old('title') }}" id="title" placeholder="Package Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="package_type">Package Type:</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="package_type"id="package_type">

                        @if($package->package_type)
                        <option selected>{{ old('package_type') ?: $package->package_type }}</option>
                        @endif

                        <option>Bangladesh</option>
                        <option>Outside Bangladesh</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description"  >Package Description:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="summernote" rows="5" name="description" ></textarea>
                      {{-- <input type="text" class="form-control" id="description" value="{{ old('description') }}" required name="description" placeholder="Package Description"> --}}
                    </div>
                  </div>

                  {{-- <div class="form-group">
                    <label class="control-label col-sm-3" for="image">Upload Image:</label>
                    <div class="col-sm-9">
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                  </div> --}}

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
                    <label class="control-label col-sm-3" for="description">Proposal Send Daily Limit:</label>
                    <div class="col-sm-9">
                      <input type="number" min="1" required  step="1" class="form-control" id="proposal_send_daily_limit" value="" name="proposal_send_daily_limit" placeholder="Proposal Send Daily Limit">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Proposal Send Total Limit:</label>
                    <div class="col-sm-9">
                      <input type="number" min="1" required step="1" class="form-control" id="proposal_send_total_limit" value="" name="proposal_send_total_limit" placeholder="Proposal Send Total Limit">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Contact View Limit:</label>
                    <div class="col-sm-9">
                      <input type="number" min="1" required  step="1" class="form-control" id="contact_view_limit" value="" name="contact_view_limit" placeholder="Contact View Limit">
                    </div>
                  </div>
                  <div class="w3-border w-75 p-4">
                    <label class="control-label col-sm-3" for="description">Add Tag</label>
                    <br>
                    <a class="btn btn-success ml-2 mb-1" onclick="addRow()">Add</a>
                    <br>
                    <div class="col-sm-8 col-md-8 d-flex justify-content-between">
                      <input type="text" min="1" required max="1000" step="1" class="form-control mt-1" id="contact_view_limit" value="" name="tag[]" placeholder="Tag ...">
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </div>
                    <div id="addfield">

                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Package attribute</label>
                    <div class="col-sm-9">
                      <input type="text" step="1" class="form-control" id="" value="" name="package_attr" placeholder="example: Top Seller">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Discounted Price</label>
                    <div class="col-sm-9">
                      <input type="number" step="1" class="form-control" id="" value="" name="discounted_amount" placeholder="discounted_price">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Price(orginal)</label>
                    <div class="col-sm-9">
                      <input type="number"  required  step="any" class="form-control" id="" value="{{ old('price') }}" name="price" placeholder="orginal Price">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Duration / Days:</label>
                    <div class="col-sm-9">
                      <input type="number" min="1" required max="10000" step="1" class="form-control" id="duration" value="{{ old('duration') }}" name="duration" placeholder="Package Duration in Day">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Bonus Duration(day)</label>
                    <div class="col-sm-9">
                      <input type="number"    step="any" class="form-control" id="" value="{{ old('price') }}" name="bonus_duration" placeholder="Bonous Duration">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Status</label>
                    <div class="col-sm-9">
                     <select class="form-control" name="status">
                         <option value="1">Active</option>
                         <option value="0">Deactive</option>
                     </select>
                    </div>
                  </div>

                  {{ csrf_field() }}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
      @endsection
      @push('js')
      <script>
          $data=` <div class="col-sm-8 col-md-8 d-flex justify-content-between">
                      <input type="text" min="1" required max="1000" step="1" class="form-control mt-1" id="contact_view_limit" value="" name="tag[]" placeholder="Tag ...">
                      <button class="btn btn-danger deletebtn btn-sm mt-1">Delete</button>
                    </div>`;
          function addRow(){

              $("#addfield").append($data);
          }

          function removeRow(){


          }
          $(document).on('click','.deletebtn',function(e){
              e.preventDefault();
              $(this).closest('div').remove();
          })
      </script>

      @endpush
