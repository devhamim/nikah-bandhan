<?php $by = $bus->publishedby; ?>
<?php $bus->seen(); ?>
<hr style="margin-bottom: 5px; margin-top:0px;">
<div class="item">
    <img  src="{{asset($by->latestCheckedPP())}}" alt="user image" class="">
    <p class="message" style="text-align: justify;">
      <a href="#" class="name">
        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{$bus->created_at->tz('Asia/Dhaka')->toDayDateTimeString()}}</small>
        {{$by->username}}
      </a>

      
      @if($bus->publishable)
        @if($bus->message())
          <?php $msg = $bus->publishable; ?>
          @if($msg->message_body)
          {{$msg->message_body}}

            @include('chat::includes.msgMedia')
            
          @else
          <br>
          @include('chat::includes.msgMedia')
          @endif
        @endif
      @else
        
      @endif

    </p>
    
  </div>