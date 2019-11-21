
<div class="box-body">
    <!-- <div class="form-group">
        <?php echo e(Form::label('categories', 'Service Category', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php if(!empty($selectedCategories)): ?>
            <?php echo e(Form::select('categories[]', $serviceCategories, $selectedCategories, ['class' => 'form-control categories box-size', 'required' => 'required', 'multiple' => 'multiple'])); ?>

            <?php else: ?>
            <?php echo e(Form::select('categories[]', $serviceCategories, null, ['class' => 'form-control categories box-size', 'required' => 'required', 'multiple' => 'multiple'])); ?>

            <?php endif; ?>
        </div>col-lg-10
    </div>form control-->

    <div class="form-group">
        <?php echo e(Form::label('categories', 'Service Category', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php if(!empty($selectedCategories)): ?>
            <?php echo e(Form::select('categories', $serviceCategories, $selectedCategories, ['class' => 'form-control categories box-size', 'required' => 'required'])); ?>

            <?php else: ?>
            <?php echo e(Form::select('categories', $serviceCategories, null, ['class' => 'form-control categories box-size', 'required' => 'required'])); ?>

            <?php endif; ?>
        </div><!-- col-lg-10 -->
    </div><!-- form control -->

    <div class="form-group">
        <?php echo e(Form::label('vendor_id', 'Vendor Name', ['class' => 'col-lg-2 control-label required'])); ?>

        <div class="col-lg-10">
            <?php if(!empty($selectedCategories)): ?>
            <?php echo e(Form::select('vendor_id', $vendors, $selectedCategories, ['class' => 'form-control vendors box-size', 'required' => 'required'])); ?>

            <?php else: ?>
            <?php echo e(Form::select('vendor_id', $vendors, null, ['class' => 'form-control vendors box-size', 'required' => 'required'])); ?>

            <?php endif; ?>
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        <?php echo e(Form::label('name', 'Name', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php echo e(Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => 'Name', 'required' => 'required'])); ?>

        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        <?php echo e(Form::label('title', 'Title', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php echo e(Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Title', 'required' => 'required'])); ?>

        </div><!--col-lg-10-->
    </div><!--form control-->

     <div class="form-group">
        <?php echo e(Form::label('description', trans('validation.attributes.backend.banners.description'), ['class' => 'col-lg-2 control-label'])); ?>


        <div class="col-lg-10 mce-box">
            <?php echo e(Form::textarea('description', null, ['class' => 'form-control box-size'])); ?>

        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        <?php echo e(Form::label('offer_type', 'Offer Type', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php echo e(Form::select('offer_type', ['1' => 'Online offer', '2' => 'Instore offer'], null, ['class' => 'form-control box-size', 'id'=>'offer_type', 'required' => 'required'])); ?>

        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group url-cls">
        <?php echo e(Form::label('url', 'Url', ['class' => 'col-lg-2 control-label url required'])); ?>


        <div class="col-lg-10">
            <?php echo e(Form::url('url', null, ['class' => 'form-control box-size', 'placeholder' => 'Url', 'required' => 'required'])); ?>

        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        <?php echo e(Form::label('image', 'Offer Image', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
             <?php if(isset($service->image)): ?>
    <div class="form-group">
        <div class="col-lg-10">
            <?php echo $service->image; ?>

            
        </div>
    </div>
    <?php endif; ?>
            <div class="custom-file-input">
                <?php echo e(Form::file('image', array('class'=>'form-control inputfile inputfile-1','required' => 'required'))); ?>

                <label for="image">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
        </div>
    </div><!--form control-->

    <div class="form-group">
        <?php echo e(Form::label('start_date', 'Start Date', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php if(!empty($service->start_date)): ?>
                <?php echo e(Form::text('start_date', $service->start_date, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Start Date', 'required' => 'required', 'id' => 'datetimepicker1'])); ?>

            <?php else: ?>
                <?php echo e(Form::text('start_date', null, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'Start Date', 'required' => 'required', 'id' => 'datetimepicker1'])); ?>

            <?php endif; ?>
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        <?php echo e(Form::label('end_date', 'End Date', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php if(!empty($service->end_date)): ?>
                <?php echo e(Form::text('end_date', $service->end_date, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'End Date', 'required' => 'required', 'id' => 'datetimepicker2'])); ?>

            <?php else: ?>
                <?php echo e(Form::text('end_date', null, ['class' => 'form-control datetimepicker1 box-size', 'autocomplete'=>'off', 'onkeydown'=>'return false', 'placeholder' => 'End Date', 'required' => 'required', 'id' => 'datetimepicker2'])); ?>

            <?php endif; ?>
        </div><!--col-lg-10-->
    </div><!--form control-->

     <div class="form-group">
        <?php echo e(Form::label('disc_perc', 'Discount Percentage', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php echo e(Form::text('disc_perc', null, ['class' => 'form-control box-size', 'placeholder' => 'Discount Percentage', 'required' => 'required'])); ?>

        </div><!--col-lg-10-->
    </div><!--form control-->

     <div class="form-group">
        <?php echo e(Form::label('coupon_code', 'Coupon Code', ['class' => 'col-lg-2 control-label required'])); ?>


        <div class="col-lg-10">
            <?php echo e(Form::text('coupon_code', null, ['class' => 'form-control box-size', 'placeholder' => 'Coupon code', 'required' => 'required'])); ?>

        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        <?php echo e(Form::label('is_featured', 'Featured', ['class' => 'col-lg-2 control-label'])); ?>

        <div class="col-lg-1">
            <div class="control-group">
                <label class="control control--checkbox">
                <?php if(!empty($service->is_featured) && $service->is_featured==2): ?>
                    <?php echo e(Form::checkbox('is_featured', '2', true)); ?>

                    <div class="control__indicator"></div>
                <?php else: ?>
                    <?php echo e(Form::checkbox('is_featured', '2', false)); ?>

                    <div class="control__indicator"></div>
                <?php endif; ?>
                </label>
            </div>
        </div><!--col-lg-1-->
    </div><!--form control-->

    <div class="form-group">
        <?php echo e(Form::label('status', 'Status', ['class' => 'col-lg-2 control-label'])); ?>

        <div class="col-lg-1">
            <div class="control-group">
                <label class="control control--checkbox">
                    <input name='status' type='hidden' value='0'>
                    <?php echo e(Form::checkbox('status', '1', $status)); ?>

                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-1-->
    </div><!--form control-->
</div>

<?php $__env->startSection("after-scripts"); ?>
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
<?php $__env->stopSection(); ?>
