@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper contact-page">
    <div class="container">
      <div class="inside-wrapperInner">
        <div class="contact-page-form">
          <p>If you have any questions or comments, feel free to contact us by filling out the form below.</p>
          {{ Form::open(['route' => 'frontend.reportissue', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'id' => 'contactForm']) }}
            <div class="field">
              {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label link']) }}
              {{ Form::label('name', $userinfo->first_name . ' ' . $userinfo->last_name, ['class' => 'col-lg-2 control-label']) }}
            </div>
            <div class="field">
              {{ Form::label('email', 'Email', ['class' => 'col-lg-2 control-label link']) }}
              {{ Form::label('email', $userinfo->email, ['class' => 'col-lg-2 control-label']) }}
            </div>
            <div class="field">
              {{ Form::label('phone', 'Phone', ['class' => 'col-lg-2 control-label link']) }}
              {{ Form::label('phone', $userinfo->phone, ['class' => 'col-lg-2 control-label']) }}
            </div>
            <div class="field">
              {{ Form::textarea('message', null, ['class' => 'form-control inp', 'rows'=>'3', 'required'=>'required', 'placeholder' => 'Message:']) }}
            </div>
            <div class="btn-outer text-right">
              {{ Form::submit('Report Issue', ['class' => 'button-prevent-mutiple-submissions blue-btn', 'required'=>'required',]) }}
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  @if($show_thanks == 1)
  <div class="thankyou-popup">
  <div class="thankyou-popup-inner vertical-middle text-center">
  <a href="{{url('dashboard')}}" class="close-btn"><i class="fas fa-times"></i></a>
  <i class="fas fa-heart fav-icon"></i>
  <h3>Thank you</h3>
  <p>your issue has been reported and we aim to respond to all messages within 2 working days.</p>
  </div>
  </div>
  @endif


@endsection
