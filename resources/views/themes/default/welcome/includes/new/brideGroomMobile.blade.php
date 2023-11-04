
<style type="text/css">
    
.profiles_box_mobile_style{
              background: #fff !important;
           /*box-shadow: 0 0 16px rgba(33,33,33,1) !important;*/
           box-shadow: 0 0 16px rgb(200, 200, 200) !important;
          /*float: left;*/
}

</style>

<!-- <div class="row">
            <div class="col-6">
 
                <div  >
                    
              
                <div >
                    <h3>Brides</h3>
                </div>
                </div>
 -->
              

<!--     @foreach($brides as $user) -->

  <!--   <div class="w3-round mb-3 profiles_box_mobile_style" >

    <a href="{{ url('/',$user->username) }}">

        <div class="w3-display-container">
                                
            <img class="img-bordered w-100" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->latestCheckedPPNameOnly() ]) }}" alt="">
            <div class="w3-display-middle">
                <i class="fa fa-lock fa-2x w3-text-light-gray"></i> 
            </div>
            
            </div>
    
    </a>
            

            
                <p class="p-1 m-0 " style="padding:4%!important"> <span class="text-muted ">ID: {{ $user->username }} <br>
                 <span class="text-muted ">Age:</span> {{ $user->age() }} <br>
                 <span class="text-muted ">Heigit:</span>  @if($user->personalInfo)
                            {{ $user->personalInfo->height }}
                            @endif <br>
                 <span class="text-muted ">Religion:</span> {{ $user->religion }} <br>
                 <span class="text-muted ">Profession:</span> @if ($user->personalInfo)
                {{ str_limit($user->personalInfo->profession(),7) }}
                @endif 
                </p>
            
        </div>
    
    @endforeach

    

    <a href="{{ route('login') }}" class="">See More Brides <i class="fa fa-angle-right"></i></a>




            </div>
            <div class="col-6"> -->
                <!-- <div class="text-center"> -->
                <!-- <div > -->
                    
                
<!--                 <div  >
                    <h3>Grooms</h3>
                </div>
                </div> -->

            <!--     <br>  -->

    <!-- @foreach($grooms as $user)

 
    <div class="w3-round mb-3 profiles_box_mobile_style" >

    <a href="{{ url('/',$user->username) }}">

        <div class="w3-display-container">
                                
            <img class="img-bordered w-100" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->latestCheckedPPNameOnly() ]) }}" alt="">
            <div class="w3-display-middle">
                <i class="fa fa-lock fa-2x w3-text-light-gray"></i> 
            </div>
            
            
            </div>
    
    </a>
            

            
                <p class="p-1 m-0 " style="padding:4%!important"> <span class="text-muted ">ID: {{ $user->username }} <br>
                 <span class="text-muted ">Age:</span> {{ $user->age() }} <br>
                 <span class="text-muted ">Heigit:</span>  @if($user->personalInfo)
                            {{ $user->personalInfo->height }}
                            @endif <br>
                 <span class="text-muted ">Religion:</span> {{ $user->religion }} <br>
                 <span class="text-muted ">Profession:</span> @if ($user->personalInfo)
                {{ str_limit($user->personalInfo->profession(),7) }}
                @endif 
                </p>

            
        </div>
    
    @endforeach

    

    <a href="{{ route('login') }}" class="">See More Grooms <i class="fa fa-angle-right"></i></a>
            </div>
        </div> -->

    <!-- <hr> -->



<!-- mobile Slider view -->
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <style>
    

            .slider {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                width: 60%;
                margin: 0 auto;
                background: #fff;
            }
            .slider-prev,
            .slider-next {
                flex-shrink: 0;
                font-size: 36px;
                text-decoration: none;
                color: #000;
                cursor: pointer;
                -moz-user-select: none;
                -webkit-user-select: none;
                user-select: none;
            }
            .slider-prev {
                margin-right: 8px;
            }
            .slider-next {
                margin-left: 8px;
            }
            .slider-prev.is-disabled,
            .slider-next.is-disabled {
                color: #aaa;
                cursor: not-allowed;
            }
            .slider-container {
                flex-grow: 1;
                overflow: hidden;
                position: relative;
                height: 397px;
                background: #fff !important;
           /*box-shadow: 0 0 16px rgba(33,33,33,1) !important;*/
           box-shadow: 0 0 16px rgb(200, 200, 200) !important;
            }
            .slider-item {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: #fff;
                 
          /*float: left;*/
            }
        /*    .slider-item:nth-child(3n+1) {
                background-color: red;
            }
            .slider-item:nth-child(3n+2) {
                background-color: green;
            }
            .slider-item:nth-child(3n+3) {
                background-color: blue;
            }*/
            .slider-panel {
                width: 100%;
                text-align: center;
                margin-top: 12px;
            }
            .slider-link {
                color: #999;
            }
            .slider-link.is-active {
                color: #000;
            }

            @media (max-width: 768px) {
                .slider {
                    width: 100%;
                }
            }
        </style>

        <div class="slider" id="control-slider">
            <!-- <a href="#" style="color: #d52379 ;" class="slider-prev">←</a> -->
            <a href="#" style="color: #d52379 ;" class="slider-prev"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
