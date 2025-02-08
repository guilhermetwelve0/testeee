<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">POS</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <!-- Admin Menu -->
                @if (Auth::user()->is_role == 1)
                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <!-- Master Section with Collapse -->
                <li class="nav-header text-white">MASTER</li>
                <li class="nav-item">
                    <a href="#submenuMaster" data-bs-toggle="collapse" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Master Menu</p>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="submenuMaster" data-bs-parent=".sidebar-menu">
                        <li class="w-100">
                            <a href="{{url('admin/category')}}" class="nav-link">
                                <i class="fa fa-cube"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/product')}}" class="nav-link">
                                <i class="fa fa-cubes"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/member')}}" class="nav-link">
                                <i class="fa fa-id-card"></i>
                                <p>Members</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">
                                <i class="fa fa-truck"></i>
                                <p>Supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Transaction Section with Collapse -->
                <li class="nav-header text-white">TRANSACTION</li>
                <li class="nav-item">
                    <a href="#submenuTransaction" data-bs-toggle="collapse" class="nav-link">
                        <i class="nav-icon fa fa-exchange-alt"></i>
                        <p>Transaction Menu</p>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="submenuTransaction" data-bs-parent=".sidebar-menu">
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                <i class="fa fa-adjust"></i>
                                <p>Expenses</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">
                                <i class="fa fa-download"></i>
                                <p>Purchase</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">
                                <i class="fa fa-dollar-sign"></i>
                                <p>Sales List</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">
                                <i class="fa fa-cart-plus"></i>
                                <p>New Transaction</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">
                                <i class="fa fa-bullhorn"></i>
                                <p>Active Transaction</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Report Section with Collapse -->
                <li class="nav-header text-white">REPORT</li>
                <li class="nav-item">
                    <a href="#submenuReport" data-bs-toggle="collapse" class="nav-link">
                        <i class="nav-icon fa fa-chart-bar"></i>
                        <p>Report Menu</p>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="submenuReport" data-bs-parent=".sidebar-menu">
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                <i class="fa fa-asterisk"></i>
                                <p>Income</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- System Section with Collapse -->
                <li class="nav-header text-white">SYSTEM</li>
                <li class="nav-item">
                    <a href="#submenuSystem" data-bs-toggle="collapse" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>System Menu</p>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="submenuSystem" data-bs-parent=".sidebar-menu">
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">
                                <i class="fa fa-cogs"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- User Menu -->
                @elseif(Auth::user()->is_role == 2)
                <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <!-- Dashboard Section -->
                <li class="nav-item">
                    <a href="{{url('user/dashboard')}}" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Transaction Section with Collapse -->
                <li class="nav-header text-white">TRANSACTION</li>
                <li class="nav-item">
                    <a href="#submenuTransaction" data-bs-toggle="collapse" class="nav-link">
                        <i class="nav-icon fa fa-exchange-alt"></i>
                        <p>Transaction Menu</p>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="submenuTransaction" data-bs-parent=".sidebar-menu">
                        <li class="w-100">
                            <a href="#" class="nav-link">
                                <i class="fa fa-cart-plus"></i>
                                <p>New Transaction</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">
                                <i class="fa fa-bullhorn"></i>
                                <p>Active Transaction</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
                @endif
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
