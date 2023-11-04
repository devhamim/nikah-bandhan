<form method="get" action="{{route('welcome.ambulanceListingPage')}}">

	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-5">
					<div class="form-group form-group-sm">
						<label for="name">FROM</label>
						<select id="from"
						name="from"
						class="form-control select2-container step2-select select2 from-select"
						data-placeholder="Uttara, Gazipur"
						data-ajax-url="{{route('welcome.fromPlaceSelect')}}"
						data-ajax-cache="true"
						data-ajax-dataType="json"
						data-ajax-delay="200"
						style="width: 100%;">
						@if($searchFrom)
						<option>{{$searchFrom}}</option>
						@endif

					</select>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group form-group-sm">
					<label for="name">TO</label>
					{{-- <input type="text" placeholder="Motijhil" class="form-control" id="name"> --}}
					<select id="to"
					name="to"
					class="form-control select2-container step2-select select2 to-select"
					data-placeholder="Motijhil, Shahbag"
					data-ajax-url="{{route('welcome.toPlaceSelectWithFrom')}}"
					data-ajax-cache="true"
					data-ajax-dataType="json"
					data-ajax-delay="200"
					style="width: 100%;">

					@if($searchTo)
					<option>{{$searchTo}}</option>
					@endif

				</select>
			</div>
		</div>
													{{-- <div class="col-md-3">
														<div class="form-group form-group-sm {{ $errors->has('ambulance_type') ? ' has-error' : '' }}">
															<label for="ambulance_type">Ambulance Type:</label>

															<select class="form-control" id="ambulance_type" name="ambulance_type">

																@foreach($carTypes as $car)
																@if(old('ambulance_type') == $car->car_type)
																@else
																<option value="{{$car->car_type}}">{{$car->car_type}}</option>
																@endif

																@endforeach
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-sm">
															<label for="name">Price(Tk):</label>
															<input type="text" placeholder=" 320" class="form-control" id="name">
														</div>
													</div> --}}

													<div class="col-md-2">
														<div class="form-group form-group-sm">
															<label for="name" ></label>
															<button style="margin-top: 3px;" type="submit" class="w3-button w3-blue w3-round w3-hover-green btn btn-md btn-block">Search</button>
														</div>
													</div>

													

												</div>
											</div>
										</div>

									</form>