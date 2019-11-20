<div class="box-body">

    <div class="form-group">
        {{ Form::label('' , '', ['class' => 'col-lg-2 ']) }}
        {{ Form::label('Name' , 'Name: ' . $reportedissue->name, ['class' => 'col-lg-6 ']) }}
        

    </div><!--form-group-->

    <div class="form-group">
        {{ Form::label('' , '', ['class' => 'col-lg-2 ']) }}
        {{ Form::label('Phone' , 'Phone: ' . $reportedissue->phone, ['class' => 'col-lg-6 ']) }}

    </div><!--form-group-->

    <div class="form-group">
        {{ Form::label('' , '', ['class' => 'col-lg-2 ']) }}
        {{ Form::label('Email' , 'Email: ' . $reportedissue->email, ['class' => 'col-lg-6 ']) }}
        

    </div><!--form-group-->

    <div class="form-group">
        {{ Form::label('' , '', ['class' => 'col-lg-2 ']) }}
        <b>Message</b>
        

    </div><!--form-group-->

    <div class="form-group">
        {{ Form::label('' , '', ['class' => 'col-lg-2 ']) }}
        <div style="margin-left: 200px; margin-right: 150px;">
                {{$reportedissue->body}}
            </div>

    </div><!--form-group-->

    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{-- {{ Form::label('name', trans('labels.backend.blogs.title'), ['class' => 'col-lg-2 control-label required']) }} --}}

        <div class="col-lg-10"> 
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{-- {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.blogs.title'), 'required' => 'required']) }} --}}
        </div><!--col-lg-10-->
    </div><!--form-group-->
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
