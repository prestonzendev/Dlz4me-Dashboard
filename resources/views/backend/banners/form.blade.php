<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Title', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->


    <div class="form-group">
        {{ Form::label('bannerfile', 'Banner File', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
             @if(isset($banner->bannerfile))
    <div class="form-group">
        <div class="col-lg-10">
            {!! $banner->bannerfile !!}
            
        </div>
    </div>
    @endif
            <div class="custom-file-input">
                {{ Form::file('bannerfile', array('class'=>'form-control inputfile inputfile-1')) }}
                <label for="bannerfile">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
        </div>
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('description', trans('validation.attributes.backend.banners.description'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    @if(!isset($banner->id) || (isset($banner->id) && $banner->id != 1))
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
    @endif

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

    <script type="text/javascript">
        Backend.Banner.init();
    </script>
@endsection
