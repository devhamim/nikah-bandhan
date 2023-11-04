$(function ()
    {
      // $('.alert').hide();
      //   $('.alert p strong').html('ok');
      //   $('.info').slideDown();
        $('.alert-error').fadeOut(5000);
        $('.alert-info').fadeOut(5000);
        $('.alert-success').fadeOut(5000);

    });

$(document).ready(function() {
  $(document).on('click','.btn-upload-private-photo',function(e){
      e.preventDefault();
      $('.input-private-photos').click();
    });
});

    $(document).ready(function () {
      $('.select2').select2();
      $(".userAutoRender").hide();
    });

    $(document).ready(function()
{
  var pagePost = 1;
  $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() >= $(document).height() - 400)
      {
        var LP = $(".userAutoLastPage").attr("data-lastpage"),
        url = $(".userAutoLastPage").attr("data-url");
        if( pagePost < LP )
        {
            pagePost=pagePost+1;
            getPosts(pagePost, url);
        }
      }
  });

  function getPosts(pagePost, url)
  {
      $.ajax({
          url : url + '?page=' + pagePost,
          dataType: 'json',
          beforeSend: function()
          {
              $(".loadingUserAuto").show();
          },
          complete: function()
          {
              $(".loadingUserAuto").hide();
          },
      }).done(function (data) {
          $('.userAuto').append(data);
            
          // location.hash = page;
      }).fail(function () {
          $(".loadingUserAuto").html("<p>No More Data.</p>");
      });
  }
});


 $(document).ready(function(){
    var cropper = '';
    var destination = document.getElementById('crop-cover-image');

    $(document).on('click','#btn-cover',function(e){
      e.preventDefault();
      $('#my_coverpic').click();
    });

    // document.getElementById('btn-cover').onclick = function()
    // {
    //     document.getElementById('my_coverpic').click();
    // };

    $("#my_coverpic").change(function(){
        var height = 214,
            width = 810;
            var ext = $( this ).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
            {
              alert('invalid extension!');
              return false;
            }
        readURL(this, width,height,destination);
    });

    function readURL(fileUpload,width,height,destination)
    {

      // Check whether HTML5 is supported.
      if (typeof (fileUpload.files) != "undefined")
      {
        //Initiate the FileReader object.
        var reader = new FileReader();
        //Read the contents of Image File.
        reader.readAsDataURL(fileUpload.files[0]);
        reader.onload = function (e)
        {
          //Initiate the JavaScript Image object.
          var image = new Image();
          //Set the Base64 string return from FileReader as source.
          image.src = e.target.result;
          image.onload = function ()
          {
            //Determine the Height and Width.
            var imageHeight = this.height;
            var imageWidth = this.width;
            if (imageHeight < height || imageWidth < width)
            {
              swal({
                title: 'Unsupported Image',
                text: "Image Must Be at least "+width+"px width and "+height+"px height.",
                type: 'error',
                timer: 10000,
                confirmButtonText: 'Close'
              });
                return false;
            }

            // destination.attr('src', image.src);
            destination.src = image.src;
            // destination.style["display"] = '';
            // console.log(destination);
            // return true;
            // console.log(destination);

            imageCrop(destination);

          };
        }
      }
      else
      {
        alert("This browser does not support HTML5.");
        return false;
      }
    }

    function imageCrop(destination){
        $('.btn-cover').hide();
        $('.btn-profilepic').hide();
        $('.btn-cover-submit').show();
        $('.btn-cover-cancel').show();
        destination.style["display"] = '';
        $('.fb-image-lg').hide();
        // var image = document.getElementById('crop-cover-image');
        // var image = $("#crop-cover-image");
        // console.log(destination);
        // console.log(image);
        // return true;
            cropper = new Cropper(destination, {
              aspectRatio: 810 / 214,
              viewMode: 2,
              dragMode: 'move',
              responsive: true,
              restore: true,
              checkOrientation: true,
              modal: true,
              guides: true,
              highlight: true,
              background: false,
              autoCrop: true,
              autoCropArea: 1,
              zoomable: false,
              zoomOnTouch: true,
              zoomOnWheel: true,
              wheelZoomRatio: 0.1,
              cropBoxMovable: true,
              cropBoxResizable: false,
              minContainerWidth: 162,
              minContainerHeight: 60,
              minCanvasWidth: 0,
              minCanvasHeight: 0,
              minCropBoxWidth: 810,
              minCropBoxHeight: 214,
              crop: function(e) {
                $('#offset_x').val(e.detail.x);
                $('#offset_y').val(e.detail.y);
                $('#new_width').val(e.detail.width);
                $('#new_height').val(e.detail.height);
                // console.log(e.detail.x);
                // console.log(e.detail.y);
                // console.log(e.detail.width);
                // console.log(e.detail.height);
                // console.log(e.detail.rotate);
                // console.log(e.detail.scaleX);
                // console.log(e.detail.scaleY);
              }
        });


        // $(document).on('submit','#form_cover_uploade',function(s){
        //     // cropper.destroy();
        //     // $('#crop-cover-image').hide();
        //     // $('.cs-image-lg').show();
        //     // $('.btn-cover').show();
        //     // $('.btn-cover-submit').hide();
        //     // $('.btn-cover-cancel').hide();
        //     s.preventDefault();
        //     var form = $(this),
        //     url = form.attr('action'),
        //     type = form.attr('method'),
        //     alldata = new FormData( this );
        //     // alert(alldata);


        //     $.ajax({
        //       url: url,
        //       type: type,
        //       // dataType: 'json',
        //       data: alldata,
        //       // mimeType:"multipart/form-data",
        //       contentType: false,
        //       cache: false,
        //       processData:false,
        //       beforeSend: function()
        //       {
        //           // $(".loadingNewPost").show();
        //           // $(".overlay").show();

        //       },
        //       complete: function()
        //       {
        //           // $(".loadingNewPost").hide();
        //           // $(".overlay").hide();


        //       },
        //     }).done(function(data){
        //     $(".profile-cover-image").empty().append(data);
        //     cropper.destroy();
        //     $('.btn-cover-submit').fadeOut();
        //     $('.btn-cover-cancel').fadeOut();
        //     // $('#crop-cover-image').attr('src', '');
        //     // $('#crop-cover-image').fadeOut();
        //     destination.src = '';
        //     destination.style["display"] = 'none';
        //     $('.btn-cover').fadeIn();
        //     $('.cs-image-lg').fadeIn();

        //     }).fail(function(){
        //         alert('fail');
        //     });
        // });
    }

    $(document).on('click','.btn-cover-cancel',function(){
            cropper.destroy();
            destination.src = '';
            destination.style["display"] = 'none';
            $('.fb-image-lg').show();
            $('.btn-cover').show();
            $('.btn-profilepic').show();
            $('.btn-cover-submit').hide();
            $('.btn-cover-cancel').hide();
        });

    $(document).on('submit','#form_cover_uploade',function(s){
            // cropper.destroy();
            // $('#crop-cover-image').hide();
            // $('.cs-image-lg').show();
            // $('.btn-cover').show();
            // $('.btn-cover-submit').hide();
            // $('.btn-cover-cancel').hide();
            s.preventDefault();
            var form = $(this),
            url = form.attr('action'),
            type = form.attr('method'),
            alldata = new FormData( this );
            // alert(alldata);


            $.ajax({
              url: url,
              type: type,
              // dataType: 'json',
              data: alldata,
              // mimeType:"multipart/form-data",
              contentType: false,
              cache: false,
              processData:false,
              // beforeSend: function()
              // {
              //     // $(".loadingNewPost").show();
              //     // $(".overlay").show();
              // },
              // complete: function()
              // {
              //     // $(".loadingNewPost").hide();
              //     // $(".overlay").hide();
              // },
            }).done(function(data){
            $(".profile-cover-image").empty().append(data);
            cropper.destroy();
            destination.src = '';
            destination.style["display"] = 'none';
            $('.btn-cover-submit').hide();
            $('.btn-cover-cancel').hide();
            $('.btn-cover').show();
            $('.btn-profilepic').show();
            $('.fb-image-lg').show();
            }).fail(function(){
                alert('fail');
            });
        });

 });

