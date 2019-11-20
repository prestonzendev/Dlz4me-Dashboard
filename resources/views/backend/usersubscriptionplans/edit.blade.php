@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.usersubscriptionplans.management') . ' | ' . trans('labels.backend.usersubscriptionplans.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.usersubscriptionplans.management') }}
        <small>{{ trans('labels.backend.usersubscriptionplans.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($usersubscriptionplan, ['route' => ['admin.usersubscriptionplans.update', $usersubscriptionplan], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-usersubscriptionplan']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.usersubscriptionplans.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.usersubscriptionplans.partials.usersubscriptionplans-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.usersubscriptionplans.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.usersubscriptionplans.index', 'Back', [], ['class' => 'btn btn-danger btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
