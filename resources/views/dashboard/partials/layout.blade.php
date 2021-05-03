<!DOCTYPE html>
<html>
    @include(config('dashboard.resource_folder').'partials.header')
        @if(auth()->guard('admin')->check() || Request::is('home'))
            <body class="hold-transition sidebar-mini layout-fixed">
                <div class="wrapper">
                    @include(config('dashboard.resource_folder').'partials.top_nav')
                    @include(config('dashboard.resource_folder').'partials.side_menu')
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        @yield('content-header')
                        <!-- /.content-header -->
                        <!-- Main content -->
                        @yield('content')
                        <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->
                </div>
                <!-- ./wrapper -->
        @else
            <body class="hold-transition login-page">
                <div class="login-box">
                    <div class="login-logo">
                        <img src="{{config('dashboard.static_images_folder').'login.png'}}" width="150"/>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                            @yield('content')
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
                <!-- /.login-box -->
        @endif
        @include(config('dashboard.resource_folder').'partials.footer')
    </body>
</html>
