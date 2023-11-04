

<section style="height: 650px" class="
            page-header
            page-header-modern
            page-header-background
            page-header-background-md
            mt-0
        " data-video-path="{{ asset('img/vip-cover.jpg') }}"
          data-plugin-video-background
          data-plugin-options="{'posterType': 'jpg', 'position': '50% 50%'}">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="
                            align-self-center
                            {{-- p-static --}}
                            order-2
                            text-center
                            mb-3
                            vipmm-cover
                        "
                       >
                    <h1 class="text-lg-15 text-sm-5 text-md-10" style="text-shadow: 3px 3px 10px #000">
                        <strong>VIP Marriage Media</strong>
                    </h1>

                    <h2 class="
                                word-rotator
                                clip
                                is-full-width
                                mb-2
                                w3-text-white
                                d-none d-lg-block
                            " style="text-shadow: 3px 3px 10px #000">
                        <span>We Provide </span>
                        <span class="word-rotator-words">
                            <b class="is-visible w3-text-aqua">Worldwide Solution</b>
                            <b class="w3-text-deep-orange">Elite Matrimony Service</b>
                            <b class="w3-text-yellow">Trusted Solution</b>
                        </span>
                    </h2>
                </div>
            </div>
            @guest
            <div class="col-md-5">
                <div class="
                home-login
                         px-3 py-3">
                    <div class="box-content">
                        <h4 class="
                                    color-primary
                                    font-weight-semibold
                                    text-4 text-uppercase
                                    mb-3
                                ">
                            Register An Account
                        </h4>

                        @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif

                        <form action="{{
                                    route('register.custom')
                                }}" method="POST" class="needs-validation">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="
                                                font-weight-bold
                                                text-dark text-2
                                            ">E-mail Address</label>
                                    <input type="email" value="" name="email" class="
                                                form-control
                                                form-control-lg
                                            " required />
                                    @if ($errors->has('email'))
                                    <div class="
                                                alert alert-danger
                                            ">
                                        <ul>
                                            <li>
                                                {{ $errors->first('email') }}
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label class="
                                                font-weight-bold
                                                text-dark text-2
                                            ">Password</label>
                                    <input type="password" value="" name="password" class="
                                                form-control
                                                form-control-lg
                                            " required />
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="
                                                font-weight-bold
                                                text-dark text-2
                                            ">Re-enter
                                        Password</label>
                                    <input type="password" value="" name="password_confirmation" class="
                                                form-control
                                                form-control-lg
                                            " required />
                                </div>
                                @if ($errors->has('password'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>
                                            {{ $errors->first('password') }}
                                        </li>
                                    </ul>
                                </div>

                                @endif
                            </div>
                            @if ($errors->has('password_confirmation'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>
                                        {{ $errors->first('password_confirmation') }}
                                    </li>
                                </ul>
                            </div>

                            @endif
                            <div class="form-row">
                                <div class="form-group col-lg-9">
                                    <div class="
                                                custom-control
                                                custom-checkbox
                                            ">
                                        <input type="checkbox" class="
                                                    custom-control-input
                                                " id="terms" required />
                                        <!-- <label
                                                class="
                                                    custom-control-label
                                                    text-2
                                                "
                                                for="terms"
                                                >I have read and
                                                agree to the
                                                <a href="#"
                                                    >terms of
                                                    service</a
                                                ></label
                                            > -->

                                        <label class="
                                                    custom-control-label
                                                    text-2
                                                " for="terms">I agree to the
                                            <a href="#">terms of
                                                service</a></label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="submit" value="Register" class="
                                                btn
                                                btn-primary
                                                btn-modern
                                                float-right
                                            " data-loading-text="Loading..." />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endguest
        </div>
    </div>
</section>
