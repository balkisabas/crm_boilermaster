

<?php $__env->startSection('title','Edit Roles'); ?>

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
            <h3 class="mb-0 font-size-18">Edit RFQ</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Edit Roles</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
<?php echo Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit Roles</h3>
                    <form>
                        <div class="row">  
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">Name <span style="color:red">*</span></label>
                                    <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">  
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">Permission <span style="color:red">*</span></label>
                                    <br>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label><?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name'))); ?>

                                        <?php echo e($value->name); ?></label>
                                    <br/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this role?')">Update</button>
                            <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-secondary">Cancel</a>
                            
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/roles/edit.blade.php ENDPATH**/ ?>