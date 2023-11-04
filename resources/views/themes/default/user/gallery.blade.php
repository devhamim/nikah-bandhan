@extends('user.master.usermaster')
@push('css')
<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>
@endpush
@section('content')
<div class="container bg-white py-2">
    <div class="row pb-4 mt-4">
        <div class="col">

            <div class="text-right">
                <form action="{{ route('user.addgallery') }}" method="POST" enctype='multipart/form-data'
                    id="Galleryyy">
                    @csrf
                    <div class="row">
                        <div class="col-11">
                            <label class="custom-file-upload btn btn-xl btn-block btn-tarek-grey btn-rounded text-dark">

                                <input type="file" name="file_name" />
                                <i class="fas fa-upload pr-4"></i>Upload More Image
                            </label>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-success mt-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-center">
                @include('alerts.alerts             ')
            </div>



            <div class="row">
                <div class="col-lg-12">

                    <h4 class="mb-0">Image Gallery</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                   <div class="row d-flex align-items-center justify-content-center">
                                    @foreach($galleries as $gallery)
                                    <!-- <div class="col-md-2">
                                       <a href="{{route('galleryDel', $gallery)}}" onclick="return confirm('Are you sure want to delete the image')"> 
                                       <img class="img-fluid " src="{{asset('storage/users/gallery/'. $gallery->file_name)}}" style="max-height:100px" alt="Project">
                                       </a>
                                    </div> -->
                                    <div class="col-md-2 w3-display-container w3-hover-opacity">
                                       <img class="img-fluid " src="{{asset('storage/users/gallery/'. $gallery->file_name)}}" style="max-height:100px" alt="Project">
                                        <div class="w3-display-middle w3-display-hover w3-xlarge">
                                        <a class="w3-btn w3-red w3-round w3-small"  href="{{route('galleryDel', $gallery)}}" onclick="return confirm('Are you sure want to delete the image')" style="text-decoration:none">Delete</a>
                                        </div>
                                    </div>
                                @endforeach
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="lightbox mb-4" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
                        @foreach($galleries as $gallery)
                        <a class="img-thumbnail img-thumbnail-no-borders d-inline-block mb-1 mr-1" href="{{asset('storage/users/gallery/'. $gallery->file_name)}}" title="Public Image">
                            <img class="img-fluid" src="{{asset('storage/users/gallery/'. $gallery->file_name)}}" width="110" height="110" alt="Project">

                        </a>



                        @endforeach

                    </div> --}}

                </div>

            </div>
        </div>
    </div>

</div>
<br>
@endsection
