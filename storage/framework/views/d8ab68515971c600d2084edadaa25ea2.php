
<?php $__env->startSection('title','Create RFQ Type'); ?>
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
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3 class="mb-0 font-size-18">Create RFQ Type</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Create RFQ Type</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
<form action="<?php echo e(route('rfqtypes.store')); ?>" method="POST" class="form-horizontal"  enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if(session('status')): ?>
        <h6 class="alert alert-success"><?php echo e(session('status')); ?></h6>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create RFQ Type
                        <a class="btn btn-primary" href="<?php echo e(route('rfqtypes.index')); ?>"><i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter position">
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            <button type="submit" class="btn btn-success w-md">Save</button>
                            <button type="reset" class="btn btn-secondary w-md">Reset</button>
                            
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/rfqtypes/create.blade.php ENDPATH**/ ?>