 
<?php $__env->startSection('content'); ?>
 
<!---<form action=" " method="POST">
    <?php echo csrf_field(); ?>
    <label for="fname">First name:</label><br>
    <input type="text" id="name" name="name" ><br>

    <label for="lname">phpone nno:</label><br>
    <input type="text" id="ph_no" name="ph_no"><br><br>

    <label for="lname">address:</label><br>
    <input type="text" id="add" name="add"><br><br>

    <label for="lname">regn:</label><br>
    <input type="text" id="reg_no" name="reg_no"><br><br>id="web_url" name="web_url"

    <label for="lname">web:</label><br>
    <input type="text" id="web_url" name="web_url"><br><br>

    <label for="lname">fax :</label><br>
    <input type="text" id="fax_no" name="fax_no"><br><br>

    <label for="lname">doc</label><br>
    <input type="text" id="doc" name="doc"><br><br>

     
  </form> ---> 
  <?php if($errors->any()): ?>
      <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
  <?php endif; ?>
      
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create New <?php echo e($page_modual); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item"><?php echo e($page_modual); ?> List</li>
                                <li class="breadcrumb-item active">Create New <?php echo e($page_modual); ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
          
              <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-4 d-flex justify-content-between align-items-center text-capitalize">Create New <?php echo e($page_modual); ?>

                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Back</a>
                            </h3>
                            <form action="" method="POST" enctype="multipart/form-data">
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
                                            <label for="to" class="form-label">Registration Number <span style="color:red">*</span></label>
                                            <input type="number" class="form-control" id="reg_no" name="reg_no"placeholder="Enter your registration number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Website URL <span style="color:red">*</span></label>
                                            <textarea id="web_url" name="web_url" cols="30" rows="1" class="form-control" placeholder="Enter your website URL" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Fax Number <span style="color:red">*</span></label>
                                            <input type="number" class="form-control" id="fax_no" name="fax_no" placeholder="Enter your fax number" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                            <input type="text" id="pic" name="pic" cols="30" rows="1" class="form-control" placeholder="Enter The person in Charge" required>
                                        </div>
                                    </div>
                                    
                                </div> 
                                


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
                                            <label for="title" class="form-label">Fax No <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="pic_hp" name="data3[]" placeholder="Enter person in charge's HP" required>
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
                                            <label for="title" class="form-label">Designation <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="pic_desg"  name="data5[]" placeholder="Enter person in charge's designation" required>                
                                            </div> 
                                        </div>

                                        <div class="col-sm-1">
                                        <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                        </div>

                                    </div>
                                </div>



                                 <div class="row">
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
                                            <label for="title" class="form-label">HP <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="pic_hp" name="data3[]" placeholder="Enter person in charge's HP" required>
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
                                            <label for="title" class="form-label">Designation <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="pic_desg"  name="data5[]" placeholder="Enter person in charge's designation" required>
                                            
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/crm_boilermaster/resources/views/new-customer.blade.php ENDPATH**/ ?>