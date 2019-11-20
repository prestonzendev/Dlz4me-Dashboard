@extends('frontend.layouts.app')

@section('content')
<div class="inside-wrapper dashboard-page">
    <div class="container">
        <div class="inside-wrapperInner">
        <div class="row">
        	<h1>{{$homecontent['home-text']['title']}}</h1>
        	{{strip_tags($homecontent['home-text']['description'])}}
          
        </div>
      </div>
    </div>
  </div>
@endsection

