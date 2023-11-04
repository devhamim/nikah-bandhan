@extends('welcome.layouts.welcomeMasterForUser')
{{-- @section('title')

        {{Auth::user()->selectedName()}}'s message room

@endsection --}}


@push('css') 
<link href="{{asset('css/user.css')}}" rel="stylesheet" />
<link href="{{asset('style/msgDashboard.css')}}" rel='stylesheet' type='text/css'>

<style>
    .modal-open {
    overflow: unset;
}
</style>

<style type="text/css">

.input_box{
    color:#808080;
    width:100%;
    /*height:30px;*/
    padding:5px 0 0 5px;
    border:solid #b4bbcd 1px;
    outline:none;
    resize:none;
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

    <div class="box box-widget mb-3 w3-border w3-border-purple">
        <div class="box-body box-body-container" style="background: #f8f8f8;">




            <div class="row">
        <div class="col-sm-5">
        <div>
          
            <?php $u = Auth::user(); ?>
            @include('chat::includes.recentChatList')
            </div>


        </div><!-- /.col -->

        <div class="col-sm-7">
            <div class="msgForm">
                @if($user_type == 'user_new')
                    @include('chat::includes.formNewMsg')
                @elseif($user_type == 'user_no')
                    @include('chat::includes.formNoUserMsg')
                @elseif($user_type == 'user_old')
                    @include('chat::includes.formOldMsg')
                @endif
            </div>

              <div id="newPost"></div>

              

            <div class="usersAuto">
            <div class="dataLastPage" data-lastpage=""></div>
            
            </div>

            <div class="loading" style="display: none;"><span class='load ion-load-c fa fa-spin'></span> Loading...</div>
            <div class="fallback wallPostRender">
              
            </div>


        </div><!-- /.col -->
        <div class="col-md-4 hidden-sm hidden-xs">
          <div class="pull-right affix" style="width: 25%;">
             
        </div>
          
        </div>
    </div><!-- /.row -->

 

             

        </div>

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
@endif

</div>
</div>


</div>
</div>
</div>


 
@endsection

@push('js') 
<script src="{{asset('js/user.min.js')}}"></script>
<script src="{{asset('js/msgDashboard.min.js')}}"></script>
@endpush
