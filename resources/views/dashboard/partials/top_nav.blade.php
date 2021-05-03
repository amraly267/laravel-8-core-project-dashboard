<!-- Modal -->
<div class="modal fade" id="logoutModel" tabindex="-1" role="dialog" aria-labelledby="logoutModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('confirmation')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">{{trans('are_you_sure_logout')}}</div>
            <div class="modal-footer">
                <form action="#" method="POST">
                    @csrf @method('post')
                    <button type="submit" class="btn btn-primary">
                        {{trans('ok')}}
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </form>
                <button type="button" class="btn btn-outline-dark ml-2" data-dismiss="modal">{{trans('cancel')}}</button>
            </div>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item" title="{{trans('logout')}}" data-toggle="tooltip" data-placement="top">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModel">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" title="{{trans('profile')}}" href="#" title="{{trans('profile')}}" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-user"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
