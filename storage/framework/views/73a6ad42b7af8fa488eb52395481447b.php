
<?php $__env->startSection('title', 'Create New Customer'); ?>  
<?php $__env->startSection('title', 'Create Customer'); ?> 
<?php $__env->startSection('content'); ?>
 
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"> <?php echo e($page_modual); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item"><?php echo e($page_modual); ?> List</li>
                                <li class="breadcrumb-item active">New <?php echo e($page_modual); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <?php if(session('status')): ?>
                <h6 class="alert bg-danger text-white"><i class='bx bxs-error' ></i>  <?php echo e(session('status')); ?> </h6>
            <?php endif; ?>
              <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-4 d-flex justify-content-between align-items-center text-capitalize">Create New <?php echo e($page_modual); ?>

                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Back</a>
                            </h3>
                            <form action="<?php echo e(route('customers.store')); ?>" method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                                <div class="row">                                            
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Phone Number <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="ph_no" name="ph_no" placeholder="Enter your mobile phone number" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Address <span style="color:red">*</span></label>
                                            <textarea id="add" name="add"cols="30" rows="1" class="form-control" placeholder="Enter your address" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Company Registration Number <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="reg_no" name="reg_no"placeholder="Enter your registration number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Website URL </label>
                                            <input type="text" class="form-control" id="web_url" name="web_url" placeholder="Enter your website url" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Fax Number  </label>
                                            <input type="number" class="form-control" id="fax_no" name="fax_no" placeholder="Enter your fax number">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Liaise <span style="color:red">*</span></label>
                                            <select id="pic" name="pic" class="form-control">
                                            <option value="">-Please Select PIC-</option>
                                            <?php $__currentLoopData = $picUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($p->name); ?>" <?php echo e($p->name == $p->pic? 'selected':''); ?>><?php echo e($p->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Email<span style="color:red">*</span></label>
                                            <input type="text" id="email" name="email" cols="30" rows="1" class="form-control" placeholder="Enter email" required>
                                        </div>
                                    </div>
                                     
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Customer Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Customer Account Number  </label>
                                            <input type="number" id="bank_acc_no" name="bank_acc_no" cols="30" rows="1" class="form-control" placeholder="Enter Acc no"  >
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Swift Code</label>
                                            <input type="text" class="form-control" id="swift_code" name="swift_code" placeholder="Enter your swift code">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <hr style="  border: none;  height: 1px; background-color: black;">
                                <label for=""><b> Person in charge</b></label>
                                <div id="textFieldsContainer">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="data1[]" id="name" placeholder="Enter person in charge's name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Phone <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="add" name="data2[]" placeholder="Enter person in charge's mobile phone number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Fax No  </label>
                                            <input type="tel" class="form-control" id="pic_hp" name="data3[]" placeholder="Enter person fax no "  >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Email <span style="color:red">*</span></label>
                                            <input type="email" class="form-control" id="pic_email" name="data4[]" placeholder="Enter person in charge's email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Designation </label>
                                            <input type="tel" class="form-control" id="pic_desg"  name="data5[]" placeholder="Enter person in charge's designation"  >                
                                            </div> 
                                        </div>

                                        <div class="col-sm-1">
                                        <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                        </div>

                                    </div>
                                </div>
                                <hr style="  border: none;  height: 1px; background-color: black;">


                                 <div class="row">
                                    <hr>
                                    <label for=""><b>Customer References</b></label>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Document <span style="color:red">*</span></label>
                                            <input type="file" class="form-control" id="doc" name="doc" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="float-end">
                                    <button type="submit" class="btn btn-success w-md">Add</button>
                                    <button type="reset" class="btn btn-danger w-md">Delete</button>
                                </div>
                            </form>
                        </div>
                         
                    </div>
                </div>  
            </div> 
<!---    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div   style="backgrounf-color:green;">

<table id="tbl" class="tbl">
<tr>
<td>
<input type="text" class="form-control" id=`i` name="inputs['0'][name]" id="name" placeholder="Enter person in charge's name" required> 
</td>
<td>
<button type="button" name="add" id="add" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
</td>
</tr>
</table> 


</div>
<button type="submit" class="btn btn-success w-md">Add</button>
<button type="reset" class="btn btn-danger w-md">Delete</button>
</form>
</div> 



<script>
        var i = 0; 

        $('#add').click(function(){
            ++i;
            $('#tbl').append(
                 `<tr>
                    <td><input type="text" id=`i` class="form-control" name="inputs[`+i+`][name]" id="name" placeholder="Enter person in charge" required > 
            </td>
                    <td>
                <button type="button" name="delete" id="delete" class="btn btn-danger w-md remove-tbl"  style="margin-top: 27px;">delete</button>
                    </td>
                    </tr>
               `);
        
        });


         $(document).on('click','.remove-tbl', function(){
            $(this).parents('tr').remove();
        });


</script> --->


    

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
    $(document).ready(function() {
        // Add new text field
        $('#addTextField').click(function() {
            var newTextField = $(`  <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="data1[]" id="name" placeholder="Enter person in charge's name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Phone <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="add" name="data2[]" placeholder="Enter person in charge's mobile phone number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Fax No  </label>
                                            <input type="tel" class="form-control" id="pic_hp" name="data3[]" placeholder="Enter person fax no "  >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Email <span style="color:red">*</span></label>
                                            <input type="email" class="form-control" id="pic_email" name="data4[]" placeholder="Enter person in charge's email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Designation </label>
                                            <input type="tel" class="form-control" id="pic_desg"  name="data5[]" placeholder="Enter person in charge's designation"  >
                                            
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/customers/create.blade.php ENDPATH**/ ?>