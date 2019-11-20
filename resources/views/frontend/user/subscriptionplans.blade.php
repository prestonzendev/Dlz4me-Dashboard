@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper subscription-page">
    <div class="container">
      <div class="inside-wrapperInner">
        <p class="text-center">To be able to communicate with other members, <br/>
          you must choose one of the following subscription plans:</p>
        @if($plans)
        <div class="plan-block text-center">
          @php 
            $sn = 0; 
          @endphp
          @foreach($plans as $pid => $plan)
          @php
          $bluebox = '';
          $sn++;  
          if($sn == 2) {
            $bluebox = 'blue-box';
          }
          @endphp
          <div class="plan-box {{$bluebox}}">
            {{ Form::open(['route' => 'frontend.user.upgrade.plan', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'files' => true]) }}
            <h2>{{substr(trim($plan['title']), 0, 13)}}</h2>
            <div class="price">{!! $setting->currency_symbol !!} {{$plan['price']}}</div>
            <div class="white-box">
              <ul class="plan-listing equalcol">
                @foreach($features as $feature)
                @php if($feature->subscription_plan_id != $pid) continue; @endphp
                <li>{{$feature->description}}</li>
                @endforeach
              </ul>
              <div class="bottom-fix text-center">
                <div class="offer-box d-flex align-items-center justify-content-center flex-wrap">
                  @php
                    $dailyAmt = sprintf("%.2f", ((($plan['price'] / $plan['duration']) * 12) / 366));
                    $amtArr = explode('.', $dailyAmt);
                    $perday = (!$amtArr[0]) ? $amtArr[1] : $dailyAmt;
                  @endphp
                  <div>Only <strong>{{$perday}} <span style="text-transform:lowercase;">p</span></strong> Per day</div>
                </div>
                <div class="btn-outer">
                  @if(isset($userplans[$pid]) && !empty($userplans[$pid]->expiry_date))
                      <div class="link-outer">
                        <a href="#!" class="link">Already Subscribed</a>
                        <center>Expires On: @php echo date('d/m/Y',strtotime($userplans[$pid]->expiry_date)) @endphp</center>
                      </div>
                   @else
                  <input class="blue-btn" type="submit" value="Upgrade">
                  @endif
                </div>
                {{ Form::input('hidden', 'pid', $pid) }} 
              </div>
            </div>
            {{ Form::close() }}
          </div>
          @php
          if($sn == 2) {
            $sn = 0;
           echo '</div>
            <div class="clearfix"></div>
            <div class="plan-block text-center">';
          }
          @endphp
          @endforeach
        </div>
        @endif
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
@endsection

