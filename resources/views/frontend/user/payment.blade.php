@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper">
    <div class="container">
      <div class="inside-wrapperInner">

      <div class="row">
       <div class="col-md-4 col-md-offset-2">
        <div class="plan-box">
            <h2>{{substr(trim($plan->title), 0, 13)}}</h2>
            <div class="price">{!! $setting->currency_symbol !!} {{$plan->price}}</div>
            <div class="white-box">
              <ul class="plan-listing equalcol">
                @foreach($features as $feature)
                <li>{{$feature->description}}</li>
                @endforeach
              </ul>
              <div class="bottom-fix text-center">
                <div class="offer-box d-flex align-items-center justify-content-center flex-wrap">
                  @php
                    $dailyAmt = sprintf("%.2f", ((($plan->price / $plan->duration) * 12) / 366));
                    $amtArr = explode('.', $dailyAmt);
                    $perday = (!$amtArr[0]) ? $amtArr[1] : $dailyAmt;
                  @endphp
                  <div>Only <strong>{{$perday}} <span style="text-transform:lowercase;">p</span></strong> Per day</div>
                </div>
              </div>
            </div>
          </div>
      </div>
       <div class="col-md-8 col-md-offset-2">
         <div id="dropin-container"></div>
         <button class="blue-btn" id="submit-button">Pay Now</button>
       </div>
     </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


@endsection

@push('forced-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
  {!! Html::script('js/dropin.min.js') !!}
  <script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "{{ Braintree_ClientToken::generate() }}",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          if(err){ return; }
          $.get('{{ route('frontend.user.payment.process') }}', {payload}, function (response) {
            if (response.success) {
              window.location.href = '{{route('frontend.user.dashboard')}}';
            } else {
              window.location.href = '{{route('frontend.user.payment')}}?err=1';
            }
          }, 'json');
        });
      });
    });
  </script>

@endpush