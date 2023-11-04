@if(Session::has('success'))
   <div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success! </strong>{{ Session::get('success') }}
</div>
@endif

@if(Session::has('info'))
   <div class="alert alert-info">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info! </strong>{{ Session::get('info') }}
</div>
@endif

@if(Session::has('error'))
   <div class="alert alert-error">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error! </strong>{{ Session::get('error') }}
</div>
@endif

<div class="alert alert-success cp-round w3-animate-zoom success-js-alert" style="display:none;">
    <div class="container">
        <div class="alert-icon">
            <i class="material-icons">check</i>
        </div>
        <button type="button" class="close success-js-alert-close" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
        </button>
        <b>Success:</b> Your data successfully submitted.
    </div>
</div>


