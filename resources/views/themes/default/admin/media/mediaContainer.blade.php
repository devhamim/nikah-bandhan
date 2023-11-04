<div class="card card-widget" style="margin-bottom: 5px; max-height:600px;">
    <div class="card-header">
        <h3 class="card-title mt-2">Media Gallery</h3>

        <div class="card-tools">
            <a href="{{ route('admin.mediaAll') }}" class="btn btn-secondary mr-2"><i class="fa fa-image mr-2"></i>Upload Image</a>
        </div>
    </div>
    <div class="card-body datas-container" data-url="{{ route('admin.getMediasAjax') }}" data-last-page="{{ $medias->lastPage() }}">
       <div class="p-3 datas-items" style="background-color: rgba(128, 128, 128, 0.37)">
        @include('admin.media.mediaAjax')
       </div>
       <div class="datas-loader" style="display: none;"><i class="fa fa-spin fa-cog"></i> Loading...</div>
    </div>
</div>




@push('js')
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js') }}"></script>

<script>
    $(document).ready(function(){

        ////////// infinite scrolling start ///////

        var showMedia = $('.datas-container');
        showMedia.slimScroll({
            height: '400px'
        });

        var pageLOC = 1;
        showMedia.scroll(function(e){

            if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight - 20) {
            var LP = $(".datas-container").attr("data-last-page"),
                url = $(".datas-container").attr("data-url");
            if( pageLOC < LP )
            {
                pageLOC=pageLOC+1;
                getData(url, pageLOC);
            }else
            {
                return false;
            }

            }
        });

        function getData(url, pageLOC)
        {
            $.ajax({
                url : url + '?page=' + pageLOC,
                dataType: 'json',
                beforeSend: function()
                {
                    $(".datas-loader").show();
                },
                complete: function()
                {
                    $(".datas-loader").hide();
                },
            }).done(function (data) {
                $('.datas-items').append(data);
                // location.hash = page;
            }).fail(function () {
                $(".datas-loader").html("<p>No More Data.</p>");
            });
        }

        ////////// infinite scrolling end ///////


    });

</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.copyboard', function(e) {
        e.preventDefault();

        $(".copyboard").text('Copy URL');

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
@endpush
