@extends('frontend.layouts.app')

@section('content')
<div class="d-block inner-page-bg clearfix form-page login-page pad-t70 pad-b70">
    <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="infoItem">
              <i class="infoIcon fas fa-user"></i>
              <h3>Welcome {{Auth::user()->first_name}}  {{Auth::user()->last_name}}</h3>
              <a class="btn btn-sm btn-white" href="{{route('frontend.user.profile')}}" class="link">View Profile</a>
            </div>
          </div>
          
          <!-- <div class="col-lg-4 col-sm-6">
            <div class="dash-column">
              <h5><span>My Subscription</span></h5>
              <p>{{$setting->my_subscription_txt}}</p>
              <div class="link-outer text-right"><a href="{{route('frontend.user.subscription.plans')}}" class="link">View Plans</a></div>
            </div>
          </div>
          
          <div class="col-lg-4 col-sm-6">
            <div class="dash-column">
              <h5><span>Inbox</span></h5>
              <p>{{$setting->inbox_txt}}</p>
              <div class="link-outer text-right"><a href="{{route('frontend.user.myinbox')}}" class="link">View Inbox</a></div>
            </div>
          </div>
          
          <div class="col-lg-4 col-sm-6">
            <div class="dash-column">
              <h5><span>My Matches</span></h5>
              <p>{{$setting->my_matches_txt}}</p>
              <div class="link-outer text-right"><a href="{{route('frontend.user.mymatches')}}" class="link">View details</a></div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6">
            <div class="dash-column">
              <h5><span>Requests Sent</span></h5>
              <p>{{$setting->requests_sent_txt}}</p>
              <div class="link-outer text-right"><a href="{{route('frontend.user.pending.contacts')}}" class="link">View details</a></div>
            </div>
          </div>
          
          <div class="col-lg-4 col-sm-6">
            <div class="dash-column">
              <h5><span>Request Received</span></h5>
              <p>{{$setting->request_received_txt}}</p>
              <div class="link-outer text-right"><a href="{{route('frontend.user.mycontacts')}}" class="link">View details</a></div>
            </div>
          </div>
          
          <div class="col-lg-4 col-sm-6">
            <div class="dash-column">
              <h5><span>Views</span></h5>
              <p>{{$setting->my_logs_txt}}</p>
              <div class="link-outer text-right"><a href="{{route('frontend.user.viewlogs')}}" class="link">View details</a></div>
            </div>
          </div> -->
          
          <div class="col-lg-4 col-sm-6">
            <div class="infoItem">
              <i class="infoIcon fas fa-tags"></i>
              <h3>Password Change</h3>
              <a class="btn btn-sm btn-white" href="{{route('frontend.user.account.change-password')}}" class="link">Change Password</a>
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
        
        <div class="clearfix"></div>
    </div>
  </div>
@endsection

