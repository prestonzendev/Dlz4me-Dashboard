@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.termandconditions.management') . ' | ' . trans('labels.backend.termandconditions.edit'))

@section('page-header')
<h1>
    {{ trans('labels.backend.termandconditions.management') }}
    <small>{{ trans('labels.backend.termandconditions.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($termandconditions, ['route' => ['admin.termandconditions.update', $termandconditions], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-termandcondition']) }}

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.termandconditions.edit') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.termandconditions.partials.termandconditions-header-buttons')
        </div><!--box-tools pull-right-->
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="form-group">
            {{-- Including Form blade file --}}
            @include("backend.termandconditions.form")
            <div class="edit-form-btn">
                {{ link_to_route('admin.termandconditions.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                <div class="clearfix"></div>
            </div><!--edit-form-btn-->
        </div><!--form-group-->
    </div><!--box-body-->
</div><!--box box-success -->
{{ Form::close() }}
@endsection
