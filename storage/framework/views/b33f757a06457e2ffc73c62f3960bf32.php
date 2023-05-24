 
<?php $__env->startSection('content'); ?> 
<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
<?php $__env->stopSection(); ?>
 
 <!-- start page title -->
 <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
 <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><?php echo e($page_modual); ?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e($page_modual); ?> List</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center text-capitalize"><?php echo e($page_modual); ?> Lists
                        <a href="<?php echo e(route('index_'.$page_modual)); ?>" class="btn btn-primary"> <i class="bx bx-plus"></i> Create</a>
                    </h3>
                    <table id="datatable" class="table   dataTable no-footer nowrap w-100">
                         
                        <tbody> 
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th width=" ">#</th>
                                        <th width=" ">Name</th>
                                        <th width=" ">Address</th>
                                        <th width=" "><center>Branches</center></th>                                
                                        <th width=" ">Actives</th>
                                        <th width=" " ><center>Actions</center></th>
                                        
                                    </tr>
                                    <?php
                                    
                                    
                                    $branch = DB::table('branches')
                                                ->where('cust_id', '=', $d->id )
                                                ->where('status', '=', 'Active' )
                                                ->where('parent', '=', $page_modual )
                                                ->get();

                                    $totalCount = count($branch);
                                    
                                    $alphabet = chr($loop->index + 65); // Convert index to ASCII value and add 65 (ASCII for 'A')
                                            

                                    ?>
                                    <tr  class="table-active">
                                        <td><?php echo e($loop->index + 1); ?></td>
                                        <td><?php echo e($d->name); ?></td>
                                        <td><?php echo e($d->add); ?> <br><br>
                                            <b>PIC: </b><?php echo e($d->pic); ?> <br>
                                            <b>Email: </b>suhada.tapisdaya@gamil.com <br>
                                            <b>Phone No: </b><?php echo e($d->ph_no); ?><br>
                                            <b>Fax No: </b><?php echo e($d->fax_no); ?> <br>
                                        </td>
                                        <td align="center"><a href="<?php echo e(route('add-branches', ['id' => $d->id, 'page_modual' => $page_modual])); ?>"> <span style="height:60px;" class="btn btn-primary"> <i class='bx bx-plus' ></i> Branches
                                            <br><p style="background-color: white;color:black;border-radius: 5px;
                                            width: 20px; height: 20px; margin-left:30px; "><?php echo e($totalCount); ?></p>  
                                        </span></a>

                                        </td> 
                                        <td><span class="badge bg-success fs-6"><?php echo e($d->status); ?></span></td> 
                                        <td align="center">
                                            <a href="<?php echo e(route('view_'.$page_modual, ['id' => $d->id, 'page_modual' => $page_modual])); ?>" ><i class="bx bx-search" title="Search"></i></a>
                                            <a href="<?php echo e(route('Edit_view_'.$page_modual, ['id' => $d->id, 'page_modual' => $page_modual])); ?>"><i class="bx bx-edit-alt" title="Edit"></i></a>
                                            <a href="<?php echo e(route('delete_'.$page_modual, ['id' => $d->id, 'page_modual' => $page_modual])); ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="bx bx-trash" title="Delete"></i></a>
                                        </td>
                                    
                                    </tr> 
                                    <tr class="table-info" >
                                        <td>  </td>
                                        <td colspan="5"> 
                                            <center>
                                                <b>BRANCH</b>
                                            </center>
                                        </td>
                                        
                                    </tr>
                                        <?php $__empty_1 = true; $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                            <?php
                                            $alphabet = chr($loop->index + 65); // Convert index to ASCII value and add 65 (ASCII for 'A')
                                            ?>
                                                    
                                            <?php if($loop->index > 0): ?>
                                                    
                                            <?php else: ?>
                                            <tr   >
                                                <td width=" "></td>
                                                <td width=" ">Bil</td>
                                                <td width=" ">Name</td>
                                                <td width=" ">Address</td>
                                                <td width=" ">status</td>                                
                                                <td width=" " ><center>Actions</center></td>
                                                    
                                            </tr>
                                            <?php endif; ?>
                                                                

                                                            

                                            <div class="item">
                                                        <tr   id="myDiv">
                                                            
                                                            <td> </td>
                                                            <td class="item-name"><?php echo e($alphabet ."."); ?></td>
                                                            <td class="item-name"> <?php echo e($b ->name); ?></td>
                                                            <td  class="item-name"> <?php echo e($b ->add); ?> </td>
                                                            <?php if($b ->active < 2): ?> 
                                                                <td><span class="badge bg-success fs-6"> Active</span></td> </td> 
                                                            <?php else: ?> 
                                                                <td><span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                                             
                                                            <?php endif; ?>
                                                            
                                                            
                                                            <td align="center">
                                                                <a href=  "<?php echo e(route('view-branches', ['id' => $b->id, 'page_modual' => $page_modual])); ?>"><i class="bx bx-search" title="Search"></i></a>
                                                                <a href=  "<?php echo e(route('Edit-branches', ['id' => $b->id, 'page_modual' => $page_modual])); ?>"><i class="bx bx-edit-alt" title="Edit"></i></a>
                                                                <a href=  "<?php echo e(route('delete-branches', ['id' => $b->id, 'page_modual' => $page_modual])); ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="bx bx-trash" title="Delete"></i></a>
                                                            </td>
                                                            </tr>
                                            </div>          
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr      >
                                                    <td>  </td>
                                                    <td colspan="5"> 
                                                        <center>
                                                          No Branch Record 
                                                        </center>
                                                    </td>
                                                    
                                                </tr>
                                            

                                        <?php endif; ?> 
                              

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
</div>
 
 
<!-- End Page-content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/build/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/crm_boilermaster/resources/views/list-customer.blade.php ENDPATH**/ ?>