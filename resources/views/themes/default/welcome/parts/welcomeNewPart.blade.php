<style>

    .small_disp{
        display: none;
    }

.about_image{
    width: 27%;
}

    @media screen and (max-width: 600px) {
      .bg-move{
        background-position: 13% !important;
        background-repeat: no-repeat !important;
        background-attachment: fixed !important;
      }
    }

    @media screen and (min-width: 768px){
        .serach_form_mobile{
            display: none!important;
        }
    }

    /*tab*/
   @media (min-width: 768px) and (max-width: 1024px) {
        .icon_style {
        background-color: #d52379 !important;
        border-radius: 50%!important;
        margin-left: 15% !important;
        margin-right: 15% !important;
        height: 35% !important;
}

.ipad_background{ 
    width: 211% !important;
    margin-top: -1px !important;
    height: 600px ;
    margin-left: -377px !important;
}


  }
/*landscape*/
@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
  
  .icon_style {
    background-color: #d52379 !important;
    border-radius: 50%;
    margin-left: 24% !important;
    margin-right: 24% !important;
    height: 44% !important;
}
  
}

/*mobile portrait*/
@media (min-width: 320px) and (max-width: 480px) {
  
  h2{
    font-size: 24px!important;
line-height: 1.5em ;
  }
  .about_image{
    width: 42%;
}
.how_work{
    margin-top: -26px !important;
    /*padding-top: 81px !important;*/
}


/*mobile background style*/

.mobile_background{
    margin-top: -51px !important;
}

.icon_style {
background-color:#d52379 !important;
border-radius: 50%!important;
margin-left: 36% !important;
margin-right: 36% !important;
height: 46% !important;


}
.icon_style i{
    padding-top: 22px!important;
}

.small_disp{
    display: block;
    width: 113%;
    margin-left: -12%;
}
.larg_disp{
    display: none;
}



/*modal size for mobile*/

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 98% ;
    left: 2px;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,.5);
    outline: 0;
}






}

/*iphone solutions for  6/7/8*/
@media (min-width: 414px) and (max-width: 736px) {
    .icon_style {
/*background-color:#d52379 !important;
border-radius: 50%!important;
margin-left: 36% !important;
margin-right: 36% !important;
height: 46% !important;*/

border-radius: 50% !important;
margin-left: 131px !important;
margin-right: 131px !important;
height: 91px !important;


}

/*mobile background style*/

.mobile_background{
    margin-top: -51px !important;
}

.how_work{
    margin-top: -26px !important;
    padding-top: 81px !important;
}

.search_form_section {
    top: 417px !important;
    width: 232%;
    margin-left: -3%;
}


.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 97% ;
    /*left: 10px !important;*/
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,.5);
    outline: 0;
}


.slider-container{
    height: 447px !important;
}


}

/*mobile landscape*/
@media (min-width: 481px) and (max-width: 767px) {
  
  .icon_style {
    background-color: 
    #d52379 !important;
    border-radius: 50%!important;
    margin-left: 40%!important;
    margin-right: 40%!important;
    height: 58%!important;
    /*padding-bottom: 30px;*/
}

.Featured_Profiles{
    padding-top: 10px;
}

/*.small_disp{
    display: block!important;
}
.larg_disp{
    display: none!important;
}*/
}
/*@media (min-width: 375px) and (max-width: 812px) {
  .icon_style {
    background-color:
#d52379 !important;
border-radius: 50%;
margin-left: 23% !important;
margin-right: 23% !important;
height: 47% !important;
}
}*/
.Featured_Profiles{
    padding-top: 50px;
}
.serach_form_mobile{
    margin-bottom: -60px !important;
}
/*ipad pro*/
@media (min-width: 1024px) and (max-width: 1366px) {
    .icon_style {
    /*background-color: #d52379 !important;*/
    border-radius: 50% !important;
    margin-left: 25% !important;
    margin-right: 25% !important;
    height: 42% !important;
}
.login_hide{
    display: none;
}
}




