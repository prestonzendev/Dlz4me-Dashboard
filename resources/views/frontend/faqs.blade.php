@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper">
    <div class="container">
      <div class="inside-wrapperInner">
        <div id="accordion" class="custom-accordion">
         @if($faqs)
            @php
                $sn = 0;
            @endphp
            @foreach($faqs as $faq)
            @php
                $sn++;
            @endphp
          <div class="card">
            <div id="heading{{$sn}}" class="card-header">
              <h4 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$sn}}" aria-expanded="false" aria-controls="collapse{{$sn}}">{{$faq->question}} <i class="more-less"></i></button>
              </h4>
            </div>
            <div id="collapse{{$sn}}" class="collapse" aria-labelledby="heading{{$sn}}" data-parent="#accordion">
              <div class="content">
                <p>{!! $faq->answer !!}</p>
              </div>
            </div>
          </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>


@endsection
