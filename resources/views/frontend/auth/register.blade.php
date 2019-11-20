@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper form-page register-page"> 
    <div class="container">
      <div class="inside-wrapperInner">
        <div class="row">
          <div class="col-md-4">
            <div class="content-info">
              <h2>Welcome to <br/>
                {{env('APP_NAME')}}</h2>
              <p>Registering only takes a minute. If you are already a member of
{{env('APP_NAME')}}, then please login.</p>
              <div class="link-outer"><a href="{{url('login')}}" class="link">Login</a></div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-block">
              {{ Form::open(['route' => 'frontend.auth.register', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'files' => true]) }}
                <div class="form-inner">
                  <div class="row">
                    <div class="col-md-7 field select-outer">
                    {!! Form::select('role', ['2' => 'Vendor', '3' => 'Customer'], '2', ['id' => 'role', 'class' => 'inp form-control', 'required' => 'required']); !!}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('name', 'first_name', null, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('name', 'last_name', null, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('email', 'email', null, ['class' => 'form-control inp', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('phone', 'phone', null, ['class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'bhamashah', 'placeholder' => 'Mobile']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('text', 'address', null, ['id' => 'autocomplete', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'placeholder' => 'Address line 1', 'onfocus'=>'geolocate()','autocomplete'=>'off']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('text', 'address_2', null, ['id' => 'address2', 'class' => 'form-control inp', 'placeholder' => 'Address line 2']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('text', 'city', null, ['id' => 'locality', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'City/Town']) }}
                    </div>
                    <div class="col-md-6 field ">
                      {{ Form::input('text', 'state', null, ['id' => 'administrative_area_level_1', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'State/County']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('text', 'zip', null, ['id' => 'postal_code', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'data-mask' => 'alphazip', 'placeholder' => 'Post Code']) }}
                      
                      {{ Form::hidden('latitude', null,  ['id' => 'latitude']) }}

                      {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}

                    </div>
                    <div class="col-md-6 field select-outer">
                      {{ Form::select('country', $countries, 'United Kingdom', ['id' => 'country', 'class' => 'inp getlatlong form-control', 'required' => 'required']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('password', 'password', null, ['class' => 'form-control inp', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control inp', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                    </div>
                    <div class="col-md-12">
                      <span id="uploadImage"><img id="uploadPreview" style="display: none;" src="images/samplephoto.png" id="uploadPreview" name="filePhoto" width="80px" height="107px"></span>
                    </div>
                    <!--div class="col-lg-6 field browse-outer" title="Upload Profile Photo">
                      {{ Form::file('profilepic', array('class'=>'form-control inputfile inputfile-1', 'id' => 'profilepic', 'onchange'=>'checkPhoto(this); PreviewImage();')) }}
                    </div>
                    <div class="col-lg-6 field">
                      <span class="small">(.jpg/.jpeg/.png [450 x 550], Max 3mb)</span>
                    </div-->
                    <div class="col-md-12">
                      <div class="termsInfo">
                        <div class="custom-control custom-checkbox">
                          {{ Form::checkbox('is_term_accept', null, null, ['class' => 'custom-control-input', 'required' => 'required', 'id' => 'customCheck']) }}
                          @php
                            $tnc = (!empty($setting->terms)) ? 'terms' : '#!';
                            $ppl = (!empty($setting->disclaimer)) ? 'privacy' : '#!';
                          @endphp
                          <label class="custom-control-label" for="customCheck"><a href="{{$tnc}}" target="_blank">terms and conditions</a> and the <a href="{{$ppl}}" target="_blank">privacy policy</a></label>
                          {{ Form::hidden('subscribe', 0) }}
                          {{ Form::hidden('opt_notification', 0) }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12"><p>&nbsp;</p></div>
                    <!--div class="col-md-12">
                      {!! NoCaptcha::renderJs() !!}
                      {!! NoCaptcha::display() !!}
                    </div-->

                  </div>
                </div>
                <div class="btn-outer text-right">
                  {{ Form::submit('Sign Up', ['class' => 'button-prevent-mutiple-submissions btn-purple']) }}
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyApy3vqAJKoRjGcuwZP19SXXgX22EB_xhA&libraries=places&callback=initAutocomplete'></script>
    <script type="text/javascript">

        $(document).ready(function() {
            // To Use Select2
            Backend.Select2.init();
        });

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("profilepic").files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
                $("#uploadPreview").show();
            };
        }

        function checkPhoto(target) {
        var ext = $('#profilepic').val().split('.').pop().toLowerCase();
        //alert(ext);
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $("#uploadPreview").hide();
            return false;
        }
      }

      $(document).ready(function(){
        $(".getlatlong").blur(function(){
          alert('m here!!');
          GetLatlong();
        });
      });

    </script>
    
@endsection
