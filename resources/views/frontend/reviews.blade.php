@extends('frontend.layouts.app')

@section('content')
<div class="testimonials-row text-center">
    <div class="container">
      <h2>What Reviews Say About Us</h2>
      <p>Below are some reviews that have been sent to us by some people keen to start using the site. Once the website is fully launched then we will seek and post more reviews for you to see. You will be glad to hear that we don't just hand pick 5-star reviews!</p>
      <div class="testimonials-inner1">
        <div class="owl-carousel-block1">
          @if(count($reviews))
          @foreach($reviews as $review)
          <div class="col">
            <div class="column">
              <div class="img-block"><img width="63px" height="63px" src="{{env('IMG_URL')}}/storage/app/public/img/review/{{$review->photo}}" alt="testimonials-img1"></div>
              <div class="h6">{{$review->name}}</div>
              <div class="date-row d-flex align-items-center justify-content-between"> <span>@php echo date("d/m/Y", strtotime($review->created_at)); @endphp</span>
                <ul class="star-rating">
                  @php
                  for($i=0; $i<$review->grade;$i++) {
                  @endphp
                  <li><img src="images/star-icon.png" alt="star-icon"></li>
                  @php
                  }
                @endphp
                </ul>
              </div>
              <p>{!! substr(strip_tags($review->message), 0, 80) !!}</p>
              <div class="link-outer1 text-right"><a href="{{url('review/' . $review->id)}}" class="link">Read More</a></div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
