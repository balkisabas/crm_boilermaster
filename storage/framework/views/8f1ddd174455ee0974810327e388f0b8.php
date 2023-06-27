 
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
                            <table class="table table-striped">
                                <thead> 
                                    <tr>
                                        <th class="widthtable">Branch Name </th>
                                        <?php if(isset($branch['name'])): ?>  
                                            <td> : <?php echo e($branch['name']); ?></td>
                                        <?php else: ?> 
                                            <td> :  -</td>
                                        <?php endif; ?>
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Phone Number</th>     
                                        <?php if(isset($branch['phn_no'])): ?>  
                                            <td> : <?php echo e($branch['phn_no']); ?></td>
                                        <?php else: ?> 
                                            <td> :  -</td>
                                        <?php endif; ?>
                                    </tr> 
                                    <tr>
                                        <th class="widthtable"> Address</th> 
                                        <?php if(isset($branch['add'])): ?>  
                                            <td> : <?php echo e($branch['add']); ?></td>
                                        <?php else: ?> 
                                            <td> :  -</td>
                                        <?php endif; ?>
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Email</th> 
                                        <?php if(isset($branch['email'])): ?>  
                                            <td> : <?php echo e($branch['email']); ?></td>
                                        <?php else: ?> 
                                            <td> :  -</td>
                                        <?php endif; ?>
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Fax No</th> 
                                        <?php if(isset($branch['fax_no'])): ?>  
                                            <td> : <?php echo e($branch['fax_no']); ?></td>
                                        <?php else: ?> 
                                            <td> :  -</td>
                                        
                                        <?php endif; ?>
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Person In Charge</th> 
                                        <?php if(isset($branch['pic'])): ?>  
                                            <td> : <?php echo e($branch['pic']); ?></td>
                                        <?php else: ?> 
                                            <td> :  -</td>
                                        <?php endif; ?>
                                    </tr> 
                                    
                                    <th class="widthtable">Status</th> 
                                    <?php if(isset($branch['status'])): ?>    
                                            <?php if($branch['status'] == "Active"): ?> 
                                                <td>:  <span class="badge bg-success fs-6"> Active</span></td> </td> 
                                            <?php else: ?> 
                                                <td>:  <span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                            <?php endif; ?> 
                                    <?php else: ?> 
                                        <td> :  -</td>
                                    <?php endif; ?>
                                </tr> 
                                     
                                     
                                     
                                    
                                </thead>
                            </table>
                                     
                        </div>
                         
                    </div>
                </div>  
            </div>  
   

        

<?php $__env->stopSection(); ?> 
 
                          
                  
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/branches/show.blade.php ENDPATH**/ ?>