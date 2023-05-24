<?php $__env->startSection('title', 'Uploaded Documents'); ?> 
<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">List of uploaded documents</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Documents</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
    <form action="<?php echo e(route('tambahPropsalDocs')); ?>" method="POST" class="form-horizontal"   enctype="multipart/form-data">
    <?php echo csrf_field(); ?>               
    <?php if(session('status')): ?>
        <h6 class="alert alert-success"><?php echo e(session('status')); ?></h6>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Add Documents
                    <a href="<?php echo e(route('proposal-list')); ?>" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Document Name</th>
                            <th>Document Type</th>
                            <th>Filename</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                    ?>
                    <?php $__currentLoopData = $listDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($m->document_name); ?></td>
                        <td><?php echo e($m->document_type); ?></td>
                        <td><?php echo e($m->filename); ?></td>
                    </tr>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                </div>
                <!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/build/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm\resources\views/add-docs.blade.php ENDPATH**/ ?>