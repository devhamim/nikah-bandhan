@extends('user.master.usermaster')
@push('css')
    <style>
        hr {
            border: 0;
            border-top: 1px solid #eee;
            margin: 8px 0;
        }

    </style>

@endpush
@section('content')

    <div class="container bg-white py-2">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" style="width: 100px" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <P class="text-dark">Helpline: 01770875563</P>
                </div>
            </div>
        </div>
        <hr>

        <div class="row px-2">
            <div class="col-md-3">

                <img class="img-fluid rounded mb-4" src="{{ asset('img/vip-user.png') }}" style="border: 1px solid gray"
                    alt="Project Image">
                <div class="text-center">
                    <h2 class="text-dark">Md. Tarek Aziz</h2>
                    <span class="font-weight-bold text-dark">29 Years, Muslim , Never Married <br> 5ft 8in - 172cm </span>
                </div>

                <div class="text-justify">
                    <h5 class="text-dark">My Family Overview :</h5>
                    <hr>
                    <p class="text-dark">My family details can be shared after the
                        initial discussion. If anyone thinks that I
                        can be contacted by looking at the profile
                        information - I am requesting to send a
                        proposal without hesitation. Of course,
                        before sending the proposal, I request you
                        to check my partners preference. </p>
                </div>
            </div>

            <div class="col-md-9 pl-4 text-dark">
                <h5 class="text-dark">Profile ID : tarek</h5>
                <h5 class="text-dark">Profile Created by: Self</h5>
                <div class="row">
                    <div class="text-justify">

                        <h5 class="text-dark">My Overview :</h5>
                        <hr>
                        <p class="text-dark">hi, whats up, I am Md. Tarek Aziz, completed graduation from IEB(BUET) in
                            electrical n electronic engineering, running now a multinational electronics company I
                            have no parents it is shortly about me whats about u?
                        </p>

                    </div>
                </div>


                   <div class="row">
                    <div class="text-justify">

                        <h5 class="text-dark">My Basic information & Appearance :</h5>
                        <hr>
                        <p class="text-dark"><strong>AGe:</strong> 12Years <strong>Complexion: </strong>Fair <br>
                            <strong>Marital Status:</strong> Never Married <strong>Body Type:</strong> Average <br>
                            <strong>Height:</strong> 5ft 8in - 172cm <strong>Disabilities:</strong> No Disability <br>
                            <strong>Children:</strong> No Children <strong>Blood Group:</strong> O+
                        </p>


                    </div>
                   </div>

                  <div class="row">
                    <div class="text-justify">

                        <h5 class="text-dark">My Community & Social Background :</h5>
                        <hr>
                        <p class="text-dark"><strong>Community:</strong> Muslim <strong>Family Values:</strong> Liberal <br>
                           <strong> Cast/Social Order:</strong> Sunni <strong>Mother Tongue:</strong> Bengali
                        </p>


                    </div>


                </div>



                <div class="row">
                    <div class="text-justify">

                        <h5 class="text-dark">My Cultural Background :
                        </h5>
                        <hr>
                        <p class="text-dark"><strong>Country of Birth:</strong> Bangladesh <strong>Personal Values:</strong> Liberal <br>
                            <strong>Grew Up In:</strong> Bangladesh <br>
                           <strong> Can Speak:</strong> Bengali, English
                        </p>


                    </div>
                </div>

                <div class="row">
                    <div class="text-justify">

                        <h5 class="text-dark">My Education & Career :
                        </h5>
                        <hr>
                        <p class="text-dark"><strong>Education:</strong> BA|BSS|BCOM|BSC
                            <strong>Major Subject:</strong> Electronic Technology
                            <strong>University:</strong> Bangladesh University of Engineering & Technology (BUET)
                            <strong>Organization:</strong> Samsung Electronic
                            <strong>Designation:</strong> Asst Chief Engineer
                        </p>


                    </div>
                </div>

                <div class="row">
                    <div class="text-justify">

                        <h5 class="text-dark">My Hobbies, Interests & More :
                        </h5>
                        <hr>
                        <p class="text-dark"><strong>Favourite Music:</strong> Latest film songs, Latest Bangla Music <br>
                            <strong>Favourite Reads:</strong> Magazines & Newspaper <br>
                           <strong> Preferred Movies:</strong> Drama, Romantic <br>
                            <strong>Favourite Cooking:</strong> Bangla Foods <br>
                           <strong> Dress Style :</strong> Classic - Bangladeshi Formal wear
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="text-justify">

                        <h5 class="text-dark">My Lifestyle :
                        </h5>
                        <hr>
                        <p class="text-dark"><strong>Religious View:</strong> Practice Weekly <strong>Drink:</strong> Don't drink <br>
                           <strong> Diet:</strong> Non Vegetarian <strong>Smoke:</strong> Dont smoke
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
