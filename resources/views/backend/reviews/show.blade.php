@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.reviews.management') . ' | Review Details')

@section('page-header')
    <h1>
        {{ trans('labels.backend.reviews.management') }}
        <small>Review Details</small>
    </h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Review Details</h3>
            <div class="box-tools pull-right">
                @include('backend.reviews.partials.reviews-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Review Details</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        <table class="table table-striped table-hover">
    
    <tr>
        <th>Reviewer Photo</th>
        <td> {!! $review->photo !!} </td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.reviews.table.name') }}</th>
        <td>{{ $review->name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.reviews.table.grade') }}</th>
        <td>{!! $review->grade !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.reviews.table.status') }}</th>
        <td>{!! $review->status !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.reviews.table.message') }}</th>
        <td>{!! $review->message !!}</td>
    </tr>


</table>

    <div class="box-body">
                <div class="form-group">
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.reviews.index', 'Back', [], ['class' => 'btn btn-danger btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
                    </div><!--tab overview profile-->

                </div><!--tab content-->

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection
