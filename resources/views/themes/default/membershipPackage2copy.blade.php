
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
    background: linear-gradient(to bottom,#25b26e 15px, #00934D 15px);
}
.pricingTable.green .price-value{
    background-color: #25b26e;
    border-color: #00934D;
}
.pricingTable.green .price-value:after{ background-color: #25b26e; }
.pricingTable.green .content-list li{ border-bottom-color: #00934D; }
.pricingTable.green .content-list li:before{ color: #00934D; }
.pricingTable.green .pricingTable-signup{
    background: linear-gradient(to top,#017c41 15px, #00934D 15px);
}
@media only screen and (max-width: 990px){
    .pricingTable{ margin-bottom: 30px; }
}
</style>
@endpush

<div class="demo">
    <br>
    <div class="container py-3 bg-white">
        <h2 class="text-lg-10 text-sm-5 text-md-10 pt-5 text-center color-vipmm" style="text-shadow: 1px 1px 2px #000">
           Our <strong class="color-vipmm2">Packages </strong>
        </h2>
        @foreach($packages->chunk(4) as $package3)
@php
    $pc=3;
@endphp
        <div class="row py-5">
            @foreach($package3 as $package)

            <div class="col-lg-3 col-md-6">
                <div class="pricingTable  {{ $pc == 2 ? ' blue ' : '' }} {{ $pc == 1 ? ' green ' : '' }}">
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
                    </ul>
                    <div class="pricingTable-signup">
                        <a  href="{{route('payNow',$package->id)}}">Pay Now</a>


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
    <br>
</div>

