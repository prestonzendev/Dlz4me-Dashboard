@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper search-page">
  <div class="container">
    <div class="inside-wrapperInner">
      <div class="row">
        <div class="col-md-2">
          
            
        </div>
        <div class="col-md-10">
          <div class="search-detsilsBlock">
            <div class="row">
              <div class="col-sm-2">
                <div class="img-block">
                  @if(!empty($userinfo->profilepic) && $userinfo->picapproved == 1)
                  <img src="{{env('IMG_URL')}}/storage/app/public/img/profilepic/{{$userinfo->profilepic}}" >
                  @else
                    <img src="{{url('images/noimagefound.jpg')}}" width="231px" >
                  @endif
                </div>
              </div>
              <div class="col-sm-10">
                <div class="content d-flex justify-content-between flex-column h-100">
                  <div><p>{{$userinfo->aboutme}}</p></div>
                  <ul class="detsils-listing">
                    <li><strong>Name :</strong> {{$userinfo->accountname}}</li>
                    @if($userinfo->age)
                    <li><strong>Age :</strong> {{$userinfo->age}} Years Old</li>
                    @endif
                    <!-- <li><strong>Phone :</strong> {{$userinfo->phone}}</li> -->
                    <li><strong>Location :</strong> {{$userinfo->city}} , {{$userinfo->state}}</li>
                    <!-- <li><strong>Search Radius :</strong> {{$userinfo->search_radius}} Miles</li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
           <div class="container">

        @if($preferences)
            @php
              $total = count($preferences);
                $sn = 0;
            @endphp
            @foreach($preferences as $prefId => $preferenceType)
            @php
                $sn++;
            @endphp
        <h3 class="border-heading margin-top60">{{$preferenceType['title']}}</h3>
        <div class="form-block compare-block">
            <div class="form-inner">
              <div class="row">
              @foreach($preferencesoption as $optionid => $option)
              @php
                $grouptitle = $option['title'];
                $profileoption = $option['slug'];
                if($option['preference_id'] != $prefId || $profileoption == 'age') continue;

                $userValue = [
                  'me' => [],
                  'my' => [],
                ];
                if (isset($userprefrencesme[$profileoption])) {
                  $setValue = $userprefrencesme[$profileoption]->option_value;
                  if (!empty($setValue)) {
                    $userValue['me'][] = ucwords($setValue);
                  } else if($userprefrencesme[$profileoption]->multiple_options == 1) {
                    foreach ($profileoptions as $multiOpt) {
                      if ($multiOpt->profile_id == $userprefrencesme[$profileoption]->id) {
                        $userValue['me'][] = ucwords($multiOpt->option_value);
                      }
                    }
                  }
                }

              @endphp

                <div class="col-sm-6 field">
                  <div>
                    {{ Form::label($grouptitle, $grouptitle, ['class'=>'link']) }}
                      {{ Form::label('searchradius', implode(', ', $userValue['me'])) }}
                  </div>
                </div>
              

              @endforeach
</div>
            </div>

        </div>

          @endforeach

        @else
        <div class="form-block compare-block">
        <div class="btn-outer text-right">
              <input class="blue-btn" type="submit" value="Update Your Profile">
            </div>
        </div>

        @endif

        
    </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  </div>
@endsection