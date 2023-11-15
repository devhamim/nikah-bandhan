@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp
@push('css')
<style>
    .profile-image-outer-container .profile-image-inner-container {
    border-radius: 50%;
    padding: 5px;
}

body {
  font-family: sans-serif;
  background-color: #3f3636;
}

.file-upload {
  background-color: #ffffff;
  width: 80%;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}
.image-upload-wrap {
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.file-upload-input {
    display: none;
}

.file-upload-label {
    cursor: pointer;
    display: block;
}

.file-upload-image {
    width: 100%; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
    border: 1px solid #ddd; /* Add a border for styling */
}

.drag-text {
    text-align: center;
}

/* Style the "Choose File" button */
.file-upload-label::file-selector-button {
    padding: 8px 16px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    color: #333;
    cursor: pointer;
    border-radius: 4px;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>

@endpush
@section('content')
<div style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
      <div class="col-md-12 text-center">
          <div class="overflow-hidden mb-1">
          </div>
          <form action="{{ route('uploadPp', $me->id) }}" role="form" method="POST"
            class="needs-validation mt-5 py-5" enctype="multipart/form-data">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                  <h5 class="pt-5">UPLOAD YOUR PROFILE IMAGE</h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="file-upload my-5">
                               

                              <button class="file-upload-content" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                <div class="file-upload-content">
                                  {{-- <input class="file-upload-input" type='file' name="profile_img" onchange="readURL(this);" accept="image/*" /> --}}
                                  <img class="file-upload-image" src=""  />
                                  <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="profile_img" style="display: none" id="profile-img-upload" onchange="readURL(this);" accept="image/*" />
                                    <label for="profile-img-upload" class="file-upload-label my-3">
                                        <img class="file-upload-image" src="{{ asset('frontend/images/about/01.jpg') }}" alt="your image" />
                                    </label>
                                </div>
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                </div>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <div class="form-group col-lg-12 text-center">
                                        <input type="submit" value="Save" class="btn btn-primary btn-modern text-center" style="width: 83%; margin: 0 auto; background-color: #E31190;" data-loading-text="Loading...">
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
      </div>


  </div>
</div>


@endsection
@push('js')



    <script>
        function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
    </script>


@endpush
