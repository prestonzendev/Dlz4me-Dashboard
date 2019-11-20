@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.edit-profile') }}
    </h1>
@endsection

@section('content')
	{{ Form::model($logged_in_user, ['route' => 'admin.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

     <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.users.edit-profile') }}</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('first_name', trans('validation.attributes.frontend.register-user.firstName'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-10">
                    {{ Form::input('text', 'first_name', null, [ 'id' => 'first_name', 'class' => 'form-control box-size','required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('last_name', trans('validation.attributes.frontend.register-user.lastName'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-10">
                    {{ Form::input('text', 'last_name', null, ['id' => 'last_name','class' => 'form-control box-size', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-10">
                    {{ Form::input('email', 'email', null, ['class' => 'form-control box-size', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-md-offset-4">
                    {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }}
@endsection
@section('after-scripts')

<script type="text/javascript">
    $(document).ready(function() {
        Backend.Profile.init();
        $(function() {
            $('#first_name').on('keypress', function(e) {
                if (e.which == 32)
                    return false;
            });
            $('#last_name').on('keypress', function(e) {
                if (e.which == 32)
                    return false;
            });
        });
    });
</script>
@endsection
