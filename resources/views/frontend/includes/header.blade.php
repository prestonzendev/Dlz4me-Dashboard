<div class="header">
  <div class="top-headerbar header-phone-email">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="top-left">
      	<ul>
        	<li>Email: {{$setting->company_email}}</li>
            <li>Phone: {{$setting->company_contact}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="top-headerbar top-logo-header">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="logo-left">
      	<a href="{{route('frontend.index')}}"><img src="{{env('IMG_URL')}}/storage/app/public/img/logo/{{$setting->logo}}" alt="{{env('APP_NAME')}}"></a>
      </div>
      <div class="logo-right">
        <ul>
            <li><a href="{{url('admin/login')}}" class="active">Login</a></li>
        </ul>
        <!-- <ul>
            <li><a href="{{ url('change-language/en')}}">English</a></li>
            <li><a href="{{ url('change-language/fr')}}">French</a></li>
        </ul> -->
      	{{-- <ul>
        @if(!\Auth::guard('user')->check())
          @php
            $loginactive = (Route::current()->getName() == 'frontend.auth.login') ? 'active' : '';
            $regactive = (Route::current()->getName() == 'frontend.auth.register') ? 'active' : '';
          @endphp
        	<li><a href="{{url('login')}}" class="{{$loginactive}}">Login</a></li>
          <li><a href="{{url('register')}}" class="{{$regactive}}">Registration</a></li>
        @else
          @php
            $dashactive = (Route::current()->getName() == 'frontend.user.dashboard') ? 'active' : '';
          @endphp

          @if(Auth::guard('user')->user()->roles()->first()->id==2)
            <li><a href="{{url('vendor/dashboard')}}" class="{{$dashactive}}">My Account</a></li>
          @else
            <li><a href="{{url('dashboard')}}" class="{{$dashactive}}">My Account</a></li>
          @endif

          <li><a href="{{url('logout')}}">Logout</a></li>
        @endif
        </ul> --}}
      </div>
    </div>
  </div>
</div>
@include('frontend.includes.nav')
</div>