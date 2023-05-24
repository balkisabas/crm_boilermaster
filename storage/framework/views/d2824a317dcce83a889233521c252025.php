<?php $__env->startSection('title', 'Add Documents'); ?> 
<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">RFQ Documents</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Add Documents</li>
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
                    <form>
                        <div class="row">                                            
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="document_name">Document Name</label>
                                    <input type="hidden" name="rfqid" value="<?php echo e($rfq->id); ?>">
                                    <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter document name"></td>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="document_type" class="form-label">Documents Type<span style="color:red">*</span></label>
                                    <select name="document_type" id="document_type" class="form-control">
                                    <option value="">-Please Select Document Type-</option>
                                    <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k->description); ?>" <?php echo e($k->id == $k->docs? 'selected':''); ?>><?php echo e($k->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="filename" class="form-label">File<span style="color:red">*</span></label>
                                    <td><input type="file" class="form-control" id="filename" name="filename"></td>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success w-md" style="margin-top:28px">Add</button>
                                <button type="reset" class="btn btn-secondary w-md" style="margin-top:28px">Reset</button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Document Name</th>
                            <th>Document Type</th>
                            <th>Filename</th>
                            <th>Action</th>
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
                        <td>
                            <a href="<?php echo e(route('deleteDocs', $m->id)); ?>"><i class="bx bx-trash" style="color:red"  onclick="return confirm('Are you sure want to delete this file?')" title="Delete"></i></a>
                        </td>
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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/crm_boilermaster/resources/views/add-docs.blade.php ENDPATH**/ ?>