</a>

            <div class="slider-container">
                  @foreach($profiles as $user)
                  <a href="www.google.com">
                <div class="slider-item ">
                     <div class="w3-display-middle" style="top: 34% !important;">
                         <i class="fa fa-lock fa-2x w3-text-light-gray"></i>
                     </div>
                    <img class="img-bordered w-100" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->latestCheckedPPNameOnly() ]) }}" alt="Profile Picture">
                    <p class="p-1 m-0 " style="padding:4%!important"> <span class="text-muted ">ID: {{ $user->username }} <br>
                 <span class="text-muted ">Age:</span> {{ $user->age() }} <br>
                 <span class="text-muted ">Height:</span>  @if($user->personalInfo)
                            {{ $user->personalInfo->height }}
                            @endif <br>
                 <span class="text-muted ">Religion:</span> {{ $user->religion }} <br>
                 <span class="text-muted ">Profession:</span> @if ($user->personalInfo)
                {{ str_limit($user->personalInfo->profession(),7) }}
                @endif 
                </p>


                </div></a>
                 @endforeach
                
            </div>

            <!-- <a style="color: #d52379;" href="#" class="slider-next">→</a> -->
            <a style="color: #d52379;" href="#" class="slider-next"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
</a>

        </div>



        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="{{asset('assets/slide_profile_mobile/jquery.slider.js')}}"></script>
        <script>
            $('#slider').slider();

            $('#control-slider').slider({
                container: $('#control-slider .slider-container'),
                items: $('#control-slider .slider-item'),
                prev: $('#control-slider .slider-prev'),
                next: $('#control-slider .slider-next'),
                links: $('#control-slider .slider-link'),
                useSwipe: false
            });

            $('#fade-slider').slider({
                container: $('#fade-slider .slider-container'),
                items: $('#fade-slider .slider-item'),
                prev: $('#fade-slider .slider-prev'),
                next: $('#fade-slider .slider-next'),
                links: $('#fade-slider .slider-link'),
                effect: 'fade',
                loop: false
            });

            $('#custom-slider').slider({
                container: $('#custom-slider .slider-container'),
                items: $('#custom-slider .slider-item'),
                prev: $('#custom-slider .slider-prev'),
                next: $('#custom-slider .slider-next'),
                links: $('#custom-slider .slider-link'),
                duration: 500,
                delay: 5000,
                swipeChangeOn: 0.4,
                swipeRatio: function(kx, ky) {
                    return kx;
                },
                idx: 2,
                autoPlay: true,
                loop: true,
                activeClass: 'is-active',
                disabledClass: 'is-disabled',
                beforeChange: function(oldIdx, newIdx) {
                    console.log('beforeChange', oldIdx, newIdx);
                },
                afterChange: function(oldIdx, newIdx) {
                    console.log('afterChange', oldIdx, newIdx);
                },
                duringChange: function(oldIdx, newIdx, ratio) {
                    console.log('duringChange', oldIdx, newIdx, ratio);
                },
                effect: 'myeffect',
                effects: {
                    myeffect: {
                        oldSlideCSS: function(oldIdx, newIdx, ratio) {
                            return {
                                left: 0,
                                top: 0,
                                opacity: 1,
                                zIndex: 1
                            };
                        },
                        newSlideCSS: function(oldIdx, newIdx, ratio) {
                            var coef = (oldIdx < newIdx) ? 1 : -1;
                            if (this.opt.loop) {
                                if (oldIdx === 0 && newIdx === this.count - 1) {
                                    coef = -1;
                                } else if (oldIdx === this.count - 1 && newIdx === 0) {
                                    coef = 1;
                                }
                            }
                            return {
                                left: (coef * (1 - ratio) * 100) + '%',
                                top: (coef * (1 - ratio) * 100) + '%',
                                opacity: ratio,
                                zIndex: 2
                            };
                        },
                        resetSlideCSS() {
                            return {
                                left: '',
                                top: '',
                                opacity: '',
                                zIndex: ''
                            };
                        }
                    }
                }
            });

            $('#custom-slider .test-prev').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('showPrev');
            });
            $('#custom-slider .test-next').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('showNext');
            });
            $('#custom-slider .test-show').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('show', prompt('Slide index'));
            });
            $('#custom-slider .test-start').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('start');
            });
            $('#custom-slider .test-stop').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('stop');
            });
            $('#custom-slider .test-check').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('check');
            });
            $('#custom-slider .test-resize').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('resize');
            });
            $('#custom-slider .test-count').on('click', function(e) {
                e.preventDefault();
                alert($('#custom-slider').slider('count'));
            });
            $('#custom-slider .test-destroy').on('click', function(e) {
                e.preventDefault();
                $('#custom-slider').slider('destroy');
            });
        </script>
        <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

