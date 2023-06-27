

<?php $__env->startSection('title', 'Edit Proposal'); ?> 

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
            <h4 class="mb-sm-0 font-size-18">Edit Proposal</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index">Home</a></li>
                    <li class="breadcrumb-item">Proposal</li>
                    <li class="breadcrumb-item active">Edit Proposal</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<form action="<?php echo e(route('proposals.update', $proposal->id)); ?>"  method="POST" class="form-horizontal" enctype="multipart/form-data">
<?php echo csrf_field(); ?>        
<?php echo method_field('PUT'); ?>       
<?php if(session('status')): ?>
    <h6 class="alert alert-success"><?php echo e(session('status')); ?></h6>
<?php endif; ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit Proposal
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
                                    <option value="<?php echo e($k->id); ?>" <?php echo e($k->id == $proposal->company? 'selected':''); ?>><?php echo e($k->company_name); ?></option>
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
                                        <option value="<?php echo e($p->id); ?>" <?php echo e($p->id == $proposal->pic? 'selected':''); ?>><?php echo e($p->name); ?></option>
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
                                    <option value="<?php echo e($m->id); ?>" <?php echo e($m->id == $proposal->type? 'selected':''); ?>> <?php echo e($m->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>                                          
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_name" class="form-label">Customer <span style="color:red">*</span></label>
                                <select id="cust_name" name="cust_name" class="form-control">
                                <option value="">-Please Select Customer-</option>
                                <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cust->id); ?>" <?php echo e($cust->id == $proposal->cust_name? 'selected':''); ?>><?php echo e($cust->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_pic" class="form-label">Customer PIC   </label>
                                <select id="cust_pic" name="cust_pic" class="form-control">
                                    <option value="">-Please Select PIC-</option>
                                    <?php $__currentLoopData = $pic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pic->id); ?>" <?php echo e($pic->id == $proposal->cust_pic? 'selected':''); ?>><?php echo e($pic->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_email" class="form-label">Customer Email </label>
                                <input type="email" class="form-control" id="cust_email" name="cust_email" value="<?php echo e($proposal->cust_email); ?>" placeholder="Enter the customer's email">
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rfq_no" class="form-label">RFQ Number</label>
                                <input type="number" class="form-control" id="rfq_no" name="rfq_no" value="<?php echo e($proposal->rfq_no); ?>" placeholder="Enter RFQ number">
                            </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rfq_title" class="form-label">RFQ Title</label>
                                <input type="text" class="form-control" id="rfq_title" name="rfq_title" value="<?php echo e($proposal->rfq_title); ?>" placeholder="Enter RFQ tilte">
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo e($proposal->due_date); ?>">
                            </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="final_pricing" class="form-label">Final Pricing </label>
                                <input type="number" step="0.01" min="0" class="form-control" id="final_pricing" name="final_pricing" value="<?php echo e($proposal->final_pricing); ?>" placeholder="Enter price (e.g., 0.00)">
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
                                    <option value="<?php echo e($n->name); ?>" <?php echo e($n->name == $proposal->rfq_status? 'selected':''); ?>><?php echo e($n->name); ?></option>
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
                                <input type="number" class="form-control" id="cust_po_no" name="cust_po_no" value="<?php echo e($proposal->cust_po_no); ?>" placeholder="Enter customer PO number">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="date_award" class="form-label">Date Award</label>
                                <input type="date" class="form-control" id="date_award" name="date_award" value="<?php echo e($proposal->date_award); ?>">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="award_amount" class="form-label">Award Amount</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="award_amount" name="award_amount" value="<?php echo e($proposal->award_amount); ?>" placeholder="Enter price (e.g., 0.00)">
                            </div>  
                        </div> 
                    </div>
                    <hr style="  border: none;  height: 1px; background-color: black;">
                    <div id="textFieldsContainer">
                        
                       <?php if( $proposalDoc->isEmpty()): ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_name">Document Name hello</label>
                                            <input type="text" class="form-control" id="document_name"  name="data1[]" placeholder="Enter document name">
                                            <input type="hidden" class="form-control" id="doc_id" name="data3[]" value="new">
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
                                            <input type="file" id="files" name="files[]" class="form-control"  >
                                        </div> 
                                    </div> 

                                    <div class="col-sm-1">
                                        <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                    </div>
                                    
                                </div>
                          
                        <?php else: ?>
      
                                <?php $__currentLoopData = $proposalDoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="document_name">Document Name  </label>
                                            <input type="text" class="form-control" id="document_name"  name="data1[]" value="<?php echo e($doc->document_name); ?>">
                                            <input type="hidden" class="form-control" id="doc_id" name="data3[]" value="<?php echo e($doc->id); ?>">
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_type" class="form-label">Documents Type</label>
                                            <select id="document_type" name="data2[]" class="form-control">
                                                <option value="">-Please Select Document Type-</option>
                                                <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($k->id); ?>" <?php echo e($k->id == $doc->document_type? 'selected':''); ?>><?php echo e($k->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>  
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="files" class="form-label">Filename</label>
                                            <input type="text" id="files" name="filename[]" class="form-control" value="<?php echo e($doc->filename); ?>">
                                        </div> 
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label for="" class="form-label">&nbsp;&nbsp;</label>
                                            <input type="file" id="files" name="files[]" class="form-control">
                                        </div> 
                                    </div>
                                    
                                    <div class="col-sm-1">
                                        <a href="<?php echo e(route('delete_doc', ['id' => $doc->id, 'rfqid' => $proposal->id])); ?>" onclick="return confirm('Are you sure you want to delete  ?')" class="btn btn-warning w-md  col-sm-1 removeTextField" style="margin-top: 27px;"> Remove </a> 
                                    </div>
                                    <?php if( $loop->index == 0): ?>
                                    <div class="col-sm-1">
                                        <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                    </div>
                                    <?php endif; ?>
                                    
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>
                    </div>
                    <br><br>  
                    <div class="float-end">
                    <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this record?')">Update</button>
                        <a href="<?php echo e(route('proposals.index')); ?>" class="btn btn-secondary">Cancel</a>
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
                                            <input type="hidden" class="form-control" id="doc_id" name="data3[]" value="new">
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_type" class="form-label">Documents Type<span style="color:red">*</span></label>
                                            <select id="document_type" name="data2[]" class="form-control">
                                                <option value="">-Please Select Document Type-</option>
                                                <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($k->id); ?>" <?php echo e($k->id == $k->name? 'selected':''); ?>><?php echo e($k->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>  
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="files" class="form-label">File <span style="color:red">*</span></label>
                                            <input type="file" id="files" name="files[]" class="form-control"  >
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

    $('#cust_name').change(function(){
            var id = $(this).val();
            //alert(id); 
            var cust_pic = document.getElementById('cust_pic'); 
            $('#cust_pic').find('option').not(':first').remove();
           
            $.ajax({ 
                url: "<?php echo e(url('fetchData')); ?>/"+id,
                type: 'GET',
                datatype: 'json',
                
                success: function(response){
                     
                    console.log(response );

                    while (cust_pic.options.length > 0) {
                        cust_pic.options[cust_pic   .options.length - 1].remove();
                    } 

                    if(  response.length == 0 ){
                        cust_pic.disabled = false;
                        var option = "<option value='nopiccust'>No PIC In Customer  </option>"; 
                        $("#cust_pic").append(option);
                    }else{
                        cust_pic.disabled = false;
                        $("#cust_pic option[value='nopic']").remove();
                        response.forEach(function(item) {
                        console.log(item.name);
                        var option = "<option value='"+item.id+"'>"+item.name+"</option>"; 
                        $("#cust_pic").append(option); 
                        });
                    }
                    
                }
                
            });
        });

        $('#company').change(function(){
            var id = $(this).val();
           // alert(id); 
            var pic = document.getElementById('pic'); 
            $('#pic').find('option').not(':first').remove();
           
            $.ajax({ 
                url: "<?php echo e(url('fetchDatapiccompny')); ?>/"+id,
                type: 'GET',
                datatype: 'json',
                
                success: function(response){
                     
                    console.log(response.length);
                    
                    while (pic.options.length > 0) {
                        pic.options[pic.options.length - 1].remove();
                    }

                    if(  response.length == 0 ){
                        pic.disabled = false;
                        var option = "<option value='nopic'>No PIC In Selected Company </option>"; 
                        $("#pic").append(option);
                    }else{
                        pic.disabled = false;
                         
                        response.forEach(function(item) {
                        console.log(item.name);
                        var option = "<option value='"+item.id+"'>"+item.name+"</option>"; 
                        $("#pic").append(option); 
                        });
                    }

                     
                }
                
            });
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/proposals/edit.blade.php ENDPATH**/ ?>