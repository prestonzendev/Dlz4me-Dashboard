@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.termandconditions.management'))

@section('page-header')
<h1>{{ trans('labels.backend.termandconditions.management') }}</h1>
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.termandconditions.management') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.termandconditions.partials.termandconditions-header-buttons')
        </div>
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="termandconditions-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <!-- <th>{{ trans('labels.backend.termandconditions.table.id') }}</th> -->
                        <th>{{ trans('labels.backend.termandconditions.table.title') }}</th>
                        <th>Type</th>
                        <th>{{ trans('labels.backend.termandconditions.table.is_latest') }}</th>
                        <th>{{ trans('labels.backend.termandconditions.table.status') }}</th>
                        <th>{{ trans('labels.backend.termandconditions.table.createdat') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div><!--table-responsive-->
    </div><!-- /.box-body -->
</div><!--box-->
@endsection

@section('after-scripts')
{{-- For DataTables --}}
{{ Html::script(mix('js/dataTable.js')) }}

<script>
    //Below written line is short form of writing $(document).ready(function() { })
    $(function() {
    var dataTable = $('#termandconditions-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.termandconditions.get") }}',
                    type: 'post'
            },
            columns: [
            // {data: 'id', name: '{{config('module.termandconditions.table')}}.id'},
            {data: 'title', name: '{{config('module.termandconditions.table')}}.title'},
            {data: 'type_id', name: '{{config('module.termandconditions.table')}}.type_id'},
            {data: 'is_latest', name: '{{config('module.termandconditions.table')}}.is_latest'},
            {data: 'status', name: '{{config('module.termandconditions.table')}}.status'},
            {data: 'created_at', name: '{{config('module.termandconditions.table')}}.created_at'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ],
            order: [[2, "desc"], [1, "asc"]],
            searchDelay: 500,
            dom: 'lBfrtip',
            sScrollY: "100%",
            buttons: {
            buttons: [
            { extend: 'copy', className: 'copyButton', exportOptions: {columns: [ 0, 1 ]  }},
            { extend: 'csv', className: 'csvButton', exportOptions: {columns: [ 0, 1 ]  }},
            { extend: 'excel', className: 'excelButton', exportOptions: {columns: [ 0, 1 ]  }},
            { extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [ 0, 1 ]  }},
            { extend: 'print', className: 'printButton', exportOptions: {columns: [ 0, 1 ]  }}
            ]
            }
    });
    Backend.DataTableSearch.init(dataTable);
    });
</script>
@endsection
