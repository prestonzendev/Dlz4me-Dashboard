@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.newslettersubscribers.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.newslettersubscribers.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.newslettersubscribers.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.newslettersubscribers.partials.newslettersubscribers-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="newslettersubscribers-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <!-- <th>{{ trans('labels.backend.newslettersubscribers.table.id') }}</th> -->
                            <th>Email</th>
                            <th>Status</th>
                            <th>{{ trans('labels.backend.newslettersubscribers.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <!-- <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr> -->
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
            var dataTable = $('#newslettersubscribers-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.newslettersubscribers.get") }}',
                    type: 'post'
                },
                columns: [
                    // {data: 'id', name: '{{config('module.newslettersubscribers.table')}}.id'},
                    {data: 'email', name: '{{config('module.newslettersubscribers.table')}}.email'},
                    {data: 'status', name: '{{config('module.newslettersubscribers.table')}}.status'},
                    {data: 'created_at', name: '{{config('module.newslettersubscribers.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[2, "desc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                sScrollY: "100%",
                buttons: {
                    buttons: [
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
