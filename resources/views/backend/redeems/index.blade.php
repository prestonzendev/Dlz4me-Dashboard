@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.redeems.management'))

@section('page-header')
<h1>{{ trans('labels.backend.redeems.management') }}</h1>
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.redeems.management') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.redeems.partials.redeems-header-buttons')
        </div>
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="redeems-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.redeems.table.id') }}</th>
                        <th>{{ trans('labels.backend.redeems.table.user_name') }}</th>
                        <th>{{ trans('labels.backend.redeems.table.bank_name') }}</th>
                        <th>{{ trans('labels.backend.redeems.table.amount') }} </th>
                        <th>{{ trans('labels.backend.redeems.table.status') }}</th>
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
    var dataTable = $('#redeems-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.redeems.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'id', name: '{{config('module.redeems.table')}}.id'},
            {data: 'accountname', name: '{{config('module.users.table')}}.accountname'},
            {data: 'bank_name', name: '{{config('module.bank_accounts.table')}}.bank_name'},
            {data: 'amount', name: '{{config('module.redeems.table')}}.amount'},
            {data: 'status', name: '{{config('module.redeems.table')}}.status'},
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
<script>
    $(document).on('click', '.change-status', function () {
        str = $(this).attr('id');
        var res = str.split('-');
        if (confirm('Are you sure you want to approv redeem amount?')) {
            $.ajax({
                type:"GET",
                url:"{{url('admin/redeems/changestatus')}}",
                data:{
                    id: res[0],
                    status: res[1]
                },
                success:function(data) {
                    alert(data.success);
                    $('#redeems-table').DataTable().ajax.reload(null, false);
                }
             });
        }
    });
</script>
@endsection