$(document).ready(function(){
  var cropperpic = '';
  var destinationpic = document.getElementById('crop-profilepic');
  document.getElementById('btn-profilepic').onclick = function()
  {
      document.getElementById('my_profilepic').click();
  };

  $("#my_profilepic").change(function(){
      var height = 160,
          width = 160;
          var ext = $( this ).val().split('.').pop().toLowerCase();
          if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
          {
            // alert('invalid extension!');
            return false;
          }

      readPicURL(this, width,height,destinationpic);
  });

  function readPicURL(fileUpload,width,height,destinationpic)
  {

    if (typeof (fileUpload.files) != "undefined")
    {
      var reader = new FileReader();
      reader.readAsDataURL(fileUpload.files[0]);
      reader.onload = function (e)
      {
        var image = new Image();
        image.src = e.target.result;
        image.onload = function ()
        {
          var imageHeight = this.height;
          var imageWidth = this.width;
          if (imageHeight < height || imageWidth < width)
          {
            swal({
              title: 'Unsupported Image',
              text: "Image Must Be at least "+width+"px width and "+height+"px height.",
              type: 'error',
              timer: 10000,
              confirmButtonText: 'Close'
            });
              return false;
          }


          if (imageHeight > 3000 || imageWidth > 3000)
          {
            swal({
              title: 'Unsupported Image',
              text: "Image too large. Image with must be less than 3000px width and 3000px height.",
              type: 'error',
              timer: 10000,
              confirmButtonText: 'Close'
            });
              return false;
          }


          destinationpic.src = image.src;
          picCrop(destinationpic);
        };
      }
    }
    else
    {
      alert("This browser does not support HTML5.");
      return false;
    }
  }
  function picCrop(destinationpic){
    $('.btn-profilepic').hide();
    $('.btn-cover').hide();
    $('.btn-profilepic-submit').show();
    $('.btn-profilepic-cancel').show();
    destinationpic.style["display"] = '';
    $('.fb-image-profile').hide();
    cropperpic = new Cropper(destinationpic, {
      aspectRatio: 1 / 1,
      viewMode: 2,
      dragMode: 'move',
      responsive: true,
      restore: true,
      checkOrientation: true,
      modal: true,
      guides: true,
      highlight: true,
      background: false,
      autoCrop: true,
      autoCropArea: 1,
      zoomable: false,
      zoomOnTouch: true,
      zoomOnWheel: true,
      wheelZoomRatio: 0.1,
      cropBoxMovable: true,
      cropBoxResizable: false,
      minContainerWidth: 160,
      minContainerHeight: 160,
      minCanvasWidth: 0,
      minCanvasHeight: 0,
      minCropBoxWidth: 160,
      minCropBoxHeight: 160,
      crop: function(e) {
        $('#off_x').val(e.detail.x);
        $('#off_y').val(e.detail.y);
        $('#change_width').val(e.detail.width);
        $('#change_height').val(e.detail.height);
      }
    });
  }

  $(document).on('click','.btn-profilepic-cancel',function(){
      cropperpic.destroy();
      destinationpic.src = '';
      destinationpic.style["display"] = 'none';
      $('.fb-image-profile').show();
      $('.btn-profilepic').show();
      $('.btn-cover').show();
      $('.btn-profilepic-submit').hide();
      $('.btn-profilepic-cancel').hide();
  });

  $(document).on('submit','#form_profilepic_upload',function(s){
      s.preventDefault();
      var form = $(this),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );
      $.ajax({
        url: url,
        type: type,
        data: alldata,
        contentType: false,
        cache: false,
        processData:false,
      }).done(function(data){
        $(".profile-image").empty().append(data);
        cropperpic.destroy();
        destinationpic.src = '';
        destinationpic.style["display"] = 'none';
        $('.btn-profilepic-submit').hide();
        $('.btn-profilepic-cancel').hide();
        $('.btn-profilepic').show();
        $('.btn-cover').show();
        $('.fb-image-profile').show();
      }).fail(function(){
          alert('fail');
      });
  });

});



