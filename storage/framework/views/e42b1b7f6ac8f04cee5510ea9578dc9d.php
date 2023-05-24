 
<?php $__env->startSection('content'); ?>
 
 
      
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update Branch</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item">Branch list</li>
                                <li class="breadcrumb-item">Branch update</li>
                                
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
                            <form action="/Edit-branches" method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                                <div class="row">                                            
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter your name" value="<?php echo e($branch['id']); ?>"  >
                                            <input type="hidden" class="form-control" id="parent" name="parent" placeholder="Enter your name" value="<?php echo e($page_modual); ?>"  >

                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <h5><?php echo e($branch['name']); ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Phone Number <span style="color:red">*</span></label>
                                            <h5><?php echo e($branch['phn_no']); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Address <span style="color:red">*</span></label>
                                            <h5><?php echo e($branch['add']); ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Email <span style="color:red">*</span></label>
                                            <h5><?php echo e($branch['email']); ?></h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                            <h5><?php echo e($branch['pic']); ?></h5>
                                        </div>
                                    </div>
                                    
                                </div> 
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Status <span style="color:red">*</span></label>
                                            <h5><?php echo e($branch['active']); ?></h5>
                                        </div>
                                    </div>
                                    
                                </div> 
 
                          
                                <div class="float-end">
                                    <a href="<?php echo e(route('Edit-branches', ['id' => $branch->id, 'page_modual' => $page_modual])); ?>" class="btn btn-success w-md">Edit</a>
                                     

                                </div>
                            </form>
                        </div>
                         
                    </div>
                </div>  
            </div>  
   

        

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/crm_boilermaster/resources/views/view-branches.blade.php ENDPATH**/ ?>