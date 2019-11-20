@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
<h1>
    {{ trans('labels.backend.access.users.management') }}
    <small>{{ trans('labels.backend.access.users.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($user, ['route' => ['admin.access.user.customers.update', $user], 'class' => 'form-horizontal',  'files' => true, 'role' => 'form', 'method' => 'PATCH']) }}
<input name="user_id" type="hidden" value="{{$user->id}}">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.access.users.edit') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.access.includes.partials.user-header-buttons')
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        {{-- Account Name --}}
        <div class="form-group">
            {{ Form::label('accountname', 'Account Name', ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('accountname', null, ['class' => 'form-control box-size', 'placeholder' => 'Account Name', 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
        {{ Form::label('dob', 'Date of Birth', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            @if(!empty($user->dob))
                {{ Form::text('dob', $user->dob, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Date of Birth', 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @else
                {{ Form::text('dob', null, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Date of Birth', 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

        {{-- First Name --}}
        <div class="form-group">
            {{ Form::label('name', trans('validation.attributes.backend.access.users.firstName'), ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('first_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.firstName'), 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- Last Name --}}
        <div class="form-group">
            {{ Form::label('name', trans('validation.attributes.backend.access.users.lastName'), ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('last_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.lastName'), 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- Email --}}
        <div class="form-group">
            {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('email', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.email'), 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('phone', 'Mobile Number', ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::number('phone', null, ['class' => 'form-control box-size', 'placeholder' => 'Mobile Number', 'required' => 'required']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('address', 'Address', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10" id="locationField">
                {{ Form::text('address', null, ['id' =>'autocomplete', 'class' => 'form-control box-size getlatlong', 'placeholder' => 'Enter Address',  'onFocus' => 'geolocate()']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

<!--        <div class="form-group">
            {{ Form::label('address_2', 'Street', ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10" id="locationField">
                {{ Form::text('address_2', null, ['id' =>'street_number', 'class' => 'form-control box-size', 'placeholder' => 'Enter Address', 'required' => 'required']) }}
            </div>col-lg-10
        </div>form control-->

        <div class="form-group">
            {{ Form::label('city', 'City', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('city', null, ['id' =>'locality','class' => 'form-control box-size getlatlong', 'placeholder' => 'Enter City']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('state', 'State', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('state', null, ['id' =>'administrative_area_level_1','class' => 'form-control box-size getlatlong', 'placeholder' => 'Enter State']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('country', 'Country', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('country', null, ['id' =>'country','class' => 'form-control box-size getlatlong', 'placeholder' => 'Enter Country']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('zip', 'Postal code', ['class' => 'col-lg-2 control-label getlatlong']) }}

            <div class="col-lg-10">
                {{ Form::text('zip', null, ['id' =>'postal_code','class' => 'form-control box-size', 'data-mask' => 'alphazip', 'placeholder' => 'Enter Postal code']) }}
                {{ Form::hidden('latitude', null,  ['id' => 'latitude']) }}
                {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('search_radius', 'Search Radius in Miles', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                @php
                  $radius = [
                      '5' => 5,
                      '10' => 10,
                      '25' => 25,
                      '50' => 50,
                  ];
                @endphp
                {!! Form::select('search_radius', $radius, null, ['class' => 'form-control box-size']) !!}
            </div><!--col-lg-10-->
        </div><!--form control-->


        <!--div class="form-group">
        {{ Form::label('profilepic', 'Profile Image', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
             @if(isset($user->profilepic))
    <div class="form-group">
        <div class="col-lg-10">
            {!! $user->profilepic !!}

        </div>
    </div>
    @endif
            <div class="custom-file-input">
                {{ Form::file('profilepic', array('class'=>'form-control inputfile inputfile-1')) }}
                <label for="profilepic">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
        </div>
    </div--><!--form control-->

    <div class="form-group">
            {{ Form::label('aboutme', 'About User', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                @php
                  $radius = [
                      '5' => 5,
                      '10' => 10,
                      '25' => 25,
                      '50' => 50,
                  ];
                @endphp
                {!! Form::textarea('aboutme', null, ['class' => 'form-control box-size']) !!}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- Status --}}
        @if ($user->id != 1)
        <!--div class="form-group">
            {{ Form::label('picapproved', 'Pic Approved', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-1">
                <div class="control-group">
                    <label class="control control--checkbox">
                        @php
                        $isapproved = stripos($user->picapproved, 'Approved');
                        @endphp
                        {{ Form::checkbox('picapproved', '1', $isapproved !== false) }}
                        <div class="control__indicator"></div>
                    </label>
                </div>
            </div><!--col-lg-1-->
        </div---><!--form control-->
        @endif

        @if ($user->id != 1)
        <div class="form-group">
            {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-1">
                <div class="control-group">
                    <label class="control control--checkbox">
                        {{ Form::checkbox('status', '1', $user->status == 1) }}
                        <div class="control__indicator"></div>
                    </label>
                </div>
            </div><!--col-lg-1-->
        </div><!--form control-->

        {{-- Confirmed --}}
        <div class="form-group">
            {{ Form::label('confirmed', 'Verified', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-1">
                <div class="control-group">
                    <label class="control control--checkbox">
                        {{ Form::checkbox('confirmed', '1', $user->confirmed == 1) }}
                        <div class="control__indicator"></div>
                    </label>
                </div>
            </div><!--col-lg-1-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('adminnote', 'Note', ['class' => 'col-lg-2 control-label required']) }}

            <div class="col-lg-10">
                {{ Form::text('adminnote', null, ['class' => 'form-control box-size', 'placeholder' => 'Admin Note']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        {{-- Associated Roles --}}
        <div class="form-group hidden">
            {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-8">
                @if (count($roles) > 0)
                @foreach($roles as $role)
                <div>
                    <label for="role-{{$role->id}}" class="control control--radio">
                        <input type="radio" value="{{$role->id}}" name="assignees_roles[]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $userRoles) ? 'checked' : '') }} id="role-{{$role->id}}" class="get-role-for-permissions" />  &nbsp;&nbsp;{!! $role->name !!}
                               <div class="control__indicator"></div>
                        <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                            (
                            <span class="show-text">{{ trans('labels.general.show') }}</span>
                            <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                            {{ trans('labels.backend.access.users.permissions') }}
                            )
                        </a>
                    </label>
                </div>
                <div class="permission-list hidden" data-role="role_{{$role->id}}">
                    @if ($role->all)
                    {{ trans('labels.backend.access.users.all_permissions') }}
                    @else
                    @if (count($role->permissions) > 0)
                    <blockquote class="small">
                        @foreach ($role->permissions as $perm)
                        {{$perm->display_name}}<br/>
                        @endforeach
                    </blockquote>
                    @else
                    {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                    @endif
                    @endif
                </div><!--permission list-->
                @endforeach
                @else
                {{ trans('labels.backend.access.users.no_roles') }}
                @endif
            </div><!--col-lg-3-->
        </div><!--form control-->

        {{-- Associated Permissions --}}
        <div class="form-group hidden">
            {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                <div id="available-permissions" style="width: 700px; height: 200px; overflow-x: hidden; overflow-y: scroll;">
                    <div class="row">
                        <div class="col-xs-12 get-available-permissions">
                            @if ($permissions)

                            @foreach ($permissions as $id => $display_name)
                            <div class="control-group">
                                <label class="control control--checkbox" for="perm_{{ $id }}">
                                    <input type="checkbox" name="permissions[{{ $id }}]" value="{{ $id }}" id="perm_{{ $id }}" {{ isset($userPermissions) && in_array($id, $userPermissions) ? 'checked' : '' }} /> <label for="perm_{{ $id }}">{{ $display_name }}</label>
                                    <div class="control__indicator"></div>
                                </label>
                            </div>
                            @endforeach
                            @else
                            <p>There are no available permissions.</p>
                            @endif
                        </div><!--col-lg-6-->
                    </div><!--row-->
                </div><!--available permissions-->
            </div><!--col-lg-3-->
        </div><!--form control-->

        @endif
        <div class="edit-form-btn">
            {{ link_to_route('admin.access.user.customers.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
            {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
            <div class="clearfix"></div>
        </div>
    </div><!-- /.box-body -->
</div><!--box-->

@if ($user->id == 1)
{{ Form::hidden('status', 1) }}
{{ Form::hidden('confirmed', 1) }}
{{ Form::hidden('assignees_roles[]', 1) }}
@endif

{{ Form::close() }}
@endsection

@section('after-scripts')
<script type="text/javascript">
    Backend.Utils.documentReady(function () {
        csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        Backend.Users.selectors.getPremissionURL = "{{ route('admin.get.permission') }}";
        Backend.Users.init("edit");
    });
    window.onload = function () {
        Backend.Users.windowloadhandler();
    };

    $(document).ready(function(){
        $(".getlatlong").blur(function(){
          GetLatlong();
        });
    });

</script>

@endsection
