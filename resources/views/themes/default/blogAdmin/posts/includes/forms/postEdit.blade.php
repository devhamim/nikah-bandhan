<div class="box box-widget">
     	<div class="box-header with-border">
     		<h3 class="box-title">
     			Post Update 
     		</h3>
     	</div>
     	<form method="post" action="{{route('admin.postUpdate',$post)}}" enctype="multipart/form-data">
              <div class="box-body" style="background-color: #ccc;">
              <div class="row">
              	<div class="col-md-7">

                <div class="box box-widget">
                <div class="box-body">

              	@include('alerts')

              	{{csrf_field()}}

 
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class="  control-label">Title</label>
 
                    <input type="text" name="title" class="form-control" value="{{old('title') ?: $post->title}}" id="title" placeholder="Title of Directory" autocomplete="off">
                    @if ($errors->has('title'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('title') }}</strong>
	                    </span>
	                @endif
                       
                </div>
 
 

                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label for="description" class="control-label"> Description</label>

                    <textarea  name="description" class="form-control" rows="10" id="description" placeholder="Description">{!! old('description') ?: $post->description !!}</textarea>

                    @if ($errors->has('description'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('description') }}</strong>
	                    </span>
	                @endif

                </div>

                <div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                  <label for="excerpt" class="control-label">excerpt</label>


                    <textarea  name="excerpt" class="form-control" rows="3" id="excerpt" placeholder="Excerpt of Post">{{ old('excerpt') ?: $post->excerpt }}</textarea>
                    @if ($errors->has('excerpt'))
                      <span class="help-block">
                          <strong>{{ $errors->first('excerpt') }}</strong>
                      </span>
                  @endif
             
                </div>

 
                <div class="form-group">
                  <label for="title" class="control-label">Tags (For Search)</label>


                    <select id="tags"
                        name="tags[]"
                        class="form-control select2-tags select2-container step2-select select2"
                        data-placeholder="Select Tags From list or Add New"
                        data-ajax-url="{{route('welcome.selectTagsOrAddNew')}}"
                        data-ajax-cache="true"
                        data-ajax-dataType="json"
                        data-ajax-delay="200"
                        multiple="multiple"
                        style="width: 100%;" >
                        @if($oldTags)
                          @foreach($oldTags as $ot)
                            <option selected="selected">{{ $ot }}</option>
                          @endforeach
                          @endif
                        </select>

                </div>
 
 
                <div class="form-group">
                  

                    <div class="checkbox">
				      <label><input type="checkbox"  name="publish" {{$post->publish_status == 'published' ? 'checked' : ''}}>Publish Instantly</label>
				    </div>                  

                </div>

        <div class="form-group">

            <div class="checkbox">
              <label><input type="checkbox"  name="front_slider" {{$post->front_slider ? 'checked' : ''}}>Front Slider </label>
            </div>                  

        </div>

        <div class="form-group">

            <div class="checkbox">
              <label><input type="checkbox"  name="headline" {{$post->headline ? 'checked' : ''}}>Headline (Scrolling)</label>
            </div>                  

        </div>


        {{-- <div class="form-group">

            <div class="checkbox">
              <label><input type="checkbox"  name="highlight" {{$post->highlight ? 'checked' : ''}}>Highlight</label>
            </div>                  

        </div> --}}

                                

 
                </div>
                </div>



