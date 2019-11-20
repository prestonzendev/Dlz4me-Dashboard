@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.servicecategories.management') . ' | ' . trans('labels.backend.servicecategories.edit'))

@section('page-header')
<h1>
    {{ trans('labels.backend.servicecategories.management') }}
    <small>{{ trans('labels.backend.servicecategories.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($servicecategory, ['route' => ['admin.servicecategories.update', $servicecategory], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-servicecategory', 'files' => true]) }}

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.servicecategories.edit') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.servicecategories.partials.servicecategories-header-buttons')
        </div><!--box-tools pull-right-->
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="form-group">
            {{-- Including Form blade file --}}
            @include("backend.servicecategories.form")
            <div class="edit-form-btn">
                {{ link_to_route('admin.servicecategories.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                <div class="clearfix"></div>
            </div><!--edit-form-btn-->
        </div><!--form-group-->
    </div><!--box-body-->
</div><!--box box-success -->
{{ Form::close() }}
@endsection
