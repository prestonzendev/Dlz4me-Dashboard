@extends('frontend.layouts.app')

@section('content')
<div class="d-block inner-page-bg clearfix form-page login-page pad-t70 pad-b70">
  <div class="container">
    <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="infoItem">
             <i class="infoIcon fas fa-user"></i>
             <h3>Welcome {{Auth::user()->first_name}}  {{Auth::user()->last_name}}</h3>
             <a class="btn btn-sm btn-white" href="{{route('frontend.vendor.profile')}}">View Profile</a>
             </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="infoItem">
             <i class="infoIcon fas fa-tags"></i>
             <h3>PRODUCT OFFERS</h3>
             <a class="btn btn-sm btn-white" href="{{route('frontend.vendor.offer-list')}}">View Offers</a>
             </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="infoItem">
             <i class="infoIcon fas fa-sign-out-alt"></i>
             <h3>LOGOUT</h3>
             <a class="btn btn-sm btn-white" href="{{url('logout')}}">Logout</a>
             </div>
          </div>
  </div>
</div>
</div>
@endsection

