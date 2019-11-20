<div class="box-body">
    <!-- <div class="form-group">
        {{ Form::label('categories', 'Service Category', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($selectedCategories))
            {{ Form::select('categories[]', $serviceCategories, $selectedCategories, ['class' => 'form-control categories box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
            @else
            {{ Form::select('categories[]', $serviceCategories, null, ['class' => 'form-control categories box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
            @endif
        </div>col-lg-10
    </div>form control-->

    <div class="form-group">
        {{ Form::label('categories', 'Service Category', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($selectedCategories))
            {{ Form::select('categories', $serviceCategories, $selectedCategories, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @else
            {{ Form::select('categories', $serviceCategories, null, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @endif
        </div><!-- col-lg-10 -->
    </div><!-- form control -->

    <div class="form-group">
        {{ Form::label('vendor_id', 'Vendor Name', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            @if(!empty($selectedCategories))
            {{ Form::select('vendor_id', $vendors, $selectedCategories, ['class' => 'form-control vendors box-size', 'required' => 'required']) }}
            @else
            {{ Form::select('vendor_id', $vendors, null, ['class' => 'form-control vendors box-size', 'required' => 'required']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => 'Name', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Title', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

     <div class="form-group">
        {{ Form::label('description', trans('validation.attributes.backend.banners.description'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('offer_type', 'Offer Type', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::select('offer_type', ['1' => 'Online offer', '2' => 'Instore offer'], null, ['class' => 'form-control box-size', 'id'=>'offer_type', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group url-cls">
        {{ Form::label('url', 'Url', ['class' => 'col-lg-2 control-label url required']) }}

        <div class="col-lg-10">
            {{ Form::url('url', null, ['class' => 'form-control box-size', 'placeholder' => 'Url', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('image', 'Offer Image', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
             @if(isset($service->image))
    <div class="form-group">
        <div class="col-lg-10">
            {!! $service->image !!}
            
        </div>
    </div>
    @endif
            <div class="custom-file-input">
                {{ Form::file('image', array('class'=>'form-control inputfile inputfile-1')) }}
                <label for="image">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
        </div>
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('start_date', 'Start Date', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($service->start_date))
                {{ Form::text('start_date', $service->start_date, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Start Date', 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @else
                {{ Form::text('start_date', null, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Start Date', 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('end_date', 'End Date', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($service->end_date))
                {{ Form::text('end_date', $service->end_date, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'End Date', 'required' => 'required', 'id' => 'datetimepicker2']) }}
            @else
                {{ Form::text('end_date', null, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'End Date', 'required' => 'required', 'id' => 'datetimepicker2']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

     <div class="form-group">
        {{ Form::label('disc_perc', 'Discount Percentage', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('disc_perc', null, ['class' => 'form-control box-size', 'placeholder' => 'Discount Percentage', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

     <div class="form-group">
        {{ Form::label('coupon_code', 'Coupon Code', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('coupon_code', null, ['class' => 'form-control box-size', 'placeholder' => 'Coupon code', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('is_featured', 'Featured', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-1">
            <div class="control-group">
                <label class="control control--checkbox">
                @if(!empty($service->is_featured) && $service->is_featured==2)
                    {{ Form::checkbox('is_featured', '2', true) }}
                    <div class="control__indicator"></div>
                @else
                    {{ Form::checkbox('is_featured', '2', false) }}
                    <div class="control__indicator"></div>
                @endif
                </label>
            </div>
        </div><!--col-lg-1-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', 'Status', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-1">
            <div class="control-group">
                <label class="control control--checkbox">
                    <input name='status' type='hidden' value='0'>
                    {{ Form::checkbox('status', '1', $status) }}
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-1-->
    </div><!--form control-->
</div>

@section("after-scripts")
<script type="text/javascript">
    //Put your javascript needs in here.
    //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
    //if your create or edit blade contains javascript of its own
    Backend.Service.init();
    $(document).ready(function () {
        //Everything in here would execute after the DOM is ready to manipulated.
    });
    $(function() {              
        // Bootstrap DateTimePicker v4
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
            minDate:new Date()
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
            minDate:new Date()
        });

        //manage offer type and url
        if($('#offer_type').val()==2) {
            $('.url-cls').addClass('hide');
            $('.url').removeAttr("required","required");
        }
        $('#offer_type').on('change',function(){
            offer_val = $(this).val();
            if(offer_val==2) {
                $('.url-cls').addClass('hide');
                $('.url').removeAttr("required","required");
            } else {
                $('.url-cls').removeClass('hide');
                $('.url').attr("required","required");
            }
        })
    });
</script>
@endsection
