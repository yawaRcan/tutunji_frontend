<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
        <div class="text-center">
            <img src="{{asset('frontend/assets/imgs/Tutunji Realty White.svg')}}" style="height: 80px;">
        </div>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('/admin/dashboard')}}" class="nav-link {{request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
{{--                @can('view_only')--}}
                    <li class="nav-item has-treeview {{request()->is('admin/edit-amenity/*','admin/add-amenity','amenities_list','admin/add-pre-construct-property','admin/add-sale-property','admin/list-sale-property','admin/list-pending-property','admin/list-pre-construct-property','admin/pending-property','admin/view-pending-property/*','admin/edit-pre-construct-property/*','admin/edit-sale-property/*','admin/list-unique-visitors','admin/all-pre-construct-property','admin/active-pre-construct-property','admin/deleted-pre-construct-property','admin/all-sale-property','admin/approve-sale-property','admin/deleted-sale-property','admin/view-offers/*','admin/add-offers/*','admin/rejected-property','admin/all-pending-property','admin/view-inquiry/*','admin/add-inquiry/*','admin/edit-inquiry/*','admin/edit-offers/*','admin/add-category','admin/view-category','admin/edit-category/*') ? 'menu-open' : '' }}">
                    <a href="{{url('/admin/list-pre-construct-property')}}" class="nav-link {{request()->is('admin/edit-amenity/*','admin/add-amenity','amenities_list','admin/add-pre-construct-property','admin/add-sale-property','admin/list-sale-property','admin/list-pending-property','admin/list-pre-construct-property','admin/pending-property','admin/view-pending-property/*','admin/edit-pre-construct-property/*','admin/edit-sale-property/*','admin/list-unique-visitors','admin/all-pre-construct-property','admin/active-pre-construct-property','admin/deleted-pre-construct-property','admin/all-sale-property','admin/approve-sale-property','admin/deleted-sale-property','admin/view-offers/*','admin/add-offers/*','admin/edit-offers/*','admin/rejected-property','admin/all-pending-property','admin/view-inquiry/*','admin/add-inquiry/*','admin/edit-offers/*','admin/edit-inquiry/*','admin/add-category','admin/view-category','admin/edit-category/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Properties<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/list-pre-construct-property')}}" class="nav-link {{request()->is('admin/list-pre-construct-property','admin/add-pre-construct-property','admin/edit-pre-construct-property/*','admin/all-pre-construct-property','admin/active-pre-construct-property','admin/deleted-pre-construct-property','admin/view-inquiry/*','admin/add-inquiry/*','admin/edit-inquiry/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pre-Construction</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/list-sale-property')}}" class="nav-link {{request()->is('admin/list-sale-property','admin/add-sale-property','admin/edit-sale-property/*','admin/all-sale-property','admin/approve-sale-property','admin/deleted-sale-property','admin/view-offers/*','admin/add-offers/*','admin/edit-offers/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>For Sale/Lease</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('amenities_list')}}" class="nav-link {{request()->is('amenities_list','admin/add-amenity','admin/edit-amenity/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Amenities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/view-category')}}" class="nav-link {{request()->is('admin/add-category','admin/view-category','admin/edit-category/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
{{--                @endcan--}}
                <li class="nav-item has-treeview {{request()->is('admin/list-newsletter','admin/today-newsletter','admin/edit-newsletter/*') ? 'menu-open' : '' }}">
                    <a href="{{url('/admin/list-newsletter')}}" class="nav-link {{request()->is('admin/list-newsletter','admin/today-newsletter','admin/edit-newsletter/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>Newsletter Members<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/list-newsletter')}}" class="nav-link {{request()->is('admin/list-newsletter','admin/edit-newsletter/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Members</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/today-newsletter')}}" class="nav-link {{request()->is('admin/today-newsletter') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Members</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/total-unique-visitors')}}" class="nav-link {{request()->is('admin/total-unique-visitors','admin/list-unique-visitors-today','admin/all-visitors','admin/today-visitors') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-clock"></i>
                        <p>Total Unique Visitors</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/view-blog')}}" class="nav-link {{request()->is('admin/view-blog','admin/add-blog','admin/edit-blog/*','admin/all-blog','admin/all-active-blog','admin/all-deleted-blog') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pager"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/list-agent')}}" class="nav-link {{request()->is('admin/add-agent','admin/list-agent','admin/edit-agent/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Agents</p>
                    </a>
                </li>
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="{{url('/admin/list-admin-users')}}" class="nav-link {{request()->is('admin/list-admin-users','admin/add-admin-users','register') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Admin Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/list-roles')}}" class="nav-link {{request()->is('admin/list-roles','admin/add-role','admin/edit-role/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/list-permission')}}" class="nav-link {{request()->is('admin/list-permission') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/auth/logout')}}" class="nav-link {{request()->is('admin/logout') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
