<form class=""  method="post" action="{{ route('admin.pageAddNewPost') }}">


  <div class="card card-widget mb-0">
                <div class="card-body w3-gray ">
                      <div class="row">

                        <div class="col-sm-4">


                  <div class="card card-widget mb-0">


                    <div class="card-body">


                      <div class="form-group form-group-sm{{ $errors->has('page_title') ? ' has-error' : '' }}">
    <label for="page_title">Page Title:</label>
    <input type="text" class="form-control" placeholder="Page Title" id="page_title" name="page_title" value="{{ old('page_title') }}">
  </div>

  <div class="form-group form-group-sm{{ $errors->has('route_name') ? ' has-error' : '' }}">
    <label for="route_name">Route Name:</label>
    <input type="text" placeholder="Route Name" class="form-control" id="route_name" name="route_name" value="{{ old('route_name') }}">
  </div>






                        </div>
                      </div>



                    </div>



                     <div class="col-sm-4">





  <div class="card card-widget mb-0">


  <div class="card-body">

    <div class="form-group form-group-sm {{ $errors->has('meta_title') ? ' has-error' : '' }}">
                  <label for="meta_title" class=" control-label">Meta Title</label>

                    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}" id="meta_title" placeholder="Meta Title of Post" autocomplete="off">
                    @if ($errors->has('meta_title'))
                    <span class="help-block">
                     <strong>{{ $errors->first('meta_title') }}</strong>
                   </span>
                   @endif

               </div>


    <div class="form-group form-group-sm {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                  <label for="meta_keywords" class=" control-label">Meta Keywords</label>

                    <input type="text" name="meta_keywords" class="form-control" value="{{old('meta_keywords')}}" id="meta_keywords" placeholder="Meta Keywords of Post" autocomplete="off">
                    @if ($errors->has('meta_keywords'))
                    <span class="help-block">
                     <strong>{{ $errors->first('meta_keywords') }}</strong>
                   </span>
                   @endif

               </div>









  </div>

</div>



                        </div>

    <div class="col-sm-4">



      <div class="card card-widget mb-0">
        <div class="card-body">


          <div class="form-group form-group-sm {{ $errors->has('meta_description') ? ' has-error' : '' }}">
              <label for="excerpt" class=" control-label">Meta Description</label>

                <textarea  name="meta_description" class="form-control" rows="1" id="meta_description" placeholder="Meta Description of Post">{{ old('meta_description') }}</textarea>

                @if ($errors->has('meta_description'))
                <span class="help-block">
                 <strong>{{ $errors->first('meta_description') }}</strong>
               </span>
               @endif

           </div>



           <div class="row">
             <div class="col-sm-6">

              <div class="checkbox">
    <label><input type="checkbox" name="title_hide"> Title Hide </label>
  </div>

  <div class="checkbox">
    <label><input type="checkbox" checked name="active"> Active</label>
  </div>

  <div class="checkbox">
    <label><input type="checkbox" checked name="left_sidebar"> Left Sidebar</label>
  </div>

             </div>
             <div class="col-sm-6">

               <div class="checkbox">
    <label><input type="checkbox" checked name="list_in_menu"> List In Menu</label>
  </div>

          <div class="">

           <button type="submit" class="btn btn-primary">Submit</button>
           </div>
        </div>

             </div>
           </div>




      </div>

    </div>
                      </div>



                    </div>

                  </div>


  @csrf





</form>
