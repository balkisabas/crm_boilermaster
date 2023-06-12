

<?php $__env->startSection('title','Edit Companies'); ?>

<style>
    .radio-container {
      display: inline-block;
      margin-right: 40px;
    }
  </style>

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
<?php if(session('status')): ?>
        <h6 class="alert alert-success"><?php echo e(session('status')); ?></h6>
<?php endif; ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3 class="mb-0 font-size-18">Edit Companies</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Edit Companies</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
<form action="<?php echo e(route('companies.update', $company->id)); ?>" method="POST" class="form-horizontal"  enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit Companies</h3>
                    <form>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo e($company->company_name); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span style="color:red">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e($company->phone); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo e($company->address); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fax" class="form-label">Fax </label>
                                    <input type="text" class="form-control" id="fax" name="fax" value="<?php echo e($company->fax); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="radio-container">
                                <label for="status" class="form-label">Status <span style="color:red">*</span></label>
                                <br>
                                <input type="radio" class="form-check-input"  name="status" value="Yes">Yes
                                <input type="radio" class="form-check-input"  name="status"  value="No">No
                            </div>
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this record?')">Update</button>
                            <a href="<?php echo e(route('companies.index')); ?>" class="btn btn-secondary">Cancel</a>
                            
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/companies/edit.blade.php ENDPATH**/ ?>