<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>
                <li><a href="<?php echo e(route('index_dash')); ?>"><i class="bx bx-home-circle"></i><span key="t-dashboards"><?php echo app('translator')->get('translation.Dashboards'); ?></span></a></li>
                <li><a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i> <span key="t-dashboards">Proposal</span></a>
                    <ul class="sub-menu" aria-expanded="true"> <li><a href="<?php echo e(route('proposals.index')); ?>">Listing</a></li></ul>    
                    <ul class="sub-menu" aria-expanded="true"> <li><a href="<?php echo e(route('rfqreport')); ?>">RFQ REPORT</a></li></ul>
                </li>
                <li><a href="<?php echo e(route('customers.index')); ?>"><i class="bx bx-user"></i><span key="t-layouts">Customer</span></a></li>
                <li><a href="<?php echo e(route('vendors.index')); ?>"><i class="bx bx-building"></i><span key="t-layouts">Vendor</span></a></li>
                <li class="menu-title" key="t-menu">SETTINGS</li>
                <li><a href="<?php echo e(route('companies.index')); ?>"><i class="bx bx-buildings"></i><span key="t-layouts">Companies</span></a>
                <li><a href="<?php echo e(route('documents.index')); ?>"><i class="bx bxs-folder"></i><span key="t-layouts">Document Type</span></a></li>
                <li><a href="<?php echo e(route('positions.index')); ?>"><i class="fa fa-user-circle"></i><span key="t-layouts">Position</span></a> </li>
                <li><a href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-user-secret"></i><span key="t-layouts">Role</span></a> </li>
                <li><a href="<?php echo e(route('rfqtypes.index')); ?>"><i class="fa fa-file"></i><span key="t-layouts">RFQ Type</span></a>
                </li><li><a href="<?php echo e(route('rfqstatus.index')); ?>"><i class="bx bx-list-check"></i><span key="t-layouts">RFQ Status</span></a></li>
                <li><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-users"></i><span key="t-layouts"> User</span> </a></li>
                <li><a href="<?php echo e(route('audits.index')); ?>"><i class="bx bxs-file"></i><span key="t-layouts">Audit Trail</span> </a></li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH C:\laragon\www\boilermaster\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>