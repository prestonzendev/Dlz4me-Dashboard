@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper">
    <div class="container">
      <div class="inside-wrapperInner">
        @if(!empty($setting->disclaimer))
          {!! $setting->disclaimer !!}
        @endif
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


@endsection
