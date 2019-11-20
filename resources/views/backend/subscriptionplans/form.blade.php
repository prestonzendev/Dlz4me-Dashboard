<div class="box-body">
    <div class="form-group">
        {!! Form::label('title', trans('labels.backend.subscriptionplans.title'), ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            {!! Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.subscriptionplans.title'), 'required' => 'required']) !!}
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {!! Form::label('price', trans('labels.backend.subscriptionplans.price'), ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            {!! Form::text('price', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.subscriptionplans.price'), 'step' => '0.01', 'data-mask'=>'percent', 'required' => 'required']) !!}

            {!! Form::hidden('usercount', 50) !!}

        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        {!! Form::label('stripe_id', 'Stripe pricing plan id (Live Mode)', ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            {!! Form::text('stripe_id', null, ['class' => 'form-control box-size', 'placeholder' => 'Stripe pricing plan id, as product created on Stripe', 'required' => 'required']) !!}

        </div><!--col-lg-10-->
    </div><!--form-group-->

     <div class="form-group">
        {!! Form::label('strip_test_id', 'Stripe pricing plan id (Test Mode)', ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            {!! Form::text('strip_test_id', null, ['class' => 'form-control box-size', 'placeholder' => 'Stripe pricing plan id, as product created on Stripe', 'required' => 'required']) !!}

        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        @php
            $durations = ['12'=>'12 Months', '1'=>'1 Month'];
            //'Free'=>'Free', '6 Months'=>'6 Months', '3 Months'=>'3 Months', '2 Months'=>'2 Months',
        @endphp
        {!! Form::label('duration', 'Plan Months', ['class' => 'col-lg-2 control-label required']) !!}
        <div class="col-lg-10">
            @if(!empty($subscriptionplans->duration))
            {{ Form::select('duration', $durations, $subscriptionplans->duration, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @else
            {{ Form::select('duration', $durations, null, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div id="buildyourform">
     @if(!empty($planFeaturesValues))
        @php
        $count = 1;
        @endphp
        @foreach($planFeaturesValues as $key => $featureValue)
        <div class="fieldwrapper form-group">
            <label class="col-lg-2 control-label required">Feature Description</label>
            <div class="col-lg-8">
                {!! Form::textarea('subscriptionPlansFeature['.$count.'][description]', $featureValue,['class' => 'form-control box-size', 'required' => 'required']) !!}
                {!! Form::hidden('subscriptionPlansFeature['.$count.'][id]', $key,['class' => 'form-control box-size']) !!}
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
            <input type="button" value="Add Plan Features" class="add btn btn-primary" id="add" />
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('status', trans('labels.backend.subscriptionplans.status'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    @if(isset($subscriptionplans->status))
                    {{ Form::checkbox('status', 1, $subscriptionplans->status == 1 ? true :false) }}
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
    //Put your javascript needs in here.
    //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
    //if your create or edit blade contains javascript of its own
    $(document).ready(function () {
    //Everything in here would execute after the DOM is ready to manipulated.

        $("#add").click(function () {
            var lastField = $("#buildyourform").children().last();
            var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
            var fieldWrapper = $("<div class=\"fieldwrapper form-group\" id=\"field" + intId + "\"/>");
            fieldWrapper.data("idx", intId);
            var fLabel = $("<label class=\"col-lg-2 control-label required\">Feature Description</label>");
            var fName = $("<div class=\"col-lg-8\"><textarea class=\"fieldname form-control box-size\" name=\"subscriptionPlansFeature[][description]\" required=\"required\"/></textarea></div>");
            var removeButton = $("<div class=\"col-lg-1\"><input type=\"button\" class=\"remove btn btn-warning\" value=\"-\" /></div>");
            removeButton.click(function () {
            $(this).parent().remove();
            });
            fieldWrapper.append(fLabel);
            fieldWrapper.append(fName);
            fieldWrapper.append(removeButton);
            $("#buildyourform").append(fieldWrapper);
        });
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
                        url: '{{ route("admin.subscriptionplans.deleteplanfeature") }}',
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
