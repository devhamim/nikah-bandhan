<div class="banner padding-top padding-bottom bg_img" style="background-image: url({{ asset('frontend') }}/images/banner/bg.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="banner__content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".5s" style="margin-bottom: -15%;margin-top: 20%;">
                    <div class="banner__title">
                        <h2>Find your ture love</h2>
                        <p>Marrige with your perfect match is just a click away.</p>
                    </div>
                    <div class="banner__form">
                        <form class="user-mobile-check-form" id="userform" action="{{ route('register.custom') }}" method="post">
                            @csrf
                            <div class="banner__list">
                                <!-- <label>I am a</label> -->
                                <div class="row">
                                    <div class="col-12 my-3">

                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-6 my-3">
                                        <span class="text-danger msg"></span>
                                        <input type="tel" required class="form-control input-mobile " id="input-user-mobile" name="full_mobile" placeholder="Phone">
                                    </div>
                                    <div class="col-6 my-3">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <div class="col-6 my-3">
                                        <input type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    <div class="col-6 my-3">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-12 col-md-12 align-self-end ">
                                <label for=""></label>
                                <input type="submit" class="form-control btn btn-danger py-2 px-5 text-white" style="background: #E31190" value="Let's Begin!">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="banner__thumb banner__thumb--thumb1 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                    <!-- <img src="assets/images/banner/01.png" alt="banner"> -->
                </div>
            </div>
        </div>
    </div>
</div>



@php
    $errorMessages = "";
  if ($errors->any()){
           foreach ($errors->all() as $error){
              $errorMessages .= "<li>" . $error ."</li>";
           }
  }
@endphp

@push('js')
    <script>
        var errorCount = {{ $errors->count() }};
        if (errorCount > 0) {

            $(document).ready(function() {
                $("#global_modal").modal("show");
                $("#global_modal_title").html("Errors !")
                $("#global_modal_body").html(`<ul class="text-danger">{!!$errorMessages !!}</ul>`)
            })
        }
    </script>
@endpush
