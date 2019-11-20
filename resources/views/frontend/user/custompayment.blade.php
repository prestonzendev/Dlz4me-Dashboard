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
                    $perday = sprintf("%.2f", ((($plan->price / $plan->duration) * 12) / 366));
                  @endphp
                  <div>Only <strong>{{$perday}} {!! $setting->currency_symbol !!}</strong> Per day</div>
                </div>
              </div>
            </div>
          </div>
      </div>
       <div class="col-md-8 col-md-offset-2">
        <div class="contact-page-form">
          <p>&nbsp;&nbsp; Please proceed for payment, by filling following details.</p>
          {{ Form::open(['route' => 'frontend.user.payment', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'id' => 'my-sample-form']) }}
            <div class="field">
              <label for="card-number">Card Number</label>
              <div id="card-number"></div>
            </div>
            <div class="field">
              <label for="cvv">CVV</label>
              <div id="cvv"></div>
            </div>
            <div class="field">
              <label for="expiration-date">Expiration Date</label>
              <div id="expiration-date"></div>
            </div>
            <div class="btn-outer text-right">
              {{ Form::submit('Pay Now', ['class' => 'button-prevent-mutiple-submissions blue-btn', 'required'=>'required','disabled'=>'disabled']) }}
            </div>
          {{ Form::close() }}
        </div>
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
  {!! Html::script('js/client.min.js') !!}
  {!! Html::script('js/hosted-fields.min.js') !!}
  <script>
    var form = document.querySelector('#my-sample-form');
    var submit = document.querySelector('input[type="submit"]');

    var form = document.querySelector('#my-sample-form');
      var submit = document.querySelector('input[type="submit"]');

      braintree.client.create({
        authorization: "{{ Braintree_ClientToken::generate() }}",
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          alert(clientErr);
          return;
        }

        // This example shows Hosted Fields, but you can also use this
        // client instance to create additional components here, such as
        // PayPal or Data Collector.

        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '14px'
            },
            'input.invalid': {
              'color': 'red'
            },
            'input.valid': {
              'color': 'green'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
              placeholder: '4111 1111 1111 1111'
            },
            cvv: {
              selector: '#cvv',
              placeholder: '123'
            },
            expirationDate: {
              selector: '#expiration-date',
              placeholder: '10/2019'
            }
          }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
          if (hostedFieldsErr) {
            alert(hostedFieldsErr);
            return;
          }

          submit.removeAttribute('disabled');

          form.addEventListener('submit', function (event) {
            event.preventDefault();

            hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
              if (tokenizeErr) {
                alert(tokenizeErr);
                return;
              }

              $.get('{{ route('frontend.user.payment.process') }}', {payload}, function (response) {
                if (response.success) {
                  window.location.href = '{{route('frontend.user.dashboard')}}';
                } else {
                  window.location.href = '{{route('frontend.user.payment')}}?err=1';
                }
              }, 'json');

            });
          }, false);
        });
      });
   
  </script>

@endpush
