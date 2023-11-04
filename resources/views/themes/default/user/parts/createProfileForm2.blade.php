@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/select2-bootstrap4/dist/select2-bootstrap4.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
@media screen and (max-width: 600px){
    .nav-item{
        width: 100%;
    }
}
.incNav{
    color: black !important;
    text-emphasis: bold !important;
    padding: 1rem 10px;
    width: 100%;
}

.p-tab{
    display: block;
    color: blueviolet !important;
}
.nav-link.active:after {
    content: "";
    bottom: 0px;
    position: absolute;
    bottom: -15px;
    left: 38% !important;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-top: 15px solid #b2b2b2;
}
</style>
@endpush
<div class="row">
    <div class="col-md-12">
        <form action="{{route('user.userBasicInformationSettings')}}" method="post" >
            @csrf
       <div class="py-2">
        

        <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
            <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
                <a  class="nav-link active " id="home-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="home" aria-selected="true"  style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">Edit Basic Info 
                  <span class="user-basic-updated">
                     
                    @if ($me->profile == false && isset($me->country))
                        <span class="w3-text-green w3-round-large px-1 fa-lg">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </span>
                    @endif
                </span>
                </a>
            </li>
            <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
              <a class="nav-link " id="profile-tab" data-toggle="tab" href="#education" role="tab" aria-controls="profile" aria-selected="false" style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">
                  Update Education
                  <span class="user-education-updated">
                    @if ($me->profile == false && $me->userEducationRecord->count() > 0)
                        <span class="w3-text-deep-orange w3-round-large px-1 fa-lg">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </span>
                    @endif
                </span>
                </a>
            </li>
            <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
                <a class="nav-link " id="profile-tab" data-toggle="tab" href="#career" role="tab" aria-controls="profile" aria-selected="false" style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">
                    Update Career Info
                    {{-- <span class="user-education-updated">
                      @if ($me->profile == false && $me->personalInfo->my_profession && $me->personalInfo->my_profession)
                          <span class="w3-text-deep-orange w3-round-large px-1 fa-lg">
                              <i class="fa fa-check-square-o" aria-hidden="true"></i>
                          </span>
                      @endif
                  </span> --}}
                  </a>
              </li>
              <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
                <a class="nav-link " id="profile-tab" data-toggle="tab" href="#family" role="tab" aria-controls="profile" aria-selected="false" style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">
                    Update Family Info
                  </a>
              </li>
            {{-- <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#profession" role="tab" aria-controls="contact" aria-selected="false" style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">
                  Update Work Info
                  <span class="user-work-updated">
                    @if ($me->profile == false && $me->userWorkingRecord->count() > 0)
                        <span class="w3-text-deep-orange w3-round-large px-1 fa-lg">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </span>
                    @endif
                    </span>
              </a>
            </li> --}}
            {{-- <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#familyInfo" role="tab" aria-controls="contact" aria-selected="false" style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">
                Update Family Info
                <span class="user-family-updated">
                    @if ($me->profile == false && isset($me->familyInfo->mother_occupation))
                        <span class="w3-text-deep-orange w3-round-large px-1 fa-lg">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </span>
                    @endif
                </span>
              </a>
            </li> --}}
            {{-- <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#prefer_settings" role="tab" aria-controls="contact" aria-selected="false" style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">
                Preference Setting
                <span class="user-preference-updated">
                    @if ($me->profile == false && isset($me->searchTerm->min_age))
                        <span class="w3-text-deep-orange w3-round-large px-1 fa-lg">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </span>
                    @endif
                </span>
              </a>
            </li> --}}
            
            <li class="nav-item rounded border-top border-left border-right w3-grey" role="presentation">
              <a class="nav-link " id="contact-tab" data-toggle="tab" href="#photo" role="tab" aria-controls="contact" aria-selected="false" style="color: black !important; font-weight: bold !important; padding: 20px 10px !important;">
                  Upload photo
                <span class="user-photo-uploaded">
                    @if ($me->profile == false && $me->userProfilePics()->count() > 0 && $me->userPhotos()->count() > 2)
                        <span class="w3-text-deep-orange w3-round-large px-1 fa-lg">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </span>
                    @endif
                </span>
              </a>
            </li>
        </ul>
        <div class="tab-content pt-4" id="myTabContent">
            <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="home-tab">
                <div class="my-2">
                    @include('user.settings.includes.forms.basicInfoform')
                </div>
            </div>
            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="profile-tab">
                <div class="my-2">
                    @include('user.settings.includes.forms.eduInfoForm')
                </div>
            </div>
            <div class="tab-pane fade" id="career" role="tabpanel" aria-labelledby="profile-tab">
                <div class="my-2">
                    @include('user.settings.includes.forms.changeCareerInfoForm')
                </div>
            </div>
            <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="profile-tab">
                <div class="my-2">
                    @include('user.settings.includes.forms.changeFamilyInfoForm')
                </div>
            </div>
            <div class="tab-pane fade" id="profession" role="tabpanel" aria-labelledby="contact-tab">
                {{-- <div class="my-2">
                    @include('user.settings.includes.forms.changeWorkInfoForm')
                </div> --}}
            </div>
            {{-- <div class="tab-pane fade" id="familyInfo" role="tabpanel" aria-labelledby="contact-tab">
                <div class="my-2">
                    @include('user.settings.includes.forms.changeFamilyInfoForm')
                </div>
            </div> --}}
            {{-- <div class="tab-pane fade" id="prefer_settings" role="tabpanel" aria-labelledby="contact-tab">
                <div class="my-2">
                    @include('user.searches.includes.forms.searchSettingForm')
                </div>
            </div> --}}
            <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="contact-tab">
               <div class="my-2">
                {{-- @include('user.searches.includes.forms.uploadPhotos') --}}
                @include('user.parts.createProfileUpload')
               </div>
            </div>
        </div>

        <div class="setting-part my-3 pull-right">
            <div class="setting-container">
                
                    <div class="col">
                        <input type="checkbox" required name="agreement">
                        I agree to <a class="w3-text-blue" href="#accordion">Terms and Conditions</a>
                    </div>
                    <div class="col mt-1">
                        <button class="btn w3-blue  float-right">Finish</button>
                    </div>
                </form>
            </div>
        </div>
       </div>
    </div>
    <div class="col">
        <div id="accordion" class="mt-5">
            <div class="w3-card">
              <div class="w3-card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Terms and Conditions
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="container">
                        <ol>
                        <li> The service delivery time of BrideGroom BD is from 10.00 am to 7.00 pm.</li>
                        <li> Without the guardian, the work is not done only under the supervision of the spouse.</li>
                        <li> At the time of customer registration, the customer's biodata and his / her presentable 3 copies of 4R photo and photocopy of national identity card should be submitted to the office.</li>
                        <li> It is forbidden to give any kind of misinformation to each other. You will bear the responsibility for the wrong information. BrideGroom BD can never be blamed in that case.</li>
                        <li> The total registration fee has to be paid at the time of registration and the registration fee is non-refundable. If any part of the registration fee is due due to any financial problem of the customer, it has to be paid within maximum 7 days from the date of registration and only one person will be provided service against that registration, service will not be coordinated with any other customer.</li>
                        <li> BrideGroom BD will provide a maximum of 1 (one) year service for you after depositing the fee against the said registration.</li>
                        <li> Cash, bKash, bank account-pay check and payment can be made online. The work of marriage of orphans and helpless people is supported free of cost in BrideGroom BD.</li>
                        <li> Customer support is required for the presence of a representative of BrideGrooms BD at the ceremony.</li>
                        <li> It is requested that a representative appointed by the BrideGroom BD be present at any event / discussion between the two parties from the time of becoming a member of the BrideGroom BD till the marriage is consummated or to inform the organization of all the information in due course.</li>
                        <li> Before finalizing the date and time of the wedding, both parties have to take responsibility for finding out about the bride / groom.</li>
                        <li> After the couple chooses each other, the parents have to make a decision as soon as possible with the consent of both the parties through sincerity through communication.</li>
                        <li> If a member is already acquainted with each other after the meeting and arranges the marriage without informing us, then the member must pay all the money due to BrideGroom BD.</li>
                        <li> If the marriage is settled by their own efforts or by any other means, the BrideGroom BD should be informed immediately.</li>
                        <li> Both the parties will discuss all the issues including debts, finalizing the day and date of Mohrana and will decide on their own responsibility. If needed, BrideGroom BD will assist you as much as possible.</li>
                        <li> At the time of customer registration, the account-pay check of marriage fee money has to be submitted in advance. The marriage fee has to be paid as soon as the marriage is final.
                        <li> Any other expenses or gift items other than the member fee / marriage fee will be at your own risk.</li>
                        <li> We must try to be present at all the events of the marriage organization such as bug-donation, gaye halud, biye, walima etc. It is the duty of the BrideGroom BD to make it a success and we must provide the opportunity for the institutional promotion of the BrideGroom BD.</li>
                        <li> As a proof of the success of the marriage organized through BrideGroom BD, the customer should not have any objection in promoting the various social media and online sites of the organization such as pictures, videos etc.</li>
                        <li> The company will continue its activities in accordance with the appropriate rules. No pressure can be exerted on the company to provide services or marriage.</li>
                        <li> Violation of any of the conditions mentioned will force the BrideGroom BD to take recourse to the law through its own lawyer. THE COOPERATION OF PARENTS AND SPOUSES IS DESIRABLE TO PERFORM THE GOOD WORK</li>
                        <li>  Birth, death, marriage are in the hands of God Almighty, try us, the decision is yours.  After all our efforts, it is your responsibility to accept whatever the outcome may be. Please refrain from abusing any customer, representatives of the organization. The rest of your life is the best time of your life.</li>
                        <li> Give your signature voluntarily, consciously, in a healthy mind, without any objection and peacefully reading the terms and conditions, knowing all the issues.</li>
                        <ol>
                        </div>
                </div>
              </div>
            </div>
           </div>
    </div>
</div>

@push('js')
<script>
    $(function () {
        $(document).on("click", ".setting-btn-link", function(e){
    e.preventDefault();

    var that = $(this);
    that.closest('.setting-part').find('.setting-container').toggle();
});

});
</script>
@endpush