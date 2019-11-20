@extends('frontend.layouts.app')
@section('content')

<div class="testimonials-row text-center">
    <div class="container">
      <div class="testimonials-inner1">
        <div class="owl-carousel-block1">
          <div class="col">
            <div class="column">
              <div class="img-block"><img width="63px" height="63px" src="{{env('IMG_URL')}}/storage/app/public/img/review/{{$review->photo}}" alt="testimonials-img1"></div>
              <div class="h6">{{$review->name}}</div>
              <div class="date-row d-flex align-items-center justify-content-between"> <span>@php echo date("d/m/Y", strtotime($review->created_at)); @endphp</span>
                <ul class="star-rating">
                  @php
                  for($i=0; $i<$review->grade;$i++) {
                  @endphp
                  <li><img src="{{url('images/star-icon.png')}}" alt="star-icon"></li>
                  @php
                  }
                @endphp
                </ul>
              </div>
              <p>{!! $review->message !!}</p>
            </div>
          </div>
          <div class="link-outer1 text-center"><a href="{{url('reviews')}}" class="link1">Back</a></div>
        </div>
      </div>
    </div>
  </div>


@endsection
