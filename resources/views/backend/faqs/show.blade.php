@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.faqs.management') . ' | ' . trans('labels.backend.faqs.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.faqs.management') }}
        <small>{{ trans('labels.backend.faqs.view') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.faqs.view') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.faqs.partials.faqs-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.faqs.overview') }}</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        <table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.faqs.table.question') }}</th>
        <td>{{ $faqdata->question }}</td>
    </tr>

   <tr>
        <th>{{ trans('labels.backend.faqs.table.answer') }}</th>
        <td>{!! $faqdata->answer !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.faqs.table.status') }}</th>
        <td>{!! $faqdata->status_label !!}</td>
    </tr>

   
</table>
                    </div><!--tab overview profile-->

                </div><!--tab content-->

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection