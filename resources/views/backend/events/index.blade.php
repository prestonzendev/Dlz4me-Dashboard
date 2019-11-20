@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.events.management'))

@section('page-header')
<h1>Event Logs</h1>
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.events.management') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.events.partials.events-header-buttons')
        </div>
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="events-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Event Logs</th>
                        <th>User Type</th>
                        <th>{{ trans('labels.backend.events.table.createdat') }}</th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <!-- <th></th> -->
                        <!-- <th>
                                {!! Form::select('roles', [1 => "Administrator", 2 => "Escort", 3 => "Customer"], null, ["class" => "search-input-select form-control", "data-column" => 1, "placeholder" => 'All User Types']) !!}                            </th>
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th> -->
                        <!-- <th></th> -->
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
    var dataTable = $('#events-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.events.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'message', name: '{{config('module.events.table')}}.message'},
            {data: 'roles', name: '{{config('access.roles_table')}}.name', sortable: false},
            {data: 'created_at', name: '{{config('module.events.table')}}.created_at'}
            ],
            order: [[1, "desc"]],
            searchDelay: 500,
            sScrollY: "100%",
            dom: 'lBfrtip',
            buttons: {
            buttons: [
            { extend: 'copy', className: 'copyButton', exportOptions: {columns: [ 0, 1, 2]  }},
            { extend: 'csv', className: 'csvButton', exportOptions: {columns: [0, 1, 2 ]  }},
            { extend: 'excel', className: 'excelButton', exportOptions: {columns: [ 0, 1, 2 ]  }},
            { extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [0, 1, 2 ]  }},
            { extend: 'print', className: 'printButton', exportOptions: {columns: [ 0, 1, 2 ]  }}
            ]
            }
    });
    Backend.DataTableSearch.init(dataTable);
    });
</script>
@endsection
