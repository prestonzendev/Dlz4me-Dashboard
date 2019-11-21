<?php $__env->startSection('title', trans('labels.backend.services.featured')); ?>

<?php $__env->startSection('page-header'); ?>
<h1><?php echo e(trans('labels.backend.services.management')); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('labels.backend.services.featured')); ?></h3>

        <div class="box-tools pull-right">
            <?php echo $__env->make('backend.services.partials.services-header-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div><!--box-header with-border-->
    
    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <?php echo e(Form::open(['route' => 'admin.services.makefeatured', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-featured'])); ?>

            <table id="services-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th><?php echo e(trans('labels.backend.services.table.id')); ?></th>
                        <th><?php echo e(trans('labels.backend.services.table.name')); ?></th>
                        <th><?php echo e(trans('labels.backend.services.table.title')); ?> </th>
                        <th><?php echo e(trans('labels.backend.services.table.status')); ?></th>
                        <th>Make Featured</th>
                        <th><?php echo e(trans('labels.general.actions')); ?></th>
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
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary btn-md'])); ?>

            <?php echo e(Form::close()); ?>

        </div><!--table-responsive-->
    </div><!-- /.box-body -->
</div><!--box-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts'); ?>

<?php echo e(Html::script(mix('js/dataTable.js'))); ?>


<script>
    //Below written line is short form of writing $(document).ready(function() { })
    $(function() {
    var dataTable = $('#services-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '<?php echo e(route("admin.services.getFeatured")); ?>',
                    type: 'post'
            },
            columns: [
            {data: 'id', name: '<?php echo e(config('module.services.table')); ?>.id'},
            {data: 'name', name: '<?php echo e(config('module.services.table')); ?>.name'},
            {data: 'title', name: '<?php echo e(config('module.services.table')); ?>.title'},
            {data: 'status', name: '<?php echo e(config('module.services.table')); ?>.status'},
            {data: 'make_featured', name: 'make_featured', searchable: false, sortable: false},
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
    //console.log(dataTable);
    Backend.DataTableSearch.init(dataTable);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>