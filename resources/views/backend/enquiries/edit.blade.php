@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.enquiries.management') . ' | ' . trans('labels.backend.enquiries.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.enquiries.management') }}
        <small>{{ trans('labels.backend.enquiries.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($enquiries, ['route' => ['admin.enquiries.update', $enquiries], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-enquiry']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.enquiries.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.enquiries.partials.enquiries-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.enquiries.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.enquiries.index', 'Back', [], ['class' => 'btn btn-danger btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