.larg_disp{
    height: 600px;
width: 127% !important;
margin-left: -18%;
}

</style>


<!-- <div class="page-headers header-filters clear-filters purple-filters" data-parallax="false" > -->
<!-- <div class="slide" style="width: 100%;margin-top: 65px;"> -->
    <div class="slide ipad_background mobile_background" style="width: 110%;margin-top: -15px; height: 600px;">
  <ul class="">

    <!-- <li class=" img-responsive" data-bg="{{ asset('img/4.5.jpg') }}"></li> -->
    <!-- <img class=" larg_disp " style="height: 600px;width: 103%!important;margin-left: -3%;" src="{{ asset('img/4.5-Wide-Shahin.jpg') }}"> -->
    <img class=" larg_disp " style="" src="{{ asset('img/taslima-marriage-media-banner.jpg') }}" alt="taslima marriage media banner">
    <img class=" small_disp img-responsive" src="{{ asset('img/taslima-marriage-media-mobile-banner.jpg') }}" alt="taslima marriage media mobile banner">
 <!--    <li class="bg-move img-responsive" data-bg="{{ asset('img/2.jpg') }}"></li>
    <li class="bg-move img-responsive" data-bg="{{ asset('img/3.jpg') }}"></li>
    <li class="bg-move img-responsive" data-bg="{{ asset('img/pic2.jpg') }}"></li> -->
    <!-- <li class="bg-move img-responsive" data-bg="{{ asset('img/pic5.jpg') }}"></li> -->
    <!-- <li class="bg-move img-responsive" data-bg="{{ asset('img/pic6.jpg') }}"></li> -->
   

</ul>
<!--   <ul class="small_disp">
    @if (count($sliders))
    @foreach($sliders as $slider)
    <li class="bg-move" data-bg="{{ asset($slider->image_url) }}"></li>
    @endforeach
    @else
    <li class="bg-move img-responsive" data-bg="{{ asset('img/5.1.jpg') }}"></li>
    @endif

</ul> -->

</div>
<!--     <div class="slide small_disp " style="width: 100%;margin-top: -15px; height: 600px;">
  <ul class="">

     <img class=" img-responsive" src="{{ asset('img/5555.jpg') }}">
