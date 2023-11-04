<div class="box box-widget" id="archive-area">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>

                  <h3 class="box-title">আর্কাইভ (পুরনো সংখ্যা)</h3>
                  <!-- /. tools -->
                </div>
                <div class="box-body" >


                  <form  method="get" target="_blank" action="{{route('welcome.archiveSearch')}}">
 
 
              {{csrf_field()}}
             
         

            <div class="form-group form-group-sm">

              <div class="row">
                    <div class="col-sm-6">
                      <select name="day" class="form-control" id="" style="width: 100%;">
                        <option value="">দিন</option>
                        @for($x = 1;$x <= 31;$x++)
                        <option value="{{$x}}">{{$x}}</option>
                        @endfor
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <select name="month" class="form-control" id="" style="width: 100%;">
                        <option value="">মাস</option>
 
                        <option value="01">জানুয়ারি</option>
                        <option value="02">ফেব্রুয়ারি</option>
                        <option value="03">মার্চ</option>
                        <option value="04">এপ্রিল</option>
                        <option value="05">মে</option>
                        <option value="06">জুন</option>
                        <option value="07">জুলাই</option>
                        <option value="08">আগস্ট</option>
                        <option value="09">সেপ্টেম্বর</option>
                        <option value="10">অক্টোবর</option>
                        <option value="11">নভেম্বর</option>
                        <option value="12">ডিসেম্বর</option>
 
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-6">
                      <select name="year" class="form-control" id="" style="width: 100%;">
                        <option value="">বছর</option>
                        @for($x = date('Y');$x >= 2018;$x--)
                        <option value="{{$x}}">{{$x}}</option>
                        @endfor
                      </select>
                    </div>    
                    <div class="col-sm-6">
                      <button class="btn btn-sm w3-green w3-round" style="width: 100%;">খুজুন</button></div>    
              </div>


            </div>

            
          </form>

                
                  



                </div>
              </div>
