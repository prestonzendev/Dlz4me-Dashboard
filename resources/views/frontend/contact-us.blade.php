@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper contact-page">
    <div class="container">
      <div class="inside-wrapperInner">
        <div class="contact-page-form">
          <p>If you have any questions or comments, feel free to contact us by filling out the form below.</p>
          {{ Form::open(['route' => 'frontend.contact-us.submit', 'class' => 'form-horizontal form-prevent-multiple-submissions', 'id' => 'contactForm']) }}
            <div class="field">
              {{ Form::input('text', 'name', null, ['class' => 'form-control inp' ,'required'=>'required', 'data-mask'=>'charonly','placeholder' => 'Name:']) }}
            </div>
            <div class="field">
              {{ Form::input('email', 'email', null, ['class' => 'form-control inp', 'required'=>'required','placeholder' => 'Email:']) }}
            </div>
            <div class="field">
              {{ Form::input('test', 'phone', null, ['class' => 'form-control inp', 'data-mask'=>'adhar', 'placeholder' => 'Phone:']) }}
            </div>
            <div class="field">
              {{ Form::textarea('message', null, ['class' => 'form-control inp', 'rows'=>'3', 'required'=>'required', 'placeholder' => 'Message:']) }}
            </div>
            <div class="btn-outer text-right">
              {{ Form::submit('Send Message', ['class' => 'button-prevent-mutiple-submissions blue-btn', 'required'=>'required']) }}
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  @if(isset($show_thanks))
  <div class="thankyou-popup">
  <div class="thankyou-popup-inner vertical-middle text-center">
  <a href="{{url('contact-us')}}" class="close-btn"><i class="fas fa-times"></i></a>
  <i class="fas fa-heart fav-icon"></i>
  <h3>Thank you</h3>
  <p>your message has been submitted and we aim to respond to all messages within 2 working days.</p>
  </div>
  </div>
  @endif


@endsection
