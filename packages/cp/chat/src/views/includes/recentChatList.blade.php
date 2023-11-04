<div class="box box-widget">
<div class="box-header with-border">
<i class="fi-torsos-male-female"></i>
  <h3 class="box-title">Recent Conversation</h3>
  {{-- <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  </div> --}}
</div><!-- /.box-header -->
<div class="box-body chat my-chats" id="chat-box">
  <ul class="products-list product-list-in-box">


<?php $chatto = Auth::user()->chattoAll; ?>
  <div class="chatsLastPage" data-lastpage="{{$chatto->lastPage()}}" data-url ="{{route('chatParticipantsAuto')}}"></div>
  <ul class="products-list product-list-in-box">
  <div class="chatsAuto">
  @include('chat::ajaxBlades.chatsAll')
  </div>
  </ul>

  <div class="loadingChats" style="display: none;"><span class='load fa fa-refresh fa-spin text-green'></span> Loading...</div>
  <div class="fallback chatsAllRender" style="display: none;">
    
  </div>

  </ul>
</div><!-- /.box-body -->
<div class="box-footer">
</div><!-- /.box-footer -->
</div><!-- /.box -->