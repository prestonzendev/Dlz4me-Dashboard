@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper dashboard-page">
    <div class="container">
        <div class="inside-wrapperInner">
        <div class="row">
          <div class="col-md-4">
            <div class="content-info">
              <h2>Welcome to <br/>
                {{env('APP_NAME')}}</h2>
              <p>Create Offer</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-block">
              {{ Form::open(['route' => 'frontend.vendor.create-offer', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'files' => true]) }}
                <div class="form-inner">
                  <div class="row">
                    <div class="col-md-12 field select-outer">
                      {{ Form::select('category', $Servicecategory, '', ['id' => 'category', 'class' => 'inp', 'required' => 'required']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('name', 'name', null, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => 'Offer Name']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('title', 'title', null, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => 'title']) }}
                    </div>
                     <div class="col-md-6 field">
                      {{ Form::file('image',['class' => 'form-control inp', 'required' => 'required']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::select('offer_type', ['1' => 'Online offer', '2' => 'Instore offer'],1, ['class' => 'form-control inp', 'id'=>'offer_type', 'required' => 'required']) }}
                    </div>
                    <div class="col-md-12 field">
                      {{ Form::textarea('description', null, ['id' => 'autocomplete', 'class' => 'form-control inp', 'required' => 'required', 'placeholder' => 'Description']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::text('start_date', '', ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Start date', 'required' => 'required', 'id' => 'datetimepicker1']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::text('end_date', '', ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'End date', 'required' => 'required', 'id' => 'datetimepicker2']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('coupon_code', 'coupon_code', null, ['id' => 'coupon_code', 'class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'Coupon Code']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('disc_perc', 'disc_perc', null, ['id' => 'disc_perc', 'class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'two-digits', 'placeholder' => 'Disc Percentage']) }}
                    </div>
                    
                    <div class="col-md-6 field url-cls">
                      {{ Form::input('url', 'url', null, ['class' => 'form-control inp url', 'placeholder' => 'URL', 'required' => 'required']) }}
                    </div>
                    
                    <hr/>
                    <div class="col-md-12">
                      <div class="termsInfo">
                        <div class="custom-control custom-checkbox">
                          {{ Form::checkbox('is_featured', 1, null, ['class' => 'custom-control-input', 'id' => 'customCheck']) }}
                          <label class="custom-control-label" for="customCheck">In order to featured a offer, please check</label>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="btn-outer text-right">
                  {{ Form::submit('Submit', ['class' => 'button-prevent-mutiple-submissions btn-purple']) }}
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

