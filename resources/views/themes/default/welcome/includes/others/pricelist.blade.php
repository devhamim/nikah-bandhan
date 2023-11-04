<!-- <br> -->
  
<style type="text/css">
  
.price_package_border{
    border-radius:10px !important;
    border: 1px solid #d52379 !important;
    transition: box-shadow .3s !important;
}
.contact_button{
    background-color: #d52379 !important;
    border: 1px solid #d52379 !important;
    border-radius: 5px !important;
    width: 54% !important;
    font-size: 14px !important;
    font-weight: bold !important;
    text-transform: capitalize;
}
.contact_button:hover{
  background-color: #f9f9f9!important;
  color: #d52379 !important;
}

.recommended_button{
  margin-top: -16px;border: 1px solid #d52379;background-color:#d52379 !important;color:#fff !important;border-radius: 5px;font-size: 12px !important;width: 44% !important;padding: 1px !important;margin-right: 27% !important;
}



 @media (min-width: 768px) and (max-width: 1024px) {
  .recommended_button {
    margin-top: -16px !important;
    border: 1px solid 
#d52379;
background-color:
#d52379 !important;
color:
#fff !important;
border-radius: 5px;
font-size: 12px !important;
width: 60% !important;
padding: 1px !important;
margin-right: 16% !important;
}
.contact_button{
    width: 67% !important;
 }
}
</style>


<div class="box box-widget">
  <div class="box-body p-5">

    <div class="text-center mb-5">
      <h2>Membership Package Lists</h2>
    </div>
        @if($mPackage1)

      <div class="row">
            @foreach($mPackage1 as $m)


     <div class="col-sm-3">
 
      @if ($m->id == 3)
          <!-- <b class="w3-tag w3-large w3-red w3-padding pull-right mr-4" style="margin-top: -28px;border: 1px solid #d52379;background-color:#d52379 !important;color:#fff !important;border-radius: 5px;font-size: 13px !important;width: 44%;">Recommended</b> -->
          {{-- <b class="w3-tag w3-large w3-red w3-padding pull-right  recommended_button" >Recommended</b> --}}
      @endif
      
      <!-- <div class="panel panel-default w3-hover-shadow price_package_border" style="border: 4px solid indigo;"> -->
        <div class="panel panel-default w3-hover-shadow w3-border w3-border-purple">
        <!-- <div class="panel-body w3-padding-large price_package_background" style="min-height: 120px;background: white;"> -->
          <div class="panel-body w3-padding-large  ">

          <div style="min-height: 120px;">

            
<h1 class="w3-xxlarge"><b>{{ $m->package_title }}</b></h1>
          {{-- <b class="w3-xxlarge">{{ $m->package_title }}</b> <br> --}}

 

          <br>&nbsp; 

          {{-- <br> --}}
          {{-- <b class="w3-large w3-text-purple"><del> Normal Price: 4000TK </del></b> <br> --}}
          <!-- <b class="w3-text-deep-orange w3-xlarge">{{ $m->package_currency }} {{ $m->package_amount }}</b> -->
          <b class=" w3-xlarge">{{ $m->package_currency }} {{ $m->package_amount }}</b>
          {{-- <br> --}}
          {{-- <b class="w3-text-deep-orange w3-large">FREE setup fee</b> --}}
          {{-- <br> --}}
          {{-- <b>On Sale - <span class="w3-yellow w3-padding-small"> Save 30% </span></b> --}}
         <!--  {{-- <br>  --}} -->
            

          <br>  


        </div>


          {{-- <a class="btn btn-block btn-success w3-btn w3-xlarge" href="http://202.191.120.37/whmcs/cart.php?a=add&amp;pid=5">Order Now</a> --}}

          <br>

          <ul class="w3-ul w3-large text-left">
 
            <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> Duration</b> {{ $m->package_duration }} Days</li>
            <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b> See&nbsp;Contact Details</li>
            <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b>Private Chating</li>
            <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b>Total {{ $m->proposal_send_total_limit }} Proposals</li>
            <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b>Send Per Day {{ $m->proposal_send_daily_limit }} Proposals</li>
            <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i>  </b>Contact View Limit {{ $m->contact_view_limit }} </li>
            <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i>  </b>24/7&nbsp;</b>Customer Support </li>
             
 
          </ul>
 


        </div>

        <!-- <div class="w3-light-gray text-center w-100 w3-padding"> -->
        <div class=" text-center w-100 w3-padding">
            <p>Looking for additional discount?</p>
           
            <!-- <a class="btn btn-xs btn-default w3-indigo w3-large w3-btn" href="">Contact Us</a> -->
            <a class="btn btn-xs btn-default w3-purple w3-btn " href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}">Contact Us</a>
          </div>

      </div>

      <br> <br> <br>
    </div>
            @endforeach
        </div>

        @endif

      </div>
    </div>