<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('name', trans('labels.backend.faqcategories.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'data-mask'=>'city', 'placeholder' => trans('labels.backend.faqcategories.title'), 'required' => 'required']) }}

        </div><!--col-lg-10-->
    </div><!--form-group-->

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

</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
