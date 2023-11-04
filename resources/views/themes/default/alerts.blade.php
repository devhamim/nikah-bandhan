@if(session('success'))
<div class="alert alert-success alert-dismissable fade in">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success! </strong> {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissable fade in">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Oops! </strong> {{session('error')}}
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissable fade in">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Info! </strong> {{session('info')}}
</div>
@endif

