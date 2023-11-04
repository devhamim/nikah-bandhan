@extends('admin.master.dashboardmaster')
@push('css')

    <style type="text/css">
        .select2-dropdown .select2-search__field:focus,
        .select2-search--inline .select2-search__field:focus {
            outline: none !important;
            border: none !important;
        }

       .radio-inline {
    position: relative;
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 100 !important;
    vertical-align: middle;
    cursor: pointer;
}

    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Send Email SMS to <small>Users</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Send Email SMS to</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="container">
        @include('alerts.alerts')


        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"> Send Email/Sms to Users</h3>

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
                <div class="row">
                    <form method="post" action="{{route('admin.sendEmailSmsToUsersPost')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message_to_users" class="form-control" rows="5" id="message_to_users"
                                placeholder="Write Message">{!! old('message_to_users') ?: $post->message_to_users !!}</textarea>

                            @if ($errors->has('message_to_users'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('message_to_users') }}</strong>
                                </span>
                            @endif
                        </div>



                        <div class="form-group {{ $errors->has('send_to') ? ' has-error' : '' }}">
                            <label for="send_to" class="control-label">Send to</label>

                            <label class="radio-inline">
                                <input type="radio" name="send_to" value="incomplete_users" checked>Incomplete Profile Users
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="send_to" value="all_users">All (Active) Users
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="send_to" value="completed_users">Completed Profile Users
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="send_to" value="no_login_thirty_days">Users No Login 30 days
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="send_to" value="free_users">Free Users
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="send_to" value="paid_members">Paid Members
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="send_to" value="deactivate_users">Deactivated Users
                            </label>
                            @if ($errors->has('send_to'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('send_to') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('send_type') ? ' has-error' : '' }}">
                            <label for="send_type" class="control-label">Type</label>


                            <label class="radio-inline">
                                <input type="radio" name="send_type" checked value="sms">SMS
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="send_type" value="email">Email
                            </label>


                            <label class="radio-inline">
                                <input type="radio" name="send_type" value="email_sms">Email & SMS
                            </label>

                            @if ($errors->has('send_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('send_type') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary pull-right">Send</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </section>



@endsection
