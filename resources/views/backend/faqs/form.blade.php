<div class="box-body">
    <!-- <div class="form-group">
        {{ Form::label('categories', 'Faq Category', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($selectedCategory))
            {{ Form::select('category_id', $faqCategories, $selectedCategory, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @else
            {{ Form::select('category_id', $faqCategories, null, ['class' => 'form-control categories box-size', 'required' => 'required']) }}
            @endif
        </div>
    </div> -->
    <div class="form-group">
        {{ Form::label('question', trans('validation.attributes.backend.faqs.question'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('question', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.faqs.question'), 'required' => 'required']) }}
            {{ Form::hidden('category_id', 3) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('answer', trans('validation.attributes.backend.faqs.answer'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('answer', null, ['class' => 'form-control box-size']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.faqs.status'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    @if(isset($faq->status))
                        {{ Form::checkbox('status', 1, $faq->status == 1 ? true :false) }}
                    @else
                        {{ Form::checkbox('status', 1, true) }}
                    @endif
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>
@section('after-scripts')
    <script type="text/javascript">
        Backend.Faq.init();
    </script>
@endsection