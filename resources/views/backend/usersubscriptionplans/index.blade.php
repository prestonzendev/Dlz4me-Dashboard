@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.usersubscriptionplans.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.usersubscriptionplans.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.usersubscriptionplans.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.usersubscriptionplans.partials.usersubscriptionplans-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="usersubscriptionplans-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.usersubscriptionplans.table.id') }}</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>{{ trans('labels.backend.usersubscriptionplans.table.title') }}</th>
                            <th>{{ trans('labels.backend.usersubscriptionplans.table.price') }} ({!!settings()->currency_symbol!!})</th>
                            <th>Token ID</th>
                            <th>{{ trans('labels.backend.usersubscriptionplans.table.paystatus') }}</th>
                            <th>Expiry Date</th>
                            <th>{{ trans('labels.backend.usersubscriptionplans.table.createdat') }}</th>
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
            var dataTable = $('#usersubscriptionplans-table').dataTable({
                processing: true,
                serverSide: true,
                pageLength: '{{settings()->limit_per_page}}',
                ajax: {
                    url: '{{ route("admin.usersubscriptionplans.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.usersubscriptionplans.table')}}.id'},
                    {data: 'first_name', name: 'users.first_name'},
                    {data: 'last_name', name: 'users.last_name'},
                    {data: 'email', name: 'users.email'},
                    {data: 'phone', name: 'users.phone'},
                    {data: 'title', name: '{{config('module.usersubscriptionplans.table')}}.title'},
                    {data: 'price', name: '{{config('module.usersubscriptionplans.table')}}.price'},
                    {data: 'transactionid', name: '{{config('module.usersubscriptionplans.table')}}.transactionid'},
                    {data: 'paystatus', name: '{{config('module.usersubscriptionplans.table')}}.paystatus'},
                    {data: 'expiry_date', name: '{{config('module.usersubscriptionplans.table')}}.expiry_date'},
                    {data: 'created_at', name: '{{config('module.usersubscriptionplans.table')}}.created_at'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
