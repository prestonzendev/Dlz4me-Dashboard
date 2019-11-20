<div class="top-headerbar header-menu-bar">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="top-left">
        @php 
      //dd($reqPath);
      $home = $dashboard = $profile = $offer_regt = '';
      switch ($reqPath) {
        case '/': $home = 'active';
          break;
        case 'vendor/dashboard': $dashboard = 'active';
          break;
        case 'dashboard': $dashboard = 'active';
          break;
        case 'vendor/profile': $profile = 'active';
          break;
        case 'profile': $profile = 'active';
        break;
        case 'vendor/offerform': $offer_regt = 'active';
          break;
      }
      @endphp
        <ul>

            <li><a href="{{route('frontend.index')}}">{{ trans('navs.general.home') }}</a></li>
            @if(\Auth::guard('user')->check())
              @if(Auth::guard('user')->user()->roles()->first()->id==2)
              <li class="{{$dashboard}}"><a href="{{route('frontend.vendor.dashboard')}}">Dashboard</a></li>
              <li class="{{$profile}}"><a href="{{route('frontend.vendor.profile')}}">Profile</a></li>
              <li class="{{$offer_regt}}"><a href="{{route('frontend.vendor.show-offer')}}">Offer Registration</a></li>
              @else
              <li class="{{$dashboard}}"><a href="{{route('frontend.user.dashboard')}}">Dashboard</a></li>
              <li class="{{$profile}}"><a href="{{route('frontend.user.profile')}}">Profile</a></li>
              @endif
            @endif
        </ul>
      </div>
    </div>
  </div>
</div>