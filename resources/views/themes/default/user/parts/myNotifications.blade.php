<?php $u = Auth::user(); ?>

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


<div class="box box-widget mb-3">
<div class="box-body box-body-container" style="background: #fbfbfb;">

    <div class="row">
        <div class="col-sm-12">

            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title">My All Notifications</h3>
                </div>
                <div class="box-body" style="background-color: #ddd;">

                    @include('alerts.alerts')

                    @foreach($me->myNotifications() as $n)

                    @if($n->contact())

                    @if($n->by)

                    <div class="box box-widget mb-2">
                        <div class="box-body">  

                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="40">
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                             <img class="rounded img-bordered" title="{{ $n->by->username }}" width="40" src="{{ asset($n->by->latestCheckedPP()) }}" alt="{{ $n->by->username }}">
                                         </a>
                                        </td>
                                        <td>
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                            {{ $n->by->username }}</a> Added you in {{ strtolower($n->by->hisOrHer()) }} contact list.      <br>
                            
                        <i class="fa fa-clock-o"></i> {{ $n->created_at->diffForHumans() }}
                                        </td>
                                        <td width="100"></td>
                                    </tr>
                                </tbody>
                            </table>
                        
                       


                        </div>
                    </div>
                    @endif
                    @endif

                    @if($n->proposal())

                    @if($n->notifiable->user_second_id == $me->id)

                    @if($n->by)

                    <div class="box box-widget mb-2">
                        <div class="box-body">  

                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="40">
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                             <img class="rounded img-bordered" title="{{ $n->by->username }}" width="40" src="{{ asset($n->by->latestCheckedPP()) }}" alt="{{ $n->by->username }}">
                                         </a>
                                        </td>
                                        <td>
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                            {{ $n->by->username }}</a> Sent you a proposal. <a class="btn-menu-to-container" data-url="{{ route('user.myAsset', 'proposal_pending') }}" href="">See  {{  $me->pendingProposalToMeCount() }}  pending  proposals to you</a>      <br>






                            
                        <i class="fa fa-clock-o"></i> {{ $n->created_at->diffForHumans() }}
                                        </td>
                                        <td width="100"></td>
                                    </tr>
                                </tbody>
                            </table>
                        
                       


                        </div>
                    </div>

                    @endif
                    
                    @else


                    @if($n->by)


                    <div class="box box-widget mb-2">
                        <div class="box-body">  

                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="40">
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                             <img class="rounded img-bordered" title="{{ $n->by->username }}" width="40" src="{{ asset($n->by->latestCheckedPP()) }}" alt="{{ $n->by->username }}">
                                         </a>
                                        </td>
                                        <td>
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                            {{ $n->by->username }}</a> Accepted your proposal. <a class="btn-menu-to-container" data-url="{{ route('user.myAsset', 'proposal_by_me') }}" href="">See  {{  $me->proposalFromMeCount() }} proposals you sent.</a>      <br>






                            
                        <i class="fa fa-clock-o"></i> {{ $n->created_at->diffForHumans() }}
                                        </td>
                                        <td width="100"></td>
                                    </tr>
                                </tbody>
                            </table>
                        
                       


                        </div>
                    </div>

                    @endif
                    @endif
                    @endif

                    @if($n->visitor())

                    @if($n->by)


                    <div class="box box-widget mb-2">
                        <div class="box-body">  

                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="40">
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                             <img class="rounded img-bordered" title="{{ $n->by->username }}" width="40" src="{{ asset($n->by->latestCheckedPP()) }}" alt="{{ $n->by->username }}">
                                         </a>
                                        </td>
                                        <td>
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                            {{ $n->by->username }}</a> Visited your profile. <br>
                            
                        <i class="fa fa-clock-o"></i> {{ $n->created_at->diffForHumans() }}
                                        </td>
                                        <td width="100"></td>
                                    </tr>
                                </tbody>
                            </table>
                        
                       


                        </div>
                    </div>


                    @endif
                    @endif

                    @if($n->favourite())
                    @if($n->by)
                    <div class="box box-widget mb-2">
                        <div class="box-body">  

                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="40">
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                             <img class="rounded img-bordered" title="{{ $n->by->username }}" width="40" src="{{ asset($n->by->latestCheckedPP()) }}" alt="{{ $n->by->username }}">
                                         </a>
                                        </td>
                                        <td>
                                            <a target="_blank"  href="{{ url('/',$n->by->username) }}">
                                            {{ $n->by->username }}</a> Added you in {{ strtolower($n->by->hisOrHer()) }} favourite list. <br>
                            
                        <i class="fa fa-clock-o"></i> {{ $n->created_at->diffForHumans() }}
                                        </td>
                                        <td width="100"></td>
                                    </tr>
                                </tbody>
                            </table>
                        
                       


                        </div>
                    </div>

                    @endif
                    @endif



                    @endforeach                   

                </div>



                
            </div>


            <div class="text-center">
                {{ $u->myNotifications()->render() }}
            </div>

        </div>

    </div>





</div>

{{-- overlay here --}}

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
<div class="w3-card-2">
<div class="box box-widget">         
<div class="box-body">
@include('welcome.includes.others.fbPageArea')
</div>
</div>
</div>
@endif

</div>
</div>


</div>
</div>
</div>
