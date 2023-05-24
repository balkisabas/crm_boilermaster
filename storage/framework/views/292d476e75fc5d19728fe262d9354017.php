 
<?php $__env->startSection('content'); ?>
 
 
      
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">ADD Branch</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item">Branch list</li>
                                <li class="breadcrumb-item">Add Branch</li>
                                
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
           <!--  end page title -->

              <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Branch Details
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Back</a>
                            </h3>
                            <form action="/add-branches" method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                                <div class="row">                                            
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="cust_id" name="cust_id" placeholder="Enter your name" value="<?php echo e($data['id']); ?>"  >

                                            <input type="hidden" class="form-control" id="parent" name="parent" placeholder="Enter your name" value="<?php echo e($page_modual); ?>"  >
                                        
                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Phone Number <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="phn_no" name="phn_no"  placeholder="Enter your mobile phone number" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Address <span style="color:red">*</span></label>
                                            <textarea id="add" name="add"cols="30" rows="3" class="form-control"  placeholder="Enter your address" required>  </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Email <span style="color:red">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"   placeholder="Enter your registration number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Fax NO <span style="color:red">*</span></label>
                                            <input type="number" class="form-control" id="fax_no" name="fax_no"   placeholder="Enter your fax number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                            <input type="text" id="pic" name="pic" cols="30" rows="1"  class="form-control" placeholder="Enter The person in Charge" required>
                                        </div>
                                    </div>
                                    
                                </div> 
                               
 
                          
                                <div class="float-end">
                                    <button type="submit" class="btn btn-success w-md">ADD</button>
                                    <button type="reset" class="btn btn-danger w-md">Delete</button>

                                </div>
                            </form>
                        </div>
                         
                    </div>
                </div>  
            </div>  
   

        

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/crm_boilermaster/resources/views/add-branches.blade.php ENDPATH**/ ?>