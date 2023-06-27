
<?php $__env->startSection('title', 'View Proposal'); ?> 

<?php $__env->startSection('content'); ?>
<style>
    th.widthtable {
        width:280px
        }
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">View Proposal</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">View Proposal</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<?php  
        $company = DB::table('Companies')->where('id', '=', $rfq->company)->first();  
        $cust = DB::table('Customers')->where('id', '=', $rfq->cust_name)->first();  
        $pic = DB::table('Users')->where('id', '=', $rfq->pic)->first(); 
        $cust_pic = DB::table('Personincharges')->where('id', '=', $rfq->cust_pic)->first();
        $type = DB::table('Rfqtypes')->where('id', '=', $rfq->type)->first();
         
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">View Proposal
                    <a href="<?php echo e(route('proposals.index')); ?>" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                </h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="widthtable">Name</th>
                            <?php if(isset($company->company_name)): ?>  
                                <td> : <?php echo e($company->company_name); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">PIC</th>
                            <?php if(isset($pic->name )): ?>  
                                <td> : <?php echo e($pic->name); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Proposal type</th>
                            <?php if(isset($type->name)): ?>  
                                <td> : <?php echo e($type->name); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer</th>
                            <?php if(isset($cust->name )): ?>  
                                <td> : <?php echo e($cust->name); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer PIC</th>
                            <?php if(isset($cust_pic->name)): ?>  
                                <td> : <?php echo e($cust_pic->name); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer email</th>
                            <?php if(isset($rfq->cust_email)): ?>  
                                <td> : <?php echo e($rfq->cust_email); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ No</th>
                            <?php if(isset($rfq->rfq_no)): ?>  
                                <td> : <?php echo e($rfq->rfq_no); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ title</th>
                            <?php if(isset($rfq->rfq_title)): ?>  
                                <td> : <?php echo e($rfq->rfq_title); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Due Date</th>
                            <?php if(isset($rfq->due_date )): ?>  
                                <td> : <?php echo e($rfq->due_date); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Final Pricing</th>
                            <?php if(isset($rfq->final_pricing)): ?>  
                                <td> : RM <?php echo e($rfq->final_pricing); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ status</th>
                            <?php if(isset($rfq->rfq_status )): ?>  
                                <td> : <?php echo e($rfq->rfq_status); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer PO No</th>
                            <?php if(isset($rfq->cust_po_no )): ?>  
                                <td> : <?php echo e($rfq->cust_po_no); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Date Award</th>
                            <?php if(isset($rfq->date_award )): ?>  
                                <td> : <?php echo e($rfq->date_award); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        <tr>
                            <th class="widthtable">Award Amount</th>
                            <?php if(isset($rfq->award_amount)): ?>  
                                <td> : RM <?php echo e($rfq->award_amount); ?></td>
                            <?php else: ?> 
                                <td> :  -</td>
                            <?php endif; ?>
                        </tr> 
                        
                        <tr><td><strong>Uploaded Document</strong><td></td></td>
                        </tr>
                        <tr>
                        <?php $__currentLoopData = $rfq->proposalDoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php $doc = DB::table('Documents')->where('id', '=', $m->document_type)->first(); ?>

                            <td><li><strong> Document Name:</strong>  <?php echo e($m->document_name); ?></li>
                            <li><strong> Document Type:</strong>  <?php echo e($doc->name); ?></li>
                            <li><strong> Document Type:</strong>  <?php echo e($m->created_at->format('d-m-Y')); ?></li>
                            <li><strong> Filename:</strong>  <?php echo e($m->filename); ?> <a href="<?php echo e(asset('/uploads/' . $m['filename'])); ?>" class="btn btn-info btn-sm"> Download File </a></td></li>
                        </td>
                        <td></td>
                        </tr> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/proposals/show.blade.php ENDPATH**/ ?>