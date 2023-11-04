@extends('admin.master.dashboardmaster')
@push('css')

<link rel="stylesheet" href="{{ asset('cp/plugins/iCheck/flat/blue.css') }}">
<link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.css')}}">
  <script src="{{asset('assets/sweetalert2/dist/sweetalert2.min.js')}}"></script>

    <style type="text/css">
        .select2-dropdown .select2-search__field:focus,
        .select2-search--inline .select2-search__field:focus {
            outline: none !important;
            border: none !important;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home <small>Send Cv to Given Email</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Send Cv to Given Email</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"> Profile Info Select</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.selectCvUsers') }}"
                                    class="form-select-mails-user">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-sm">
                                             <small><label for="gender">Gender</label></small>
                                                <select name="gender" class="form-control select-parameter" id="gender">
                                                    <option value="">Gender</option>

                                                    <option>Male</option>
                                                    <option>Female</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group form-group-sm">
                                                <small><label for="religion">Religion</label></small>
                                                <select name="religion" class="form-control select-parameter" id="religion">
                                                    <option value="">Religion</option>
                                                    {{-- ID: 4   Religion --}}
                                                    @foreach ($userSettingFields[3]->values as $value)

                                                        <option>{{ $value->title }}</option>

                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group form-group-sm">
                                                <small><label for="min_age">Min Age</label></small>
                                                <select name="min_age" class="form-control select-parameter" id="min_age">
                                                    <option value="">Min Age</option>
                                                    @for ($i = 18; $i <= 60; $i++)
                                                        <option>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group form-group-sm">
                                                <small><label for="max_age">Max Age</label></small>
                                                <select name="max_age" class="form-control select-parameter" id="max_age">
                                                    <option value="">Max Age</option>
                                                    @for ($i = 18; $i <= 80; $i++)
                                                        <option>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                        </div>
                                    </div>






                                    <div class="form-group form-group-sm">
                                        <small><label for="district">Home District</label></small>
                                        <select name="district" class="form-control select-parameter" id="district">
                                            <option value="">Home District</option>
                                            {{-- ID: 27   district --}}
                                            @foreach ($districts as $value)

                                                <option>{{ $value->title }}</option>

                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group form-group-sm">
                                        <small><label for="profession">Profession</label></small>
                                        <select name="profession" class="form-control select-parameter" id="profession">
                                            <option value="">Profession</option>
                                            {{-- ID: 27   profession --}}
                                            @foreach ($userSettingFields[26]->values as $value)

                                                <option>{{ $value->title }}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <small><label for="education_level">Education Level</label></small>
                                        <select name="education_level" class="form-control select-parameter"
                                            id="education_level">
                                            <option value="">Education Level</option>
                                            {{-- ID: 26   Edu --}}
                                            @foreach ($userSettingFields[25]->values as $value)

                                                <option>{{ $value->title }}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group form-group-sm">
                                                <small><label for="marital_status">Marital Status</label></small>
                                                <select name="marital_status" class="form-control select-parameter"
                                                    id="marital_status">
                                                    <option value="">Marital Status</option>
                                                    {{-- ID: 11   marital_status --}}
                                                    @foreach ($userSettingFields[10]->values as $value)

                                                        <option>{{ $value->title }}</option>

                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group form-group-sm">
                                                <small><label for="user_type">User Type</label></small>
                                                <select name="user_type" class="form-control select-parameter"
                                                    id="user_type">
                                                    <option value="">Select User Type</option>
                                                    <option value="online">Online</option>
                                                    <option value="offline">Offline</option>
                                                </select>
                                            </div>


                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group form-group-sm">
                                                <small><label for="order_by">Ascending/Desc</label></small>
                                                <select name="order_by" class="form-control select-parameter" id="order_by">
                                                    <option value="desc">Descending</option>
                                                    <option value="asc">Ascending</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group form-group-sm">
                                                <small><label for="limit">User Limit</label></small>
                                                <select name="limit" class="form-control select-parameter" id="limit">

                                                    <option value="100">100</option>

                                                    @for ($n = 25; $n <= 500; $n = $n + 25)
                                                        @if ($n == 100)
                                                            @continue
                                                        @endif
                                                        <option value="{{ $n }}">{{ $n }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                        </div>
                                    </div>






                                    @csrf


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card card-default">
                    <div class="card-body">
                <form action="{{ route('admin.sendCvToGivenEmailPost') }}" method="post" class="form-send-cv-from-user-post">

                    <div class="box box-primary">
                      <div class="box-header with-border" style="padding-left:8px;">
          
                        
          
                        <h3 class="box-title">
                        <small>  Email: <input type="email" name="email" placeholder="Email Address" style="width: 250px;" required> (Maximum 20 profiles will be sent per mail)</small>
                        </h3> 
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        
                        <div class="table-responsive mailbox-messages">
                            
                          <table class="table table-hover table-striped">
          
                            <thead>
                              <tr>
                                <th>
                                  {{-- <div class="mailbox-controls"> --}}
                          <!-- Check all button -->
                          <button type="button" title="Select All" class="btn btn-default btn-xs checkbox-toggle "><i class="fas fa-square"></i>
                          </button>
                        {{-- </div> --}}
                                </th>
                                <th>User</th>                      
                                <th>details</th>
                              </tr>
                            </thead>
                            <tbody class="emails-tbody">
                                @include('admin.users.ajax.emails')
                            </tbody>
                            <tfoot>
                              <th>
                                <button type="submit" class="btn btn-primary btn-sm btn-send">Send CV</button>
                              </th>
                            </tfoot>
          
                            @csrf
                            
                          </table>
                          <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                      </div>
                      <!-- /.box-body -->
                      
                    </div>
                    <!-- /. box -->
                          </form>
                        </div>
                    </div>
            </div>
        </div>




    </section>



@endsection
@push('js')
{{-- <script type="text/javascript">
  alert('ok');
</script> --}}

<script src="{{ asset('cp/plugins/iCheck/icheck.min.js') }}"></script>

<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
  });



$(function(){

  $(document).on('change', '.select-parameter', function(e){
      // e.preventDefault();

      $(".form-select-mails-user").submit();
      // alert('ok');

    });

  $(document).on('submit','.form-select-mails-user',function(s){

      s.preventDefault();
      var form = $(this),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );

      


      $.ajax({
        url: url,
        type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
      }).done(function(response){

        if(response.success == true)
        {
          $(".emails-tbody").empty().append(response.page);

          //Enable iCheck plugin for checkboxes
          //iCheck for checkbox and radio inputs
          $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
          });

          
        }
        else
        {
                    
        }

      }).fail(function(){
        alert('error');
      });
    });

  $(document).on('submit','.form-send-cv-from-user-post',function(s){

      s.preventDefault();

      $(".btn-send").attr('type', 'button');
    

      var form = $(this),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );
    //   alert (url);
      // console.log(alldata);

      
      $.ajax({
        url: url,
        type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
      }).done(function(response){

        if(response.success == true)
        {
          swal({
            text: "CV successfully sent",
            title: "Success!",
            timer: 8000,
            type: "success",
            showConfirmButton: true,
            confirmButtonText: "Close",
            confirmButtonColor: "green"
            });

          $(".emails-tbody").empty();
          $(".btn-send").attr('type', 'submit');
          // location.reload();
        }
        else
        {
                    
        }

      }).fail(function(){
        alert('error');
      });
    });
});


</script>
@endpush

