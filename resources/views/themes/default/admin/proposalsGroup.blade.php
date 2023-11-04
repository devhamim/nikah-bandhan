@extends('admin.master.dashboardmaster')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users <small>{{ str_replace('_', ' ', $type) }}</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">{{ str_replace('_', ' ', $type) }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @foreach ($proposalsAll as $proposal)
                                <div class="card card-widget w3-animate-zoom pb-3">
                                    <div class="card-body" style="min-height: 100px;">

                                        <div class="row px-4">
                                            <div class="col-sm-12">
                                                <div class="card card-widget w3-border w3-border-purple  no-margin px-2">

                                                    <div class="box-header with-border text-center">
                                                        <h3 class="box-title">
                                                            Proposal from <span class="w3-tag w3-purple w3-round w3-large">
                                                                <a target="_blank" class="w3-text-white"
                                                                    href="{{route('user.profile', $proposal->user->id)}}"> {{ $proposal->user->name }}</a>
                                                            </span> to <span class="w3-tag w3-purple w3-round w3-large"> <a
                                                                    target="_blank" class="w3-text-white"
                                                                    href="{{route('user.profile', $proposal->userSecond->id)}}">
                                                                    {{ $proposal->userSecond->name }} </a> </span>
                                                        </h3>
                                                    </div>
                                                    <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-sm-3">

                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">

                                                                        <b>Name: </b>
                                                                        {{ $proposal->user->name }} <br>
                                                                        <b>Mobile: </b>
                                                                        {{ $proposal->user->mobile }} <br>
                                                                        <b> Email: </b>
                                                                        {{ $proposal->user->email }} <br>
                                                                        <b>Proposal Pending to me: </b>
                                                                        {{ $proposal->user->pendingProposalToMeCount() }}
                                                                        <br>
                                                                        <b>Proposal to me: </b>
                                                                        {{ $proposal->user->proposalToMeCount() }} <br>
                                                                        <b>Proposal sent by me: </b>
                                                                        {{ $proposal->user->proposalFromMeCount() }} <br>
                                                                        <b>Current Package: </b>
                                                                        {{ $proposal->user->package }} <br>
                                                                        <b>Expired at: </b>
                                                                        @if ($proposal->user->expired_at)
                                                                            {{ date('d-M-Y', strtotime($proposal->user->expired_at)) }}
                                                                            <br>
                                                                        @else
                                                                            0 <br>
                                                                        @endif
                                                                        <b>Duration (Days): </b>
                                                                        {{ $proposal->user->packageDuration() }}

                                                                        <br>

                                                                        {{-- @if (!$proposal->user->active)

                                                                            <br>

                                                                            <span
                                                                                class="w3-dark-gray   w3-padding w3-small w3-round mr-2">
                                                                                Deactivated
                                                                            </span>

                                                                        @endif --}}
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="col-sm-6 text-center">


                                                                <a target="_blank"
                                                                    href="{{route('user.profile', $proposal->user->id)}}">
                                                                    <img class="img-rounded img-bordered mb-2"
                                                                        title="{{ $proposal->user->username }}"
                                                                        width="80"
                                                                        src="{{ asset($proposal->user->latestCheckedPP()) }}"
                                                                        alt="{{ $proposal->user->username }}">
                                                                </a>

                                                                <i
                                                                    class="fa fa-angle-double-right  w3-large w3-text-purple"></i>
                                                                <i
                                                                    class="fa fa-angle-double-right  w3-large w3-text-purple"></i>
                                                                &nbsp; &nbsp;
                                                                <i
                                                                    class="fa fa-arrow-circle-right w3-animate-fading w3-large w3-text-purple"></i>
                                                                &nbsp; &nbsp;
                                                                <i
                                                                    class="fa fa-angle-double-right  w3-large w3-text-purple"></i>
                                                                <i
                                                                    class="fa fa-angle-double-right  w3-large w3-text-purple"></i>
                                                                <a target="_blank"
                                                                    href="{{route('user.profile', $proposal->userSecond->id)}}">
                                                                    <img class="img-rounded img-bordered mb-2"
                                                                        title="{{ $proposal->userSecond->username }}"
                                                                        width="80"
                                                                        src="{{ asset($proposal->userSecond->latestCheckedPP()) }}"
                                                                        alt="{{ $proposal->userSecond->username }}">
                                                                </a>


                                                            </div>
                                                            <div class="col-sm-3">


                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">

                                                                        <b>Name: </b>
                                                                        {{ $proposal->userSecond->name }} <br>
                                                                        <b>Mobile: </b>
                                                                        {{ $proposal->userSecond->mobile }} <br>
                                                                        <b> Email: </b>
                                                                        {{ $proposal->userSecond->email }} <br>
                                                                        <b>Proposal Pending to me: </b>
                                                                        {{ $proposal->userSecond->pendingProposalToMeCount() }}
                                                                        <br>
                                                                        <b>Proposal to me: </b>
                                                                        {{ $proposal->userSecond->proposalToMeCount() }}
                                                                        <br>
                                                                        <b>Proposal sent by me: </b>
                                                                        {{ $proposal->userSecond->proposalFromMeCount() }}
                                                                        <br>
                                                                        <b>Current Package: </b>
                                                                        {{ $proposal->userSecond->package }} <br>
                                                                        <b>Expired at: </b>
                                                                        @if ($proposal->userSecond->expired_at)
                                                                            {{ date('d-M-Y', strtotime($proposal->userSecond->expired_at)) }}
                                                                            <br>
                                                                        @else
                                                                            0 <br>
                                                                        @endif
                                                                        <b>Duration (Days): </b>
                                                                        {{ $proposal->userSecond->packageDuration() }}
                                                                        <br>
                                                                        {{-- @if (!$proposal->userSecond->active)

                                                                            <br>

                                                                            <span
                                                                                class="w3-dark-gray   w3-padding w3-small w3-round mr-2">
                                                                                Deactivated
                                                                            </span>

                                                                        @endif --}}

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="box-footer w3-light-gray">
                                                        <div class="card card-widget no-margin">
                                                            <div class="card-body">
                                                                <p>{{ $proposal->message }}</p>


                                                                <div class="row">
                                                                    <div class="col-sm-4"></div>
                                                                    <div class="col-sm-4">

                                                                        <div class="row">
                                                                            {{-- <div class="col-sm-6">

                                                                                @if ($proposal->accepted)
                                                                                    <a class="w3-btn btn-sm w3-white w3-border w3-border-blue w3-round"
                                                                                        href="javascript::void(0)">Accepted</a>
                                                                                @else
                                                                                    <a class="w3-btn btn-sm w3-white w3-border w3-border-red w3-round"
                                                                                        href="javascript::void(0)">Pending</a>
                                                                                @endif

                                                                            </div> --}}
                                                                            <div
                                                                                class="col-sm-8 mb-2  w3-border {{ $proposal->checked ? 'w3-border-green w3-green' : 'w3-border-red' }} w3-round">

                                                                                <div class="checkbox"
                                                                                    style="margin: 5px 0px;">
                                                                                    <label>
                                                                                        <input class="image-check"
                                                                                            data-url="{{ route('admin.proposalCheckedByAdmin', $proposal) }}"
                                                                                            type="checkbox"
                                                                                            name="proposal_checked"
                                                                                            {{ $proposal->checked ? 'checked' : '' }} />
                                                                                        Checked by Admin</label>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-4">


                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push('js')

