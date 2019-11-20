<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => 'Name', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        {{ Form::label('photo', 'Photo', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
             @if(isset($review->photo))
    <div class="form-group">
        <div class="col-lg-10">
            {!! $review->photo !!}
            
        </div>
    </div>
    @endif
            <div class="custom-file-input">
                {{ Form::file('photo', array('class'=>'form-control inputfile inputfile-1')) }}
                <label for="photo">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
        </div>
    </div><!--form control-->


     <div class="form-group">
        {{ Form::label('message', trans('labels.backend.reviews.table.message'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('message', null, ['class' => 'form-control box-size']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('rating', trans('labels.backend.reviews.table.grade'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            @php
            $reviewGrades = [0,1,2,3,4,5];
            @endphp
            @if(!empty($review->grade))
            {{ Form::select('grade', $reviewGrades, $grade, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @else
            {{ Form::select('grade', $reviewGrades, null, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', trans('labels.backend.reviews.table.status'), ['class' => 'col-lg-2 control-label']) }}
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

        Backend.Review.init();

    </script>
@endsection
