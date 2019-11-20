@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.subscriptionplans.management') . ' | ' . trans('labels.backend.subscriptionplans.view'))

@section('page-header')
<h1>
    {{ trans('labels.backend.subscriptionplans.management') }}
    <small>{{ trans('labels.backend.subscriptionplans.view') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.subscriptionplans.view') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.subscriptionplans.partials.subscriptionplans-header-buttons')
        </div>
    </div><!--box-header with-border-->

    <div class="box-body">

        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.subscriptionplans.overview') }}</a>
                </li>
                 <li role="presentation">
                    <a href="#features" aria-controls="features" role="tab" data-toggle="tab">{{ trans('labels.backend.subscriptionplans.feature') }}</a>
                </li>
            </ul>

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                    <table class="table table-striped table-hover">

                        <tr>
                            <th>{{ trans('labels.backend.subscriptionplans.table.title') }}</th>
                            <td>{{ $subsdata->title }}</td>
                        </tr>

                        <tr>
                            <th>{{ trans('labels.backend.subscriptionplans.table.price') }}</th>
                            <td>{!! $subsdata->price_with_currency !!}</td>
                        </tr>

                        <tr>
                            <th>Duration of Month(s)</th>
                            <td>{!! $subsdata->duration !!} </td>
                        </tr>

                        <tr>
                            <th>Contact Limit</th>
                            <td>{!! $subsdata->usercount !!}</td>
                        </tr>

                        <tr>
                            <th>{{ trans('labels.backend.subscriptionplans.table.status') }}</th>
                            <td>{!! $subsdata->status_label !!}</td>
                        </tr>

                    </table>
                </div><!--tab overview profile-->
                
                <div role="tabpanel" class="tab-pane mt-30" id="features">
                     @if(!empty($planFeaturesValues))
        @php
        $count = 1;
        @endphp
        @foreach($planFeaturesValues as $key => $featureValue)
        <table class="table table-striped table-hover">
            <tr><td>{!! $count.'. '.$featureValue->description !!}</td></tr>
        </table>
        @php $count++ @endphp
        @endforeach
        @else
        <p>No features found</p>
        @endif
                </div>

            </div><!--tab content-->

        </div><!--tab panel-->

    </div><!-- /.box-body -->
</div><!--box-->
@endsection