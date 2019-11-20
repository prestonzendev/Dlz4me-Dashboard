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
         <div class="card">
                <form action="{{ route('frontend.user.payment.process') }}" method="post" id="payment-form">
                    @csrf                    
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value="{{ $plan->id }}" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark" type="submit">Pay</button>
                    </div>
                </form>
            </div>
       </div>
     </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


@endsection

@push('forced-scripts')
    
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
var stripe = Stripe('{{ env("STRIPE_KEY") }}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endpush