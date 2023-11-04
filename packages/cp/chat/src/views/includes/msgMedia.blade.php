@if($msg->hasImage())

<div class="well">
            @foreach($msg->images()->chunk(2) as $twoImages)
            
              <table>
              <tr class="spaceUnderImg">
                @foreach($twoImages as $image)
                <td style="width: 50%;">
                  @if($image->file_ext == 'gif')
                    <img class="img-responsive" style="padding-left: 1px;padding-bottom: 2px;" src="{{ route('fileMsgImageGet',['filename'=>$image->file_name]) }}" alt='alt name'>
                  @else
                    <img class="img-responsive" style="padding-left: 1px;padding-bottom: 2px;" src="{{ route( 'imagecache', ['template'=>'msglg', 'filename' => $image->file_name ]) }}" alt='alt name'>
                  @endif
                </td>
                @endforeach
              </tr>
              </table> 

            @endforeach
</div>
    @endif

    @if($msg->hasVideo())
      @foreach($msg->videos() as $video)
      {{-- <video class="postvideo" width="100%" poster="{{asset('ud/d/video_poster.jpg')}}"  controls preload="auto"> --}}
        <video class="postvideo" width="100%" controls preload="metadata">
          <source src="{{ route('fileMsgVideoGet',['filename'=>$video->file_name]) }}" type="{{$video->file_mime}}">
          Your browser does not support this video.
        </video>

        {{-- <a class="viewers" href="#">
        <span class="text-muted pull-right" title="Views"><i class="fa fa-play-circle"></i> Views <span class="seen">{{$video->viewsCount()}}</span></span></a> <br> --}}

        
        
      @endforeach
    @endif

    @if($msg->hasAudio())
      @foreach($msg->audios() as $audio)
        <audio style="width: 100%;" controls width="100%" preload="none">
          <source src="{{route('fileMsgAudioGet',['filename'=>$audio->file_name])}}" type="{{$audio->file_mime}}">
          Your browser does not support the audio tag.
        </audio>
        <small class="single-line">{{$audio->original_name}} 
          {{-- <a class="viewers" href="#">
        <span class="text-muted pull-right" title="Listened"><i class="ion-headphone"></i> <span class="seen">{{$audio->viewsCount()}}</span></span></a> --}}
        </small>
      @endforeach
    @endif

    @if($msg->hasPdf())

        @foreach($msg->pdfs() as $pdf)
          @if(BrowserDetect::isDesktop())
        <div class="box box-danger collapsed-box">
          <div class="box-header with-border">
            <h4 class="box-title single-line"><i class="fa fa-file-pdf-o text-red"></i> PDF : {{$pdf->original_name}}</h4>
            <div class="box-tools pull-right">
              <a class="btn btn-box-tool btn-default" title="Fullscreen" href="{{route('fileMsgPdfGet',['filename'=>$pdf->file_name])}}" target="_blank"><i class="fi-arrows-out text-red"></i></a>
              <button title="Open Pdf" class="btn btn-box-tool btn-default" data-widget="collapse"><i class="fa fa-plus text-red"></i></button>

            </div>
          </div>
          <div class="box-body no-padding">

            <embed  src="{{route('fileMsgPdfGet',['filename'=>$pdf->file_name])}}" width="100%" height="450" alt="pdf" pluginspage="{{asset('http://www.adobe.com/products/acrobat/readstep2.html')}}">


          </div>
        </div>
          @else
            <a href="{{route('fileMsgPdfGet',['filename'=>$pdf->file_name])}}" target="_blank"><i class="fa fa-file-pdf-o text-red"></i> Read Pdf | <small>{{$pdf->original_name}}</small></a>
            
            <hr>
          @endif
          {{-- <a class="viewers" href="#">
        <span class="text-muted pull-right" title="Read"><i class="ion-ios-people"></i> Read <span class="seen">{{$pdf->viewsCount()}}</span></span></a> --}}
        @endforeach

    @endif