{{-- 
                  <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Update Division</h3>
  </div>
  <div class="box-body">
    <div class="form-group">
      <label for="extra_file" class="control-label"></label>

        <div class="radio">
          <label><input type="radio" name="division" value=""> No Division</label>
        </div>
        @foreach($divs as $div)
        <div class="radio">
          <label><input type="radio" name="division" value="{{$div->id}}" {{$div->hasPost($post) ? 'checked' : ''}}>{{$div->name}}</label>
        </div>
        @endforeach                  

    </div>

    <div class="form-group">
            <label for="title" class="control-label">District </label>


              <select id="district"
              name="district"
              class="form-control select2-district select2-container step2-select select2"
              data-placeholder="Select District"
              data-ajax-url="{{route('welcome.selectDistrictForPost')}}"
              data-ajax-cache="true"
              data-ajax-dataType="json"
              data-ajax-delay="200"
              style="width: 100%;" > 
              @if($dist)
              <option selected="selected">{{ $dist->name }}</option>
              @endif

            </select>
            <span class="help-block">At First Select Division.</span>
        </div>


        <div class="form-group">
            <label for="title" class="control-label">Thana (উপজেলা) </label>


              <select id="thana"
              name="thana"
              class="form-control select2-thana select2-container step2-select select2"
              data-placeholder="Select Thana"
              data-ajax-url="{{route('welcome.selectThanaForPost')}}"
              data-ajax-cache="true"
              data-ajax-dataType="json"
              data-ajax-delay="200"
              style="width: 100%;" > 
              @if($thana)
              <option selected="selected">{{ $thana->name }}</option>
              @endif

            </select>
            <span class="help-block">At First Select District.</span>

        </div>

  </div>
</div> --}}






              		
              	</div>
              	<div class="col-md-5">

                  


                <div class="box box-widget">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update Feature Image</h3>
                  </div>
                  <div class="box-body">

                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                  <label for="feature_image" class="col-sm-4 control-label">Feature Image</label>
                  <div class="col-sm-8">
                    <input type="file" name="feature_image" class="" id="feature_image">

                    @if ($errors->has('feature_image'))
                      <span class="help-block">
                          <strong>{{ $errors->first('feature_image') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>
                    </div>
                    <div class="col-sm-6">
                      @if($post->feature_img_name)
                      <div class="w3-display-container" style="height:300px;">
                <img class="img-responsive" src="{{asset('storage/media/image/'. $post->feature_img_name)}}" alt="">
                <div class="w3-display-topright" style="padding-right: 10px;padding-top: 10px;">
                  <a class="btn btn-primary btn-xs"  href="{{route('admin.featureImageDelete',$post)}}"><i class="fa fa-times"></i></a>
                </div>

              </div>
              @endif
                    </div>
                  </div>

                  </div>
                </div>


                {{-- <div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Media Gallery</h3>

    <div class="box-tools pull-right">
                <a href="{{route('admin.mediaAll')}}" class="w3-btn btn-sm w3-round w3-white w3-border w3-border-blue"> <i class="fa fa-image"></i>Upload Image</a>
              </div>
  </div>
  <div class="box-body slim-media">

  <div class="box box-widget">
    <div class="box-body" style="background-color: #ccc;">

      @include('blogAdmin.posts.includes.others.mediaAllForPost')
    
    </div>
  </div>

</div>
</div> --}}



<div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-globe"></i> SEO Part</h3>
  </div>

  <div class="box-body">
    
    <div class="form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
                  <label for="meta_title" class=" control-label">Meta Title</label>

                    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title') ?: $post->meta_title }}" id="meta_title" placeholder="Meta Title of Post" autocomplete="off">
                    @if ($errors->has('meta_title'))
                    <span class="help-block">
                     <strong>{{ $errors->first('meta_title') }}</strong>
                   </span>
                   @endif
               
               </div>


    <div class="form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                  <label for="meta_keywords" class=" control-label">Meta Keywords</label>

                    <input type="text" name="meta_keywords" class="form-control" value="{{old('meta_keywords') ?: $post->meta_keywords}}" id="meta_keywords" placeholder="Meta Keywords of Post" 

                    

                    autocomplete="off">
                    @if ($errors->has('meta_keywords'))
                    <span class="help-block">
                     <strong>{{ $errors->first('meta_keywords') }}</strong>
                   </span>
                   @endif
               
               </div>


      <div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
              <label for="excerpt" class=" control-label">Meta Description</label>

                <textarea  name="meta_description" class="form-control" rows="3" id="meta_description" placeholder="Meta Description of Post">{{ old('meta_description') ?: $post->meta_description }}</textarea>

                @if ($errors->has('meta_description'))
                <span class="help-block">
                 <strong>{{ $errors->first('meta_description') }}</strong>
               </span>
               @endif
              
           </div>



  </div>

</div>


                 <div class="box box-widget">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update Category</h3>
                  </div>
                  <div class="box-body">
										<div class="form-group">
	                  <label for="extra_file" class="control-label"></label>

	                    @foreach($cats->chunk(2) as $cats2)     
                       <div class="row"> 

                          @foreach($cats2 as $cat)
                          <div class="col-sm-6">

                            <div class="checkbox">
                         <label><input type="checkbox" name="categories[]" value="{{$cat->id}}" {{$cat->hasPost($post) ? 'checked' : ''}}>{{$cat->title}}</label>
                       </div>
                            
                          </div>
                        
                       @endforeach    
                           
                   
                       </div>
                       @endforeach                       

	                </div>
                  </div>
                </div>







  
                </div>
              </div>
                

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
              </div>
            </form>
     </div>