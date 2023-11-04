@foreach ($medias as $media)
<div class="card card-default" style="margin-bottom: 5px;">
        <div class="card-body">
            <div class="media">
                <div class="w3-display-container">
                    <img src="{{ route('imagecache', ['template' => 'small', 'filename' => $media->file_name]) }}" alt="John Doe" class="mr-1 rounded" style="width:100px;">
                </div>
                <div class="media-body" style=" word-wrap: break-word;word-break: break-all;">
                    <p>
                        {{-- Orig.Name: {{ $media->file_name }} <br>
                        Size: {{ $media->size }},
                        Width: {{ $media->width }}px,
                        Height: {{ $media->height }}px <br> --}}
                        <small> {{ route('imagecache', ['template' => 'original', 'filename' => $media->file_name]) }}
                        </small>
                        <br>
                        <button class="copyboard btn btn-primary btn-xs" data-text="{{ route('imagecache', ['template' => 'original', 'filename' => $media->file_name]) }}">Copy URL</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
