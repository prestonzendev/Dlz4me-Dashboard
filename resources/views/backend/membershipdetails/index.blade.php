@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.membershipdetails.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.membershipdetails.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.membershipdetails.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.membershipdetails.partials.membershipdetails-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="membershipdetails-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Membership Level</th>
                            <th>Title</th>
                            <th>Price ($)</th>
                            <th>Status</th>
                            <th>{{ trans('labels.general.actions') }}</th>
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
            var dataTable = $('#membershipdetails-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.membershipdetails.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'membership_level', name: '{{config('module.membershipdetails.table')}}.membership_level'},
                    {data: 'title', name: '{{config('module.membershipdetails.table')}}.title'},
                    {data: 'price', name: '{{config('module.membershipdetails.table')}}.price'},
                    {data: 'status', name: '{{config('module.membershipdetails.table')}}.status'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                sScrollY: "100%",
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
