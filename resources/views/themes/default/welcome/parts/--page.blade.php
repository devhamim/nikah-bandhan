  <div class="main main-raiseds">
    <div class="profile-content ">
        <div class="container ">
    <div class="row">
        <div class="col-sm-12">

              <br>  

<br>


    @if (!$page->title_hide)
        <h1>{{ $page->page_title }}</h1>
    @endif


    @if($page->route_name == 'membership_package')
    <a class="btn btn-warning" href="{{route('user.payNow')}}">Pay Now &nbsp; <i class="fa fa-credit-card"></i></a> <br> <br>
    @include('welcome.includes.others.mPackage1')
    <br>
    @include('welcome.includes.others.mPackage2')
    <a class="btn btn-warning" href="{{route('user.payNow')}}">Pay Now &nbsp; <i class="fa fa-credit-card"></i></a>
    @endif

    <div class="page-content" style="min-height: 500px;">
        {!! $page->content !!}
    </div>
            

 
 

</div>
</div>
</div>
        </div>
    </div>
