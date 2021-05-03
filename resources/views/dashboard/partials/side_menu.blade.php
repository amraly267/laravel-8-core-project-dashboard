<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex align-items-center justify-content-center">
    <img src="{{asset('img/logo-white.png')}}" alt="AdminLTE Logo" class="brand-image"style="opacity: .8">
    <!-- <span class="brand-text font-weight-light">{{config('app.name')}}</span> -->
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('administration/home*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>{{trans('home')}}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
