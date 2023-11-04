<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title">Upload Profile Picture </h3>
        <div class="box-tools pull-right">
            @if ($user->uploadedPP())
                <a href="{{ route('admin.userPPDelete', $user->uploadedPP()) }}" title="Delete this picture">
                    <span class="fa-stack fa-lg ">
                        <i class="fa fa-square-o fa-stack-2x "></i>
                        <i
                            class="fa fa-trash w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-red fa-stack-1x "></i>
                    </span>
                </a>
            @endif
        </div>
    </div>
    <div class="box-body" style="min-height: 260px;">
        <div class="row">



            <div class="row">
                <div class="col-sm-12">
                    <div class="fb-profile">

                        <div class="profile-image">

                            @include('admin.partials.userProfilePic')

                        </div>


                        <div class="crop-profilepic-container">
                            <img style="display: none;" class="img-fluid" id="crop-profilepic" src="">
                        </div>


                        <a id="btn-profilepic" class="btn-profilepic" title="Change Profile Picture">


                            <span class="fa-stack fa-lg ">
                                <i class="fa fa-square-o fa-stack-2x "></i>
                                <i
                                    class="fa fa-camera w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-blue fa-stack-1x "></i>
                            </span>

                        </a>

                        <form id="form_profilepic_upload" method="post" enctype="multipart/form-data"
                            action="{{ route('admin.userProfilepicChange', $user) }}">
                            {{ csrf_field() }}
                            <input class="form-control" type="file" id="my_profilepic" name="profile_picture"
                                style="display: none;" />
                            <input class="form-control" style="display: none;" id="off_x" step="any" type="number"
                                name="off_x" />
                            <input class="form-control" style="display: none;" id="off_y" step="any" type="number"
                                name="off_y">
                            <input class="form-control" style="display: none;" id="change_width" step="any"
                                type="number" name="change_width">
                            <input class="form-control" style="display: none;" id="change_height" step="any"
                                type="number" name="change_height">

                            <button type="reset"
                                class="btn-card-4 btn-profilepic-cancel w3-btn w3-round w3-white btn-xs"><i
                                    class="fa ion-android-cancel fa-2x w3-text-red"></i></button>
                            <button type="submit"
                                class="btn-card-4 btn-profilepic-submit w3-btn w3-round w3-white btn-xs"><i
                                    class="fa ion-android-checkmark-circle fa-2x w3-text-green"></i></button>
                        </form>








                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">

                    @if ($user->uploadedPP())



                        <div class="checkbox">
                            <label>
                                <input class="image-check"
                                    data-url="{{ route('admin.userProfilepicCheck', [$user->uploadedPP(), 'checked']) }}"
                                    type="checkbox" name="profile_pic_checked"
                                    {{ $user->uploadedPP()->checked ? 'checked' : '' }} /> Data Checked (Profile
                                Pic)</label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input class="image-check"
                                    data-url="{{ route('admin.userProfilepicCheck', [$user->uploadedPP(), 'edit']) }}"
                                    type="checkbox" name="profile_pic_can_edit"
                                    {{ $user->uploadedPP()->can_edit ? 'checked' : '' }} /> Can Edit (Profile
                                Pic)</label>
                        </div>




                    @endif

                </div>
            </div>




        </div>
    </div>
</div>
