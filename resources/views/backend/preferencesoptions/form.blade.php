<div class="box-body">
    <div class="form-group">
        {!! Form::label('preference_id', trans('labels.backend.preferencesoptions.preference_id'), ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            {!! Form::select('preference_id', $preference, null, ['class' => 'form-control box-size', 'required' => 'required']) !!}
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {!! Form::label('title', trans('labels.backend.preferencesoptions.title'), ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            {!! Form::text('title', null, ['class' => 'form-control box-size', 'data-mask' => 'charonly', 'placeholder' => trans('labels.backend.preferencesoptions.title'), 'required' => 'required']) !!}
            {!! Form::hidden('slug', null) !!}
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {!! Form::label('displayorder', 'Display Order', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('displayorder', null, ['class' => 'form-control box-size', 'data-mask' => 'three-digits', 'placeholder' => 'Display order', 'required' => 'required']) !!}
            {!! Form::hidden('slug', null) !!}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        {!! Form::label('option_field_id', trans('labels.backend.preferencesoptions.option_field_id'), ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            {!! Form::select('option_field_id', $optionfields, null, ['class' => 'form-control box-size', 'required' => 'required']) !!}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div id="buildyourform">
        @if(@in_array($preferencesoptions->option_field_id,[3,4,5,6]))
        @php $btn_class = ''; @endphp
        @else 
        @php $btn_class = 'add-more-btn-hide'; @endphp
        @endif

        <div class="form-group {!! $btn_class !!}" id="dtype">
            @php
                $dtypes = [
                    'Me & Match both are same',
                    'Single select for Me, Multiple for Match',
                    'Multiple select for Me, Single for Match',
                ];
            @endphp
            {!! Form::label('displaytype', 'Selection Type', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('displaytype', $dtypes, null, ['class' => 'form-control box-size']) !!}
            </div><!--col-lg-10-->
        </div><!--form-group-->

        @if(!empty($optionPreferenceValues))
        @php
        $count = 1;
        $btn_class = '';
        @endphp
        @foreach($optionPreferenceValues as $key => $optionValue)
        <div class="fieldwrapper form-group">
            <label class="col-lg-2 control-label required">Option value</label>
            <div class="col-lg-8">
                {!! Form::text('preferencesOptionsValue['.$count.'][title]', $optionValue,['class' => 'form-control box-size', 'required' => 'required', 'maxlength'=>'50']) !!}
                {!! Form::hidden('preferencesOptionsValue['.$count.'][id]', $key,['class' => 'form-control box-size']) !!}
            </div><!--col-lg-10-->
            <div class="col-lg-1">
                <a class="remove btn btn-warning" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to delete this option value?" style="cursor:pointer;" onclick="removeOption(this, {!! $key !!})" >
                    -
                </a>
            </div>
        </div><!--form-group-->
        @php $count++ @endphp
        @endforeach
        @endif
    
    </div>
    <div class="form-group">
        <lable class="col-lg-2"></lable>
        <div class="col-lg-10">
            <input type="button" value="Add Option Value" class="add btn btn-primary {!! $btn_class !!}" id="add" />
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('status', trans('labels.backend.preferencesoptions.status'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    @if(isset($preferencesoptions->status))
                    {{ Form::checkbox('status', 1, $preferencesoptions->status == 1 ? true :false) }}
                    @else
                    {{ Form::checkbox('status', 1, true) }}
                    @endif
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->
</div><!--box-body-->
@section("after-scripts")
<script type="text/javascript">
    $(document).ready(function () {

    $("#option_field_id").change(function () {
    var optionType = $(this).val();
    if (optionType == 3 || optionType == 4 || optionType == 5 || optionType == 6){
    $("#add").show();
    $("#dtype").show();
    $("#buildyourform").show();
    } else {
    $("#add").hide();
    $("#dtype").hide();
    $("#buildyourform").hide();
    }
    });
    $("#add").click(function () {
    var lastField = $("#buildyourform").children().last();
    var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
    var fieldWrapper = $("<div class=\"fieldwrapper form-group\" id=\"field" + intId + "\"/>");
    fieldWrapper.data("idx", intId);
    var fLabel = $("<label class=\"col-lg-2 control-label required\">Option value</label>");
    var fName = $("<div class=\"col-lg-8\"><input type=\"text\" class=\"fieldname form-control box-size\" maxlength=\"50\" name=\"preferencesOptionsValue[][title]\" required=\"required\"/></div>");
    var removeButton = $("<div class=\"col-lg-1\"><input type=\"button\" class=\"remove btn btn-warning\" value=\"-\" /></div>");
    removeButton.click(function () {
    $(this).parent().remove();
    });
    fieldWrapper.append(fLabel);
    fieldWrapper.append(fName);
    fieldWrapper.append(removeButton);
    $("#buildyourform").append(fieldWrapper);
    });
    //$(".remove").click(function () {
    // $(this).parent().parent().remove();
    // });

    });
    function removeOption(el, value){
        swal({
        title: "Are you sure you want to do this?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Delete",
                closeOnConfirm: true,
                dangerMode: true,
        }, function (isConfirmed) {
            if (isConfirmed) {
                $.ajax({
                        type: "post",
                        url: '{{ route("admin.preferencesoptions.deleteoptionvalue") }}',
                        data: {id:value},
                        dataType: 'json',
                        headers: {
                        "accept": "application/json",
                        },
                        success: function (response) {
                        console.log(response);
                        if (response.status == 'success') {
                         $(el).parent().parent().remove();
                            swal({
                           title: "Deleted Successfully",
                                   text: '',
                                   icon: "success",
                                   button: 'Ok',
                                   timer: 3000
                           });
                        } else {
                            swal({
                            title: "Please try again",
                                    text: '',
                                    icon: "error",
                                    button: 'Ok',
                                    timer: 3000
                            });
                        }
                        }
                });
         }
        });
    }

</script>
@endsection
