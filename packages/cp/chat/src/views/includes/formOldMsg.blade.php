@if($chatable->user())
<div class="box box-widget">

    <div class="box-header with-border">
      <i class="fa fa-comments-o"></i>
      <h3 class="box-title">{{$ru->username}}</h3>

    </div>
        <?php $chatBus = $chatable->chatBus; ?>
      <div class="dataLastPage" data-lastpage="{{$chatBus->lastPage()}}" data-url ="{{route('publishedMessageAuto',['chatable'=>$chatable])}}"></div>

      <div class="message-list box-body chat" id="chat-box">

    @if($chatable->publishes->count() > $chatBus->count())
    <div class="loadingMessages pull-right" style="display: none; padding-right: 80px;"><span class='fa fa-refresh fa-spin text-green w3-large'></span> Loading...</div>

    <br/>
    @endif




    <span class="previousChatMessage"></span>

        @include('chat::includes.messagesAll')

{{--     <span class="newChatMessage"></span> --}}

    <div class="newChatMessage" data-url ="{{route('newMsg',['chatable'=>$chatable])}}"></div>


        </div>


<div class="box-footer">
  
        <form role="form"  class="msgForm" id="msgForm" method="POST" action="{{route('msgCreateContinue',['chat'=>$chatable->chat])}}">    


        {{csrf_field()}}

       
{{--               <div id="dropzone-msg" class="dropzone" data-url="{{route('newMsgFile',['user'=>$ru->id])}}">
              </div>
              <br> --}}
          

              <!-- textarea -->
              <div class="form-group">
                <textarea class="form-control input_box" name="message_body" rows="3" placeholder="Write Your Message..."></textarea>
              </div>    
        

            <div class="form-group text-center">

<button style="margin-top: 12px;margin-right: 10px;" type="submit" id="btn_msg_post_final" class="btn-xs pull-right btn btn-default w3-purple" data-submit-url="{{route('msgNewCreate')}}"><span class="fa fa-share"></span><span class=""> Submit</span></button>

</div>
</form>
    
{{-- <form action="{{route('newMsgFiless',$chatable->chat)}}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone-msg" data-url="{{route('newMsgFiless',$chatable->chat)}} >
{{ csrf_field() }}

  <input type="file" name="file" style="display: none;" />
</form> --}}


        </div><!-- /.box-body -->

        <!-- Loading (remove the following to stop the loading)-->
        {{-- <div class="overlay overlay-msg" style="display: none;">
          <i class="ion-load-c fa fa-spin text-green"></i>
        </div> --}}
        <!-- end loading -->


      </div><!-- /.box -->

@endif