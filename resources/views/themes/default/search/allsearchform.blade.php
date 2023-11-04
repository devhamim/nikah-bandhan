@extends('user.master.usermaster')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="search-form p-5 w3-white w3-border-2 w3-round-medium w3-border  w3-border-red w3-animate-zoom">
                    <form method="Get" action="{{ route('allsearch.result')}}">
                        {{ csrf_field() }}
                        @if($slug == "profession")
                            <div class="form-group">
                                <label for="">Select Profession</label>
                                <select class="form-control  simple-select2 w-100" id="profession" name="profession">
                                    @foreach ($userSettingFields[26]->values as $value)
                                        <option value="{{ $value->title }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if($slug == "education")
                        <div class="form-group">
                            <label for="">Select Education</label>
                            <select class="form-control  simple-select2 w-100" id="education" name="education_level">
                                @foreach ($userSettingFields[25]->values as $value)
                                    <option value="{{ $value->title }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if($slug == "district")
                    <div class="form-group">
                        <label for="">Select District</label>
                        <select class="form-control  simple-select2 w-100" id="district" name="area">
                            @foreach ($districts as $value)
                                <option>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                   @endif
                   @if($slug == "community")
                   <div class="form-group">
                       <label for="">Select Community</label>
                       <select class="form-control  simple-select2 w-100" id="community" name="religion">
                           @foreach ($religions as $value)
                               <option>{{ $value->name }}</option>
                           @endforeach
                       </select>
                   </div>
                  @endif
                  @if($slug == "zodiac")
                  <div class="form-group">
                      <label for="">Select Zodiac</label>
                      <select class="form-control  simple-select2 w-100" id="zodiac" name="zodiac">
                          @foreach ($religions as $value)
                              <option>{{ $value->name }}</option>
                          @endforeach
                      </select>
                  </div>
                 @endif
                 @if($slug == "country")
                 <div class="form-group">
                     <label for="">Select Country</label>
                     <select class="form-control  simple-select2 w-100" id="country" name="country">
                        @foreach ($userSettingFields[2]->values as $value)
                        <option value="{{ $value->title }}">{{ $value->title }}</option>
                        @endforeach
                     </select>
                 </div>
                @endif
                <button type="submit" class="float-right btn" style="background: #F15C62">
                    <i class="fa fa-search"></i> Search</button>
            </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
@endsection
