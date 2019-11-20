<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {!! Form::label('title', trans('labels.backend.preference.title'), ['class' => 'col-lg-2 control-label required']) !!}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {!! Form::text('title', null, ['class' => 'form-control box-size', 'data-mask' => 'charonly', 'placeholder' => trans('labels.backend.preference.title'), 'required' => 'required']) !!}            
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {{ Form::label('is_active', trans('labels.backend.preferences.is_active'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    @if(isset($preferences->is_active))
                    {{ Form::checkbox('is_active', 1, $preferences->is_active == 1 ? true :false) }}
                    @else
                    {{ Form::checkbox('is_active', 1, true) }}
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
    });
</script>
@endsection
