@extends('admin.master.dashboardmaster')
@section('content')
    {{-- <section class="content-header">
        <h1>
          Package
          <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Package</a></li>
          <li class="active">Edit</li>
        </ol>
      </section> --}}



      <!-- Main content -->
      <section class="content">




  <!-- Info boxes -->
        <div class="row">
        <div class="col-md-12">

          <div class="box box-widget">
            <div class="box-header">
              <h3 class="box-title">
                Membership Package Edit ({{ $package->package_title }})
              </h3>
            </div>
          </div>



        @include('alerts.alerts')

      <div class="box box-widget">
        <div class="box-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.membershipPackageUpdate',$package) }}" method="post">

            {{-- <div class="form-group">
              <label class="control-label col-sm-3" for="title">Package Title:</label>
              <div class="col-sm-9">
                <input type="text" name="title"  required class="form-control" value="{{ old('title') ?: $package->package_title }}" id="title" placeholder="Package Title">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Package Description:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="description" value="{{ old('description') ?: $package->package_description }}" required name="description" placeholder="Package Description">
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

            @if ($package->image_name)
            <div class="row">
              <div class="col-sm-4 col-sm-offset-3">
                <img class="" width="100" src="{{ asset('storage/package/'.$package->image_name) }}" alt="{{ env('APP_NAME_BIG' . ' ' . $package->image_original_name) }}">
                <br> <br>
              </div>
            </div>
            @endif


            <div class="form-group">
              <label class="control-label col-sm-3" for="image">Upload Image:</label>
              <div class="col-sm-9">
                <input type="file" name="image" class="form-control" id="image">
              </div>
            </div>





            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Price/Amount:</label>
              <div class="col-sm-9">
                <input type="number" min="1" required max="10000" step="any" class="form-control" id="price" value="{{ old('price') ?: $package->package_amount }}" name="price" placeholder="Package Price/Amount">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Currency:</label>
              <div class="col-sm-9">
                <div class="radio">
                    <label><input type="radio" required value="BDT" name="currency" {{ $package->package_currency == 'BDT' ? 'checked' : '' }}>BDT</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" value="USD" name="currency" {{ $package->package_currency == 'USD' ? 'checked' : '' }}>USD</label>
                  </div>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Duration / Days:</label>
              <div class="col-sm-9">
                <input type="number" min="1" required max="20000" step="1" class="form-control" id="duration" value="{{ old('duration') ?: $package->package_duration }}" name="duration" placeholder="Package Duration in Day">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Proposal Send Daily Limit:</label>
              <div class="col-sm-9">
                <input type="number" min="1" required max="1000" step="1" class="form-control" id="proposal_send_daily_limit" value="{{ old('proposal_send_daily_limit') ?: $package->proposal_send_daily_limit }}" name="proposal_send_daily_limit" placeholder="Proposal Send Daily Limit">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Proposal Send Total Limit:</label>
              <div class="col-sm-9">
                <input type="number" min="1" required max="1000" step="1" class="form-control" id="proposal_send_total_limit" value="{{ old('proposal_send_total_limit') ?: $package->proposal_send_total_limit }}" name="proposal_send_total_limit" placeholder="Proposal Send Total Limit">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="description">Contact View Limit:</label>
              <div class="col-sm-9">
                <input type="number" min="1" required max="1000" step="1" class="form-control" id="contact_view_limit" value="{{ old('contact_view_limit') ?: $package->contact_view_limit }}" name="contact_view_limit" placeholder="Contact View Limit">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="description">Tag 1(Optional)</label>
                <div class="col-sm-9">
                <input type="text" name="tag_1" value="{{ $package->tag_1}}"  class="form-control" placeholder="1st Tag">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="description">Tag 2(Optional)</label>
                <div class="col-sm-9">
                    <input type="text" name="tag_2" value="{{ $package->tag_2}}" class="form-control" placeholder="2nd Tag">
                </div>
              </div>
            <div class="form-group"> --}}
                {{-- <label class="control-label col-sm-3" for="description">Status</label>
                <div class="col-sm-9">
                 <select class="form-control" name="status">
                     @if($package->status == 1)
                     <option value="1" selected>Active</option>
                     <option value="0">Deactive</option>
                     @else
                     <option value="1">Active</option>
                     <option value="0" selected>Deactive</option>
                     @endif
                 </select>
                </div>
              </div> --}}
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Package Title:</label>
                  <div class="col-sm-9">
                    <input type="text" name="title"  required class="form-control" value="{{ old('title') ?: $package->package_title }}" id="title" placeholder="Package Title">
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
                      <textarea class="form-control" id="summernote" rows="5" name="description" >{{ old('description') ?: $package->package_description }}</textarea>
                    {{-- <input type="text" class="form-control" id="description" value="{{ old('description') }}" required name="description" placeholder="Package Description"> --}}
                  </div>
                </div>

                {{-- <div class="form-group">
                  <label class="control-label col-sm-3" for="image">Upload Image:</label>
                  <div class="col-sm-9">
                    <input type="file" name="image" class="form-control" id="image">
                  </div>
                </div>
                @if ($package->image_name)
                <div class="row">
                  <div class="col-sm-4 col-sm-offset-3">
                    <img class="" width="100" src="{{ asset('storage/package/'.$package->image_name) }}" alt="{{ env('APP_NAME_BIG' . ' ' . $package->image_original_name) }}">
                    <br> <br>
                  </div>
                </div>
                @endif --}}

                <div class="form-group">
                    <label class="control-label col-sm-3" for="description">Currency:</label>
                    <div class="col-sm-9">
                      <div class="radio">
                          <label><input type="radio" required value="BDT" name="currency" {{ $package->package_currency == 'BDT' ? 'checked' : '' }}>BDT</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" value="USD" name="currency" {{ $package->package_currency == 'USD' ? 'checked' : '' }}>USD</label>
                        </div>
                    </div>
                  </div>




                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Proposal Send Daily Limit:</label>
                  <div class="col-sm-9">
                    <input type="number"  required value="{{ old('proposal_send_daily_limit') ?: $package->proposal_send_daily_limit }}" step="1" class="form-control" id="proposal_send_daily_limit" value="" name="proposal_send_daily_limit" placeholder="Proposal Send Daily Limit">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Proposal Send Total Limit:</label>
                  <div class="col-sm-9">
                    <input type="number"  step="1" class="form-control" id="proposal_send_total_limit" value="{{ old('proposal_send_total_limit') ?: $package->proposal_send_total_limit }}" name="proposal_send_total_limit" placeholder="Proposal Send Total Limit">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Contact View Limit:</label>
                  <div class="col-sm-9">
                    <input type="number" min="1" required max="1000" step="1" class="form-control" id="contact_view_limit" value="{{ old('contact_view_limit') ?: $package->contact_view_limit }}" name="contact_view_limit" placeholder="Contact View Limit">
                  </div>
                </div>
                <div class="w3-border w-75 p-4">
                  <label class="control-label col-sm-3" for="description">Add Tag</label>
                  <br>
                  <a class="btn btn-success ml-2 mb-1" onclick="addRow()">Add</a>
                  <br>

                  @php
                  $tags=json_decode($package->package_tags);
                  @endphp
                @if($tags)
                  @foreach($tags as $tag)
                  <div class="col-sm-8 col-md-8 d-flex justify-content-between">
                    <input type="text" min="1" required max="1000" step="1" class="form-control mt-1" id="contact_view_limit" value="{{$tag}}" name="tag[]" placeholder="Tag ...">
                    <button class="btn btn-danger btn-sm mt-1 deletebtn">Delete</button>
                  </div>

                  @endforeach
                @endif
                  <div id="addfield">

                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Package attribute</label>
                  <div class="col-sm-9">
                    <input type="text" step="1" class="form-control" id="" value="{{ old('package_attr') ?: $package->package_attr }}" name="package_attr" placeholder="example: Top Seller">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Discounted Price</label>
                  <div class="col-sm-9">
                    <input type="number" step="1" class="form-control" id="" value="{{ old('discounted_amount') ?: $package->discounted_amount }}" name="discounted_amount" placeholder="discounted_price">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Price(orginal)</label>
                  <div class="col-sm-9">
                    <input type="number"  required  step="any" class="form-control" id="" value="{{ old('package_amount') ?: $package->package_amount }}" name="price" placeholder="orginal Price">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Duration / Days:</label>
                  <div class="col-sm-9">
                    <input type="number" min="1" required max="10000" step="1" class="form-control" id="duration" value="{{ old('duration') ?: $package->package_duration }}" name="duration" placeholer="Package Duration in Day">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Bonus Duration(day)</label>
                  <div class="col-sm-9">
                    <input type="number"    step="any" class="form-control" id="" value="{{ old('bonus_duration') ?: $package->bonus_duration }}" name="bonus_duration" placeholder="Bonous Duration">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="description">Status</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="status">
                        @if($package->status == 1)
                        <option value="1" selected>Active</option>
                        <option value="0">Deactive</option>
                        @else
                        <option value="1">Active</option>
                        <option value="0" selected>Deactive</option>
                        @endif
                    </select>
                  </div>
                </div>

                {{ csrf_field() }}
              </div>

            {{ csrf_field() }}

            <div class="form-group">

              <div class="col-sm-9 col-sm-offset-3">
                <button class="btn btn-primary btn-sm" type="submit">Update</button>
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
