<div class="bottom">
  <div class="bottom-logo">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="bottom-left">
        {{$setting->footer_text}}
      </div>
      <div class="bottom-right">
        <ul>
          <li><a href="{{route('frontend.index')}}">Home |</a></li>
            <li><a href="{{url('pages/about-us')}}">About Us | </a></li>
            <li><a href="{{url('pages/privacy-policy')}}">Privacy Policy |</a></li>
            <li><a href="{{url('pages/terms-and-conditions')}}">Terms &amp; Conditions</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="bottom-copyright">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="top-left">
        © {{$setting->copyright_text}}
      </div>
    </div>
  </div>
</div>
</div>