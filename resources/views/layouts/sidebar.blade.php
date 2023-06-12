<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>
                <li><a href="{{ route('index_dash') }}"><i class="bx bx-home-circle"></i><span key="t-dashboards">@lang('translation.Dashboards')</span></a></li>
                <li><a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-home-circle"></i> <span key="t-dashboards">Proposal</span></a>
                    <ul class="sub-menu" aria-expanded="true"> <li><a href="{{route('proposals.index')}}">Listing</a></li></ul>    
                    <ul class="sub-menu" aria-expanded="true"> <li><a href="{{route('rfqreport')}}">RFQ REPORT</a></li></ul>
                </li>
                <li><a href="{{route('customers.index')}}"><i class="bx bx-user"></i><span key="t-layouts">Customer</span></a></li>
                <li><a href="{{route('vendors.index')}}"><i class="bx bx-building"></i><span key="t-layouts">Vendor</span></a></li>
                <li class="menu-title" key="t-menu">SETTINGS</li>
                <li><a href="{{route('companies.index')}}"><i class="bx bx-buildings"></i><span key="t-layouts">Companies</span></a>
                <li><a href="{{route('documents.index')}}"><i class="bx bxs-file-blank"></i><span key="t-layouts">Document Type</span></a></li>
                <li><a href="{{route('positions.index')}}"><i class="bx bx-user"></i><span key="t-layouts">Position</span></a> </li>
                <li><a href="{{route('roles.index')}}"><i class="bx bx-user"></i><span key="t-layouts">Role</span></a> </li>
                <li><a href="{{route('rfqtypes.index')}}"><i class="bx bxs-file"></i><span key="t-layouts">RFQ Type</span></a>
                </li><li><a href="{{route('rfqstatus.index')}}"><i class="bx bx-list-check"></i><span key="t-layouts">RFQ Status</span></a></li>
                <li><a href="{{route('users.index')}}"><i class="bx bx-user"></i><span key="t-layouts">User</span> </a></li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
