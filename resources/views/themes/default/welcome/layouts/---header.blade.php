{{-- <div class="w3-container hidden-xs" style="padding: 0;background-color: #0B3E75;">

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
      <div class="container-fluid">
 
            <div class="navbar-header">
          <a class="navbar-brand" href="{{ url('/') }}">
             <img src="{{asset('img/logo_bn.jpg')}}" alt="Dhaka Metro News" style="margin-top: -15px;width: 100px;">
          </a>

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

          <form class="navbar-form navbar-left" >
              <div class="input-group" style="width: 350px;">
              <input type="text" name="q" value="{{$q or ''}}" class="form-control search-user-header" placeholder="Search..." style="border-top-left-radius: 4px;border-bottom-left-radius: 4px;">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn bg-red"><i class="fa fa-search"></i></button>
              </span>
            </div>
    </form>

          <ul class="nav navbar-nav">
            <li><a href="javascript::void(0)">English Version <span class="sr-only">(current)</span></a></li>
            {{-- <li><a target="_blank" href="{{asset('img/bd_ambulance_distance_map.pdf')}}">Distance Map</a></li> --}}
            {{-- <li><a  href="{{route('welcome.emargencyCallForAmbulance')}}">Emergency Call for Ambulance</a></li> --}}
            {{-- <li><a  href="{{route('welcome.paymentDetails')}}">Payment Details</a></li> --}}

          </ul>

          

    {{-- <form action="" method="get" class="header-form">
            <div class="input-group" style="width: 300px;">
              <input type="text" name="q" value="{{$q or ''}}" class="form-control search-user-header" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn bg-green"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> --}}
 
        </div>
        <!-- /.navbar-collapse -->


        <!-- search form -->
          {{-- <form action="" method="get" class="header-form">
            <div class="input-group" style="width: 250px;">
              <input type="text" name="q" value="{{$q or ''}}" class="form-control search-user-header" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn bg-green"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> --}}
          <!-- /.search form -->


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
</div> --}}