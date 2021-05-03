@extends(config('dashboard.resource_folder').'partials.layout')
@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('profile') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">{{trans('home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('profile')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('profile')}}</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form role="form" action="#" method="POST" novalidate>
                        @csrf @method('post')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{trans('name')}}</label>
                                        <input type="text" class="form-control" name="name" placeholder="{{trans('name')}}" value="{{auth()->guard('admin')->user()->name}}">
                                        <span class="help-block error-help-block input-error name-error" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{trans('email')}}</label>
                                        <input type="email" class="form-control" name="email" placeholder="{{trans('email')}}" value="{{auth()->guard('admin')->user()->email}}">
                                        <span class="help-block error-help-block input-error email-error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{trans('password')}}</label>
                                        <input type="password" class="form-control" name="password" placeholder="{{trans('password')}}">
                                        <span class="help-block error-help-block input-error password-error" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{trans('confirm_password')}}</label>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="{{trans('confirm_password')}}">
                                        <span class="help-block error-help-block input-error confirm_password-error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                {{trans('save')}}
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
@endsection
