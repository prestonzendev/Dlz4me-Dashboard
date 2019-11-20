@php

  header("Access-Control-Allow-Origin: *");

@endphp
<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', "DLZ4ME")</title>
{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/jquery.smartmenus.bootstrap-4.css') !!}
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
{!! Html::style('css/all.min.css') !!}
{!! Html::style('css/owlcarouseltheme.css') !!}
{!! Html::style('css/style.css') !!}
{!! Html::style('css/responsive.css') !!}
{!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
{!! Html::style('css/youcodehere/frontend-youcodehere.css') !!}
{{ Html::script('js/jquery-2.2.3.min.js') }}

<!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
        <?php
        if (!empty($setting->google_analytics)) {
            echo $setting->google_analytics;
        }
        ?>
@stack('forced-styles')
</head>

<body>
@include('frontend.includes.header')
@include('frontend.includes.slider')
@include('includes.partials.messages')
@if($reqPath!=='/')
<div class="bradcrumb-sec">
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        @if(strpos($reqPath, 'edit') !== false)
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">{{$reqPath}}</li>
        @endif
    </ol>
</nav>
</div>
</div>
@endif

    @yield('content')

@include('frontend.includes.footer')
<!-- JavaScripts -->
    @yield('before-scripts')
    {{ Html::script('js/moment.min.js') }}
    {{ Html::script('js/frontend/frontend.js') }}
    {{ Html::script('js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('js/youcodehere/frontend-youcodehere.js') }}
    {{ Html::script('js/youcodehere/jquery.inputmask.bundle.js') }}
    {{ Html::script('js/youcodehere/input-mask.js') }}
    @yield('after-scripts')
</body>
</html>
