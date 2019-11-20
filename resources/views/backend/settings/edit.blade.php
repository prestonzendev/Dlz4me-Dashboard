@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.settings.management') . ' | ' . trans('labels.backend.settings.edit'))

@section('page-header')
<h1>
    {{ trans('labels.backend.settings.management') }}
    <small>{{ trans('labels.backend.settings.edit') }}</small>
</h1>
@endsection

@section('content')
{{ Form::model($setting, ['route' => ['admin.settings.update', $setting], 'class' => 'form-horizontal',
'role' => 'form', 'method' => 'PATCH','files' => true, 'id' => 'edit-settings']) }}

<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">{{ trans('labels.backend.settings.edit') }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body setting-block">
        <!-- Nav tabs -->
        <ul id="myTab" class="nav nav-tabs setting-tab-list" role="tablist">
            <li role="presentation" class="active">
                <a href="#tab1" aria-controls="1" id="tab1info" role="tab" data-toggle="tab">Contact Details</a>
            </li>
            <li role="presentation">
                <a href="#tab2" aria-controls="2" role="tab" data-toggle="tab">SEO Settings</a>
            </li>
            <li role="presentation">
                <a href="#tab3" aria-controls="3" role="tab" data-toggle="tab">Mail/SMTP Settings</a>
            </li>
            <li role="presentation">
                <a href="#tab4" aria-controls="4" role="tab" data-toggle="tab">Text Settings</a>
            </li>
            <li role="presentation">
                <a href="#tab6" aria-controls="6" role="tab" data-toggle="tab">Google Analytics</a>
            </li>
            <li role="presentation">
                <a href="#tab7" aria-controls="7" role="tab" data-toggle="tab">Social Links</a>
            </li>
           <li role="presentation">
                <a href="#tab8" aria-controls="8" role="tab" data-toggle="tab">Currency</a>
            </li>
            <li role="presentation">
                <a href="#tab9" aria-controls="9" role="tab" data-toggle="tab">Referral</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div id="myTabContent" class="tab-content setting-tab">
            <div role="tabpanel" class="tab-pane active" id="tab1">
                <div class="form-group">
                    {{ Form::label('contact_name', trans('validation.attributes.backend.settings.companydetails.contactname'), ['class'
                    => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('contact_name', null,['class' => 'form-control', 'required' => 'required', 'data-mask'=>'city', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contactname'),
                        'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('company_address', trans('validation.attributes.backend.settings.companydetails.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('company_address', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.address'),
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('company_contact', trans('validation.attributes.backend.settings.companydetails.contactnumber'), ['class'
					=> 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('company_contact', null,['class' => 'form-control', 'required' => 'required', 'data-mask'=>'ten-number', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contactnumber'),
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('company_email', 'Company Email', ['class'
					=> 'col-lg-2 control-label required']) }}
                    <div class="col-lg-10">
                        {{ Form::email('company_email', null,['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Company Email Address',
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('contact_business_info', trans('validation.attributes.backend.settings.companydetails.contactbusinessinfo'), ['class'
                    => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('contact_business_info', null,['class' => 'form-control', 'data-mask'=>'city', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contactbusinessinfo'),
                        'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('contact_description', trans('validation.attributes.backend.settings.companydetails.contactdescription'), ['class'
                    => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('contact_description', null,['class' => 'form-control', 'data-mask'=>'city', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contactdescription'),
                        'rows' => 2]) }}
                    </div>
                </div>

                <!--form control-->
                <div class="form-group">
                    {{ Form::label('contact_status', trans('validation.attributes.backend.settings.companydetails.contactstatus'), ['class'
                    => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <div class="control-group">
                            <label class="control control--checkbox">
                                @if(isset($setting->contact_status))
                                    {{ Form::checkbox('contact_status', 1, $setting->contact_status == 1 ? true :false) }}
                                @else
                                    {{ Form::checkbox('contact_status', 1, true) }}
                                @endif
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div><!--col-lg-3-->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab2">
                <div class="form-group">
                    {{ Form::label('logo', trans('validation.attributes.backend.settings.sitelogo'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">

                        <div class="custom-file-input">
                            {!! Form::file('logo', array('class'=>'form-control inputfile inputfile-1' )) !!}
                            <label for="logo">
                                <i class="fa fa-upload"></i>
                                <span>Choose a file</span>
                            </label>
                        </div>
                        <div class="img-remove-logo">
                            @if($setting->logo)
                            <img height="40" width="140" src="{{env('IMG_URL')}}/storage/app/public/img/logo/{{$setting->logo}}">
                            <i id="remove-logo-img" class="fa fa-times remove-logo" data-id="logo" aria-hidden="true"></i>
                            @endif
                        </div>
                    </div>
                    <!--col-lg-10-->
                </div>
                <!--form control-->

                <div class="form-group">
                    {{ Form::label('favicon', trans('validation.attributes.backend.settings.favicon'), ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        <div class="custom-file-input">
                            {!! Form::file('favicon', array('class'=>'form-control inputfile inputfile-1' )) !!}
                            <label for="favicon">
                                <i class="fa fa-upload"></i>
                                <span>Choose a file</span>
                            </label>
                        </div>
                        <div class="img-remove-favicon">
                            @if($setting->favicon)
                            <img height="50" width="50" src="{{env('IMG_URL')}}/storage/app/public/img/favicon/{{$setting->favicon}}">
                            <i id="remove-favicon-img" class="fa fa-times img-remove-favicon remove-logo" data-id="favicon" aria-hidden="true"></i>
                            @endif
                        </div>
                    </div>
                    <!--col-lg-10-->
                </div>
                <!--form control-->
                <div class="form-group">
                    {{ Form::label('seo_title', trans('validation.attributes.backend.settings.metatitle'), ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metatitle')])
                        }}
                    </div>
                    <!--col-lg-10-->
                </div>
                <!--form control-->

                <div class="form-group">
                    {{ Form::label('seo_keyword', trans('validation.attributes.backend.settings.metakeyword'), ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::textarea('seo_keyword', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metakeyword'),
                        'rows' => 2]) }}
                    </div>
                    <!--col-lg-3-->
                </div>
                <!--form control-->

                <div class="form-group">
                    {{ Form::label('seo_description', trans('validation.attributes.backend.settings.metadescription'), ['class' => 'col-lg-2
                    control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('seo_description', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metadescription'),
                        'rows' => 2]) }}
                    </div>
                    <!--col-lg-3-->
                </div>
                <!--form control-->
            </div>
            <div role="tabpanel" class="tab-pane" id="tab3">
                <div class="form-group">
                    {{ Form::label('from_name', trans('validation.attributes.backend.settings.mail.fromname'), ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::text('from_name', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.mail.fromname'),
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('from_email', 'From Email', ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::email('from_email', null,['class' => 'form-control', 'placeholder' => 'From Email',
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('smtp_address', 'SMTP Address', ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::text('smtp_address', null,['class' => 'form-control', 'placeholder' => 'SMTP Address',
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('smtp_username', 'SMTP Username', ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::email('smtp_username', null,['class' => 'form-control', 'placeholder' => 'SMTP Username',
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('smtp_password', 'SMTP Password', ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::text('smtp_password', null,['class' => 'form-control', 'placeholder' => 'SMTP Password',
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('smtp_port', 'SMTP Port', ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::text('smtp_port', null,['class' => 'form-control', 'data-mask'=>'three-digits', 'placeholder' => '587/465',
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('smtp_security', 'SMTP Security', ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::text('smtp_security', null,['class' => 'form-control', 'placeholder' => 'SSL/TLS',
						'rows' => 2]) }}
                    </div>
                </div>
                <!--form control-->
            </div>
            <div role="tabpanel" class="tab-pane" id="tab4">
                <div class="form-group">
                    {{ Form::label('footer_text', trans('validation.attributes.backend.settings.footer.text'), ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::text('footer_text', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.footer.text'),
						'rows' => 2]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('copyright_text', trans('validation.attributes.backend.settings.footer.copyright'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('copyright_text', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.footer.copyright'),
						'rows' => 2]) }}

                    </div>
                </div>
               
                <!--form control-->
            </div>
            <div role="tabpanel" class="tab-pane" id="tab6">
                <div class="form-group">
                    {{ Form::label('google_analytics', trans('validation.attributes.backend.settings.google.analytic'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('google_analytics', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.google.analytic')])
                        }}
                    </div>
                </div>
                <!--form control-->
            </div>
            <div role="tabpanel" class="tab-pane" id="tab7">
                <div class="form-group">
                    {{ Form::label('facebook', 'Facebook Link', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::url('facebook', null,['class' => 'form-control', 'placeholder' => 'Enter Facebook link'])
                        }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('instagram', 'Instagram Link', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::url('instagram', null,['class' => 'form-control', 'placeholder' => 'Enter Instagram link'])
                        }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('twitter', 'Twitter Link', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::url('twitter', null,['class' => 'form-control', 'placeholder' => 'Enter Twitter link'])
                        }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('google', 'Google plus Link', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::url('google', null,['class' => 'form-control', 'placeholder' => 'Enter Google Plus link'])
                        }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('youtube', 'Youtube Link', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::url('youtube', null,['class' => 'form-control', 'placeholder' => 'Enter Youtube link'])
                        }}
                    </div>
                </div>
                <!--form control-->
            </div>
           <div role="tabpanel" class="tab-pane" id="tab8">
                <div class="form-group">
                    {{ Form::label('adollor', 'Dollor($)', ['class' => 'col-lg-2 control-label']) }}
                    {{ Form::hidden('dollor', '$') }}
                    <div class="col-lg-3">
                        {{ Form::text('dollorcode', $currencycodes['dollor'],['class' => 'form-control', 'placeholder' => 'Currency Code']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('aeuro', 'EURO (EUR)', ['class' => 'col-lg-2 control-label']) }}
                    {{ Form::hidden('euro', 'EUR') }}
                    <div class="col-lg-3">
                        {{ Form::text('eurocode', $currencycodes['EUR'],['class' => 'form-control', 'placeholder' => 'Currency Code']) }}
                    </div>
                </div>
            
                <div class="form-group">
                    {{ Form::label('cfafrance', 'CFA France (CFA)', ['class' => 'col-lg-2 control-label']) }}
                    {{ Form::hidden('cfa', 'CFA') }}
                    <div class="col-lg-3">
                        {{ Form::text('cfacode', $currencycodes['CFA'],['class' => 'form-control', 'placeholder' => 'Currency Code']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('naira', 'Naira (NGN)', ['class' => 'col-lg-2 control-label']) }}
                    {{ Form::hidden('ngn', 'NGN') }}
                    <div class="col-lg-3">
                        {{ Form::text('nairacode', $currencycodes['NGN'],['class' => 'form-control', 'placeholder' => 'Currency Code']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('cedi', 'Cedi (GHS)', ['class' => 'col-lg-2 control-label']) }}
                    {{ Form::hidden('cedi', 'GHS') }}
                    <div class="col-lg-3">
                        {{ Form::text('cedicode', $currencycodes['GHS'],['class' => 'form-control', 'placeholder' => 'Currency Code']) }}
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab9">
                <div class="form-group">
                    {{ Form::label('referral_amt', trans('validation.attributes.backend.settings.referral.referral'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('referral_amt', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.referral.referral')])
                        }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('referral_status', trans('validation.attributes.backend.settings.referral.status'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <div class="control-group">
                            <label class="control control--checkbox">
                                @if(isset($setting->referral_status))
                                {{ Form::checkbox('referral_status', 1, $setting->referral_status == 1 ? true :false) }}
                                @else
                                    {{ Form::checkbox('referral_status', 1, true) }}
                                @endif
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div><!--col-lg-3-->
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-10 footer-btn">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md contact-submit']) }}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div><!--box-->

<!-- hidden setting id variable -->
<input type="hidden" data-id="{{ $setting->id }}" id="setting">
{{ Form::close() }}
@endsection

@section('after-scripts')
<script src='/js/backend/bootstrap-tabcollapse.js'></script>
<script>
(function () {
    Backend.Utils.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    Backend.Settings.selectors.RouteURL = "{{ route('admin.removeIcon', -1) }}";
    Backend.Settings.init();

})();

window.load = function () {

}
/*
 var route = "{{ route('admin.removeIcon', -1) }}";
 var data_id = $('#setting').data('id');

 route = route.replace('-1', data_id);

 $('.remove-logo').click(function() {
 var data = $(this).data('id');

 swal({
 title: "Warning",
 text: "Are you sure you want to remove?",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#DD6B55",
 confirmButtonText: "Yes",
 closeOnConfirm: true
 }, function (confirmed) {
 if (confirmed)
 {
 console.log(data);
 if(data=='logo')
 {
 value= 'logo';
 $('.img-remove-logo').addClass('hidden');
 }
 else
 {
 value= 'favicon';
 $('.img-remove-favicon').addClass('hidden');
 }
 $.ajax({
 url: route,
 type: "POST",
 data: {data: value},
 });
 }
 });
 });

 */
$('#myTab').tabCollapse({
    tabsClass: 'hidden-sm hidden-xs',
    accordionClass: 'visible-sm visible-xs'
});

$('.contact-submit').on('click', function (e) {
  $('#tab1info').click();
  $('#edit-settings').submit();
});

</script>
@endsection