</ul>
</div> -->
<div class="welcome-front-cover" style="min-height: 501px!important;">
    <div class="welcome-front-cover-inner">
        <div class="container ">


            <div class="row">
                
                <div class="col-sm-7">


                    <div class="site-title brand custom-shadow">
              <div class="row">
                <div class="col-md-12 ">


                    {{-- <h1 class="site-title-details text-center ">
                        @if($websiteParameter->h1)
                        {{ $websiteParameter->h1 }}
                        @else
                        {{ env('APP_NAME_BIG') }}
                        @endif
                    </h1> --}}
                    <span class="mt-2 w3-large">

                        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

                        {{-- @if($websiteParameter->slogan)
                        {{ $websiteParameter->slogan }}
                        @else
                        {{ env('APP_DESC') }}
                        @endif --}}
                        {{-- #FindYourMatch <br>
                        <span class="w3-large">on the No. 1 & most trusted <br> Matrimony service in Bangladesh</span> --}}

                        {{-- #No.1 Matrimony in Bangladesh --}}

                    </span>



                </div>
            </div>
        </div>
                    
                </div>

              <!--   <div class="col-sm-5 ">

                    @if(Agent::isDesktop()) -->
<!-- Regi form is here so  -->
                    <!-- @include('welcome.includes.forms.welcomeRegisterFormForDesktop') -->
                    <!-- @endif -->
                    
                </div>
            </div>

                  
        <!-- <div class="d-none d-sm-block">       -->
        <div>
            @include('welcome.includes.forms.welcomeForm')
        </div>
     </div>
</div>

<!-- </div> -->
</div>
<style type="text/css">
    

/*@media only screen and (min-width: 768px) {

.promo-form {
    background:rgba(0,0,0,.7);
    padding: 3px 39px;
    border-radius: 4px;
    width: 88%;
}
}*/

.icon_style {
background-color:#d52379 !important;
border-radius: 50%;
margin-left: 28%;
margin-right: 28%;
height: 45%;


}
.icon_style i {
    color:white;
    font-size: 45px;
    padding-top: 26px;
}
/*how to work section */
    .how_to_work_section{
         padding-bottom: 56px;
    }

</style>
<!-- how it work  -->



<div class="container-fluid how_work" style="margin-top: -100px; padding-top: 33px; background-color: #fff!important; ">
    <div class="container">
        <div class="text-center" style="padding-bottom: 30px!important;">
            <h2>How Taslima Marriage Media Works</h2>
            <hr style="background-color:#d52379 !important;height: 2px;margin-left: 40%;
                margin-right: 40%;margin-top: -2px;">
            <p style="font-weight: bold;font-size: 16px;">Get Started in 3 Easy Steps</p>
            
        </div>

        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div class="row">
                                <div class="col-md-4 how_to_work_section">
              <!--   <div class="text-center icon_style">
                        <i class="fa fa-user" aria-hidden="true"></i>
                </div> -->
                  <div class="text-center ">
                        <img style="width: 41%;" src="{{asset('img/taslima-marriage-media-creat-profile.png')}}" alt="taslima marriage media creat profile">
                </div>
                <div  style="text-align: center; padding-top: 20px;">
                    <h4 style="font-weight: bold">Create Your Profile </h4>
                    <p>Create your detail profile, add photos  and describe your partner preference</p>
                </div>
            </div>
            <div class="col-md-4 how_to_work_section">
                <!-- <div class="text-center icon_style">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>   
                </div> -->
                  <div class="text-center ">
                        <img style="width: 41%;" src="{{asset('img/taslima-marriage-media-search.png')}}" alt="taslima marriage media search">
                </div>
                <div  style="text-align: center;padding-top: 20px; ">
                    <h4 style="font-weight: bold">Search Your Partner</h4>
                    <p>Search your preferred partner by location, education, interest and so on</p>
                </div>
                
            </div>
            <div class="col-md-4 how_to_work_section">
               <!--  <div class="text-center icon_style">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                </div> -->
                  <div class="text-center ">
                        <img style="width: 41%;" src="{{asset('img/taslima-marriage-media-message.png')}}" alt="taslima marriage media message">
                </div>
                <div  style="text-align: center; padding-top: 20px;">
                    <h4 style="font-weight: bold">Start Communication </h4>
                    <p>Start communication with suitable  profiles by sending message & emails
                    </p>
                </div>
                
            </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


<!-- we have change something here  -->
<!-- <div class="main main-raiseds" style="margin-top: -120px;z-index: 400;"> -->
    <div class="main main-raiseds" >
    <div class="section section-basic" style="padding: 0px;">


    @if (Agent::isMobile())
    




<!-- mbile view search -->

<!-- search for maridge partner on mobile view -->
<style type="">
    
.w3-border {
    border: 1px solid 
    #d52379 !important;
}

</style>
  <!-- <div class="container serach_form_mobile" style="margin-top: -100px;"> -->
  

 <!--  <div class="container serach_form_mobile" >

<div class="">
     <div class="">
      <div class="row">
        <div class="col-md-12 ">
                <h2 style="font-size:  26px !important; padding-top: 30px;" class=" text-center">Find your perfect marriage partner.</h2>

               <hr style="background-color:#d52379 !important;height: 2px;margin-left: 40%;
                margin-right: 40%;margin-top: -2px;">

            </div>
        </div>
     </div> 

            
      <form class="text-center border border-light p-5" action="#!" style="margin-top: -40px;">

    <div class="form-row mb-8">
        <div class="col-md-3"> -->
            <!-- First name -->
            <!-- <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name"> -->
            <!-- <label class="label_style">Looking for </label> -->
<!--             <p class="form_p">Looking for</p>

      <select class="w3-select  w3-border w3-round w3-large w3-padding" id="label_style" name="gender"> -->
        <!-- <option value="">Gender</option> -->
  <!--       {{-- id:1, title:Gender --}}
        @foreach ($userSettingFields[0]->values as $value)
          <option>{{ $value->title }}</option>
        @endforeach
      </select>
        </div>
        <div class="col"> -->
            <!-- Last name -->
            <!-- <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name"> -->
            <!-- <label class="label_style">age from </label> -->
<!--             <p class="form_p">Age</p>
                       <select name="age1" id=""  class="w3-select  w3-border w3-round w3-large w3-padding" >
    
                  @for($i = 18; $i<= 28; $i++)
                      <option>{{ $i }}</option>
                  @endfor
                    </select>

        </div>
        <p style="padding-top: 8%;">&nbsp; to: &nbsp;</p>
                <div class="col"> -->
            <!-- age to -->
            <!-- <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name"> -->
<!--             <label class="label_style">age to </label>
                       <select name="age1" id=""  class="w3-select  w3-border w3-round w3-large w3-padding" >
          
                  @for($i = 28; $i<= 45; $i++)
                      <option>{{ $i }}</option>
                  @endfor
                    </select>
        </div>
    </div>

    <div class="form-row mb-8">
        <div class="col"> -->
            <!-- Religion -->
             <!-- <label class="label_style">Religion</label> -->
<!--              <p class="form_p">Religion</p>
            <select name="religion" class="w3-select  w3-border w3-round w3-large w3-padding" style="width: 89% !important;margin-left: -13px !important;"> -->
             <!-- <option value="">--religion--</option> -->

 <!--                                    {{-- ID:4, title:Religion/Community? --}}
                @foreach ($userSettingFields[3]->values as $value)
                   <option>{{ $value->title }}</option>
                 @endforeach
                                    
              </select>
        </div>
        <div class="col"> -->
            <!-- Country-->
            <!-- <label class="label_style">Country</label> -->
<!--             <p class="form_p" style="padding-left: 13px!important;">Country</p>
                  <select name="country"  class="w3-select  w3-border w3-round w3-large w3-padding" style="width: 89% !important;margin-right:  -13px !important;"> -->
           <!-- <option value="">--country--</option> -->
<!--              {{-- id:3, title:country --}}
            @foreach ($userSettingFields[2]->values as $value)
              <option>{{ $value->title }}</option>
                @endforeach -->
<!--      </select>
        </div>
    </div>

    <div class="form-row mb-4">
        <div class="col">
             <a class="btn btn-info btn-block" data-toggle="modal" data-dismiss="modal" data-target="#exampleModal1" style="margin-top: 24px; background-color: #d52379; color: white;font-weight:bold;font-size: 17px;text-transform: capitalize; ">Search</a>
        </div>
    </div>

</form>
  

  </div>
  </div> -->
    @endif
<style type="text/css">
    
    .form_p{
        float: left;

padding-top: 7px;

padding-bottom: -7px;

margin-bottom: 3px;
    }
</style>
<!-- <div class="w3-light-gray w3-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <table class="table">
                    <tr>
                        <td width="32">
                            <img width="40" class="" src="{{ asset('img/ic1.png') }}" alt="Taslima Marriage Media">
                        </td>
                        <td>

                            <p class="w3-large "> <span class="">Free Register & Contact With 100% Genuine People</span></p>
                            
                        </td>
                    </tr>
                </table>



                
            </div>
            <div class="col-sm-4">
                
                <table class="table">
                    <tr>
                        <td width="32">
                            <img width="40" class="" src="{{ asset('img/ic2.png') }}" alt="Taslima Marriage Media">
                        </td>
                        <td>

                            <p class="w3-large "> <span class="">Most Reliable Matrimony Website For Bangladesh's People</span></p>
                            
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-sm-4">
                
                <table class="table">
                    <tr>
                        <td width="32">
                            <img width="40" class="" src="{{ asset('img/ic3.png') }}" alt="Taslima Marriage Media">
                        </td>
                        <td>

                            <p class="w3-large "> <span class="">Have High Documented Profile, Become Paid Membership, Send Request To Each Other & Call To Connect</span></p>
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div> -->


<style>
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-top: 0;
}
.table{margin-bottom: 0;}
</style>


@if(Agent::isDesktop())

<style>

.form-check .form-check-label .circle {
    border: 1px solid rgba(255,255,255,.80);
    
}

    .form-check .form-check-label .circle .check {

    background-color: #eee;
    border: 1px solid rgba(255,255,255,.80);
}


element.style {
}
.form-check .form-check-input:checked~.circle {
    /*border-color: #9c27b0;*/
    border-color: #fff;
}

</style>
<!-- <div class="w3-indigo w3-container">
    <div class="container text-center">

                <p class="w3-large mt-2 bold"> Find the One Who Completes You</p>

        <div class="row">
            
            <div class="col-sm-11 ml-auto">
                <form action="{{route('signup')}}" method="post" class="form-inline ml-auto">

                    @csrf
                    
                    
                        Looking for: &nbsp;
                        <div class="form-check">
                                <label class="form-check-label w3-text-white">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Male" checked> Bride &nbsp;
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label w3-text-white">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios21" value="Female" > Groom
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>

                            <p>&nbsp; Age: &nbsp;</p>


                            <div class="form-group">
                                

                                <select name="" id="" style="width:30px;border: 1px solid #ccc;border-radius: 3px;padding-left: 3px;">
                                    @for($i = 18; $i<= 40; $i++)
                                    <option>{{ $i }}</option>
                                    @endfor
                                </select>

                                <p>&nbsp; to &nbsp;</p>

                                <select name="" id="" style="width:30px;border: 1px solid #ccc;border-radius: 3px;padding-left: 3px;">
                                    <option>40</option>

                                    @for($j = 30; $j<= 70; $j++)
                                    <option>{{ $j }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                               &nbsp; Religion: &nbsp;
                            <select name="" id="" style="width:130px;border: 1px solid #ccc;border-radius: 3px;padding-left: 3px;">
                                    <option value="">-- Select --</option>

                                    {{-- ID:4, title:Religion/Community? --}}
                                    @foreach ($userSettingFields[3]->values as $value)
                                      <option>{{ $value->title }}</option>
                                    @endforeach
                                    
                                </select>

                            </div>

                            <div class="form-group">
                               &nbsp; Country Living in: &nbsp;
                            <select name="" id="" style="width:130px;border: 1px solid #ccc;border-radius: 3px;padding-left: 3px;">
                                    <option value="">-- Select --</option>
                                    {{-- id:3, title:country --}}
                                    @foreach ($userSettingFields[2]->values as $value)
                                      <option>{{ $value->title }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <button type="submit" class="w3-btn  w3-light-gray w3-round" style="padding: 2px 8px;margin-left: 4px;">Search</button>
                        
                </form>


            </div>
        </div>
        
    </div>
</div> -->

@endif



<div class="container Featured_Profiles" style="padding-top: 20px; ">
    <div class="">

        <!-- <br> -->
    
        <h2 class="text-center">Featured Profiles</h2>
          <hr style="background-color:#d52379 !important;height: 2px;margin-left: 40%;
                margin-right: 40%;margin-top: -2px;">
        <p class="text-center" style="font-weight: bold;">All Profiles Are Real and Verified, Feel Free to Contact Them</p>
     

        @if(Agent::isDesktop())

        @include('welcome.includes.new.brideGroomDesktop')

        

        @else
<style type="text/css">
    .Featured_Profiles{
        background-color: #fff !important;
        padding-top: 20px!important;
        padding-bottom: 9px !important;
    }
</style>
        @include('welcome.includes.new.brideGroomMobile')


        

        @endif
    </div>
</div>



<div class="container-fluid pricelist_style" >
<div class="container">
    <div class="w3-padding text-center">



        @if(Agent::isDesktop())

<style type="text/css">
    .pricelist_style{
        background-color: #fff !important;
        padding-top: 20px;
    }

</style>

        @include('welcome.includes.others.pricelist')

        
@endif
@if(Agent::isMobile())

<style type="text/css">


.navbar-toggler:not(:disabled):not(.disabled) {
    cursor: pointer;
    border: 1px solid #D52379 !important;
    
}
.navbar-toggler-icon{
    background-color: #D52379 !important;
}







    .pricelist_style{
        background-color: #fff !important;
        padding-top: 20px!important;
        /*border: none !important;*/
    }


    
    .w3-padding-large {
    padding: 12px 10px !important;
}
.w3-xxlarge {
    font-size: 30px !important;
}
.w3-xlarge {
    font-size: 19px !important;
}
.contact_button {
    background-color: #d52379 !important;
    border: 1px solid #d52379 !important;
    border-radius: 5px !important;
    width: 36% !important;
    padding-left: 11px!important;
    padding: 8px!important;
}

.price_package_border {
    border-radius: 10px !important;
    border: 0px !important;

    transition: box-shadow .3s !important;
    box-shadow: 0 0 16px rgb(200, 200, 200) !important;
}

/*.recommended_button {
    margin-top: -11px !important;
    border: 1px solid #d52379;
    background-color:#d52379 !important;
    color:#fff !important;
    border-radius: 5px;
    font-size: 9px !important;
    width: 30% !important;
    padding: 0px !important;
    font-weight: bold !important;
    margin-right: 35% !important;

}*/

</style>

<!-- <h2>See Our Price Lists</h2> -->

<!-- <a href="{{ route('welcome.membershipPackages') }}"><img class="w-100" src="{{ asset('img/premium.png') }}" alt="Premium Member"></a> -->

@include('welcome.includes.others.pricelist')

@endif
 
</div>



</div>

</div>



<div class="container-fluid " style="background-color: #fff; padding-top: 20px; padding-bottom: 30px;">
    <div class="container">
        <div class="text-center" style="padding-bottom: 30px;">
            <!-- <img src="" alt="logo about section "> -->
            <img class="img-responsive about_image" src="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}" alt="{{ env('APP_NAME_BIG') }}" >
        </div>
        <div class="">

            <p class="text-justify">Taslima Marriage Media is one of the leading and most successful Bengali matrimony agencies since 2011. The agency helps its customers in all aspects of marriage. Today, we are the most visited and trusted matrimonial website of the country. Thousands of happy marriages happened and continue to happen through Taslima Marriage Media. Besides online, we also have a strong offline presence across Bangladesh. We at Taslima Marriage Media have been constantly innovating to provide a superior matchmaking experience to our registered users.Taslima Marriage Media is a self-driven web media for matchmaking. We have created a global matrimonial web portal aimed at fulfilling the needs of Bengalis both at home and abroad.</p>
        </div>
    </div>
</div>












<!-- <div class="w3-light-gray w3-container" style="background-color: #efefef !important;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <table class="table">
                    <tr>
                        <td width="32">
                            <img width="40" class="" src="{{ asset('img/ic1.png') }}" alt="Taslima Marriage Media">
                        </td>
                        <td>

                            <p class="w3-large "> <span class="">Contact With 100% Genuine People</span></p>
                            
                        </td>
                    </tr>
                </table>



                
            </div>
            <div class="col-sm-4">
                
                <table class="table">
                    <tr>
                        <td width="32">
                            <img width="40" class="" src="{{ asset('img/ic2.png') }}" alt="Taslima Marriage Media">
                        </td>
                        <td>

                            <p class="w3-large "> <span class="">Most Reliable Matrimony Website For Bangladesh's People</span></p>
                            
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-sm-4">
                
                <table class="table">
                    <tr>
                        <td width="32">
                            <img width="40" class="" src="{{ asset('img/ic3.png') }}" alt="Taslima Marriage Media">
                        </td>
                        <td>

                            <p class="w3-large "> <span class="">Have High Documented Profile, Become Paid Membership, Send Request To Each Other & Call To Connect</span></p>
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div> -->


@if(!Agent::isMobile())

<div class="container-fluid" style="padding-top: 20px !important;padding-bottom: 50px!important; background-color: #fff !important;">
    <div class="container">
        


    <div class="w3-padding text-center" style="padding-bottom: 25px!important;">
        {{-- <br> --}}
    
        <h2>Blog Post</h2>
  <hr style="background-color:#d52379 !important;height: 2px;margin-left: 40%;
                margin-right: 40%;margin-top: -2px;">
        <!-- <br>  -->
   <p class="text-center" style="font-weight: bold;">We Publish New Blog Posts Regularly, Check Out & learn more</p>
    

<!-- <hr> -->


        {{-- <br> --}}
    </div>


<style type="text/css">
    .blog_content{
        transition: box-shadow .3s!important;
    }
    .blog_content:hover{
         box-shadow: 0 0 16px rgba(33,33,33,1) !important;
         /*border-radius: 10px!important;*/
    }

</style>

    <div class="row api_blog_post">
    <!--@foreach($randomPosts as $post)-->
    <!--    <div class="col-md-4 blog_content" >-->

    <!--        <div class="w3-round mb-3">-->
    <!--            <div class="p-2 w3-light-gray">-->
    <!--                <a title="{{ $post->title }}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">-->
    <!--                <img src="{{ route('imagecache', [ 'template'=>'fifh','filename' => $post->fiName() ]) }}" class="img-responsive" style="width: 100%;" alt="{{$post->title}}">-->
    <!--                </a>-->

    <!--                <blockquote>-->
    <!--                <p>-->
    <!--                    <a title="{{ $post->title }}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">-->
    <!--                    {{ str_limit($post->title, 25, '..') }}-->
    <!--                </a>-->
    <!--                </p>-->
    <!--                <p class="text-justify">-->
    <!--                    {{ str_limit(strip_tags($post->description), 80,'...') }}-->
    <!--                </p>-->
                    
    <!--            </blockquote>-->
    <!--            </div>-->
    <!--        </div>-->
            
    <!--    </div>-->

    <!--    @endforeach-->
    
    <script type="text/javascript">
     fetch('https://www.taslimamarriagemedia.com/diary/wp-json/wp/v2/posts?per_page=3').then((res)=>res.json())
   .then(response=>{
    console.log(response);
    let output = '';
    for(let i in response){
        output +=`<div class="col-md-4 blog_content">
            
        <tr> 
            <a href="${response[i].link}"><img style="width:100%; padding-top:15px;" src="${response[i].better_featured_image.media_details.sizes.medium.source_url}"></a>
     
            <h4><a href="${response[i].link}" style="font-size: 14px;">${response[i].title.rendered}</a></h4>
           

        </tr></div>`
    }
    document.querySelector('.api_blog_post').innerHTML = output;
   }).catch(error => console.log(error));

</script>

    
        </div>
<div class="row" style="padding-top: 8px;">
          @foreach($randomPosts as $post)
        <div class="col-md-4 blog_content" >

            <div class="w3-round mb-3">
                <div class="p-2 w3-light-gray">
                    <a title="{{ $post->title }}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
                    <img src="{{ route('imagecache', [ 'template'=>'fifh','filename' => $post->fiName() ]) }}" class="img-responsive" style="width: 100%;" alt="{{$post->title}}">
                    </a>

                    <blockquote>
                    <p>
                        <a title="{{ $post->title }}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
                        {{ str_limit($post->title) }}
                    </a>
                    </p>
                    <p class="text-justify">
                        {{ str_limit(strip_tags($post->description), 80,'...') }}
                    </p>
                    
                </blockquote>
                </div>
            </div>
            
        </div>

        @endforeach
</div>

    </div>
    
</div>


@endif

        

        {{-- @include('welcome.includes.others.usersOnline') --}}


    {{-- @include('welcome.includes.others.homeTabs') --}}
 
    {{-- @include('welcome.includes.others.success_story') --}}


</div>
</div>