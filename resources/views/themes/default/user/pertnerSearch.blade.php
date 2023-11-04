@extends('user.master.usermaster')
@php
$me = auth()->user();
@endphp
@push('css')
    <style>
        .grid-card-contact {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            text-align: center;

        }
        .areaId{
            display: none;
        }
        .active{
            background-color: #F15C62 ;
        }

    </style>
@endpush
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3">

    <aside class="sidebar w3-white">
  
  <div class="container py-3">
      <div class="row">
      <div class="col-md-12 mb-2">
                  <div class="card w3-border-red w3-hover-red active"  id="advanceSectionbtn">
                      <div class="card-title" id="advance">
                          <div class="single-sidebar-menu-box w3-round-medium px-3">
                      
                              <div class="icon-box float-left pr-2">
                                  <i class="fa fa-graduation-cap fontize"></i>
                              </div>
                              <div class="details">
                                  <h5 class="fontcolor font-weight-bold">Advance search</h5>
                              </div>
                      </div>
                      </div>
                  </div>
          </div>
         <div class="col-md-12 mb-2">
          <div class="card w3-border-red w3-hover-red" id="professionSectionbtn">
                      <div class="card-title" id="education" >
                          <div class="single-sidebar-menu-box w3-round-medium px-3">
                      
                              <div class="icon-box float-left pr-2">
                                  <i class="fa fa-graduation-cap fontize"></i>
                              </div>
                              <div class="details">
                                  <h5 class="fontcolor font-weight-bold">Profession search</h5>
                              </div>
                      </div>
                      </div>
                  </div>
          </div>
          <div class="col-md-12 mb-2">
                  <div class="card w3-border-red w3-hover-red " id="eductionSectionbtn">
                      <div class="card-title" id="education" >
                          <div class="single-sidebar-menu-box w3-round-medium px-3">
                      
                              <div class="icon-box float-left pr-2">
                                  <i class="fa fa-graduation-cap fontize"></i>
                              </div>
                              <div class="details">
                                  <h5 class="fontcolor font-weight-bold">Education search</h5>
                              </div>
                      </div>
                      </div>
                  </div>
          </div>
          <div class="col-md-12 mb-2">
                  <div class="card w3-border-red w3-hover-red" id="distcitSectionbtn">
                      <div class="card-title" id="education" >
                          <div class="single-sidebar-menu-box w3-round-medium px-3">
                      
                              <div class="icon-box float-left pr-2">
                                  <i class="fa fa-graduation-cap fontize"></i>
                              </div>
                              <div class="details">
                                  <h5 class="fontcolor font-weight-bold">District search</h5>
                              </div>
                      </div>
                      </div>
                  </div>
          </div>
          <div class="col-md-12 mb-2">
                  <div class="card w3-border-red w3-hover-red"  id="communitySectionbtn">
                      <div class="card-title" id="advance">
                          <div class="single-sidebar-menu-box w3-round-medium px-3">
                      
                              <div class="icon-box float-left pr-2">
                                  <i class="fa fa-graduation-cap fontize"></i>
                              </div>
                              <div class="details">
                                  <h5 class="fontcolor font-weight-bold">Community search</h5>
                              </div>
                      </div>
                      </div>
                  </div>
          </div>
          <!-- <div class="col-md-12 mb-2">
                  <div class="card w3-border-red w3-hover-red"  id="zodiacSectionbtn">
                      <div class="card-title" id="advance">
                          <div class="single-sidebar-menu-box w3-round-medium px-3">
                      
                              <div class="icon-box float-left pr-2">
                                  <i class="fa fa-graduation-cap fontize"></i>
                              </div>
                              <div class="details">
                                  <h5 class="fontcolor font-weight-bold">Zodiac search</h5>
                              </div>
                      </div>
                      </div>
                  </div>
          </div> -->
  
  
          <div class="col-md-12 mb-2">
                  <div class="card w3-border-red w3-hover-red " id="countySectionbtn">
                      <div class="card-title" id="education" >
                          <div class="single-sidebar-menu-box w3-round-medium px-3">
                      
                              <div class="icon-box float-left pr-2">
                                  <i class="fa fa-graduation-cap fontize"></i>
                              </div>
                              <div class="details">
                                  <h5 class="fontcolor font-weight-bold">Country search</h5>
                              </div>
                      </div>
                      </div>
                  </div>
          </div>

      
      </div>
  </div>
  
  </aside>

            </div>
            <div class="col-md-9">
                @include('alerts.alerts')

                <div class="card" id="allsearch">
                    <div class="card-body" style="min-height: 400px">
                    <form method="Get" action="{{ route('allsearch.result')}}">
                        {{ csrf_field() }}
                    <div id="addSection">
                        
                    </div>
                <button type="submit" class="float-right btn" style="background: #F15C62">
                      <i class="fa fa-search"></i> Search</button>
               </form>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <br>
