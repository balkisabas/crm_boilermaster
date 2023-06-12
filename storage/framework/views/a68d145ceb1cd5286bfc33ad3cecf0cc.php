

<?php $__env->startSection('title', 'Proposal Registration'); ?> 

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
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create New Proposal</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item">Proposal</li>
                        <li class="breadcrumb-item active">Create New Proposal</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="<?php echo e(route('proposals.store')); ?>" method="POST" class="form-horizontal"   enctype="multipart/form-data">
    <?php echo csrf_field(); ?>               
    <?php if(session('status')): ?>
        <h6 class="alert alert-success"><?php echo e(session('status')); ?></h6>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create New Proposal
                        <a class="btn btn-primary" href="<?php echo e(route('proposals.index')); ?>"><i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company<span style="color:red">*</span></label>
                                    <select id="company" name="company" class="form-control">
                                    <option value="">-Please Select Company-</option>
                                    <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k->company_name); ?>" <?php echo e($k->id == $k->company_name? 'selected':''); ?>><?php echo e($k->company_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                    <select id="pic" name="pic" class="form-control">
                                    <option value="">-Please Select PIC-</option>
                                    <?php $__currentLoopData = $picUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($p->name); ?>" <?php echo e($p->name == $p->pic? 'selected':''); ?>><?php echo e($p->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type<span style="color:red">*</span></label>
                                    <select id="type" name="type" class="form-control">
                                    <option value="">-Please Select Type-</option>
                                    <?php $__currentLoopData = $rfq_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($m->name); ?>" <?php echo e($m->id == $m->name? 'selected':''); ?>><?php echo e($m->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>                                          
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_name" class="form-label">Customer <span style="color:red">*</span></label>
                                    <select id="cust_name" name="cust_name" class="form-control">
                                    <option value="">-Please Select Customer-</option>
                                    <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->name); ?>" <?php echo e($customer->id == $customer->name? 'selected':''); ?>><?php echo e($customer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_pic" class="form-label">Customer PIC</label>
                                    <select id="cust_pic" name="cust_pic" class="form-control">
                                    <option value="">-Please Select PIC-</option>
                                    <?php $__currentLoopData = $pic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pic->name); ?>" <?php echo e($pic->name == $pic->cust_pic? 'selected':''); ?>><?php echo e($pic->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_email" class="form-label">Customer Email </label>
                                    <input type="email" class="form-control" id="cust_email" name="cust_email" placeholder="Enter the customer's email">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_no" class="form-label">RFQ Number</label>
                                    <input type="number" class="form-control" id="rfq_no" name="rfq_no" placeholder="Enter RFQ number">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_title" class="form-label">RFQ Title</label>
                                    <input type="text" class="form-control" id="rfq_title" name="rfq_title" placeholder="Enter RFQ tilte">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="due_date" name="due_date">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="final_pricing" class="form-label">Final Pricing (RM) </label>
                                    <input type="number" class="form-control" id="final_pricing" name="final_pricing" placeholder="Enter price (e.g., 0.00)">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_status" class="form-label">Status</label>
                                    <select id="rfq_status" name="rfq_status" class="form-control">
                                    <option value="">-Please Select Status-</option>
                                    <?php $__currentLoopData = $rfq_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($n->name); ?>" <?php echo e($n->id == $n->name? 'selected':''); ?>><?php echo e($n->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr style="  border: none;  height: 1px; background-color: black;">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cust_po_no" class="form-label">Customer PO Number</label>
                                    <input type="number" class="form-control" id="cust_po_no" name="cust_po_no" placeholder="Enter customer PO number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="date_award" class="form-label">Date Award</label>
                                    <input type="date" class="form-control" id="date_award" name="date_award">
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="award_amount" class="form-label">Award Amount</label>
                                    <input type="number" class="form-control" id="award_amount" name="award_amount" placeholder="Enter award amount">
                                </div>  
                            </div> 
                        </div>
                        <hr style="  border: none;  height: 1px; background-color: black;">
                        <div id="textFieldsContainer">
                            <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="document_name">Document Name</label>
                                        <input type="text" class="form-control" id="document_name"  name="data1[]" placeholder="Enter document name">
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="mb-3">
                                    <label for="document_type" class="form-label">Documents Type</label>
                                        <select id="document_type" name="data2[]" class="form-control">
                                            <option value="">-Please Select Document Type-</option>
                                            <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k->name); ?>" <?php echo e($k->id == $k->name? 'selected':''); ?>><?php echo e($k->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>  
                                </div> 
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="files" class="form-label">File <span style="color:red">*</span></label>
                                        <input type="file" id="files" name="files[]" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                </div>
                            </div>
                        </div>
                        <br><br>  
                        <div class="float-end">
                            <button type="submit" class="btn btn-success w-md">Save</button>
                            <button type="reset" class="btn btn-secondary w-md">Reset</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $(document).ready(function() {
        // Add new text field
        $('#addTextField').click(function() {
            var newTextField = $(`  <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                            <label for="document_name">Document Name</label>
                                                <input type="text" class="form-control" id="document_name"  name="data1[]" placeholder="Enter document name">
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                            <label for="document_type" class="form-label">Documents Type<span style="color:red">*</span></label>
                                                <select id="document_type" name="data2[]" class="form-control">
                                                    <option value="">-Please Select Document Type-</option>
                                                    <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($k->name); ?>" <?php echo e($k->id == $k->name? 'selected':''); ?>><?php echo e($k->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>  
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="files" class="form-label">File <span style="color:red">*</span></label>
                                                <input type="file" id="files" name="files[]" class="form-control">
                                            </div> 
                                        </div> 
                                        <div class="col-sm-1">
                                            <button type="button" name="tmb" id="addTextField" class="btn btn-warning w-md  col-sm-1 removeTextField" style="margin-top: 27px;">Remove</button>
                                         </div>
                                    </div> `);
            $('#textFieldsContainer').append(newTextField);
        });

        // Remove text field
        $(document).on('click', '.removeTextField', function() {
            var button = event.target; // Get the button element
            var parentDiv = button.parentNode; // Get the parent div
            var grandParentDiv = parentDiv.parentNode; // Get the grandparent div

            grandParentDiv.remove();


        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/proposals/create.blade.php ENDPATH**/ ?>