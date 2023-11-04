<?php $u = Auth::user(); ?>


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

			<div class="box box-widget">
				<div class="box-header with-border">
					<h3 class="box-title">My Conversation / Complain / Report / Comments to Admin</h3>
				</div>
				<div class="box-body">

					@include('alerts.alerts')

					<div class="w3-border w3-border-purple w3-round">
						<div class="w3-container w3-padding">




							<form  action="{{ route('user.myCommentPost') }}" method="post">
								{{csrf_field()}}


								<textarea name="comment" class="form-control w3-round w3-border w3-padding" id="comment" placeholder="Write complain about service, employee or others.."  rows="3" style="width: 100%;">{{ old('comment') }}</textarea>

								<br>


								<button type="submit" class="w3-btn w3-purple w3-round w3-border w3-border-purple w3-left w3-hover-purple btn-sm"> Submit</button>


							</form>

						</div>
					</div>

				</div>



				<div class="box-footer " style="background: #eee;">


					@foreach($u->adminUserComments() as $message)
					<div class="media border p-3 w3-white w3-round">
					  <img src="{{($message->user_id == $message->addedby_id) ? asset($u->latestCheckedPP()) : asset($u->pp())  }}" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
					  <div class="media-body">
					    <h4> {{ ($message->user_id == $message->addedby_id) ? $u->email : 'Admin' }} <small><i>Posted on {{ date('d M Y', strtotime($message->created_at)) }}</i></small></h4>
					    <p>{{ $message->comment }}</p>
					  </div>
					</div>

					<br>

					@endforeach

				</div>
			</div>


			<div class="text-center">
				{{ $u->adminUserComments()->render() }}
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
{{-- @include('welcome.includes.others.hotLineImage') --}}
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