@endsection
@push('js')
<script>
$(document).ready(function(){

    var data=`<div id="advanceSection">
                <h3>Advance Search</h3>
                <hr>
                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Min age</label>

                                        <select class="form-control  simple-select2 w-100" id="minimum_age"
                                            name="minimum_age">

                                            <option value="">Select Minimum Age </option>
                                            @if (isset($minimum_age))
                                                <option selected>{{ $minimum_age }}</option>
                                            @endif

                                            @for ($i = 16; $i <= 60; $i++)
                                                {{-- @if ($u->searchTerm->min_age != $i) --}}
                                                <option>{{ $i }}</option>
                                                {{-- @endif --}}
                                            @endfor

                                        </select>

                                        @if ($errors->has('minimum_age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('minimum_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="religion">Religion</label>

                                        <select class="form-control  simple-select2 w-100" id="religion" name="religion">

                                            <option value="">Select Religion</option>
                                            {{-- @if ($u->searchTerm->gender)
                                            <option selected>{{ $u->searchTerm->gender }}</option>
                                        @endif --}}

                                            @if (isset($religion))
                                                <option selected>{{ $religion }}</option>
                                            @endif
                                            <option value="">Select...</option>
                                            @foreach($religions as $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('religion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('religion') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="education_level">Education Level</label>

                                        <select class="form-control  simple-select2 w-100" id="education_level"
                                            name="education_level">



                                            @if (isset($education_level))
                                                <option selected>{{ $education_level }}</option>
                                                <option value="Any">Any</option>
                                            @else
                                                <option value="Any">Any</option>
                                            @endif


                                            {{-- id:26, title:education_level --}}
                                            @foreach ($userSettingFields[25]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach


                                        </select>



                                        @if ($errors->has('education_level'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('education_level') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>

                                        <select class="form-control country w-100 " id=""
                                            name="country">

                                            {{-- @if (isset($profession))
                                                <option selected>{{ $profession }}</option>
                                                <option value="Any">Any</option>
                                            @endif
                                            --}}
                                            <option selected value="Any">Any</option>

                                            @foreach ($userSettingFields[2]->values as $value)
                                                <option value="{{ $value->title }}">{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>





                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Max age</label>

                                        <select class="form-control  simple-select2 w-100" id="maximum_age"
                                            name="maximum_age">

                                            <option value="">Select Maximum Age </option>


                                            @if (isset($maximum_age))
                                                <option selected>{{ $maximum_age }}</option>
                                            @endif

                                            @for ($i = 18; $i <= 80; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor

                                        </select>


                                        @if ($errors->has('maximum_age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('maximum_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="marital_status">Marital Status</label>

                                        <select class="form-control  simple-select2 w-100" id="marital_status"
                                            name="marital_status">
                                            @if (isset($marital_status))
                                                <option selected>{{ $marital_status }}</option>
                                                <option value="Any">Any</option>
                                            @else
                                                <option selected value="Any">Any</option>
                                            @endif
                                            {{-- id:11, title:marital_status --}}
                                            @foreach ($userSettingFields[10]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('marital_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('marital_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="profession">Profession</label>

                                        <select class="form-control  simple-select2 w-100" id="profession"
                                            name="profession">

                                            @if (isset($profession))
                                                <option selected>{{ $profession }}</option>
                                                <option value="Any">Any</option>
                                            @endif
                                            <option selected value="Any">Any</option>
                                            {{-- id:27, title:profession --}}
                                            @foreach ($userSettingFields[26]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group areaId" id="areaId">
                                        <label for="profession">Area</label>

                                        <select class="form-control w-100"
                                            name="area">

                                            <option selected value="Any">Any</option>
                                            {{-- id:27, title:profession --}}
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->name}}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                </div>
                </div>`

    $("#addSection").empty().append(data);











$("#professionSectionbtn").click(function(){

    var data=` <div id="professionSection" >
                        <h3>Profession Search</h3>
                          <hr>
                            <div class="form-group">
                                <label for="">Select Profession</label>
                                <select class="form-control  simple-select2 w-100" id="profession" name="profession">
                                    @foreach ($userSettingFields[26]->values as $value)
                                        <option value="{{ $value->title }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>`
    $("#addSection").empty().append(data);
    
    $(this).addClass('active');
    $("#distcitSectionbtn").removeClass('active');
    $("#communitySectionbtn").removeClass('active');
    $("#zodiacSectionbtn").removeClass('active');
    $("#countySectionbtn").removeClass('active');
    $("#advanceSectionbtn").removeClass('active');
    $("#eductionSectionbtn").removeClass('active');
});
$("#eductionSectionbtn").click(function(){
    var data=`<div id="educationSection">
                        <h3>Education Search</h3>
                          <hr>
                            <div class="form-group">
                                <label for="">Select Education</label>
                                <select class="form-control  simple-select2 w-100" id="education" name="education_level">
                                    @foreach ($userSettingFields[25]->values as $value)
                                        <option value="{{ $value->title }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>`
    $("#addSection").empty().append(data);


    $(this).addClass('active');
    $("#distcitSectionbtn").removeClass('active');
    $("#communitySectionbtn").removeClass('active');
    $("#zodiacSectionbtn").removeClass('active');
    $("#countySectionbtn").removeClass('active');
    $("#advanceSectionbtn").removeClass('active');
    $("#professionSectionbtn").removeClass('active');
});
$("#distcitSectionbtn").click(function(){
    var data=`<div id="districtSection">
                        <h3>District Search</h3>
                          <hr>
                            <div class="form-group">
                                <label for="">Select District</label>
                                <select class="form-control  simple-select2 w-100" id="district" name="area">
                                    @foreach ($districts as $value)
                                        <option>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>`
    $("#addSection").empty().append(data);

    $(this).addClass('active');
    $("#eductionSectionbtn").removeClass('active');
    $("#professionSectionbtn").removeClass('active');
    $("#communitySectionbtn").removeClass('active');
    $("#zodiacSectionbtn").removeClass('active');
    $("#countySectionbtn").removeClass('active');
    $("#advanceSectionbtn").removeClass('active');
});
$("#communitySectionbtn").click(function(){

    var data=`                    <div id="communitySection">
                    <h3>Community Search</h3>
                     <hr>
                    <div class="form-group">
                        <label for="">Select Community</label>
                        <select class="form-control  simple-select2 w-100" id="community" name="religion">
                            @foreach ($religions as $value)
                                <option>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>`
    $("#addSection").empty().append(data);




    $(this).addClass('active');
    $("#eductionSectionbtn").removeClass('active');
    $("#professionSectionbtn").removeClass('active');
    $("#distcitSectionbtn").removeClass('active');
    $("#zodiacSectionbtn").removeClass('active');
    $("#countySectionbtn").removeClass('active');
    $("#advanceSectionbtn").removeClass('active');
});

$("#zodiacSectionbtn").click(function(){
    var data=`                 <div id="ZodiacSection">
                <h3>Zodiac Search</h3>
                <hr>
                  <div class="form-group">
                      <label for="">Select Zodiac</label>
                      <select class="form-control  simple-select2 w-100" id="zodiac" name="zodiac">
                          @foreach ($religions as $value)
                              <option>{{ $value->name }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>`
    $("#addSection").empty().append(data);


    $(this).addClass('active');
    $("#eductionSectionbtn").removeClass('active');
    $("#professionSectionbtn").removeClass('active');
    $("#distcitSectionbtn").removeClass('active');
    $("#communitySectionbtn").removeClass('active');
    $("#countySectionbtn").removeClass('active');
    $("#advanceSectionbtn").removeClass('active');

});
$("#countySectionbtn").click(function(){
    var data=`                 <div id="countrySection">
                <h3>Country Search</h3>
                <hr>
                 <div class="form-group">
                     <label for="">Select Country</label>
                     <select class="form-control  simple-select2 w-100" id="country" name="country">
                        @foreach ($userSettingFields[2]->values as $value)
                        <option value="{{ $value->title }}">{{ $value->title }}</option>
                        @endforeach
                     </select>
                 </div>
                </div>`
    $("#addSection").empty().append(data);



    $(this).addClass('active');
    $("#eductionSectionbtn").removeClass('active');
    $("#professionSectionbtn").removeClass('active');
    $("#distcitSectionbtn").removeClass('active');
    $("#communitySectionbtn").removeClass('active');
    $("#zodiacSectionbtn").removeClass('active');
    $("#advanceSectionbtn").removeClass('active');
});
$("#advanceSectionbtn").click(function(){
   
    var data=`<div id="advanceSection">
                <h3>Advance Search</h3>
                <hr>
                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Min age</label>

                                        <select class="form-control  simple-select2 w-100" id="minimum_age"
                                            name="minimum_age">

                                            <option value="">Select Minimum Age </option>
                                            @if (isset($minimum_age))
                                                <option selected>{{ $minimum_age }}</option>
                                            @endif

                                            @for ($i = 16; $i <= 60; $i++)
                                                {{-- @if ($u->searchTerm->min_age != $i) --}}
                                                <option>{{ $i }}</option>
                                                {{-- @endif --}}
                                            @endfor

                                        </select>

                                        @if ($errors->has('minimum_age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('minimum_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="religion">Religion</label>

                                        <select class="form-control  simple-select2 w-100" id="religion" name="religion">

                                            <option value="">Select Religion</option>
                                            {{-- @if ($u->searchTerm->gender)
                                            <option selected>{{ $u->searchTerm->gender }}</option>
                                        @endif --}}

                                            @if (isset($religion))
                                                <option selected>{{ $religion }}</option>
                                            @endif
                                            <option value="">Select...</option>
                                            @foreach($religions as $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('religion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('religion') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="education_level">Education Level</label>

                                        <select class="form-control  simple-select2 w-100" id="education_level"
                                            name="education_level">



                                            @if (isset($education_level))
                                                <option selected>{{ $education_level }}</option>
                                                <option value="Any">Any</option>
                                            @else
                                                <option value="Any">Any</option>
                                            @endif


                                            {{-- id:26, title:education_level --}}
                                            @foreach ($userSettingFields[25]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach


                                        </select>



                                        @if ($errors->has('education_level'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('education_level') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>

                                        <select class="form-control country w-100 " id=""
                                            name="country">

                                            {{-- @if (isset($profession))
                                                <option selected>{{ $profession }}</option>
                                                <option value="Any">Any</option>
                                            @endif
                                            --}}
                                            <option selected value="Any">Any</option>

                                            @foreach ($userSettingFields[2]->values as $value)
                                                <option value="{{ $value->title }}">{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>





                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Max age</label>

                                        <select class="form-control  simple-select2 w-100" id="maximum_age"
                                            name="maximum_age">

                                            <option value="">Select Maximum Age </option>


                                            @if (isset($maximum_age))
                                                <option selected>{{ $maximum_age }}</option>
                                            @endif

                                            @for ($i = 18; $i <= 80; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor

                                        </select>


                                        @if ($errors->has('maximum_age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('maximum_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="marital_status">Marital Status</label>

                                        <select class="form-control  simple-select2 w-100" id="marital_status"
                                            name="marital_status">
                                            @if (isset($marital_status))
                                                <option selected>{{ $marital_status }}</option>
                                                <option value="Any">Any</option>
                                            @else
                                                <option selected value="Any">Any</option>
                                            @endif
                                            {{-- id:11, title:marital_status --}}
                                            @foreach ($userSettingFields[10]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('marital_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('marital_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="profession">Profession</label>

                                        <select class="form-control  simple-select2 w-100" id="profession"
                                            name="profession">

                                            @if (isset($profession))
                                                <option selected>{{ $profession }}</option>
                                                <option value="Any">Any</option>
                                            @endif
                                            <option selected value="Any">Any</option>
                                            {{-- id:27, title:profession --}}
                                            @foreach ($userSettingFields[26]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group areaId" id="areaId">
                                        <label for="profession">Area</label>

                                        <select class="form-control w-100"
                                            name="area">

                                            <option selected value="Any">Any</option>
                                            {{-- id:27, title:profession --}}
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->name}}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                </div>
                </div>`
    $("#addSection").empty().append(data);


    $(this).addClass('active');
    $("#eductionSectionbtn").removeClass('active');
    $("#professionSectionbtn").removeClass('active');
    $("#distcitSectionbtn").removeClass('active');
    $("#communitySectionbtn").removeClass('active');
    $("#zodiacSectionbtn").removeClass('active');
    $("#countySectionbtn").removeClass('active');
});







  $(".country").change(function(){
    var that =$(this);
    var country=that.val();
    if(country == 'Bangladesh'){
        $("#areaId").show();
    }else{
        $("#areaId").hide();
    }


  });
});

</script>
@endpush
