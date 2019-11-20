<div class="box-body">
    <div class="form-group">
        {{ Form::label('Title', 'Title', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter Title', 'required' => 'required'])
            }}
        </div>
        <!--col-lg-10-->
    </div>
    <!--form control-->

    <div class="form-group">
        {{ Form::label('type_id', 'Type', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <select class="form-control" name="type_id">
            @foreach($policy_types as $policy_type)
                <option value="{{$policy_type->id}}" {{ !empty($termandconditions->type_id)  ? 'selected' : ''}}>{{$policy_type->name}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) }}
        </div>
        <!--col-lg-10-->
    </div>
    <!--form control-->
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
<!--box-body-->



@section("after-scripts")
<script type="text/javascript">
    //Put your javascript needs in here.
    //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
    //if your create or edit blade contains javascript of its own
    Backend.TAC.init();
    $(document).ready(function () {
        //Everything in here would execute after the DOM is ready to manipulated.
    });

</script>
@endsection
