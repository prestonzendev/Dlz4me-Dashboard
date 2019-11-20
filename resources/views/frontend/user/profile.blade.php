@extends('frontend.layouts.app')
@push('forced-styles')
{!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
@endpush
@section('content')
<div class="inside-wrapper form-page profile-page">
    <div class="container">
      <div class="inside-wrapperInner">
        <h3 class="border-heading">Manage Your Profile Data</h3>
        <div class="form-block">
          {{ Form::open(['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'files' => true]) }}
            <div class="form-inner">
              <div class="row">
              	{{ Form::input('hidden', 'email', $userinfo->email) }} 

                <div class="col-md-6 field">
                  <label>Account Name</label>
                  {{ Form::input('accountname', 'accountname', $userinfo->accountname, ['class' => 'form-control inp',  'data-mask' => 'accname', 'required' => 'required', 'placeholder' => 'Account Name']) }}
                </div>
                <!-- <div class="col-md-6 field">
                  <label>Date of Birth (Must be 18+)</label>
                  @php
                  	$dob = [0,0,0];
                  	if(!empty($userinfo->dob)) {
                  		$dob = explode('/', $userinfo->dob);
    			            $dob[2] = (int) $dob[2];
    			            $dob[1] = (int) $dob[1];
    			            $dob[0] = (int) $dob[0];
                  	}
                  @endphp
                 <div class="row">
                  <div class="col-md-2 field">
                  {{ Form::select('day', $days, $dob[0], ['class' => 'form-control categories box-size', 'required' => 'required']) }}
               </div>
               <div class="col-md-1 field text-center"> / </div>
               <div class="col-md-4 field">
                 {{ Form::select('month', $months, $dob[1], ['class' => 'form-control categories box-size', 'required' => 'required']) }}
               </div>
               <div class="col-md-1 field text-center"> / </div>
               <div class="col-md-4 field">
                 {{ Form::select('year', $years, $dob[2], ['class' => 'form-control categories box-size', 'required' => 'required']) }}
                 <span class="small" style="font-size: 10px;">*Valid till: {{$validdob}}</span>
               </div>
                  </div>
                </div> -->
                <div class="col-md-6 field">
                  {{ Form::label('firstname', 'First Name', ['class' => 'control-label']) }}
                  {{ Form::input('name', 'first_name', $userinfo->first_name, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                </div>
                <div class="col-md-6 field">
                  {{ Form::label('lastname', 'Last Name', ['class' => 'control-label']) }}
                  {{ Form::input('name', 'last_name', $userinfo->last_name, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                </div>
                <div class="col-md-6 field">
                		<label>Address Line 1</label>
                      {{ Form::input('address', 'address', $userinfo->address, ['id' => 'autocomplete', 'class' => 'form-control inp', 'required' => 'required', 'placeholder' => 'Address line 1', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                    	<label>Address Line 2</label>
                      {{ Form::input('address_2', 'address_2', $userinfo->address_2, ['id' => 'autocomplete_2', 'class' => 'form-control inp', 'placeholder' => 'Address line 2', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                    	<label>City</label>
                      {{ Form::input('city', 'city', $userinfo->city, ['id' => 'locality', 'class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'City/Town', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                    	<label>State</label>
                      {{ Form::input('state', 'state', $userinfo->state, ['id' => 'administrative_area_level_1', 'class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'State/County', 'onBlur'=>'GetLatlong()']) }}
                    </div>
                    <div class="col-md-6 field">
                    	<label>Postcode</label>
                      {{ Form::input('zip', 'zip', $userinfo->zip, ['id' => 'postal_code', 'class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'alphazip', 'placeholder' => 'Post Code', 'onBlur'=>'GetLatlong()']) }}

                      {{ Form::hidden('latitude', $userinfo->latitude,  ['id' => 'latitude']) }}

                      {{ Form::hidden('longitude', $userinfo->longitude, ['id' => 'longitude']) }}
                    </div>
                    <div class="col-md-6 field">
                       <label>Country</label>
                       <div class="select-outer">
                        <select class="inp" name="country" id="country" required="required" >
		                        <option value="" selected>Select</option>
		                        @if($countries)
		                            @foreach($countries as $country => $names)
		                            <?php $selected = ($country == $userinfo->country) ? 'selected=selected' : ''; ?>
		                       			<option value="{{$country}}" {{$selected}} >{{$country}}</option>
		                            @endforeach
		                        @endif
		                      </select>
		                  </div>
                    </div>
                    <!-- <div class="col-md-6 field">
                      <label>Search Radius in Miles</label>
                      <div class="select-outer">
                      @php
                          $radius = [
                              '5' => 5,
                              '10' => 10,
                              '25' => 25,
                              '50' => 50,
                              '500' => 500,
                          ];
                      @endphp
                      {!! Form::select('search_radius', $radius, $userinfo->search_radius, ['class' => 'inp']) !!}
                    </div>
                    </div> -->
                    <div class="col-md-6 field">
                  <label>Phone</label>
                  {{ Form::input('phone', 'phone', $userinfo->phone, ['class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'bhamashah', 'placeholder' => 'Mobile']) }}
                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-md-6 field">
                      <label>Profile Photo <span class="small">(.jpg/.jpeg/.png [450 x 550], Max 3mb)</span></label>
                      <div class="file-outer relative" title="Upload Profile Photo">
                        {{ Form::file('profilepic', array('class'=>'form-control inputfile inputfile-1 inp', 'id' => 'profilepic', 'onchange'=>'checkPhoto(this);')) }}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="img-block">{!! $profilepic !!}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 field">
                      <label>About Me</label>
                      {{ Form::textarea('aboutme', $userinfo->aboutme, ['class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'About Myself']) }}
                    </div>
              </div>
            </div>
        </div>
        
        <div class="form-block compare-block">
        <div class="btn-outer text-right">
              <input class="button-prevent-mutiple-submissions btn-purple" type="submit" value="Update Your Profile">
            </div>
        </div>

        

        {{ Form::close() }}

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
@endsection

@push('forced-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">
            // To Use Select2
            // Backend.Select2.init();

        $('#datetimepicker1').datetimepicker({

            format:'DD/MM/YYYY',
                }).on('dp.show', function (e) {
                    $(this).data('DateTimePicker').maxDate(moment().subtract(18, 'Y').format('YYYY-MM-DD'));
                });

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("profilepic").files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        }

        function checkPhoto(target) {
        var ext = $('#profilepic').val().split('.').pop().toLowerCase();
        //alert(ext);
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            document.getElementById("uploadPreview").src = 'images/placeholder-img.jpg';
        } else {
        	PreviewImage();
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

@endpush
