
<?php $__env->startSection('title', 'View Users'); ?> 

<?php $__env->startSection('content'); ?>
<style>
    th.widthtable {
        width:280px
        }
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">View Users</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">View Users</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">View Users
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                </h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="widthtable">Name</th>
                            <td><?php echo e($user->name); ?></td>
                        </tr>  
                        <tr>
                            <th class="widthtable">Email</th>
                            <td><?php echo e($user->email); ?></td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Alternative Email</th>
                            <td><?php echo e($user->alternative_email); ?></td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Position</th>
                            <td><?php echo e($user->position); ?></td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Company</th>
                            <td><?php echo e($user->company); ?></td>
                        </tr>
                        <tr>
                            <th class="widthtable">Active</th>
                            <td> <?php if($user->status == 'Yes'): ?>
                                <span class="badge bg-success fs-6"><?php echo e($user->status); ?></span>
                                <?php else: ?>
                                <span class="badge bg-danger fs-6"><?php echo e($user->status); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                       
                       
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/users/show.blade.php ENDPATH**/ ?>