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
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-block">
              {{ Form::open(['route' => 'frontend.vendor.profile.edit', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'files' => true]) }}
                <div class="form-inner">
                  <div class="row">
                    <div class="col-md-6 field">
                      {{ Form::input('name', 'first_name', $userinfo->first_name, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('name', 'last_name', $userinfo->last_name, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('email', 'email', $userinfo->email, ['class' => 'form-control inp', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.email'), 'readonly'=>'readonly']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('phone', 'phone', $userinfo->phone, ['class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'bhamashah', 'placeholder' => 'Mobile']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('address', 'address', $userinfo->address, ['id' => 'autocomplete', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'placeholder' => 'Address line 1', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('address_2', 'address_2', $userinfo->address_2, ['id' => 'autocomplete_2', 'class' => 'form-control inp getlatlong', 'placeholder' => 'Address line 2', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('city', 'city', $userinfo->city, ['id' => 'locality', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'City/Town', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('state', 'state', $userinfo->state, ['id' => 'administrative_area_level_1', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'State/County', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('zip', 'zip', $userinfo->zip, ['id' => 'postal_code', 'class' => 'form-control inp getlatlong', 'required' => 'required', 'data-mask' => 'alphazip', 'placeholder' => 'Post Code', 'onBlur'=>'GetLatlong()']) }}
                      
                      {{ Form::hidden('latitude', null,  ['id' => 'latitude']) }}

                      {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}

                    </div>
                    <div class="col-md-6 field select-outer">
                      {{ Form::select('country', $countries, $userinfo->country, ['id' => 'country', 'class' => 'inp getlatlong', 'required' => 'required']) }}
                    </div>
                    <div class="col-md-12">
                      <span id="uploadImage"><img id="uploadPreview" style="display: none;" src="images/samplephoto.png" id="uploadPreview" name="filePhoto" width="80px" height="107px"></span>
                    </div>

                  </div>
                </div>
                <div class="btn-outer text-right">
                  {{ Form::submit('Update', ['class' => 'button-prevent-mutiple-submissions btn-purple']) }}
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

    <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyApy3vqAJKoRjGcuwZP19SXXgX22EB_xhA&libraries=places&callback=initAutocomplete'></script>
    
@endsection
