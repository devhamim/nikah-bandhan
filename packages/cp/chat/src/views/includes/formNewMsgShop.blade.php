<div class="box box-widget">

<form role="form"  class="msgForm" id="msgForm" method="POST" action="{{route('msgNewCreateShop',['shop'=>$rs])}}">

        <div class="box-header with-border">
          <h3 class="box-title"><span class="fa fa-edit"></span> {{$rs ? $rs->title : 'No Shop'}}</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
        <div class="message-list">

          

        </div>
        <div class="loadingNewMsg" style="display: none;"><span class='loadNewMsg ion-load-c fa fa-spin '></span> Loading...</div>
        <hr>

        
        
        <div class="tab-content no-padding">

            {{-- <div class="tab-pane" id="image-tab" style="position: relative;">

              <div class="panel panel-default">
              <div id="dropzone-post" class="dropzone" data-url="{{route('newShopMsgFile',['shop'=>$rs->id])}}">
              </div>
              </div>

            </div> --}}<!-- tab pane -->
            <div class="tab-pane active" id="status-tab" style="position: relative;">
                  
                  {{csrf_field()}}
                  
              <!-- textarea -->
              <div class="form-group">
                <textarea class="form-control input_box" name="message_body" rows="3" placeholder="Write Your Message..."></textarea>
              </div>
            </div><!-- tab pane -->
        </div><!-- tab-content -->
            <div class="form-group text-center">

            <ul class="nav nav-tabs group-inline ">

      <li class="active"><a href="#status-tab" data-toggle="tab" title="Wright Message"><i class="fa fa-edit text-green"></i></a></li>

      {{-- <li><a id="file-tab" href="#image-tab" data-toggle="tab"><i class="fa fa-camera text-orange"></i></a></li> --}}
      {{-- <li><a href="#status-tab" data-toggle="tab"><i class="fa fa-play text-red"></i></a></li> --}}
      {{-- <li><a href="#status-tab" data-toggle="tab"><i class="fa fa-book text-green"></i></a></li> --}}

      <li><button style="margin-top: 12px;" type="submit" id="btn_msg_new_final" class="btn-xs pull-right btn btn-success"><span class="fa fa-share"></span><span class=""> Submit</span></button></li>
    </ul>

</div>
    



        </div><!-- /.box-body -->
</form>
        <!-- Loading (remove the following to stop the loading)-->
{{--         <div class="overlay overlay-post" style="display: none;">
          <i class="ion-load-c fa fa-spin text-green"></i>
        </div> --}}
        <!-- end loading -->


      </div><!-- /.box -->


      