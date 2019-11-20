@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper">
    <div class="container">
      <div class="inside-wrapperInner">
        @if(!empty($setting->terms))
          {!! $setting->terms !!}
        @endif
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


@endsection
