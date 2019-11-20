@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.subscriptionplans.management') . ' | ' . trans('labels.backend.subscriptionplans.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.subscriptionplans.management') }}
        <small>{{ trans('labels.backend.subscriptionplans.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($subscriptionplans, ['route' => ['admin.subscriptionplans.update', $subscriptionplans], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-subscriptionplan']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.subscriptionplans.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.subscriptionplans.partials.subscriptionplans-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.subscriptionplans.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.subscriptionplans.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
