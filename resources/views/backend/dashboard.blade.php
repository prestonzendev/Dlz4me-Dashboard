@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-street-view"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                @php
                    $cnt = 0;
                    foreach($customers as $customer) {
                        if ($customer->status == 1) $cnt++;
                    }
                @endphp
               
                <span class="info-box-number">{{ $cnt }}</span> 
                @if($check == 1)
                    <a href="{{ route('admin.access.user.customers.index') }}">View All</a>
                @endif
                
                <!-- {{ route('admin.access.user.customers.index') }} -->
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Vendors</span>
                <span class="info-box-number">{{ $vendors->count() }}</span>
                @if($check == 1)
                    <a href="{{ route('admin.access.user.vendor.index') }}">View All</a>
                @endif
                
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <!-- <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Revenue</span>
                <span class="info-box-number">{!!settings()->currency_symbol!!} {{$revenue}}</span>
                <a href="{{ route('admin.usersubscriptionplans.index') }}">View All</a>
            </div>
        </div>
    </div> -->
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <!-- /.col -->
    <!-- <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-bookmark"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Meetings</span>
                <span class="info-box-number">0</span>
                <a href="#">View All</a>
            </div>
        </div>
    </div> -->
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-question-circle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Contact us Enquiry</span>
                <span class="info-box-number">{{count($enquiry)}}</span>
                @if($check == 1)
                    <a href="#">View All</a>
                @endif
                 <!-- enquiries -->
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
<?php
// {!! history()->render() !!}
?>
<!-- <div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

    </div>
</div> -->
@endsection
