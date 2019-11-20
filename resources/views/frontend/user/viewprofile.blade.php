@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper search-page">
  <div class="container">
    <div class="inside-wrapperInner">
      <div class="row">
        <div class="col-md-2">
          
            
        </div>
        <div class="col-md-10">
          <div class="search-detsilsBlock">
            <div class="row">
              <div class="col-sm-2">
                <div class="img-block">
                  @if(!empty($userinfo->profilepic))
                  <img src="{{env('IMG_URL')}}/storage/app/public/img/profilepic/{{$userinfo->profilepic}}">
                  @else
                    <img src="{{url('images/placeholder-img.jpg')}}" width="231px">
                  @endif
                </div>
                @if(!empty($userinfo->profilepic))
                <center>
                @if(!empty($userinfo->picapproved == 1))
                    <label class="badge badge-success">Approved</label>
                    @else 
                    <label class="badge badge-danger">Awaiting Approval</label>
                  @endif
                  </center>
              @endif
              </div>
              <div class="col-sm-10">
                <div class="content d-flex justify-content-between flex-column h-100">
                  <ul class="detsils-listing">
                    <li><strong>Name :</strong> {{$userinfo->accountname}}</li>
                    @if($userinfo->age)
                    <li><strong>Age :</strong> {{$userinfo->age}} Years Old</li>
                    @endif
                    <!-- <li><strong>Phone :</strong> {{$userinfo->phone}}</li> -->
                    <li><strong>Location :</strong>  {{$userinfo->city}} , {{$userinfo->state}}</li>
                  </ul>
                  <div class="btn-outer"><a href="{{route('frontend.user.profile')}}" class="blue-btn">Update Profile</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  </div>
@endsection