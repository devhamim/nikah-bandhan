 


                    <div class="w3-card-2 " style="box-shadow: none !important">
                        <div class="w3-container_ w3-round w3-white text-left" style="min-height: 120px;">

                            <div class="text-center" style="padding-bottom: 40px; padding-top: 20px;">
                                <span class="w3-large">Meet your matched partner with a</span> <br>
                                <span  class="w3-xlarge">Free Registration ! </span>
                            </div>


<form action="{{route('signupPost')}}" method="post">
    @csrf
    

    <div class="container " style="margin-top: -20px;">

        <p><span class="">Full Name* </span><input type="text" class="pull-right w3-round w3-small pl-2" style="max-width: 260px;min-width: 220px;border: 1px solid {{ $errors->has('full_name') ? '#f00' : '#ccc' }};" placeholder="Full Name" name="full_name" value="{{old('full_name')}}" required></p>
    <p><span class="">Email* </span><input type="email" class="pull-right w3-round w3-small pl-2" value="{{old('email')}}" name="email" required style="max-width: 260px;min-width: 220px;border: 1px solid {{ $errors->has('email') ? '#f00' : '#ccc' }};" placeholder="Email"></p>

    <p><span class="">Mobile* </span><input type="text" class="pull-right w3-round w3-small pl-2" name="your_mobile" value="{{ old('your_mobile') }}" required style="max-width: 260px;min-width: 220px;border: 1px solid {{ $errors->has('your_mobile') ? '#f00' : '#ccc' }};" placeholder="Mobile"></p>

    <p><span class="">Guardian's Mobile*</span><input type="text" class="pull-right w3-round w3-small pl-2" name="guardian_mobile" value="{{ old('guardian_mobile') }}" required style="max-width: 260px;min-width: 220px;border: 1px solid {{ $errors->has('guardian_mobile') ? '#f00' : '#ccc' }};" placeholder="Guardian's Mobile"></p>

    <p><span>Country*</span> 
        <select name="country" required  id="" style="max-width: 260px;min-width: 220px;padding: 2px;border: 1px solid {{ $errors->has('country') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2" >
        <option value="">Select Country</option>
        @if (old('country'))
        <option selected value="{{ old('country') }}">{{ old('country') }}</option>
    @endif
    @foreach ($userSettingFields[2]->values as $value)
      @if ($value->title == 'Others')
        @elseif($value->title == 'Other')
        @else
          <option>{{ $value->title }}</option>
        @endif
    @endforeach
        </select>
    </p>

    <p><span>District*</span> 
        <select name="district" id="" required  style="max-width: 260px;min-width: 220px;padding: 2px;border: 1px solid {{ $errors->has('district') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2" >
        @if (old('district'))
        <option selected value="{{ old('district') }}">{{ old('district') }}</option>
        @endif

        <option value="">Select District</option>
  
        
        @foreach($districts as $district)
        <option>{{ $district->name }}</option>
        @endforeach
        </select>
    </p>


    <p><span>Religion*</span> 
        <select name="religion"  required   id="" style="max-width: 260px;min-width: 220px;padding: 2px;border: 1px solid {{ $errors->has('religion') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2" >
        @if (old('religion'))
        <option selected value="{{ old('religion') }}">{{ old('religion') }}</option>
        @endif
     <option  value="">Select Religion</option>
        
        {{-- ID:4, title:Religion/Community? --}}
        @foreach ($userSettingFields[3]->values as $value)

          <option>{{ $value->title }}</option>
        @endforeach
        </select>
    </p>

    <p><span>Marital Status*</span> 
        <select name="marital_status"  required   id="" style="max-width: 260px;min-width: 220px;padding: 2px;border: 1px solid {{ $errors->has('marital_status') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2" >
        @if (old('marital_status'))
        <option selected value="{{ old('marital_status') }}">{{ old('marital_status') }}</option>
        @endif
     <option value="" >Select Marital Status</option>
        
        {{-- ID:11, title:Marital Status? --}}
        @foreach ($userSettingFields[10]->values as $value)

          <option>{{ $value->title }}</option>
        @endforeach
        </select>
    </p>

    <p><span>Gender*</span> 
        <select name="gender" required  id="" style="max-width: 260px;min-width: 220px;padding: 2px;border: 1px solid {{ $errors->has('gender') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2">
        @if(old('gender'))
        <option selected>{{old('gender')}}</option>
        @endif
        <option value="">Select Your Gender </option>
        {{-- id:1, title:gender --}}
        @foreach ($userSettingFields[0]->values as $value)
          <option>{{ $value->title }}</option>
        @endforeach
        </select>
    </p>

    <p>
        <span>Date of Birth*</span>

        <select style="max-width: 70px;min-width: 70px;padding: 2px;border: 1px solid {{ $errors->has('year') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2" id="year" required  name="year">
                <option value="">Year</option>

                @if(old('year'))
                <option selected>{{old('year')}}</option>
                @endif
                @for ($i = date('Y') -17; $i >= date('Y') - 60; $i--)
                    <option>{{ $i }}</option>
                @endfor

              </select>


        <select required  style="max-width: 80px;min-width: 80px;padding: 2px;border: 1px solid {{ $errors->has('month') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2" id="month" name="month">
                @if(old('month'))
                <option selected>{{old('month')}}</option>
                @endif
                <option value="">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">Jun</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>

        <select required   id="day" name="day" style="max-width: 70px;min-width: 70px;padding: 2px;border: 1px solid {{ $errors->has('day') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2">
                @if(old('day'))
                <option selected>{{old('day')}}</option>
                @endif
                <option value="">Day</option>
                @for ($i = 1; $i <= 31; $i++)
                    <option>{{ $i }}</option>
                @endfor
                
              </select>


    </p>

    <p><span>Profession*</span> 
        <select name="profession" required style="max-width: 260px;min-width: 220px;padding: 2px;border: 1px solid {{ $errors->has('profession') ? '#f00' : '#ccc' }};" class="pull-right w3-round w3-small pl-2">
        <option value="">Select Profession</option>
        @if(old('profession'))
        <option  selected>{{old('profession')}}</option>
        
        @endif
        {{-- id:1, title:profession --}}
        @foreach ($userSettingFields[26]->values as $value)

        @if ($value->title == 'Others')
        @elseif($value->title == 'Other')
        @else
          <option>{{ $value->title }}</option>
        @endif
        
        @endforeach
      </select>
    </p>

    <input type="hidden" name="createdby" value="Self">

    {{-- <p><span class="">Password </span><input type="text" class="pull-right w3-round w3-small pl-2" style="max-width: 260px;min-width: 220px;border: 1px solid {{ $errors->has('profession') ? '#f00' : '#ccc' }};" placeholder="Password"></p> --}}
    
    <div class="row">
        <div class="col-sm-6">
            
    <p><input type="checkbox" checked> I have Read and agree to the <a href="{{ route('page','terms-and-condition') }}">T&C</a> and <a href="{{ route('page', 'privacy-policy') }}">Privacy Policy</a> </p>
        </div>

        <div class="col-sm-6">
            <button type="submit" class="signup-post-btn pull-right w3-indigo w3-round w3-large w3-btn" style="background-color: #d52379!important; margin-top:8px!important; float: left!important;">Register Free</button>
        </div>
    </div>

        
    </div>
    
    
</form>
                            
     </div>
</div>