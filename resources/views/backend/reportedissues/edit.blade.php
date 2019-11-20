@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.reportedissues.management') . ' | ' . trans('labels.backend.reportedissues.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.reportedissues.management') }}
        <small>{{ trans('labels.backend.reportedissues.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($reportedissue, ['route' => ['admin.reportedissues.update', $reportedissue], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-reportedissue']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.reportedissues.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.reportedissues.partials.reportedissues-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.reportedissues.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.reportedissues.index', 'Back', [], ['class' => 'btn btn-danger btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
