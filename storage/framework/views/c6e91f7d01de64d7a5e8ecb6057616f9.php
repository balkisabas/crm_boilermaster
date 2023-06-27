
<?php $__env->startSection('title', 'Proposal Listing'); ?> 
<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Proposal Lists  </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index">Home</a></li>
                    <li class="breadcrumb-item active">Proposal List</li>
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
                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Proposal Listing
                    <a href="<?php echo e(route('proposals.create')); ?>" class="btn btn-primary"> <i class="bx bx-plus"></i> Create</a>
                </h3>
                <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Customer</th>
                            <th>PIC</th>
                            <th>Final Pricing (RM)</th>
                            <th>RFQ No.</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            ?>
                            <?php if(count($rfq) === 0): ?>
                            <td colspan="10" align="center">No records found.</td>  
                            <?php else: ?>
                            <?php $__currentLoopData = $rfq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($i++); ?></td>
                            
                            <?php  $company = DB::table('Companies')->where('id', '=', $m->company)->first();  ?>
                                        <td><?php echo e($company->company_name); ?></td>
                            <?php  $cust = DB::table('Customers')->where('id', '=', $m->cust_name)->first();  ?>
                                        <td><?php echo e($cust->name); ?></td>
                            <?php  $pic = DB::table('Users')->where('id', '=', $m->pic)->first();  ?>
                                        <td><?php echo e($pic->name); ?></td>
                                        
                            <td><?php echo e($m->final_pricing); ?></td>
                            <td><?php echo e($m->rfq_no); ?></td>
                            <td><?php echo e($duedate = date("d-m-Y", strtotime($m->due_date))); ?></td>
                            
                            <?php  $status = DB::table('Rfqstatuses')->where('id', '=', $m->rfq_status)->first();  ?>
                                        <td><?php echo e($status->name); ?></td>
                            <td>
                                 <a href="<?php echo e(route('proposals.show',$m->id)); ?>"><i class="bx bx-search-alt" title="View Details Companies" style="color:black"></i></a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-proposal')): ?>
                                <a href="<?php echo e(route('proposals.edit',$m->id)); ?>"><i class="bx bx-edit-alt" title="Edit/Update Users"></i></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-proposal')): ?>
                                <?php echo Form::open(['method' => 'DELETE','route' => ['proposals.destroy', $m->id],'style'=>'display:inline']); ?>

                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { this.parentNode.submit(); }" >
                                <i class="bx bx-trash"  title="Delete Role" style="color:red" title="Delete"></i>
                                <?php endif; ?>
                                <?php echo Form::close(); ?>

                            </td>
                        </tr>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- Transaction Modal -->
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


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/proposals/index.blade.php ENDPATH**/ ?>