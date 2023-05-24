<?php $__env->startSection('title', 'Proposal Registration'); ?> 

<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
    <h6 class="alert alert-success"><?php echo e(session('status')); ?></h6>
<?php endif; ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Edit Proposal</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item">Proposal Details</li>
                    <li class="breadcrumb-item active">Edit Proposal</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo e(route('updateProposal', $rfqupdate->id)); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create New RFQ
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="branch" class="form-label">Branch<span style="color:red">*</span></label>
                                    <select id="branch" name="branch" class="form-control" required>
                                    <option value="">-Please Select Branch-</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k->description); ?>" <?php echo e($k->description ==  $rfqupdate->branch ? 'selected' : ''); ?>><?php echo e($k->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="pic" name="pic" value="<?php echo e($rfqupdate->pic); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type<span style="color:red">*</span></label>
                                    <select id="type" name="type" class="form-control" required>
                                    <option value="">-Please Select Type-</option>
                                    <?php $__currentLoopData = $rfq_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($m->description); ?>" <?php echo e($m->description ==  $rfqupdate->type ? 'selected':''); ?>><?php echo e($m->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>                                          
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_name" class="form-label">Customer <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="cust_name" name="cust_name" value="<?php echo e($rfqupdate->cust_name); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_pic" class="form-label">Customer PIC<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="cust_pic" name="cust_pic" value="<?php echo e($rfqupdate->cust_pic); ?>">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_email" class="form-label">Customer Email <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="cust_email" name="cust_email" value="<?php echo e($rfqupdate->cust_email); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_no" class="form-label">RFQ Number <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="rfq_no" name="rfq_no" value="<?php echo e($rfqupdate->rfq_no); ?>">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_title" class="form-label">RFQ Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="rfq_title" name="rfq_title" value="<?php echo e($rfqupdate->rfq_title); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="due_date" name="due_date" required>
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="final_pricing" class="form-label">Final Pricing <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="final_pricing" name="final_pricing" value="<?php echo e($rfqupdate->final_pricing); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_status" class="form-label">Status<span style="color:red">*</span></label>
                                    <select id="rfq_status" name="rfq_status" class="form-control">
                                    <option value="">-Please Select Status-</option>
                                    <?php $__currentLoopData = $rfq_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($n->description); ?>" <?php echo e($n->description == $rfqupdate->rfq_status? 'selected':''); ?>><?php echo e($n->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_po_no" class="form-label">Customer PO Number <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="cust_po_no" name="cust_po_no" value="<?php echo e($rfqupdate->cust_po_no); ?>">
                                </div>
                            </div>   
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_award" class="form-label">Date Award <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="date_award" name="date_award" required>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="award_amount" class="form-label">Award Amount <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="award_amount" name="award_amount" value="<?php echo e($rfqupdate->award_amount); ?>">
                                </div>  
                            </div> 
                            
                        </div>
                    
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this record?')">Update</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="<?php echo e(route('proposal-list')); ?>" class="btn btn-danger">Back</a>
                        </div>
                    </form>
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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm\resources\views/edit-proposal.blade.php ENDPATH**/ ?>