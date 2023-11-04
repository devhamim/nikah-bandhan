
<div class="main main-raiseds "  style="z-index: 400;margin-top: -20px;">
<div class="section section-basic" style="min-height: 900px;">

<div class="container">



    <div class="row">
            <div class="col-sm-12">
              <div class="box box-widget" style="border-top: 2px solid purple;">
                <div class="box-header">
                   @include('user.includes.timeline.timelineTopBtns')
                </div>
              </div>
            </div>
          </div>


          

<div class="row">
<div class="col-sm-3">

@if (Browser::isDesktop())
@include('user.includes.others.myLeftMenu')
@endif

</div>
<div class="col-sm-9">



<div class="box box-widget mb-3">
<div class="box-body box-body-container" style="background: #fbfbfb;">

<div class="row">
<div class="col-sm-12">

@include('alerts.alerts')

<div class="box box-widget">
<div class="box-header with-border">
<h3 class="box-title">Upload CV / Biodata / Resume</h3>
</div>
<div class="box-body">



<div class="row">
<div class="col-sm-4">

@if(!$me->cv_checked)

@include('user.photos.includes.cvUploadByUser')

@endif

@if($me->file_name)

<div class="w3-border w3-round w3-border-purple w3-padding">
    


<b>CV / Biodata:  </b>

@if($me->fileIsImage())
<img title="File type is Image" data-toggle="tooltip"  width="50" src="{{ asset('img/image.png') }}" alt="CV">

@elseif($me->fileIsPdf())
<img  title="File type is Pdf" data-toggle="tooltip" width="50" src="{{ asset('img/pdf.png') }}" alt="CV">
@elseif($me->fileIsWord())
<img title="File type is MSWord" data-toggle="tooltip"  width="50" src="{{ asset('img/word.png') }}" alt="CV">
@endif

<div style="float: left;">
    
    @if($me->cvStatus() == 'Pending')
    <b>Status:</b> <span class="w3-text-red">Pending</span>
    @elseif($me->cvStatus() == 'Checked')
    <b>Status:</b> <span class="w3-text-green">Checked</span>
    @endif 

    

    <br> <br>
</div>

<br> <br>

<a class="btn btn-xs  w3-btn w3-blue" href="{{ asset('storage/users/cv/'. $me->file_name) }}" download="my_cv_{{ $me->id }}_{{ rand(100,999) }}_{{ date('d-m-Y') }}_.{{ $me->file_ext }}">
     Download
</a>
</div>
@endif





</div>
<div class="col-sm-8">
<ul>
    <li>Upload pdf, msword or image file</li>
    <li>If CV is image file, upload Clear image.</li>
    
    <li>If Image, Size: Maximum Width: 2000px; Maximum Height: 2000px</li>

    <li>When you successfully upload your CV, wait until checked & reviewed it by our support team.</li>

    <li>If you need to change your previously checked cv, please, contact us at <b><a href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}">+{{ bdMobile(env('CONTACT_MOBILE1')) }}</a></b>.</li>
 

    
</ul>




</div>
</div>
</div>
</div>

</div>

</div>






</div>

{{-- overlay here --}}

<!-- Loading (remove the following to stop the loading)-->
<div class="overlay my-loading-overlay" style="display: none;">
<i class="fa fa-circle-o-notch w3-jumbo w3-text-red fa-spin" style="top: 20%;"></i>

</div>
<!-- end loading -->
</div>


@if (Browser::isDesktop())
@else
@include('welcome.includes.others.hotLineImage')
@include('welcome.includes.others.ourWebsiteVisitors')
<div class="w3-card-2">
<div class="box box-widget">         
<div class="box-body">
@include('welcome.includes.others.fbPageArea')
</div>
</div>
</div>
@endif


</div>
</div>


</div>
</div>
</div>
