<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{route('dashboard')}}" >
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                        <span key="t-layouts">Proposal</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('proposal-form')}}" key="t-vertical">Registration</a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('proposal-list')}}" key="t-vertical">Listing</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-user"></i>
                        <span key="t-layouts">User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('new-user')}}" key="t-vertical">Registration</a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('user-list')}}" key="t-vertical">Listing</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-user"></i>
                        <span key="t-layouts">Customer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('index_customer')}}" key="t-vertical">Registration</a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{route('list_customer')}}" key="t-vertical">Listing</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-building"></i>
                        <span key="t-layouts">Vendor</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('index_vendor') }}" key="t-vertical">Registration</a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('list_vendor') }}" key="t-vertical">Listing</a>
                        </li>
                    </ul>
                </li>

                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
