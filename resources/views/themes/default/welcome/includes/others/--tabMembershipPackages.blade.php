<div class="row">
<div class="col-sm-6">

<div class="box box-warning">
<div class="box-header with-border">
<h3 class="box-title">Membership for Bangladesh</h3>
</div>
  <div class="box-body" style="background: #eee;">

          @foreach ($mPackage1 as $package)

          <div class="box box-widget mb-2">
              <div class="box-body">

                  <!-- Media top -->
                  <div class="media no-margin">
                    <img src="{{ asset('storage/package/' .$package->image_name) }}" class="align-self-start mr-2 mb-2 rounded" style="width:120px">
                    <div class="media-body">
                      <h4 class="no-margin">{{ $package->package_title }}</h4>

                      <div class="clearfix">
                        <span class="float-left"> {{ $package->package_description }} </span>
                    </div>
                      

                      <hr class="no-margin"> 

                      <div class="clearfix">
                        <span class="float-left"> Price: <b>{{ $package->package_amount }} {{ $package->package_currency }}</b></span>
                    </div>
                    <div class="clearfix">
                        <span class="float-left"> Duration: <b>{{ $package->package_duration }} Days</b></span>
                    </div>

                    



                </div>
            </div>

            

            <div class="w3-small">
              
            <hr class="no-margin"> 

            <div class="clearfix">
                <span class="float-left"> See <b> Contact Details </b> of proposal connected people.  </span>
            </div>            

            <div class="clearfix">
                <span class="float-left"> Send & Receive <b>Unlimited Messages.</b>  </span>
            </div>

            <div class="clearfix">
                <span class="float-left"> Send upto <b>{{ $package->proposal_send_daily_limit }} Proposals</b>  per day.</span>
            </div>

            <div class="clearfix">
                <span class="float-left"> Send upto <b>{{ $package->proposal_send_total_limit }} Proposals</b>  in total.</span>
            </div>

            <div class="clearfix">
                <span class="float-left"> Receive <b>Unlimited Proposals.</b>  </span>
            </div>

            <div class="clearfix">
                <span class="float-left"> See extra <b> {{ $package->contact_view_limit }} Contact Details</b>.  </span>
            </div>

            <div class="clearfix">
                <span class="float-left"> <b>24/7 </b> customer support.  </span>
            </div>

          </div>


        </div>
    </div>

    @endforeach







</div>
</div>


</div>
<div class="col-sm-6">

<div class="box box-warning">
<div class="box-header with-border">
<h3 class="box-title">Membership for Outside Bangladesh</h3>
</div>
  <div class="box-body" style="background: #eee;">

          @foreach ($mPackage2 as $package)

          <div class="box box-widget mb-2">
              <div class="box-body">

                  <!-- Media top -->
                  <div class="media">
                    <img src="{{ asset('storage/package/' .$package->image_name) }}" class="align-self-start mr-2 mb-2 rounded" style="width:120px">
                    <div class="media-body">
                      <h4 class="no-margin">{{ $package->package_title }}</h4>

                      <div class="clearfix">
                        <span class="float-left"> {{ $package->package_description }} </span>
                    </div>
                      

                      <hr class="no-margin"> 

                      <div class="clearfix">
                        <span class="float-left"> Price: <b>{{ $package->package_amount }} {{ $package->package_currency }}</b></span>
                    </div>
                    <div class="clearfix">
                        <span class="float-left"> Duration: <b>{{ $package->package_duration }} Days</b></span>
                    </div>

                </div>
            </div>

            <div class="w3-small">
              
            <hr class="no-margin"> 

            <div class="clearfix">
                <span class="float-left"> See <b> Contact Details </b> of proposal connected people.  </span>
            </div>            

            <div class="clearfix">
                <span class="float-left"> Send & Receive <b>Unlimited Messages.</b>  </span>
            </div>
            
            <div class="clearfix">
                <span class="float-left"> Send upto <b>{{ $package->proposal_send_daily_limit }} Proposals</b>  per day.</span>
            </div>

            <div class="clearfix">
                <span class="float-left"> Send upto <b>{{ $package->proposal_send_total_limit }} Proposals</b>  in total.</span>
            </div>

            <div class="clearfix">
                <span class="float-left"> Receive <b>Unlimited Proposals.</b>  </span>
            </div>

            <div class="clearfix">
                <span class="float-left"> See extra <b> {{ $package->contact_view_limit }} Contact Details</b>.  </span>
            </div>

            


            <div class="clearfix">
                <span class="float-left"> <b>24/7 </b> customer support.  </span>
            </div>

          </div>


        </div>
    </div>

    @endforeach







</div>
</div>

</div>
</div>