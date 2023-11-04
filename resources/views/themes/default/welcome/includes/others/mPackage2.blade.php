<div class="box box-widget">
  <div class="box-body" style="background: #eee;">
    

<h3>Membership Packages (for Outside Bangladesh) </h3>

@foreach($mPackage2->chunk(4) as $package4)
      <div class="row">
        @foreach($package4 as $package)
        <div class="col-sm-3">
          <a class="w3-text-dark-gray" href="javascript::void(0)">
            <div class="w3-card w3-container w3-round" style="padding-top: 15px;">
            <div class="box box-widget w3-hover-shadow">
              <div class="box-header with-border">
                <h3 class="box-title">{{ $package->package_title }}</h3>
              </div>
              <div class="box-body">
                <div class="panel panel-default" style="margin-bottom: 0px;">
                  <div class="panel-body" style="padding: 5px;">
                    {{ $package->package_description }} <hr style="margin: 3px;">
                    <div class="w3-large">
                      <b>Price: </b> {{ $package->package_amount }} {{ $package->package_currency }} <br>
                      <b>Duration: </b> {{ $package->package_duration }} Days
                      
                    </div>
                    
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      </div>
      @endforeach
  </div>
</div>
