
<?php $__env->startSection('title', 'List of Companies'); ?> 

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
            <h4 class="mb-sm-0 font-size-18">List of Companies</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">List of Companies</li>
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

                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">List of Companies
                    <a href="<?php echo e(route('companies.index')); ?>" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                </h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="widthtable">Company Name</th>
                            <td><?php echo e($company->company_name); ?></td>
                        </tr>  
                        <tr>
                            <th class="widthtable">Address</th>
                            <td><?php echo e($company->address); ?></td>
                        </tr>  
                        <tr>
                            <th class="widthtable">Phone No.</th>
                            <td><?php echo e($company->phone); ?></td>
                        </tr>  
                        <tr>
                            <th class="widthtable">Fax No.</th>
                            <td><?php echo e($company->fax); ?></td>
                        </tr>  
                        <tr><th class="widthtable">Status</th>
                        <td>  <?php if($company->status == 'Yes'): ?>
                                <span class="badge bg-success fs-6"><?php echo e($company->status); ?></span>
                            <?php else: ?>
                              <span class="badge bg-danger fs-6"><?php echo e($company->status); ?></span>
                            <?php endif; ?></td></tr>  
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/companies/show.blade.php ENDPATH**/ ?>