@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.services.management'))

@section('page-header')
<h1>{{ trans('labels.backend.services.management') }}</h1>
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.services.management') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.services.partials.services-header-buttons')
        </div>
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="services-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.services.table.id') }}</th>
                        <th>{{ trans('labels.backend.services.table.name') }}</th>
                        <th>{{ trans('labels.backend.services.table.image') }}</th>
                        <th>{{ trans('labels.backend.services.table.title') }} </th>
                        <th>{{ trans('labels.backend.services.table.status') }}</th>
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
    var dataTable = $('#services-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.services.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'id', name: '{{config('module.services.table')}}.id'},
            {data: 'name', name: '{{config('module.services.table')}}.name'},
            {data: 'image', image: '{{config('module.services.table')}}.image'},
            {data: 'title', name: '{{config('module.services.table')}}.title'},
            {data: 'status', name: '{{config('module.services.table')}}.status'},
            /*{data: 'is_featured', name: '{{config('module.services.table')}}.is_featured'},*/
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ],
            order: [[0, "asc"]],
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
