<header id="header" class="header-transparent header-effect-shrink"
    data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body" style="background-color: var(--branding-color) ">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="">
                                <img class="" alt="Porto" height="68" data-sticky-height="40"
                                    {{-- {{ route('imagecache', [ 'template'=>'medium','filename' => "logo.png" ]) }} --}} src="{{ asset('images/logo.png') }}"
                                    style="border-radius: 5%" />
                            </a>
                            {{-- <a class="color-vipmm pt-5 font-weight-bold ml-5" style="white-space: nowrap;"
                                href="tel:+8801767506668"> <i class="icon-phone icons bg-color-vipmm2"></i>
                                01767506668</a> --}}
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div
                            class="
                            header-nav
                            header-nav-line
                            header-nav-top-line
                            header-nav-top-line-with-border
                            order-2 order-lg-1
                        ">
                            <button class="btn header-btn-collapse-nav " data-toggle="collapse"
                                data-target=".header-nav-main nav" aria-expanded="true">
                                <i class="fas fa-bars"></i>
                            </button>

                            <div
                                class="
                                header-nav-main
                                header-nav-main-square
                                header-nav-main-effect-2
                                header-nav-main-sub-effect-1
                            ">
                                <nav class="collapse show">
                                    <ul class="nav nav-pills" id="mainNav">

                                        <li class="dropdown ">
                                            <a class="
                                            dropdown-item
                                            dropdown-toggle
                                            color-vipmm
                                        "
                                                href="tel:0176750668">

                                                <span class=""
                                                    style="color:white;display: flex; gap: 10px; align-items: center;">
                                                    <span
                                                        class="material-symbols-outlined "style="font-size:25px; background-color: white; padding:5px; border-radius: 25px;  color:black;
                                                     ">
                                                        phone_in_talk_watchface_indicator
                                                    </span>+880176750668</span>

                                            </a>
                                        </li>

                                        <li class="dropdown">
                                            <a class="
                                            dropdown-item
                                            dropdown-toggle
                                            color-vipmm

                                        "
                                                data-target="#smallModal" data-toggle="modal">
                                                <span class="" style="color:white">LogIn</span>

                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
