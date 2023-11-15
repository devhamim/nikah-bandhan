
@push('css')
<link rel="stylesheet" href="{{asset('alt3/dist/css/adminlte.min.css')}}">

<style>
    .pricingTable{
    background-color: #fff;
    font-family: 'Poppins', sans-serif;
    text-align: center;
    margin: 0 10px;
    box-shadow: 0 0 10px -5px rgba(0,0,0,0.7);
    border-radius: 30px;
}
.pricingTable .pricingTable-header{
    color: #fff;
    background: linear-gradient(to bottom,#f25e74 15px, #EE0024 15px);
    padding: 20px 10px 10px;
    margin: 0 0 5px;
    border-radius: 30px 30px 0 0;
    position: relative;
    z-index: 1;
}
.pricingTable .title{
    font-size: 30px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 0 0 5px;
}
.pricingTable .price-value{
    background-color: #f25e74;
    font-size: 40px;
    font-weight: 600;
    line-height: 102px;
    height: 110px;
    width: 110px;
    margin: 0 auto;
    border: 4px solid #EE0024;
    border-radius: 50%;
    box-shadow: 0 0 10px -5px rgba(0,0,0,0.6);
}
.pricingTable .price-value:after{
    content: '';
    background-color: #f25e74;
    height: 85px;
    box-shadow: 0 5px 10px -5px rgba(0,0,0,0.5);
    position: absolute;
    left: -10px;
    right: -10px;
    bottom: 20px;
    z-index: -1;
}
.pricingTable .price-value span{
    font-weight: 300;
    display: inline-block;
}
.pricingTable .content-list{
    padding: 25px 0 30px;
    margin: 0;
    list-style: none;
    display: inline-block;
}
.pricingTable .content-list li{
    color: #333;
    font-size: 16px;
    text-transform: capitalize;
    text-align: left;
    padding: 0 0 2px 25px;
    margin: 0 0 20px;
    border-bottom: 2px solid #EE0024;
    position: relative;
}
.pricingTable .content-list li.disable{ color: #d1d1d1; }
.pricingTable .content-list li:last-child{ margin-bottom: 0; }
.pricingTable .content-list li:before{
    content: "\f00c";
    color: #EE0024;
    font-family: "Font Awesome 5 Free";
    font-size: 17px;
    font-weight: 900;
    position: absolute;
    top: 0;
    left: 0;
}
.pricingTable .content-list li.disable:before{
    content: "\f00d";
    color: #d1d1d1;
}
.pricingTable .pricingTable-signup{
    background: linear-gradient(to top,#d60625 15px, #EE0024 15px);
    padding: 10px 10px 25px;
    border-radius: 0 0 30px 30px;
}
.pricingTable .pricingTable-signup a{
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    display: inline-block;
    transition: all 0.3s ease 0s;
}
.pricingTable .pricingTable-signup a:hover{
    font-style: italic;
    letter-spacing: 2px;
    text-shadow: 0 0 8px rgba(0, 0, 0, 0.8);
}
.pricingTable.blue .pricingTable-header{
    background: linear-gradient(to bottom,#353e7f 15px, #060F5E 15px);
}
.pricingTable.blue .price-value{
    background-color: #353e7f;
    border-color: #060F5E;
}
.pricingTable.blue .price-value:after{ background-color: #353e7f; }
.pricingTable.blue .content-list li{ border-bottom-color: #060F5E; }
.pricingTable.blue .content-list li:before{ color: #060F5E; }
.pricingTable.blue .content-list li.disable:before{ color: #d1d1d1; }
.pricingTable.blue .pricingTable-signup{
    background: linear-gradient(to top,#14207f 15px, #060F5E 15px);
}
.pricingTable.green .pricingTable-header{
    background: linear-gradient(to bottom,#25b26e 15px, #E31190 15px);
}
.pricingTable.green .price-value{
    background-color: #25b26e;
    border-color: #E31190;
}
.pricingTable.green .price-value:after{ background-color: #25b26e; }
.pricingTable.green .content-list li{ border-bottom-color: #E31190; }
.pricingTable.green .content-list li:before{ color: #E31190; }
.pricingTable.green .pricingTable-signup{
    background: linear-gradient(to top,#017c41 15px, #E31190 15px);
}
.trapezoid {
	border-bottom: 20px solid rgb(100, 102, 100);
	border-left: 25px solid transparent;
	border-right: 25px solid transparent;
	height: 0;
	width: 100%;
    text-align: center;
}
.zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
@media only screen and (max-width: 990px){
    .pricingTable{ margin-bottom: 30px; }
}
@media only screen and (max-width: 600px) {
    .content-list p
    {
        text-align: center;
    }
}
@media screen and (max-width: 576px) and (min-width: 240px) {
 .vippackages{
    min-height: 2800px;
    clip-path: polygon(0 0, 100% 0%, 100% 38%, 0 52%);
    background-color:#E31190;
    z-index:998;
    width:100%;
 }
}
@media only screen and (min-width: 576px) {
 .vippackages{
    min-height: 900px;
    clip-path: polygon(0 0, 100% 0%, 100% 38%, 0 52%);
    background-color:#F15C62 ;
    z-index:998;
    width:100%;
 }
}
</style>

@endpush

@php
    if (!function_exists('Percentage_cal')) {
    function Percentage_cal($value, $total)
    {
        if ($total != 0) {
            return ($value / $total) * 100;
        } else {
            return 0;
        }
    }

    if (!function_exists('avg_month')) {
    function avg_month($amount, $duration) {
        if ($duration != 0) {
            return $amount / $duration;
        } else {
            return 0;
        }
    }
}
}
@endphp

<div class="demo"  style="position: relative;">
    <br>
    <div class="containe-fluied py-3 bg-white">
        <div  class="row m-0 vippackages">
        </div>

        <div class="px-5" style="position: absolute; top:0; z-index: 1; width:100%; margin-top: 50px" >
                <h2 class="text-lg-10 text-sm-5 text-md-10 pt-5 text-center w3-text-white" style="text-shadow: 1px 1px 2px #000">
                    Our <strong class="w3-text-white">Packages </strong>
                 </h2>
                 <div class="col-md-4 offset-md-4 text-white" style="clip-path: polygon(3% 0, 100% 0, 97% 100%, 0 100%); background-color:#E31190;height:30px;">
                    <p class="px-2 text-center w3-text-teal "><i> {{ $package_sogan}}</i>
                        <i class="fa fa-solid fa-fire" style="color:red"></i></p>
                </div>

            @foreach($packages->chunk(4) as $package3)
            @php
                $pc=3;
            @endphp
            <div class="row py-5">
                @foreach($package3 as $package)
                <div class="col-lg-3 col-md-6 p-3">

                    {{-- <div class="pricingTable  {{ $pc == 2 ? ' blue ' : '' }} {{ $pc == 1 ? ' green ' : '' }}">
                        <div class="pricingTable-header">
                            <h3 class="title">{{ $package->package_title }}</h3>
                            <div class="price-value">
                                <span><small>{{number_format($package->package_amount, 0)}}</small></span>
                            </div>
                        </div>
                        <ul class="content-list">
                            <li>{{ $package->package_duration }} Days </li>
                            <li>{{ $package->proposal_send_daily_limit }}Proposals/Day</li>
                            <li>{{ $package->proposal_send_total_limit }} Total Proposals</li>
                            {{-- <li class="disable">{{ $package->contact_view_limit }} View Limits</li>
                            <li class="disable">15 Subdomains</li> --}}
                        {{-- </ul>
                        <div class="pricingTable-signup">
                            <a  href="{{route('payNow',$package->id)}}">Pay Now</a>


                        </div>
                    </div> --}}
                    <div class="zoom card elevation-2 py-2 rounded-lg ">
                        <div class="p-4 ">
                            <div class="Heade-content">
                                <div class="mb-2 text-center">
                                    <span class="h5 font-weight-bold w3-hover-text-teal w3-serif">
                                    {{ $package->package_title }}
                                    </span>
                                    <span class="p text-muted w3-cursive">
                                        {{ round($package->package_duration / 30,1) }} Months
                                    </span>
                                </div>

                                @if(round($package->bonus_duration/7,1) >= 1)
                                <div class="text-white" style="clip-path: polygon(3% 0, 100% 0, 97% 100%, 0 100%); background-color:#E31190;height:30px;">
                                    <p class="px-2 text-center w3-text-teal "><i>{{ round($package->bonus_duration/7,1)}} extra week for Free</i>
                                        <i class="fa fa-solid fa-fire" style="color:red"></i></p>
                                </div>
                                @else
                                <div style="height:30px">

                                </div>
                                @endif


                                <p class="w3-text-green px-2 text-center" style="min-height: 20px">
                                    @if(Percentage_cal($package->discounted_amount,$package->package_amount) > 0)
                                    {{ Percentage_cal($package->discounted_amount,$package->package_amount)}}% off <del>{{ $package->discounted_amount}}</del>
                                    @endif
                                </p>

                                <h3 class="mt-1 text-center">
                                    <span class="font-weight-bold">
                                        {{ $package->package_currency}} {{number_format($package->package_amount, 0)}}
                                    </span>
                                </h3>
                                <!-- <p class="text-center m-0"><i>{{ $package->package_currency}} {{ avg_month($package->package_amount,$package->package_duration)}} Per Month</i></p> -->

                            <div class="content-button mt-
                            1 text-center">
                                <a href="{{route('payNow',$package->id)}}" class="w3-button w3-round-xxlarge w3-border px-5 w3-hover-teal w3-text-gray">Continue</a>
                            </div>
                            </div>
                            <div class="content-list  text-justify mt-3 p-3">
                                <p> <i class="fa fa-check-circle" style="color: #E31190"></i> {{ $package->proposal_send_daily_limit }}Proposals/Day</p>
                                <p> <i class="fa fa-check-circle" style="color: #E31190"></i> {{ $package->proposal_send_total_limit }} Total Proposals</p>

                                @php
                                $tags=json_decode($package->package_tags);

                                @endphp
                                @if($tags)
                                    @foreach ($tags as $tag)
                                    <p> <i class="fa fa-check-circle" style="color: #E31190"></i> {{ $tag }}</p>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                    </div>
                @php
                    $pc--;
                @endphp
                @endforeach


            </div>
            @endforeach

        </div>
    </div>
    <div class="clearfix"></div>
    <br>
</div>
<div class="empty_section" style="padding: 380px 0"></div>
<div  class="container-fluied my-5 mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2  py-4 w3-round">
            <div class="d-flex justify-content-center">
               <div class="G-image">
                   <img src="{{asset('img/match.jpg')}}" class="image fluid" alt="">
               </div>
            </div>
            <div class="G-content text-center">
                <h3>Match Guarantee!</h3>
                <p>vip matchmaking service</p>
            </div>
            <div class="">
                <div class="row text-center mt-5">
                    <div class="col-lg-4">
                        <div class="content d-flex justify-content-center">
                            <div class="icon w3-rounded mx-2 w3-red w3-circle ">
                                <i class="fa fa-book" style="font-size: 30px"></i>
                            </div>
                            <div class="content-text">
                                <h4 class="" style="color:#F15C62 !important">Best Matches<h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="content d-flex justify-content-center ">
                            <div class="icon w3-rounded  mx-2 w3-red w3-circle">
                                <i class="fa fa-user-secret" style="font-size: 30px"></i>
                            </div>
                            <div class="content-text ">
                                <h4 class=""style="color:#F15C62 !important" >100% Privacy<h4>
                            </div>
    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="content d-flex justify-content-center">
                            <div class="icon w3-rounded mx-2 w3-red w3-circle">
                                <i class="fa fa-user" style="font-size: 30px;"></i>
                            </div>
                            <div class="content-text ">
                                <h4 class="" style="color:#F15C62 !important" >Verified Profiles<h4>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

