<div class="container">
    <div class="w3-border w3-border-purple w3-round w3-white">
        <div class="col-sm-12">
            <div class="card- card-default">
                <div class="card-body-">
                    <div class="w3-card w3-round-large">
                        <h4 class="pl-3"> Upload Profile Picture</h4>
                        <div class="col-md-12">
                            
                            <div class="w3-border w3-border-purple w3-round">
                                <div class="w3-container w3-padding">
                                    {{-- {{ route('user.createProfileUploadPhotos') }} --}}
                                    <form class="" action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        
                                        <div class="row">
                                            <div class="col-md-6 border rounded p-3">
                                                <div class="h5">Profile Picture</div>
                                                <div>
                                                    <input type="file" class="border p-1 float-left" id="photos" name="profile_picture" style="width: 200px;" required>
                                                </div>
                                                @if ($errors->has('profile_picture'))
                                                <span class="invalid-feedback w3-text-red" role="alert">
                                                    <strong class="w3-text-red">{{ $errors->first('profile_picture') }}</strong>
                                                </span>
                                                @endif
                                                <div>
                                                    <small>Best to use square photo for profile picture</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 border rounded p-3">
                                                <div class="h5">Photo 1</div>
                                                <input type="file" class="border p-1 float-left" id="photo_1" name="photo_1" required>
                                                @if ($errors->has('photo_1'))
                                                <span class="invalid-feedback w3-text-red" role="alert">
                                                    <strong class="w3-text-red">{{ $errors->first('photo_1') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 border rounded p-3">
                                                <div class="h5">Photo 2</div>
                                                <input type="file" class="border p-1 float-left" id="photo_2" name="photo_2" required>
                                                @if ($errors->has('photo_2'))
                                                <span class="invalid-feedback w3-text-red" role="alert">
                                                    <strong class="w3-text-red">{{ $errors->first('photo_2') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 border rounded p-3">
                                                <div class="h5">Photo 3</div>
                                                <input type="file" class="border p-1 float-left" id="photo_3" name="photo_3" required>
                                                @if ($errors->has('photo_3'))
                                                <span class="invalid-feedback w3-text-red" role="alert">
                                                    <strong class="w3-text-red">{{ $errors->first('photo_3') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <br>
                                        
                                        <br>
                                        
                                        <br>
                                        
                                        <div class="w3-right">
                                            <button class="w3-btn w3-white w3-round w3-border w3-border-purple w3-hover-blue btn-sm mr-5" type="reset">Reset</button>
                                            <button type="submit" class="w3-btn w3-round w3-border w3-border-purple w3-hover-indigo btn-sm w3-purple"><i class="fa fa-upload"></i> Upload</button>
                                        </div>
                                        
                                    </form>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <h5>Tips:</h5>
                            <div>
                                <ul class="unstyled">
                                    <li>Upload Clear Photo.</li>
                                    <li>Upload Best Looking Face photo.</li>
                                    <li>Upload Complete Photo, Avoid partial photos.</li>
                                    <li>Upload your real Photo, Don't use photos from other website.</li>
                                    <li>Photo size must be 4R.</li>
                                </ul>
                            </div>
                            
                            <br>
                                     
                        </div>
                    </div>
                    
                    {{-- <div class="w3-card w3-round-large">
                        <div class="col-md-12">
                            <div class="box box-widget w3-animate-zoom">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Upload Public Photo</h3>
                                </div>
                                <div class="box-body">
                                    
                                    
                                     @include('alerts.alerts')
                                    
                                    <div class="w3-border w3-border-purple w3-round">
                                        <div class="w3-container w3-padding">
                                            
                                            <form class="form-inline" action="{{ route('user.uploadNewPhotos', 'public') }}" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        
                                                        <input type="file" class="border p-1 float-left" id="photos" name="photos[]" multiple style="width: 200px;">
                                                        {{ csrf_field() }}
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="d-sm-none d-lg-none d-md-none"> <br> </div>
                                                        <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm float-left"><i class="fa fa-upload"></i> Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    @if ($me->profile)
                                    
                                    <div class="photos-container" style="min-height:500px;">
                                        <br>
                                        
                                        @auth
                                        @if (Auth::user()->id === $me->id)
                                        @foreach($me->publicPhotos()->chunk(3) as $photo3)
                                        <div class="row">
                                            @foreach($photo3 as $photo)
                                            <div class="col-sm-4">
                                                <div class="w3-display-container " style="width:100%;margin-top: 15px;">
                                                    <img src="{{ asset($photo->img_url) }}" class="img-thumbnail" alt="Bangali Muslim Marriage" style="width:100%">
                                                    <div class="w3-display-bottomright w3-display-hover ">
                                                      <a class="btn btn-danger btn-sm" href="{{ route('user.photoDelete',$photo) }}">Delete</a>
                                                    </div>
                                                
                                                    <div class="w3-display-topright w3-display-hover ">
                                                      <a target="_blank" class="btn btn-primary btn-sm" href="{{ asset($photo->img_url) }}">See Big</a>
                                                    </div>
                                                  </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        
                                        @endforeach
                                        @else 
                                        
                                        
                                        
                                        @endif
                                        @else
                                        @endauth
                                        
                                    </div>
                                    
                                    @endif
                                    
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        <div class="col-md-12">
                            <h5>Tips:</h5>
                            <div>
                                <ul class="unstyled">
                                    <li>Upload atleast 3 photos.</li>
                                    <li>Photo size must be 4R.</li>
                                    <li>You can select multiple photos at a time.</li>
                                    <li>Upload Complete Photo, Avoid partial photos.</li>
                                    <li>Upload your real Photo, Don't use photos from other website.</li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    
                    {{-- <div class="input-group card mb-2">
                        <div class="col-md-6">
                            <label for="images">Profile picture</label>
                        </div>
                        <div class="col-md-6">
                            <input class="" type="file" name="images[]">
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="col-md-6">
                            <label for="images">4R size photo 1</label>
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="images[]">
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="col-md-6">
                            <label for="images">4R size photo 2</label>
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="images[]">
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="col-md-6">
                            <label for="images">4R size photo 3</label>
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="images[]">
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    
    
    <br>
</div>