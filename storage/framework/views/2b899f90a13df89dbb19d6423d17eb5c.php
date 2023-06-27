
<?php $__env->startSection('title', 'User List'); ?> 
<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Audits Trail</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item active">Audits Trail</li>
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
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Audits Trail</h3>
                    <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Auditable_type</th>
                                <th>Event</th>
                                <th>User</th>
                                <th>Description</th>
                                <th>Date Create</th>
                                <th>Date Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            <?php if(count($audits) === 0): ?>
                            <td colspan="10" align="center">No records found.</td>  
                            <?php else: ?>
                                <?php $__currentLoopData = $audits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($audit->auditable_type); ?></td>
                                <td><?php echo e($audit->event); ?></td>
                                <td><?php echo e($audit->user->name); ?></td>
                                <td>
                                    <?php switch($audit->auditable_type):
                                        case ('App\Models\User'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for user
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for user
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\Customer'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for customer
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for customer
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\Personincharge'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for PIC
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for PIC
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>
                                        
                                        <?php case ('App\Models\Vendor'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for vendor
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for vendor
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\Proposal'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for proposal
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for proposal
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\ProposalDoc'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for proposal document
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for proposal document
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\Companies'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for company
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for company
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>
                                            
                                        <?php case ('App\Models\Documents'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for document
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for document
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\Positions'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for position
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for position
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\Rfqtypes'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for RFQ type
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for RFQ type
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>

                                        <?php case ('App\Models\Rfqstatuses'): ?>
                                            <?php if($audit->event === 'created'): ?>
                                                New data created for RFQ status
                                            <?php elseif($audit->event === 'updated'): ?>
                                                Updated data for RFQ status
                                            <?php else: ?>
                                                <?php echo e($audit->new_values); ?>

                                            <?php endif; ?>
                                            <?php break; ?>
                                        <?php default: ?>
                                            <?php echo e($audit->new_values); ?>

                                    <?php endswitch; ?>
                                </td>
                                <td><?php echo e($datecreate =  date("d-m-Y H:i", strtotime ($audit->created_at))); ?></td>
                                <td><?php echo e($dateupdate =  date("d-m-Y H:i", strtotime ($audit->updated_at))); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
</div>
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

    <!-- Bootstrap JS untuk pop up modal-->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/audits/index.blade.php ENDPATH**/ ?>