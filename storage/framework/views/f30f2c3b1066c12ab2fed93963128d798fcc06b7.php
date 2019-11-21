<?php $__env->startSection('title', trans('labels.backend.access.users.management')); ?>

<?php $__env->startSection('page-header'); ?>
    <h1>
        <?php echo e(trans('labels.backend.access.users.management')); ?>

        <small>Active Vendor</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Active Vendor</h3>

            <div class="box-tools pull-right">
                <?php echo $__env->make('backend.access.includes.partials.vendor-header-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="users-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>

                            <th>Profile Pic</th>
                            <th><?php echo e(trans('labels.backend.access.users.table.first_name')); ?></th>
                            <th><?php echo e(trans('labels.backend.access.users.table.last_name')); ?></th>
                            <th>Pin code</th>
                            <th><?php echo e(trans('labels.backend.access.users.table.email')); ?></th>
                            <th><?php echo e(trans('labels.backend.access.users.table.phone')); ?></th>
                            <th><?php echo e(trans('labels.backend.access.users.table.city')); ?></th>
                            <th><?php echo e(trans('labels.backend.access.users.table.state')); ?></th>
                            <th><?php echo e(trans('labels.backend.access.users.table.country')); ?></th>
                            <th><?php echo e(trans('labels.backend.access.users.table.confirmed')); ?></th>
                            <th><?php echo e(trans('labels.backend.access.users.table.created')); ?></th>
                            <th><?php echo e(trans('labels.general.actions')); ?></th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <!-- <th>
                                <?php echo Form::text('first_name', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.access.users.table.first_name')]); ?>

                                    <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                                </th>
                            <th>
                                <?php echo Form::text('last_name', null, ["class" => "search-input-text form-control", "data-column" => 1, "placeholder" => trans('labels.backend.access.users.table.last_name')]); ?>

                                    <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th>
                                <?php echo Form::text('email', null, ["class" => "search-input-text form-control", "data-column" => 2, "placeholder" => trans('labels.backend.access.users.table.email')]); ?>

                                    <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th></th> -->
                            <!-- <th>
                            <?php echo Form::text('roles', null, ["class" => "search-input-text form-control", "data-column" => 4, "placeholder" => trans('labels.backend.access.users.table.roles')]); ?>

                                <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th> -->
                            <!-- <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th> -->
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <!--<div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans('history.backend.recent_history')); ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            
        </div><!-- /.box-body -->
    </div><!--box box-info-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts'); ?>
    
    <?php echo e(Html::script(mix('js/dataTable.js'))); ?>


    <script>
        (function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var dataTable = $('#users-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '<?php echo e(route("admin.access.user.get")); ?>',
                    type: 'post',
                    data: {status: 1, trashed: false, role: 'Vendor'}
                },
                columns: [
                    {data: 'profilepic', name: '<?php echo e(config('access.users_table')); ?>.profilepic'},
                    {data: 'first_name', name: '<?php echo e(config('access.users_table')); ?>.first_name'},
                    {data: 'last_name', name: '<?php echo e(config('access.users_table')); ?>.last_name'},
                    {data: 'pin_code', name: '<?php echo e(config('access.users_table')); ?>.pin_code'},
                    {data: 'email', name: '<?php echo e(config('access.users_table')); ?>.email'},
                    {data: 'phone', name: '<?php echo e(config('access.users_table')); ?>.phone'},
                    {data: 'city', name: '<?php echo e(config('access.users_table')); ?>.city'},
                    {data: 'state', name: '<?php echo e(config('access.users_table')); ?>.state'},
                    {data: 'country', name: '<?php echo e(config('access.users_table')); ?>.country'},
                    {data: 'confirmed', name: '<?php echo e(config('access.users_table')); ?>.confirmed'},
                    {data: 'created_at', name: '<?php echo e(config('access.users_table')); ?>.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                ScrollY: "100%",
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        })();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>