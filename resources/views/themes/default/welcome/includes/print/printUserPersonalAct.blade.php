 <div class="w3-border-top w3-border-light-gray" style="min-height: 150px;">
<b>Personal Activities</b>
 

	@if($user->personalActivity)

 

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Interests
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalActivity->interests }}
  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Favourite Music
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalActivity->favourite_music }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Favourite Reads
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalActivity->favourite_reads }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Favourite Movies
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalActivity->favourite_movies }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Favourite Cooking
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalActivity->favourite_cooking }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Favourite Dress Style
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->personalActivity->dress_style }}
  </div>
</div>



		@endif
</div>
 