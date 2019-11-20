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
            </div>
          </div>
          <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif
            <div class="form-block">
              <form action="{{ route('frontend.vendor.services.update',$service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-inner">
                  <div class="row">
                    <div class="col-md-12 field select-outer">
                      {{ Form::select('category', $Servicecategory, $category_id, ['id' => 'category', 'class' => 'inp getlatlong', 'required' => 'required']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('name', 'name', $service->name, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => 'Offer Name']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('title', 'title', $service->title, ['class' => 'form-control inp',  'data-mask' => 'charonly', 'required' => 'required', 'placeholder' => 'title']) }}
                    </div>
                     <div class="col-md-6 field">
                      @if(isset($service->image))
                      {!! $service->image !!}
                      {{ Form::file('image',['class' => 'form-control inp']) }}
                      @else
                      {{ Form::file('image',['class' => 'form-control inp', 'required' => 'required']) }}
                      @endif
                      
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::select('offer_type', ['1' => 'Online offer', '2' => 'Instore offer'],$service->offer_type, ['class' => 'form-control inp', 'id'=>'offer_type', 'required' => 'required']) }}
                    </div>
                    <div class="col-md-12 field">
                      {{ Form::textarea('description', $service->description, null, ['id' => 'autocomplete', 'class' => 'form-control inp', 'required' => 'required', 'placeholder' => 'Description']) }}
                    </div>
                    
                    <div class="col-md-6 field">
                      {{ Form::text('start_date', $service->start_date, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Start date', 'required' => 'required', 'id' => 'datetimepicker1']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::text('end_date', $service->end_date, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'End date', 'required' => 'required', 'id' => 'datetimepicker2']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::input('coupon_code', 'coupon_code', $service->coupon_code, ['id' => 'coupon_code', 'class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'charonly', 'placeholder' => 'Coupon Code']) }}
                    </div>
                    <div class="col-md-6 field">
                      {{ Form::text('disc_perc', $service->disc_perc, ['id' => 'disc_perc', 'class' => 'form-control inp', 'required' => 'required', 'data-mask' => 'two-digits', 'placeholder' => 'Disc Percentage']) }}
                    </div>
                    @if($service->offer_type==1)
                      <div class="col-md-6 field url-cls">
                        {{ Form::input('url', 'url', $service->url, ['class' => 'form-control inp url', 'placeholder' => 'URL', 'required' => 'required']) }}
                      </div>
                    @endif
                    <hr/>
                    <div class="col-md-12">
                      <div class="termsInfo">
                        <div class="custom-control custom-checkbox">
                          @if($service->is_featured==2)
                            {{ Form::checkbox('is_featured', 2, $service->is_featured, ['class' => 'custom-control-input disabled', 'id' => 'customCheck']) }}
                            <label class="custom-control-label disabled" for="customCheck">Your offer is featured</label>
                          @else
                            {{ Form::checkbox('is_featured', 1, $service->is_featured, ['class' => 'custom-control-input', 'id' => 'customCheck']) }}
                            <label class="custom-control-label" for="customCheck">In order to featured a offer, please check</label>
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="btn-outer text-right">
                  {{ Form::submit('Update', ['class' => 'button-prevent-mutiple-submissions btn-purple']) }}
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
