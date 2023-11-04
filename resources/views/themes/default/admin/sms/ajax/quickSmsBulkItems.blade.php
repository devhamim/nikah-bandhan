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
        <form class="form-horizontal" method="post"  action="">
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label"><small>Recipients <br>(Separate by Comma)</small></label>
                <div class="col-sm-9">
                    <?php $contacts = ''; ?>
                    @foreach($bulk->contacts as $contact)
                    <?php $contacts = $contacts.$contact->mobile.','; ?>
                    @endforeach
                    <textarea class="form-control" readonly name="recipients" placeholder="Type Recipients With Comma">{{$contacts}}</textarea>
                    @if ($errors->has('recipients'))
                      <span class="help-block">
                          <strong>{{ $errors->first('recipients') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label"><small>Sender Number <br> (eg. 01680000000)</small></label>
                <div class="col-sm-9">
                    <input type="text" readonly value="{{ $bulk->sent_from}}" name="sender_number" class="form-control" id="sender_number" placeholder="Sender Number">
                    <span>Your Masking Number (Sender Number)</span><br>
                    @if ($errors->has('sender_number'))
                      <span class="help-block">
                          <strong>{{ $errors->first('sender_number') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label"><small>Message <br>(160 characters)</small></label>
                <div class="col-sm-9">
                    <textarea class="form-control" readonly rows="5" name="message" placeholder="Message">{{$bulk->message}}</textarea>
                    @if ($errors->has('message'))
                      <span class="help-block">
                          <strong>{{ $errors->first('message') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

            </div>
            <div class="text-right">
                <a class="btn btn-primary" href="{{route('admin.quickSmsBulkItemsResend', $bulk)}}">Resend</a>
            </div>

            <!-- /.card-footer -->
          </form>
      <!-- /.row -->
    </div>
</div>

