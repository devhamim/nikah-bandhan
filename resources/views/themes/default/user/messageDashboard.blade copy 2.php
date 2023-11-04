@extends('admin.master.dashboardmaster')
{{-- @section('title')

        {{Auth::user()->selectedName()}}'s message room

@endsection --}}


@push('css')
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" />
    <link href="{{ asset('style/msgDashboard.css') }}" rel='stylesheet' type='text/css'>


    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('alt3/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('alt3/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        .modal-open {
            overflow: unset;
        }

    </style>

    <style type="text/css">
        .input_box {
            color: #808080;
            width: 100%;
            /*height:30px;*/
            padding: 5px 0 0 5px;
            border: solid #b4bbcd 1px;
            outline: none;
            resize: none;
            border-radius: 3px;
        }

        @-moz-document url-prefix() {
            textarea.input_box {
                height: 65px;
            }
        }

    </style>
@endpush



@section('content')
    <?php $me = Auth::user(); ?>



    <div class="main main-raiseds " style="z-index: 400;margin-top: -20px;">
        <div class="section section-basic" style="min-height: 900px;">

            <div class="container">
               

                <div class="row">
                    <div class="col-sm-3">

                      

                    </div>
                    <div class="col-sm-9">


                        <div class="row">
                            <div class="col-md-4  offset-2">
                                <div class="text-center">
                                    <h4>Conversation</h4>
                                    @if ($userto)
                                        @include('user.parts.directChat')
                                    @else
                                        @include('user.parts.directChatWithoutUser')
                                    @endif
                                </div>

                            </div>
                        </div>


                                                    {{-- <div class="box box-widget mb-3 w3-border w3-border-purple">
                                    <div class="box-body box-body-container" style="background: #f8f8f8;">
                                        <div class="row">
                                            <div class="col-sm-7">
                                        
                                                    
                                        


                                            </div>
                                            </div>
                                    </div>
                                </div> --}}

                     
                    </div>
                </div>


            </div>
        </div>
    </div>



@endsection

@push('js')
    <!-- Bootstrap 4 -->
    <!-- AdminLTE App -->
    <script src="{{asset('alt3/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->

    <script>
        $(document).ready(function() {

            $(".direct-chat-messages").animate({
                scrollTop: $('.direct-chat-messages').prop("scrollHeight")
            }, 500);

            @if (isset($open))
                @if ($open)
                    $(".chat-contacts-btn").click();
                @endif
            @endif

        });
    </script>
@endpush