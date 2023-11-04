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
          <h1>Blog <small>All</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active">All</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="container">
<!-- Info boxes -->
<div class="row">
    <div class="col-md-12 ">
        @include('alerts.alerts')
        <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-th"></i> SMS Send to ID:{{ $user->id }}, {{ $user->email }}, {{ $user->username }}, {{ $user->mobile }}
                    @if($user->isOffline())
                    | <span class="w3-dark-gray w3-round w3-padding w3-large">Offline Profile</span>
                    @endif
                </h3>
                <div class="pull-right">

                </div>
                
            </div>
            <div class="box-body" style="background: #eee;">



                <div class="box box-widget" id="user-comment" style="min-height: 200px;">
    <div class="box-header with-border">
        <h3 class="box-title">Type and send new SMS </h3>
    </div>
    <div class="box-body">
        
        <div class="w3-border w3-border-purple w3-round">
                        <div class="w3-container w3-padding text-center">

<form class="form-inline" method="post" action="{{ route('admin.smsSendToUser', $user) }}">
    @csrf
    
  

  <div class="form-group">
    <label for="details">Message:</label>
    <textarea class="form-control" style="min-width: 500px;" name="details" id="details" cols="30" rows="4" placeholder="Add Message Details">Dear user, {{$_SERVER['SERVER_NAME']}} matching your partner with 100% guarantee. You can get any membership package and enjoy our features. Thank you.</textarea> &nbsp;
  </div>
   
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


                            {{-- <form  action="{{ route('admin.userCommentByAdminPost', $user) }}" method="post">
                                {{csrf_field()}}


                                <div class="w3-row">
  <div class="w3-col w3-right w3-container " style="width:75px">
    <button type="submit" class="w3-btn w3-purple w3-round w3-border w3-border-purple w3-left w3-hover-purple btn-sm"> Submit</button>
  </div>
  <div class="w3-rest w3-container ">
    <textarea name="comment" class="form-control w3-round w3-border w3-padding" id="comment" placeholder="Write New Comment"  rows="1" style="width: 100%;">{{ old('comment') }}</textarea>
  </div>
</div>
                            </form> --}}





                        </div>
                    </div>

    </div>
  
</div>


                

</div>
</div>

</div>
</div>
<!-- /.row -->
</section>



@endsection
