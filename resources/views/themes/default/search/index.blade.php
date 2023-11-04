@extends('user.master.usermaster')
@push('css')
<style>
.search-frontend-sidebar .single-sidebar-menu-box {
    background: white ;
    border: 3px solid #F15C62 ;
    padding: 10px;

}
.search-frontend-sidebar .single-sidebar-menu-box .icon-box {
    height: 40px;
    width: 70px;
    padding: 5px;
    color: #F15C62 ;
}
.details{
    color:white;
}
.fontize{
font-size: 48px;
}
.fontcolor{
    color: #F15C62;
}
.single-sidebar-menu p
{
    text-decoration: none;
}
</style>
@endpush
@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 mb-4">
            <div class="search-frontend-sidebar left-padding w3-card-2 ">
                <div class="single-sidebar-menu-box w3-round-medium px-3 w3-animate-zoom w3-hover-grayscale">
                    <a href="{{ route('getSearch','profession')}}">
                        <div class="icon-box float-left">
                            <i class="fa fa-briefcase fontize"></i>
                        </div>
                        <div class="details">
                            <h5 class="fontcolor font-weight-bold">Profession search</h5>
                            <p class="">Professional's profile, you can search easily.You can Try it.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="search-frontend-sidebar left-padding w3-card-2  w3-animate-zoom w3-hover-grayscale">
                <div class="single-sidebar-menu-box w3-round-medium px-3">
                    <a href="{{ route('getSearch','education')}}">
                        <div class="icon-box float-left">
                            <i class="fa fa-graduation-cap fontize"></i>
                        </div>
                        <div class="details">
                            <h5 class="fontcolor font-weight-bold">Education search</h5>
                            <p class=""> Education profile, you can search easily. You can Try it.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="search-frontend-sidebar left-padding w3-card-2 w3-animate-zoom w3-hover-grayscale">
                <div class="single-sidebar-menu-box w3-round-medium px-3">
                    <a href="{{ route('getSearch','district')}}">
                        <div class="icon-box float-left">
                            <i class="fa fa-map-marker fontize"></i>
                        </div>
                        <div class="details">
                            <h5 class="fontcolor font-weight-bold">District search</h5>
                            <p class="">District's profile, you can search easily. You can Try it.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="search-frontend-sidebar left-padding w3-card-2 w3-animate-zoom w3-hover-grayscale">
                <div class="single-sidebar-menu-box w3-round-medium px-3">
                    <a href="{{ route('getSearch','community')}}">
                        <div class="icon-box float-left">
                            <i class="fa fa-star fontize"></i>
                        </div>
                        <div class="details">
                            <h5 class="fontcolor font-weight-bold">Community search</h5>
                            <p class=""> Community's profile, you can search easily. You can Try it.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="search-frontend-sidebar left-padding w3-card-2 w3-animate-zoom w3-hover-grayscale">
                <div class="single-sidebar-menu-box w3-round-medium px-3">
                    <a href="{{ route('getSearch','zodiac')}}">
                        <div class="icon-box float-left">
                            <i class="fa fa-moon fontize"></i>
                        </div>
                        <div class="details">
                            <h5 class="fontcolor font-weight-bold">Zodiac search</h5>
                            <p class=""> Zodiac profile, you can search easily. You can Try it.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="search-frontend-sidebar left-padding w3-card-2 w3-animate-zoom w3-hover-grayscale">
                <div class="single-sidebar-menu-box w3-round-medium px-3">
                    <a href="{{ route('getSearch','country')}}">
                        <div class="icon-box float-left">
                            <i class="fa fa-search fontize"></i>
                        </div>
                        <div class="details">
                            <h5 class="fontcolor font-weight-bold">Country search</h5>
                            <p class=""> Country's profile, you can search easily.You can Try it.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="search-frontend-sidebar left-padding w3-card-2 w3-animate-zoom w3-hover-grayscale">
                <div class="single-sidebar-menu-box w3-round-medium px-3">
                    <a href="{{ route('user.pertnerSearch')}}">
                        <div class="icon-box float-left">
                            <i class="fa fa-search fontize"></i>
                        </div>
                        <div class="details">
                            <h5 class="fontcolor font-weight-bold">Advance Search</h5>
                            <p class="" style="text-decoration: none">Advance profile, you can search easily.You can Try it.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
