@extends('user.master.usermaster')
@section('content')
    <div class="container">
        <div class="row">
            <section class="my-5 col-md-6 offset-md-3">

                <div class="card p-2">

                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="w3-monospace " style="color: #F15C63 "><b>Registration Now</b></h5>
                        </div>

                        <form action="route('register.custom') }}" method="POST"
                        class="needs-validation">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label
                                    class="
                                font-weight-bold
                                text-dark text-2
                            ">E-mail
                                    Address</label>
                                <input type="email" value="" name="email"
                                    class="
                                form-control
                                form-control-lg
                            "
                                    required />
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
                                <label
                                    class="
                                font-weight-bold
                                text-dark text-2
                            ">Password</label>
                                <input type="password" value="" name="password"
                                    class="
                                form-control
                                form-control-lg
                            "
                                    required />
                            </div>
                            <div class="form-group col-lg-6">
                                <label
                                    class="
                                font-weight-bold
                                text-dark text-2
                            ">Re-enter
                                    Password</label>
                                <input type="password" value="" name="password_confirmation"
                                    class="
                                form-control
                                form-control-lg
                            "
                                    required />
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
                                <div
                                    class="
                                custom-control
                                custom-checkbox
                            ">
                                    <input type="checkbox"
                                        class="
                                    custom-control-input
                                "
                                        id="terms" required />
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

                                    <label
                                        class="
                                    custom-control-label
                                    text-2
                                "
                                        for="terms">I agree to the
                                        <a href="#">terms of
                                            service</a></label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <input type="submit" value="Register"
                                    class="
                                btn
                                btn-primary
                                btn-modern
                                float-right
                            "
                                    data-loading-text="Loading..." />
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
