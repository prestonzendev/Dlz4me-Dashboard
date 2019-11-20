@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.enquiries.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.enquiries.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.enquiries.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.enquiries.partials.enquiries-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="enquiries-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.enquiries.table.id') }}</th>
                            <th>{{ trans('labels.backend.enquiries.table.name') }}</th>
                            <th>{{ trans('labels.backend.enquiries.table.email') }}</th>
                            <th>{{ trans('labels.backend.enquiries.table.phone') }}</th>
                            <th>{{ trans('labels.backend.enquiries.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
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
            var dataTable = $('#enquiries-table').dataTable({
                processing: true,
                serverSide: true,
                pageLength: '{{settings()->limit_per_page}}',
                ajax: {
                    url: '{{ route("admin.enquiries.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.enquiries.table')}}.id'},
                    {data: 'name', name: '{{config('module.enquiries.table')}}.name'},
                    {data: 'email', name: '{{config('module.enquiries.table')}}.email'},
                    {data: 'phone', name: '{{config('module.enquiries.table')}}.phone'},
                    {data: 'created_at', name: '{{config('module.enquiries.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
