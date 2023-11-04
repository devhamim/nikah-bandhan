<div class="w3-container hidden-xs" style="padding: 0;background-color: #0B3E75;">

  <div class="container">
    <div class="w3-bar" style="background-color: #0B3E75;min-height: 27px;">
    <a href="#" class="w3-bar-item w3-left w3-text-white"> </a>
    <a href="#" class="w3-bar-item w3-right w3-text-white"> </a>

    <a href="#" class="w3-bar-item w3-right w3-text-white"> </a>

  </div>
  </div>  
</div> --}}



  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-11 col-sm-offset-1">
            <div class="navbar-header">
          <a class="navbar-brand" href="{{ url('/') }}">
             {{env('app_name')}}
          </a>

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            {{-- <li class="active"><a href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
            <li><a target="_blank" href="{{asset('img/bd_ambulance_distance_map.pdf')}}">Distance Map</a></li>
            <li><a  href="{{route('welcome.emargencyCallForAmbulance')}}">Emergency Call for Ambulance</a></li>
            <li><a  href="{{route('welcome.paymentDetails')}}">Payment Details</a></li> --}}

          </ul>
 
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            

            @if(Auth::guest())
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                {{-- <li><a href="{{ route('register') }}"><i class="fa fa-sign-up"></i> Register</a></li> --}}
            @else

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @if(Auth::user()->isAdmin())
                <li>
                  <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin Dashboard</a>
                </li>
                @endif

                @if(Auth::user()->isDriver())
                <li>
                  <a href="{{route('driver.dashboard')}}"><i class="fa fa-dashboard"></i> Driver Dashboard</a>
                </li>
                @endif

                @if(Auth::user()->isCustomer())
                <li>
                  <a href="{{route('customer.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                @endif


                <li class="divider"></li>
                <li>
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>

          @endif



        </ul>
      </div>
      <!-- /.navbar-custom-menu -->

            
          </div>
        </div>
        


    </div>
    <!-- /.container-fluid -->
  </nav>
</header>

{{-- <div class="w3-container hidden-xs" style="padding: 0;max-height: 26px;background-color: #0166B3;">

  <div class="container">

      <div class="w3-bar" style="background-color: #0166B3;padding: 0;line-height: .8;min-height: 27px;">
    <a href="#" class="w3-bar-item w3-left w3-text-white">Call</a>
    <a href="#" class="w3-bar-item w3-right w3-text-white">Wishlist</a>

    <a href="#" class="w3-bar-item w3-right w3-text-white">Easy Reorder</a>
    
  </div>



  </div>
</div>