<script>
    $(function(){
            $('.slim-media').slimScroll({
                height: '500px'
            });
          });


        $(document).ready(function() {

        $(document).on('keypress', '.user-search', function(e) {
          if(e.which == 13) {
              e.preventDefault();
          }
      });


       /////////////////////////////////////

       var delay = (function(){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
          })();

       $(document).on("keyup", ".user-search", function(e){
      e.preventDefault();
      var that = $( this );
      var q = e.target.value;
      var url = that.attr("data-url");
      var urls = url+'?q='+q;
      // var datalist = $("#products");
      // datalist.empty();
      // alert(urls);


      delay(function(){
      $.ajax({
        url: urls,
        type: 'GET',
        cache: false,
        dataType: 'json',
        success: function(response)
        {
          // console.log(response);
          $(".user-table-body").empty().append(response.page);
        },
        error: function(){}
      });
    }, 999);
    });


      });

  $(function(){
      $(document).on('change','.image-check',function(e){
      e.preventDefault();


      var that = $( this );
      var url = that.attr("data-url");

      $.ajax({
        url: url,
        type: 'GET',
        cache: false,
        dataType: 'json',
        success: function(response)
        {
        //   alert('ok');
        },
        error: function(){
        //   alert('error');
        }
      });
    });
  });

  $(function(){
      $(document).on('click','.sms-send-to-user',function(e){
      e.preventDefault();

      var that = $( this );
      var url = that.attr("data-url");

      $.ajax({
        url: url,
        type: 'GET',
        cache: false,
        dataType: 'json',
        success: function(response)
        {
          // alert('ok');
          if(response.success)
          {
            that.find('.sms-count').empty().append(response.sms_count);
          }
        },
        error: function(){
          // alert('error');
        }
      });
    });
  });


  </script>

@endpush
