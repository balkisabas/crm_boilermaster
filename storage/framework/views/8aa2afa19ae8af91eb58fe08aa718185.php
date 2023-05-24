<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">Upload Form</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('store')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="file" name="file[]" multiple><br><br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
            <div style="margin-top:20px;">
            <?php if(count($errors) > 0): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger text-center">
                        <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
  
            <?php if(session('success')): ?>
                <div class="alert alert-success text-center">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            </div>
        </div>
        <div class="col-8">
            <h2>Files Table</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Photo</th>
                        <th>File Name</th>
                        <th>File Size</th>
                        <th>Date Uploaded</th>
                        <th>File Location</th>
                    </thead>
                    <tbody>
                        <?php if(count($files) > 0): ?>
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><img src='storage/<?php echo e($file->name); ?>' name="<?php echo e($file->name); ?>" style="width:90px;height:90px;"></td>
                                    <td><?php echo e($file->name); ?></td>
                                    <td> 
                                        <?php if($file->size < 1000): ?>
                                            <?php echo e(number_format($file->size,2)); ?> bytes
                                        <?php elseif($file->size >= 1000000): ?>
                                            <?php echo e(number_format($file->size/1000000,2)); ?> mb
                                        <?php else: ?>
                                            <?php echo e(number_format($file->size/1000,2)); ?> kb
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(date('M d, Y h:i A', strtotime($file->created_at))); ?></td>
                                    <td><a href="<?php echo e($file->location); ?>"><?php echo e($file->location); ?></a></td>
 
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No Table Data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm\resources\views/upload.blade.php ENDPATH**/ ?>