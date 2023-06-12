
<?php $__env->startSection('title', 'Proposal Listing'); ?> 
<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">RFQ REPORT</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">RFQ Report</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<script>
function filtertype() {
var selectedOption = document.getElementById("dataDropdown").value;

// Redirect to the route with the selected option
window.location.href = "<?php echo e(route('rfqreport')); ?>?option=" + selectedOption;
}
function filterdata() {
var selectedOption = document.getElementById("dataDropdown").value;
var datefrom = document.getElementById("date_from").value;
var dateto = document.getElementById("date_to").value;
var value = selectedOption+'/'+datefrom+'/'+dateto;
    


if(datefrom && dateto){
window.location.href = "<?php echo e(route('rfqreportfilter')); ?>?option=" + value ;
    
}else if(datefrom){

var newTextField =  $(`<div class="alert alert-warning">Please Select Year To to filter data</div> `);
                    $('#textFieldsContainer').append(newTextField);
}else if (dateto){

var newTextField =  $(`<div class="alert alert-warning">Please Select Year From to filter data</div> `);
                    $('#textFieldsContainer').append(newTextField); 
}else if(selectedOption){
  window.location.href = "<?php echo e(route('rfqreport')); ?>?option=" + selectedOption;   
}else{

}
}
</script>

<div id="textFieldsContainer">
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">                                            
                    <div class="col-md-1">
                         
                        <label for="title" class="form-label">View By :</label>
                        
                        <select id="dataDropdown"  class="form-control"  >

                                <?php if(isset($selectedOption)): ?> 

                                    <?php if($selectedOption == "PIC"): ?>
                                    <option value="CLIENT"  >CLIENT </option>
                                    <option value="PIC" selected>PIC</option>
                                    <?php else: ?>
                                    <option value="CLIENT" selected>CLIENT </option>
                                    <option value="PIC">PIC</option>
                                    <?php endif; ?>

                                <?php else: ?> 
                                     
                                    <option value="CLIENT" selected>CLIENT </option>
                                    <option value="PIC">PIC</option>

                                <?php endif; ?>
                                    
                            </select>
                        
                    </div>

                                                   
                    <div class="col-md-2">
                        <label for="title" class="form-label">Year From  :</label>
                        <?php if(isset($datefrom)): ?> 
 
                        <input type="date" class="form-control" id="date_from" name="datefrom" value="<?php echo e($datefrom); ?>">

                        <?php else: ?>
                        <input type="date" class="form-control" id="date_from" name="datefrom">

                        <?php endif; ?>
                    </div>
          

                                                      
                    <div class="col-md-2">
                        <label for="title" class="form-label">Year To :</label>
                        <?php if(isset($dateto)): ?> 
                         <input type="date" class="form-control" id="date_to" name="dateto" value="<?php echo e($dateto); ?>"  >

                        <?php else: ?>
                        <input type="date" class="form-control" id="date_to" name="dateto"  >

                        <?php endif; ?>
                    </div>

                    <div class="col-md-2">
                        <label for="title" class="form-label">&nbsp;&nbsp; </label>
                        <br>
                        <button type="submit" class="btn btn-warning w-md" onclick="filterdata()" >FILTER</button>
                    </div>
                    
                </div>


            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">RFQ REPORT 
                </h3>

                <br>
                <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">  
                    
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>
                                 <?php if(isset($selectedOption)): ?> 
                                         <?php echo e($selectedOption); ?>

                                 <?php else: ?> 
                                        CUSTOMER
                                 <?php endif; ?>
                            </center></th>
                            <th><center>INPROGRESS</center></th>
                            <th><center>SUBMITTED</center></th>
                            <th><center>NOTSUBMITTED</center></th>
                            <th><center>AWARDED</center></th> 
                            <th><center>TOTAL(RM)</center></th> 
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            ?>
                            <?php if(count($data) === 0): ?>
                            <td colspan="10" align="center">No records found.</td>  
                            <?php else: ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td  align="center"><?php echo e($i++); ?></td>
                            <?php if(  $selectedOption == 'PIC'): ?> 
                            <td  align="center"><?php echo e($m->pic); ?></td>
                            <?php else: ?> 
                            <td  align="center"><?php echo e($m->cust_name); ?></td>
                            <?php endif; ?>
                            

                            <?php
    
                            if( $selectedOption == 'PIC'){

                                if(isset($dateto)){

                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto])
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto])  
                                                ->get();
                                     

                                }else {

                               
                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('pic', '=', $m->pic)
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('pic', '=', $m->pic)  
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('pic', '=', $m->pic) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('pic', '=', $m->pic)  
                                                ->get();
                                    
                                           
                                }
                                    
                            }
                            elseif ($selectedOption != 'PIC') {
                                # code...
                          
                                
                                if(isset($dateto)){

                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto])  
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto])  
                                                ->get();
                                   
                                    
                                }else{


                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('cust_name', '=', $m->cust_name) 
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('cust_name', '=', $m->cust_name)  
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('cust_name', '=', $m->cust_name) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('cust_name', '=', $m->cust_name)  
                                                ->get();

                                      
                                }
                           

                            }else{
                                 

                            }


                          
                        

                        
                            $a = count($submit);
                    
                            $b = count($inprogs);
                    
                            $c = count($nsubmit);
                    
                            $d = count($award);
                    
                      
                    
                                   
                        
                            ?>

                            <td  align="center">
                                <?php if($b == 0 ): ?>
                                -
                                <?php else: ?>
                                <h5>
                                        <?php if( $selectedOption == 'PIC'): ?>

                                            <?php if(isset($datefrom)): ?> 
                                                <a href=  "<?php echo e(route('rfqreport_inprogress_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($b); ?></a>
                                            <?php else: ?>
                                                <a href=  "<?php echo e(route('rfqreport_inprogress', ['name' => $m->pic,'type' => 'pic'])); ?>"> <?php echo e($b); ?></a>
                                            <?php endif; ?> 

                                        <?php else: ?>

                                            <?php if(isset($datefrom)): ?> 
                                                <a href=  "<?php echo e(route('rfqreport_inprogress_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($b); ?></a>
                                            <?php else: ?>
                                                <a href=  "<?php echo e(route('rfqreport_inprogress', ['name' => $m->cust_name,'type' => 'client'])); ?>"> <?php echo e($b); ?></a>
                                            <?php endif; ?>

                                        <?php endif; ?> 
                                </h5>
                                <?php endif; ?>
                            </td>

                            <td  align="center">
                                <?php if($a == 0 ): ?>
                                -
                                <?php else: ?>
                                <h5>
                                    
                                        <?php if( $selectedOption == 'PIC' ): ?>

                                            <?php if(isset($datefrom)): ?> 
                                                 <a href=  "<?php echo e(route('rfqreport_submited_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($a); ?></a>
                                            <?php else: ?>
                                                 <a href=  "<?php echo e(route('rfqreport_submited', ['name' => $m->pic,'type' => 'pic'])); ?>"> <?php echo e($a); ?></a>
                                            <?php endif; ?> 

                                        <?php else: ?>

                                            <?php if(isset($datefrom)): ?> 
                                                 <a href=  "<?php echo e(route('rfqreport_submited_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($a); ?></a>
                                            <?php else: ?>
                                                 <a href=  "<?php echo e(route('rfqreport_submited', ['name' => $m->cust_name,'type' => 'client'])); ?>"> <?php echo e($a); ?></a>
                                            <?php endif; ?>

                                        <?php endif; ?> 
                                </h5>
                                <?php endif; ?>
                            </td>
                            
                            <td  align="center">
                                <?php if($c == 0 ): ?>
                                -
                                <?php else: ?>
                                <h5>
                          
                                        <?php if( $selectedOption == 'PIC'): ?>

                                            <?php if(isset($datefrom)): ?> 
                                                <a href=  "<?php echo e(route('rfqreport_notsubmited_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($c); ?></a>
                                            <?php else: ?>
                                                <a href=  "<?php echo e(route('rfqreport_notsubmited', ['name' => $m->pic,'type' => 'pic'])); ?>"> <?php echo e($c); ?></a>
                                            <?php endif; ?> 

                                        <?php else: ?>

                                            <?php if(isset($datefrom)): ?> 
                                                <a href=  "<?php echo e(route('rfqreport_notsubmited_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($c); ?></a>
                                            <?php else: ?>
                                                <a href=  "<?php echo e(route('rfqreport_notsubmited', ['name' => $m->cust_name,'type' => 'client'])); ?>"> <?php echo e($c); ?></a>
                                            <?php endif; ?>

                                        <?php endif; ?> 
                                </h5>
                                <?php endif; ?>
                            </td>
                            <td  align="center">
                                <?php if($d == 0 ): ?>
                                -
                                <?php else: ?> 
                               <h5>
                                        <?php if( $selectedOption == 'PIC'): ?>

                                            <?php if(isset($datefrom)): ?> 
                                                <a href=  "<?php echo e(route('rfqreport_awarded_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($d); ?></a>
                                            <?php else: ?>
                                                <a href=  "<?php echo e(route('rfqreport_awarded', ['name' => $m->pic,'type' => 'pic'])); ?>"> <?php echo e($d); ?></a>
                                            <?php endif; ?> 

                                        <?php else: ?>

                                            <?php if(isset($datefrom)): ?> 
                                                <a href=  "<?php echo e(route('rfqreport_awarded_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto])); ?>"> <?php echo e($d); ?></a>
                                            <?php else: ?>
                                                <a href=  "<?php echo e(route('rfqreport_awarded', ['name' => $m->cust_name,'type' => 'client'])); ?>"> <?php echo e($d); ?></a>
                                            <?php endif; ?>

                                        <?php endif; ?> 
                               </h5>
                                <?php endif; ?> 
                            </td>
                            <td  align="center">
                               
                                <?php
                                    if( $selectedOption == 'PIC'){

                                        if(isset($datefrom)) {
                                            $rowIds = DB::table('proposals')
                                                    ->where('pic', $m->pic)
                                                    ->whereBetween ('created_at',[ $datefrom, $dateto])
                                                    ->pluck('id')
                                                    ->all();
                                        }else{
                                            $rowIds = DB::table('proposals')
                                                    ->where('pic', $m->pic)
                                                    ->pluck('id')
                                                    ->all();
                                        }

                                    }else{

                                        if(isset($datefrom)) {
                                            $rowIds = DB::table('proposals')
                                                    ->where('cust_name', $m->cust_name)
                                                    ->whereBetween ('created_at',[ $datefrom, $dateto])
                                                    ->pluck('id')
                                                    ->all();
                                        }else{
                                            $rowIds = DB::table('proposals')
                                                ->where('cust_name', $m->cust_name)
                                                ->pluck('id')
                                                ->all();
                                        }                               
                                    }
                                     

                                    $total = DB::table('proposals')
                                            ->whereIn('id',  $rowIds)  
                                            ->sum('award_amount');
                                ?>
                                    
                                    <?php echo e($total); ?>


                            </td>

                           
                             
                        </tr>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div> 
</div> 

 

 
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


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/rfq-report.blade.php ENDPATH**/ ?>