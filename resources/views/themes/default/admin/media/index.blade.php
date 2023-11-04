@extends('admin.master')
@section('title',"Admin Dashboard | Media")
@section('body')
<div class="content-header">
<div class="container-fluid">
<div class="card shadow">
    <div class="card-body bg-info">
    All Media
    </div>
</div>
<div class="card card-widget">
<div class="card-header text-center">
<form class="form-inline" method="post" action="{{ route('medias.store') }}" enctype="multipart/form-data">
    {{-- <input type="hidden" name="_token" value=""> --}}
    @csrf
    <div class="form-group ">
        <label for="file_name">Upload Image:</label>
        <input type="file" name="file_name" value="" placeholder="file_name" class="form-control ml-1" id="file_name" style="padding-bottom: 32px;" multiple="">
    </div>
    <button type="submit" class="w3-btn w3-blue w3-round w3-border w3-border-white ml-1">Add Image</button>

</form>
</div>
<div class="card-body" style="background-color: rgba(128, 128, 128, 0.37)">

    <div class="row">
        @foreach ($medias as $media)
        <div class="col-sm-6">
            <div class="card card-default" style="margin-bottom: 5px;">
                <div class="card-body">
                    <div class="media border ">
                        <div class="w3-display-container">
                            <img src="{{ route('imagecache', ['template' => 'original', 'filename' => $media->file_name]) }}" alt="John Doe" class="mr-1   rounded" style="width:100px;">
                          <div class="w3-display-topright"><a onclick="return confirm('Do you really want to delete this media?');" style="margin-right: 4px;margin-top: 3px;" class="btn btn-default btn-xs" title="Delete" href="{{ route('medias.destroy',$media->id) }}"><i class="fa fa-times"></i></a></div>

                        </div>
                        <div class="media-body" style=" word-wrap: break-word;word-break: break-all;">
                            <p>
                            Orig.Name: {{ $media->file_name }} <br>
                            Size: {{ $media->size }},
                            Width: {{ $media->width }}px,
                            Height: {{ $media->height }} px <br>
                            <small>{{ asset('/storage/media_images/'.$media->file_name) }}</small> <br>

                            <button class="copyboard btn btn-primary btn-xs" data-id="{{ $media->id }}"  data-text="{{ asset('/storage/media_images/'.$media->file_name) }}">Copy to
                                 Clipboard
                            </button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pull-right">

    </div>
        </div>
</div>
    </div>
</div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.copyboard', function(e) {
            e.preventDefault();

            $(".copyboard").text('Copy to Clipboard');

            $(this).text('Coppied!');
            var copyText = $(this).attr('data-text');

            var textarea = document.createElement("textarea");
            textarea.textContent = copyText;
            textarea.style.position = "fixed";
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");

            document.body.removeChild(textarea);
           });

       });
    </script>
@endsection



