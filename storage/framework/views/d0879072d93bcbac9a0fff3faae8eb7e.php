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
                <h4 class="mb-sm-0 font-size-18">Create New RFQ</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item">RFQ</li>
                        <li class="breadcrumb-item active">Create New RFQ</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="<?php echo e(route('daftarRfq')); ?>" method="POST" class="form-horizontal"   enctype="multipart/form-data">
    <?php echo csrf_field(); ?>               
    <?php if(session('status')): ?>
        <h6 class="alert alert-success"><?php echo e(session('status')); ?></h6>
    <?php endif; ?>
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
                                    <select id="branch" name="branch" class="form-control">
                                    <option value="">-Please Select Branch-</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k->description); ?>" <?php echo e($k->id == $k->branch? 'selected':''); ?>><?php echo e($k->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="pic" name="pic" placeholder="Enter the person in charge's name">
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
                                        <option value="<?php echo e($m->description); ?>" <?php echo e($m->id == $m->rfq_status? 'selected':''); ?>><?php echo e($m->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>                                          
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_name" class="form-label">Customer <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Enter the customer's name">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_pic" class="form-label">Customer PIC<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="cust_pic" name="cust_pic" placeholder="Enter customer PIC">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_email" class="form-label">Customer Email <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="cust_email" name="cust_email" placeholder="Enter the customer's email">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_no" class="form-label">RFQ Number <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="rfq_no" name="rfq_no" placeholder="Enter RFQ number">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_title" class="form-label">RFQ Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="rfq_title" name="rfq_title" placeholder="Enter RFQ tilte">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="due_date" name="due_date">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="final_pricing" class="form-label">Final Pricing <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="final_pricing" name="final_pricing" placeholder="Enter final pricing">
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
                                        <option value="<?php echo e($n->description); ?>" <?php echo e($n->id == $n->rfq_status? 'selected':''); ?>><?php echo e($n->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_po_no" class="form-label">Customer PO Number <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="cust_po_no" name="cust_po_no" placeholder="Enter customer PO number">
                                </div>
                            </div>   
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_award" class="form-label">Date Award <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="date_award" name="date_award">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="award_amount" class="form-label">Award Amount <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="award_amount" name="award_amount" placeholder="Enter award amount">
                                </div>  
                            </div> 
                        </div>
                        <!-- <div id="repeater">
                            <div class="repeater-item">
                                <div class="row"> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_name">Document Name</label>
                                            <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter document name">
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_type" class="form-label">Documents Type<span style="color:red">*</span></label>
                                            <select name="document_type" id="document_type" class="form-control">
                                                <option value="">-Please Select Document Type-</option>
                                                <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($k->description); ?>" <?php echo e($k->id == $k->docs? 'selected':''); ?>><?php echo e($k->description); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>  
                                    </div>  -->
                                    <!-- <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="files" class="form-label">File <span style="color:red">*</span></label>
                                            <input type="file" name="file[]" class="form-control">
                                        </div> 
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <button type="button" class="remove btn btn-danger" style="margin-top:28px">Remove</button>
                                        </div>  
                                    </div> 
                                </div>
                            </div>
                        </div> 
                        <button type="button" id="add" class="btn btn-success">Add More</button>
                        <br> -->
                        <div class="float-end">
                            <button type="submit" class="btn btn-success w-md">Add</button>
                            <button type="reset" class="btn btn-danger w-md">Delete</button>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add new items to the repeater
        $('#add').click(function() {
            var newItem = $('#repeater .repeater-item').first().clone();
            newItem.find('input').val('');
            newItem.find('.remove').show();
            $('#repeater').append(newItem);
        });

        // Remove items from the repeater
        $('#repeater').on('click', '.remove', function() {
            $(this).closest('.repeater-item').remove();
        });
    });
</script> -->




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm_boilermaster\resources\views/proposal-form.blade.php ENDPATH**/ ?>