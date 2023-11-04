
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Quick SMS</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" method="post" action="{{route('admin.quickSmsDraftSendPost',$bulk)}}">

            {{ csrf_field() }}                                    <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label"><small>Recipients <br>(Separate by Comma)</small></label>
                <div class="col-sm-9">
                    <?php $contacts = ''; ?>
                    @foreach($bulk->contacts as $contact)
                    <?php $contacts = $contacts.$contact->mobile.','; ?>
                    @endforeach
                    <textarea class="form-control" name="recipients" placeholder="Type Recipients With Comma">{{$contacts}}</textarea>
                    @if ($errors->has('recipients'))
                      <span class="help-block">
                          <strong>{{ $errors->first('recipients') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              {{-- <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label"><small>Sender Number <br> (eg. 01680000000)</small></label>
                <div class="col-sm-9">
                    <input type="text" value="{{ $bulk->sent_from}}" name="sender_number" class="form-control" id="sender_number" placeholder="Sender Number">
                    <span>Your Masking Number (Sender Number)</span><br>
                    @if ($errors->has('sender_number'))
                      <span class="help-block">
                          <strong>{{ $errors->first('sender_number') }}</strong>
                      </span>
                  @endif
                </div>
              </div> --}}

              <div class="form-group row">
                <label><input type="checkbox" name="masking" {{ $bulk->sent_from ? 'checked' : '' }}>  Masking (VIP Media) </label>
                      @if ($errors->has('masking'))
                      <span class="help-block">
                          <strong>{{ $errors->first('masking') }}</strong>
                      </span>
                  @endif                                       <div class="col-sm-10">

                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label"><small>Message <br>(160 characters)</small></label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="5" name="message" placeholder="Message">{{$bulk->message}}</textarea>
                    @if ($errors->has('message'))
                      <span class="help-block">
                          <strong>{{ $errors->first('message') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

            </div>
            <div class="text-right">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Send</button>

                </div>                                    </div>

            <!-- /.card-footer -->
          </form>
      <!-- /.row -->
    </div>
</div>
