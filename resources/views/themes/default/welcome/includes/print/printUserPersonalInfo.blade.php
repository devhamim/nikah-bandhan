<div class="w3-border-top w3-border-light-gray" style="min-height: 200px;">
<b>Personal Information</b> <br>

	
@if($user->personalInfo)

 

<div class="row invoice-info">
  <div class="col-sm-4 invoice-col">


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Education Level
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->educationLevel() }}

  </div>
</div>



<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Major Subject
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->major_subject }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Job Title
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->job_title }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Company Name
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->job_company_name }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Profession
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->profession() }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Annual Income (BDT)
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->income }}

  </div>
</div>

<br>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Citizenship
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->citizen() }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
    Home District
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->city_of_residence }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  State / Division of Residence 
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->state_of_residence }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Country of Residence
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->countryOfResidence() }}

  </div>
</div>



		
	</div>
	<div class="col-sm-4 invoice-col">


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Father's Name
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->father_name }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Father's Occupation 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->father_occupation }}

  </div>
</div>



<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Mother's Name
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->mother_name }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Mother's Occupation
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->mother_occupation }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Number of Brother
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->number_of_brother }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  How many brother Married?
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->how_many_brother_married }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Number of Sister 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->number_of_sister }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  How many sister Married?
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->how_many_sister_married }}

  </div>
</div>
 
		


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  District 
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->district }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Thana
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->thana }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Zip Code / Post Code
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->zip_code }}

  </div>
</div>

<br>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  My Height 
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalInfo->height }}

  </div>
</div>




  </div>
<div class="col-sm-4 invoice-col">

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Blood Group
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->blood_group }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Body Type 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->body_build }}

  </div>
</div>

  <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Marital Status 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->marital_status }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Do you have children?
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->do_u_have_children }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Hair Color
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->hairColor() }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Eye Color
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->eyeColor() }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Skin Color
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->skinColor() }}

  </div>
</div>


  <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Zodiac Sign 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->zodiac_sign }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Any disabilities?
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->anyDisabilities() }}

  </div>
</div>

  <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Do I smoke?  
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->smoke_status }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Do I addicted to alcohol? 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->alcohol_status }}

  </div>
</div>


{{-- <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Diat Status 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->diat_status }}

  </div>
</div> --}}
 
<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Mother Tongue 
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->mother_tongue }}

  </div>
</div>


{{-- <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Can speak in
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->personalInfo->can_speak }}

  </div>
</div> --}}

</div>
</div>

@endif
</div> 