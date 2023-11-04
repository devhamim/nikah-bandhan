                <div class="box box-widget" >
                  <div class="box-header" style="padding: 0;">

                    <div class="btn-group btn-group-justified btn-group-custom">
                      <a href="#menu1" data-toggle="pill" class="btn btn-success">সর্বশেষ খবর</a>

                      <a href="#menu2" data-toggle="pill" class="btn btn-default">সর্বাধিক পঠিত</a>
                      
                    </div>

                  </div>

                  <div class="box-body">
                    <div class="tab-content slim">
                      <div id="menu1" class="tab-pane fade in active">

                        @foreach($latestPosts as $post)

                        @include('welcome.includes.others.sidebarPost')
                        
                        @endforeach
                        
                      </div>
                      <div id="menu2" class="tab-pane fade">
                        

                        @foreach($popularPosts as $post)

                        @include('welcome.includes.others.sidebarPost')

                        @endforeach
                      </div>

                    </div>
                  </div>
                </div>
