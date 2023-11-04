<form class="form-horizontal" role="form" method="post" action="{{route('admin.paymentAddNewPost')}}">

{{csrf_field()}}

	<div class="row">
		<div class="col-sm-6">

  <div class="form-group">
    <label class="control-label col-sm-3" for="email">User:</label>
    <div class="col-sm-9">

        {{-- <select id="email-"
            name="email"
            class="form-control select2-email  select2-container step2-select select2 "
            data-placeholder="Name, Email, Usernam, or Mobile Number"
            data-ajax-url="{{route('admin.selectNewRole')}}"
            data-ajax-cache="true"
            data-ajax-dataType="json"
            data-ajax-delay="200"
            style="width: 100%;">
                <option>{{old('email')}}</option>
              </select> --}}


              {{-- <select id="email-saif"
              name="email"
              class="form-control  select2-saif"
              data-placeholder="Name, Email, Usernam, or Mobile Number"
              data-ajax-url="{{route('admin.selectNewRole')}}"
              data-ajax-cache="true"
              data-ajax-dataType="json"
              data-ajax-delay="200"
              style="width: 100%;">
                  <option>{{old('email')}}</option>
                </select> --}}
                <input
                type="email"
                id="email"
                class="form-control"
                name="email"
                value="{{old('email')}}"
                placeholder="Email Account"
                step="1"
                />


            @if( $errors->has('email') )
              <span class="help-block">{{ $errors->first('email') }}</span>
            @endif

    </div>
  </div>

	<div class="form-group form-group-sm {{ $errors->has('package') ? ' has-error' : '' }}">
                <label class="control-label col-sm-3" for="package">Package:</label>

                <div class="col-sm-9">
       <select class="form-control form-group-sm" id="package" name="package">
                <option value="">Select Package </option>
                @if(old('package'))
                <option selected>{{old('package')}}</option>
                @endif
                {{-- packages --}}
                @foreach ($packages as $package)
                  <option value="{{ $package->id }}">{{ $package->id }} ({{$package->package_title}}, Duration {{$package->package_duration}} Days, {{$package->package_currency}} {{$package->package_amount}})</option>
                @endforeach
              </select>
                @if ($errors->has('package'))
                <span class="help-block">
                    <strong>{{ $errors->first('package') }}</strong>
                </span>
                @endif
    </div>


            </div>



    <div class="form-group form-group-sm {{ $errors->has('paid_amount') ? ' has-error' : '' }}">
        <label class="control-label col-sm-3" for="paid_amount">Paid Amount:</label>

        <div class="col-sm-9">

        	<input
        type="number"
        id="paid_amount"
        class="form-control"
        name="paid_amount"
        value="{{old('paid_amount')}}"
        placeholder="Paid Amount"
        step="1"
        />

    	</div>


        @if($errors->has('paid_amount'))

        <span class="help-block">
            <strong>{{ $errors->first('paid_amount') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group form-group-sm {{ $errors->has('paid_currency') ? ' has-error' : '' }}">
        <label class="control-label col-sm-3" for="paid_currency">Currency:</label>

        <div class="col-sm-9">

        	<div class="form-check">
		        <label class="form-check-label">
		            <input class="form-check-input" type="radio" name="paid_currency" id="exampleRadios1" value="BDT" {{old('paid_currency') == 'BDT' ? 'checked' : ''}} /> BDT
		            <span class="circle">
		                <span class="check"></span>
		            </span>
		        </label>
		    </div>

            <div class="form-check">
		        <label class="form-check-label">
		            <input class="form-check-input" type="radio" name="paid_currency" id="exampleRadios2" value="USD" {{old('paid_currency') == 'USD' ? 'checked' : ''}} /> USD
		            <span class="circle">
		                <span class="check"></span>
		            </span>
		        </label>
		    </div>



    	</div>


        @if($errors->has('paid_currency'))

        <span class="help-block">
            <strong>{{ $errors->first('paid_currency') }}</strong>
        </span>

        @endif
    </div>


		</div>
		<div class="col-sm-6">


	<div class="form-group form-group-sm {{ $errors->has('payment_method') ? ' has-error' : '' }}">
    <label class="control-label col-sm-3" for="payment_method">Payment Method:</label>

    <div class="col-sm-9">
      <select class="form-control form-group-sm" id="payment_method" name="payment_method">
    <option value="">Select Payment Method </option>
    @if(old('payment_method'))
    <option selected>{{old('payment_method')}}</option>
    @endif

    <option>bKash</option>
    <option>Rocket</option>
    <option>Bank</option>
    <option>Money Gram</option>
    <option>Western Union</option>
    <option>Hand Cash</option>

  </select>
    </div>


    @if ($errors->has('payment_method'))
    <span class="help-block">
        <strong>{{ $errors->first('payment_method') }}</strong>
    </span>
    @endif
</div>



<div class="form-group {{ $errors->has('payment_details') ? ' has-error' : '' }}">
        <label class="control-label col-sm-3" for="payment_details">Payment Details:</label>

    <div class="col-sm-9">
      <textarea
        class="form-control"
        name="payment_details"
        id="payment_details"
        cols="30"
        rows="3"
        placeholder="Payment Details with transaction information"
        />{{old('payment_details')}}</textarea>
    </div>


        @if($errors->has('payment_details'))

        <span class="help-block">
            <strong>{{ $errors->first('payment_details') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group form-group-sm {{ $errors->has('admin_comment') ? ' has-error' : '' }}">
        <label class="control-label col-sm-3" for="admin_comment">Admin Comment:</label>

        <div class="col-sm-9">

        	<input
        type="text"
        id="admin_comment"
        class="form-control"
        name="admin_comment"
        value="{{old('admin_comment')}}"
        placeholder="Comment Submitted by Admin"
        step="1"
        />

    	</div>


        @if($errors->has('admin_comment'))

        <span class="help-block">
            <strong>{{ $errors->first('admin_comment') }}</strong>
        </span>

        @endif


    </div>

    <p>(New Package Duration (days) will be added with previous duration)</p>




 	<div class="col-sm-offset-3 col-sm-9">
 		 <button type="submit" class="btn btn-primary pull-right">Save & Validate</button>

 	</div>


		</div>
	</div>





</form>


@push('js')


{{-- <script>
  $(document).ready(function () {

  $('.select2-email').select2({

     minimumInputLength: 1,
    ajax: {
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        params.page = params.page || 1;
        // alert(data[0].s);
        var data = $.map(data, function (obj) {
         obj.id = obj.id || obj.email;
         obj.id =  obj.email;
        return obj;

        });

        var data = $.map(data, function (obj) {
          obj.text = obj.text || obj.mobile;
          return obj;
        });

        return {
          results: data,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
  });
});
</script> --}}
<script>
    $(document).ready(function(){
        var url= "{{ route('adminUserEmailMatch') }}"
        $("#email").focusout(function(){
            $.post(url, function(data, status){
       alert("Data: " + data + "\nStatus: " + status);
  });
  });
    });
</script>

{{-- <script>
    $(document).ready(function () {
    $('.select2-saif').select2({
      minimumInputLength: 1,
      theme: 'bootstrap4',
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 2;
          var data = $.map(data, function (obj) {

            obj.id = obj.id || obj.email;
            return obj;
          });
          console.log(data);
          var data = $.map(data, function (obj) {
            obj.text = obj.email || obj.email;
            return obj;
          });
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
    });
  });
  </script> --}}

@endpush




