 
<?php $__env->startSection('title','View Vendor'); ?>
<?php $__env->startSection('content'); ?>
 
 
      
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?php echo e($page_modual); ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item"><?php echo e($page_modual); ?> list</li> 
                                <li class="breadcrumb-item active"><?php echo e($page_modual); ?> Infomation</li>
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
                            <h3 class="card-title mb-4 d-flex justify-content-between align-items-center text-capitalize"><?php echo e($page_modual); ?> Details
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Back</a>
                            </h3>
                                <table class="table table-striped">
                                    <thead> 
                                        <tr>
                                            <th class="widthtable">Customer Name </th>
                                            <?php if(isset($vendor['name'])): ?>  
                                                <td> : <?php echo e($vendor['name']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Phone Number</th>     
                                            <?php if(isset($vendor['ph_no'])): ?>  
                                                <td> : <?php echo e($vendor['ph_no']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable"> Address</th> 
                                            <?php if(isset($vendor['add'])): ?>  
                                                <td> : <?php echo e($vendor['add']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Registration Number</th> 
                                            <?php if(isset($vendor['reg_no'])): ?>  
                                                <td> : <?php echo e($vendor['reg_no']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Liaise</th> 
                                            <?php if(isset($vendor['pic'])): ?>  
                                                <td> : <?php echo e($vendor['pic']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Web URL </th> 
                                            <?php if(isset($vendor['web_url'])): ?>  
                                                <td> : <?php echo e($vendor['web_url']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Fax No</th> 
                                            <?php if(isset($vendor['fax_no'])): ?>  
                                                <td> : <?php echo e($vendor['fax_no']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Email</th> 
                                            <?php if(isset($vendor['email'])): ?>  
                                                <td> : <?php echo e($vendor['email']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Bank Name</th> 
                                            <?php if(isset($vendor['bank_name'])): ?>  
                                                <td> : <?php echo e($vendor['bank_name']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Bank Account Number</th> 
                                            <?php if(isset($vendor['bank_acc_no'])): ?>  
                                                <td> : <?php echo e($vendor['bank_acc_no']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Swift Code</th> 
                                            <?php if(isset($vendor['swift_code'])): ?>  
                                                <td> : <?php echo e($vendor['swift_code']); ?></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Attached Document</th> 
                                            <?php if(isset($vendor['doc'])): ?>    
                                                <td> : <?php echo e($vendor['doc']); ?> &nbsp;&nbsp;<a href="<?php echo e(asset('doc_upload/' . $vendor['doc'])); ?>" class="btn btn-info btn-sm"> Download File </a></td>
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 
                                        
                                         
                                        <tr>
                                        <th class="widthtable">Status</th> 
                                            <?php if(isset($vendor['status'])): ?>    
                                                    <?php if($vendor['status'] == "Active"): ?> 
                                                        <td>:  <span class="badge bg-success fs-6"> Active</span></td> </td> 
                                                    <?php else: ?> 
                                                        <td>:  <span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                                    <?php endif; ?> 
                                            <?php else: ?> 
                                                <td> :  -</td>
                                            <?php endif; ?>
                                        </tr> 


                                        <tr ><td ><strong>Person In Chanrge Details :</strong></td></tr>
                                        <?php $__currentLoopData = $personic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><li><strong> PIC Name:</strong><?php if(isset($p->name)): ?><?php echo e($p->name); ?><?php else: ?> - <?php endif; ?></li>
                                            <li><strong> PIC Phone number:</strong><?php if(isset($p->phn_no)): ?>  <?php echo e($p->phn_no); ?><?php else: ?> - <?php endif; ?></li>
                                            <li><strong> PIC Fax No:</strong><?php if(isset($p->fax_no)): ?>  <?php echo e($p->fax_no); ?><?php else: ?> - <?php endif; ?></li>
                                            <li><strong> PIC Email:</strong><?php if(isset($p->email)): ?>  <?php echo e($p->email); ?><?php else: ?> - <?php endif; ?></li>
                                            <li><strong> PIC Designation:</strong><?php if(isset($p->Designation)): ?>  <?php echo e($p->Designation); ?><?php else: ?> - <?php endif; ?></li>
                                        
                                        </td> 
                                        </tr> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        
                                    </thead>
                                </table>
                          
                        </div>
                         
                    </div>
                </div>  
            </div>  
   
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/vendors/show.blade.php ENDPATH**/ ?>