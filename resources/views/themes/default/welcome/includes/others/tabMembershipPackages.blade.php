<div class="w3-row-padding">

@foreach ($mPackage1 as $package)

<div class="w3-col m3 w3-margin-bottom">
  <ul class="w3-ul w3-border w3-border-purple w3-center w3-hover-shadow">
    <li class="w3-purple w3-text-white w3-padding-32">
      <p class="w3-xlarge">
        
      {{ $package->package_title }}
      </p>
 

      <span class="w3-small">{{ $package->package_currency }}</span>
      <b class="w3-xlarge">{{ round($package->package_amount) }}</b>


    </li>
    <li class="p-1">Duration: <b>{{ $package->package_duration }} Days</b></li>
    <li class="p-1">See <b> Contact Details </b> </li>
    <li class="p-1"><b>Private Chating</b> </li>
    <li class="p-1"><b>{{ $package->proposal_send_daily_limit }} Proposals</b> / day</li>
    <li class="p-1"><b>{{ $package->proposal_send_total_limit }} Proposals</b>  in total</li>
     
    <li class="p-1"><b> {{ $package->contact_view_limit }} Contact View</b>.</li>
    <li class="p-1"><b>24/7 </b> support</li>

    <li class="p-1">
      
<a class="w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-purple mb-1 mr-1 w3-hover-purple" href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}">Contact Us</a>

    </li>
 
  </ul>
</div>

@endforeach
{{-- 
<div class="w3-col m3 w3-margin-bottom">
  <ul class="w3-ul w3-border w3-center w3-hover-shadow">
    <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
    <li class="w3-padding-16"><b>10GB</b> Storage</li>
    <li class="w3-padding-16"><b>10</b> Emails</li>
    <li class="w3-padding-16"><b>10</b> Domains</li>
    <li class="w3-padding-16"><b>Endless</b> Support</li>
    <li class="w3-padding-16">
      <h2 class="w3-wide">$ 10</h2>
      <span class="w3-opacity">per month</span>
    </li>
    <li class="w3-light-grey w3-padding-24">
      <button class="w3-button w3-green w3-padding-large">Sign Up</button>
    </li>
  </ul>
</div>

<div class="w3-col m3 w3-margin-bottom">
  
  <ul class="w3-ul w3-border w3-center w3-hover-shadow">
    <li class="w3-green w3-xlarge w3-padding-32">Pro</li>
    <li class="w3-padding-16"><b>25GB</b> Storage</li>
    <li class="w3-padding-16"><b>25</b> Emails</li>
    <li class="w3-padding-16"><b>25</b> Domains</li>
    <li class="w3-padding-16"><b>Endless</b> Support</li>
    <li class="w3-padding-16">
      <h2 class="w3-wide">$ 25</h2>
      <span class="w3-opacity">per month</span>
    </li>
    <li class="w3-light-grey w3-padding-24">
      <button class="w3-button w3-green w3-padding-large">Sign Up</button>
    </li>
  </ul>
</div>

<div class="w3-col m3 w3-margin-bottom">
  <ul class="w3-ul w3-border w3-center w3-hover-shadow">
    <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
    <li class="w3-padding-16"><b>50GB</b> Storage</li>
    <li class="w3-padding-16"><b>50</b> Emails</li>
    <li class="w3-padding-16"><b>50</b> Domains</li>
    <li class="w3-padding-16"><b>Endless</b> Support</li>
    <li class="w3-padding-16">
      <h2 class="w3-wide">$ 50</h2>
      <span class="w3-opacity">per month</span>
    </li>
    <li class="w3-light-grey w3-padding-24">
      <button class="w3-button w3-green w3-padding-large">Sign Up</button>
    </li>
  </ul>
</div>


<div class="w3-col m3 w3-margin-bottom">
  <ul class="w3-ul w3-border w3-center w3-hover-shadow">
    <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
    <li class="w3-padding-16"><b>50GB</b> Storage</li>
    <li class="w3-padding-16"><b>50</b> Emails</li>
    <li class="w3-padding-16"><b>50</b> Domains</li>
    <li class="w3-padding-16"><b>Endless</b> Support</li>
    <li class="w3-padding-16">
      <h2 class="w3-wide">$ 50</h2>
      <span class="w3-opacity">per month</span>
    </li>
    <li class="w3-light-grey w3-padding-24">
      <button class="w3-button w3-green w3-padding-large">Sign Up</button>
    </li>
  </ul>
</div> --}}

</div>

 