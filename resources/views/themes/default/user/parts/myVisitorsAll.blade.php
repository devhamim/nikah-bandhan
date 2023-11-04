<div class="main main-raiseds "  style="z-index: 400;margin-top: -20px;">
    <div class="profile-content ">
        <div class="container ">


<div class="row">
            <div class="col-sm-12">
              <div class="box box-widget" style="border-top: 2px solid purple;">
                <div class="box-header">
                    
                   @include('user.includes.timeline.timelineTopBtns')
                </div>
              </div>
            </div>
          </div>




    <div class="row">
        <div class="col-sm-12">
            

{{-- @include('user.includes.others.profileHead') --}}

<br> <br> 

<div class="row">
    <div class="col-sm-3">

 
    </div>
    <div class="col-sm-9">
        <div class="user-setting-container">
            

            <div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header 
    @auth
    {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}
    @else
    card-header-primary
    @endauth
    ">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#search-all" data-toggle="tab">All Visitors</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

        @include('alerts.alerts') 
            
        <div class="tab-content ">
            <div class="tab-pane active" id="search-all">

                <div class="box box-widget">
                <div class="box-body" style="background: #ddd; min-height: 400px;">
                    @foreach(Auth::user()->myVisitors()->chunk(3) as $users3)
                    <div class="row">
                        @foreach($users3 as $user)
                        <div class="col-sm-4">
                            
                            @include('user.includes.cards.userHoverCard')
                        </div>
                        @endforeach
                    </div>
                    @endforeach



                    
                </div>
                <div class="box-footer">
                    {{ Auth::user()->myVisitors()->links() }}
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
</div>
</div>
        </div>
    </div>
