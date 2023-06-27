

<?php $__env->startSection('title','Edit User'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .accordion-item {
      
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 13px;
        transition: 0.4s;
    }

    .accordion-header {
        background-color: #f1f1f1;
        padding: 10px;
        cursor: pointer;
    }

    .accordion-content {
        padding: 10px;
        display: none;
        background-color: white; 
    }
</style>
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
            <h3 class="mb-0 font-size-18">Edit User</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
<?php echo Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]); ?>

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit User
                        <a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"><i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span style="color:red">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo e($user->password); ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                                    <?php echo Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alternative_email" class="form-label">Alternative Email <span style="color:red">*</span></label>
                                    <?php echo Form::text('alternative_email', null, array('placeholder' => 'alternative_email','class' => 'form-control')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span style="color:red">*</span></label>
                                    <?php echo Form::text('phone', null, array('placeholder' => 'phone','class' => 'form-control')); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position <span style="color:red">*</span></label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="">-Please Select position-</option>
                                        <?php $__currentLoopData = $position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($m->id); ?>" <?php echo e($m->id == $user->position ? 'selected':''); ?>><?php echo e($m->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company <span style="color:red">*</span></label>
                                    <select name="company" id="company" class="form-control">
                                    <option value="">-Please Select company-</option>
                                    <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k->id); ?>" <?php echo e($k->id == $user->company? 'selected':''); ?>><?php echo e($k->company_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="roles" class="form-label">Role <span style="color:red">*</span></label>
                                    <?php echo Form::select('roles[]', $roles,$userRole, array('class' => 'selectpicker form-control','multiple')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Zoho email permission code</label>
                                        <input type="text" class="form-control" id="zohoemail_code" name="zohoemail_code" value="<?php echo e($user->zohoemail_code); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio-container">
                                        <label for="status" class="form-label">Status</label>
                                        <br>
                                        <input type="radio" style="margin-top:10px" name="status" value="Yes" <?php echo e($user->status == 'Yes' ? 'checked' : ''); ?>> Yes
                                        <input type="radio"  name="status"  value="No" <?php echo e($user->status == 'No' ? 'checked' : ''); ?>>No
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
</div>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.accordion-header').click(function() {
                $(this).toggleClass('active');
                $(this).next('.accordion-content').slideToggle();
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/users/edit.blade.php ENDPATH**/ ?>