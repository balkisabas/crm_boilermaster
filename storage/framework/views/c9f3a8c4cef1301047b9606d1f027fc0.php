 
<?php $__env->startSection('title', 'Vendor Listing'); ?> 
<?php $__env->startSection('content'); ?> 
<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
<?php $__env->stopSection(); ?>
<head>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

</head>
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
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center text-capitalize"><?php echo e($page_modual); ?> List 
                        <a href="<?php echo e(route('vendors.create')); ?>"class="btn btn-primary"> <i class="bx bx-plus"></i> Create </a>
                    </h3> 
                    <table id="myTable" class="table">
                        <thead>
                            <tr>
                                <th width=" ">#</th>
                                <th width=" ">Name</th>
                                <th width=" ">Address</th>
                                <th width=" "><center>Branches</center></th>                                
                                <th width=" ">Status</th>
                                <th width=" " ><center>Actions</center></th>
                                 
                            </tr>
                        </thead>
                        <tbody> 
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                    
                                    $index =  $loop->index + 1;
                                    $branch = DB::table('branches')
                                                ->where('parent_id', '=', $d->id )
                                                ->where('Active_status', '=', 'Active' )
                                                ->where('parent', '=', $page_modual )
                                                ->get();

                                    $totalCount = count($branch);
                                    
                                    $alphabet = chr($loop->index + 65); // Convert index to ASCII value and add 65 (ASCII for 'A')
                                            

                                    ?>
                                    <tr  class="table-active">
                                        <td><?php echo e($index); ?></td>
                                        <td><?php echo e($d->name); ?></td>
                                        <td><?php echo e($d->add); ?> <br><br>
                                            <?php
                                            $personincharges = DB::table('personincharges')
                                                ->where('fk', '=', $d->id )
                                                ->where('assign', '=', $page_modual )
                                                ->where('status', '=', 'Active' )
                                                ->first();
                                            ?>
                                            <b>PIC: </b><?php echo e($personincharges->name); ?> <br>
                                            <b>Email: </b><?php echo e($personincharges->email); ?><br>
                                            <b>Phone No: </b><?php echo e($personincharges->phn_no); ?><br>
                                            <b>Fax No: </b><?php echo e($personincharges->fax_no); ?> <br>
                                        </td>
                                        <td align="center">
                                            <?php 
                                            $brnchvalue = $d->id."@".$page_modual."@"."create"
                                            ?>
                                            <a href="<?php echo e(route('branches.edit',[$brnchvalue])); ?>"  > <span style="margin-left:15px;height:60px;" class="btn btn-primary"><i class="bx bx-plus"></i> Branches</span></a>
                                        
                                            <a onclick="toggleRow('toggle-row<?php echo e($index); ?>')" > <span style="height:60px;" class="btn btn-primary"> <i class='bx bx-cog' ></i> Manage
                                            <br><p style="background-color: white;color:black;border-radius: 5px;
                                            width: 20px; height: 20px; margin-left:30px; "><?php echo e($totalCount); ?></p>  
                                              
                                        </span></a>

                                        </td> 
                                        <?php if($d->status == "Active"): ?> 
                                            <td><span class="badge bg-success fs-6"> Active</span></td> </td> 
                                        <?php else: ?> 
                                            <td><span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                        
                                        <?php endif; ?> 
                                        <td align="center">
                                            <?php 
                                            $value = $d->id."@".$page_modual
                                            ?>
                                            <a href="<?php echo e(route('vendors.show',$value)); ?>" ><i class="bx bx-search" title="Search"></i></a>
                                            <a href="<?php echo e(route('vendors.edit',$value)); ?>"><i class="bx bx-edit-alt" title="Edit"></i></a>
                                            <?php echo Form::open(['method' => 'DELETE','route' => ['vendors.destroy', $d->id],'style'=>'display:inline']); ?>

                                            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this company?')) { this.parentNode.submit(); }" >
                                            <i class="bx bx-trash"  title="Delete Role" style="color:red" title="Delete"></i>
                                            <?php echo Form::close(); ?>

                                            </a>
                                       
                                        </td>
                                    
                                    </tr> 
                              
                                    <tr  style="display: none" class="table-info toggle-row<?php echo e($index); ?>" >
                                        <td><p  style="display: none" ><?php echo e($index); ?></p>  </td>
                                        <td>  </td>
                                        <td><center>
                                                <b>BRANCH</b>
                                            </center>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        
                                    </tr>
                                        <?php $__empty_1 = true; $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                            <?php
                                            $alphabet = chr($loop->index + 65); // Convert index to ASCII value and add 65 (ASCII for 'A')
                                            ?>
                                                    
                                            <?php if($loop->index > 0): ?>
                                                    
                                            <?php else: ?>
                                            <tr   style="display: none" class="toggle-row<?php echo e($index); ?>" >
                                                <td width=" "><p style="display: none" ><?php echo e($index); ?></p></td>
                                                <td width=" ">Bil</td>
                                                <td width=" ">Name</td>
                                                <td width=" ">Address</td>
                                                <td width=" ">status</td>                                
                                                <td width=" " ><center>Actions</center></td>
                                                    
                                            </tr>
                                            <?php endif; ?>
                                                                

                                                            

                                            <div class="item">
                                                        <tr   style="display: none"  id="myDiv" class="toggle-row<?php echo e($index); ?>">
                                                            
                                                            <td><p style="display: none" ><?php echo e($index); ?></p> </td>
                                                            <td class="item-name"><?php echo e($alphabet ."."); ?></td>
                                                            <td class="item-name"> <?php echo e($b ->name); ?></td>
                                                            <td  class="item-name"> <?php echo e($b ->add); ?> </td>
                                                            <?php if($b->status == "Active"): ?> 
                                                                <td><span class="badge bg-success fs-6"> Active</span></td> </td> 
                                                            <?php else: ?> 
                                                                <td><span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                                             
                                                            <?php endif; ?>

                                                            <?php 
                                                            $branceditvalue = $b->id."@".$page_modual."@"."edit";
                                                            $brancvalue = $b->id."@".$page_modual ;
                                                            ?>
                                                            
                                                            <td align="center"> 
                                                                <a href=  "<?php echo e(route('branches.show',$brancvalue)); ?>"><i class="bx bx-search" title="Search"></i></a>
                                                                <a href=  "<?php echo e(route('branches.edit',$branceditvalue)); ?>"><i class="bx bx-edit-alt" title="Edit"></i></a> 
                                                                <?php echo Form::open(['method' => 'DELETE','route' => ['branches.destroy', $brancvalue],'style'=>'display:inline']); ?>

                                                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this company?')) { this.parentNode.submit(); }" >
                                                                <i class="bx bx-trash"  title="Delete Role" style="color:red" title="Delete"></i>
                                                                <?php echo Form::close(); ?>

                                                            </td>
                                                            </tr>
                                            </div>          
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr   style="display: none" id="myDiv" class="toggle-row<?php echo e($index); ?>">
                                                <td ><p  style="display: none" ><?php echo e($index); ?></p>  </td>
                                                <td>  </td>
                                                <td><center>
                                                        No Branch Record
                                                    </center>  </td>
                                                <td>  </td>
                                                <td>  </td>
                                                <td>  </td>
                                                </tr>
                                                    

                                        <?php endif; ?> 
                                     
                                    
                                     
                                    
                              

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                   
                        </tbody>
                        <!---<tbody> 
                            <tr id="row1">
                                <td>Row 1, Cell 1</td>
                                <td>Row 1, Cell 2</td>
                                <td>Row 1, Cell 1</td>
                                <td>Row 1, Cell 2</td>
                                <td>Row 1, Cell 1</td>
                                <td>Row 1, Cell 2</td>
                              </tr>
                              <tr id="row2">
                                <td>Row 2</td>
                                <td>Row 1, Cell 2</td>
                                <td>Row 1, Cell 1</td>
                                <td>Row 1, Cell 2</td>
                                <td>Row 1, Cell 1</td>
                                <td>Row 1, Cell 2</td>
                              </tr>
                              <tr id="row3">
                                <td>Row 3</td>
                                <td>Row 1, Cell 2</td>
                                <td>Row 1, Cell 1</td>
                                <td>Row 1, Cell 2</td>
                                <td>Row 1, Cell 1</td>
                                <td>Row 1, Cell 2</td>
                              </tr>

                                                   
                        </tbody>--->
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
</div>

 

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            info: false,
            lengthMenu: [30, 50, 75, 80, 95, 100]
        });
       

       
    });
    function toggleRow(rowid) {
        
        var rows = document.getElementsByClassName(rowid);

        for (var i = 0; i < rows.length; i++) {
        if (rows[i].style.display === "none") {
            rows[i].style.display = "table-row";
        } else {
            rows[i].style.display = "none";
        }
        }
    }
  </script>
 
 
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



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/vendors/index.blade.php ENDPATH**/ ?>