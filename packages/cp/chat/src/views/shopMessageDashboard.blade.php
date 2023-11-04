@extends('user.layoutUser.masterUser')
@section('title')
<?php $u = Auth::User(); ?>
    {{$shop->title}}'s Message Room
@endsection

@section('css')

<link href="{{asset('style/dealPermission.css')}}" rel='stylesheet'>
<link href="{{asset('style/shopMsgDashboard.css')}}" rel='stylesheet'>

<style type="text/css">


</style>
@endsection

@section('content')

<section class="content">
 <div class="row">
    <div class="col-md-3">
        @include('chat::includes.recentChatOfShop')

    </div> <!--Content col End -->

    <div class="col-md-6">
      <div class="msgForm">
                @if($user_type == 'user_old')
                    @include('chat::includes.formOldMsg')
                @elseif($user_type == 'shop_old')
                    @include('chat::includes.formOldMsg')
                @elseif($user_type == 'bazar_old')
                    @include('chat::includes.formOldMsg')
                @elseif($user_type == 'user_no')
                    @include('chat::includes.formNoUserMsg')
                @endif
            </div>
        {{-- @include('chat::includes.formNewMsgForShop') --}}

    </div> <!--Content col End -->

            <div class="col-sm-3 hidden-xs">
            {{-- <div style="padding-right: 15px;" data-spy="affix" data-offset-top="0"> --}}
            <div class="sidebar-nav-fixed pull-right affix" style="width: 18%">
        @include('smartshop::shop.includes.shopUpgradeMsg')

            </div>
            <!--/sidebar-nav-fixed -->
    </div>
 </div><!-- Cotent Row End -->



 <div class="row"><!-- Cotent Row Start -->

  <div class="col col-md-8 col-lg-8  col-sm-12">
    @include('alerts')
</div>
 </div><!-- Cotent Row End -->

    <div class="row">
        <div class="col-md-12">
        @include('smartshop::shop.includes.myModal')
        @include('smartshop::shop.includes.myModalFirst')
        @include('smartshop::shop.includes.myModalLarge')
        </div>
    </div>
</section><!-- Cotent Wrapper End -->
@endsection

@section('js')


<script src="{{asset('js/cart.js')}}"></script>
{{-- <script src="{{asset('js/notunPonno.js')}}"></script> --}}
{{-- <script src="{{asset('js/dokan.js')}}"></script> --}}
<script src="{{asset('js/msgDashboard.min.js')}}"></script>
<script type="text/javascript">

</script>


@endsection
