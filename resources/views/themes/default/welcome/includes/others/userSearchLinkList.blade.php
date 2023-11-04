<li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">search</i> SEARCH
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="{{route('welcome.search')}}" class="dropdown-item">
                                <i class="material-icons">layers</i> Search All
                            </a>

                            {{-- <a href="{{route('welcome.search', 'searchProfession')}}" class="dropdown-item">
                                <i class="material-icons">layers</i> Profession Search
                            </a> --}}

                            <a href="{{route('welcome.search', 'searchPhoto')}}" class="dropdown-item">
                                <i class="material-icons">photo_library</i> Photo Search
                            </a>

                            {{-- <a href="{{route('welcome.search', 'searchUsername')}}" class="dropdown-item">
                                <i class="material-icons">account_circle</i> Username Search
                            </a> --}}

                            @auth
                                <a href="{{route('welcome.search', 'searchCustom')}}" class="dropdown-item">
                                <i class="material-icons">account_circle</i> Custom Search
                            </a>

                            <a href="{{route('welcome.search', 'searchSetting')}}" class="dropdown-item">
                                <i class="material-icons">layers</i> Search Setting
                            </a>
                            @endauth

                        </div>
                    </li>